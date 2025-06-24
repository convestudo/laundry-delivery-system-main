<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceManagement;
use App\Models\ServiceBagDetail;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderedService;
use App\Models\Delivery;
use App\Models\ServiceCart;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CustomerBookController extends Controller
{
    public function index()
    {
        // Retrieve all service management records
        $services = ServiceManagement::with('bagDetails')->get();
        $cart = ServiceCart::with('service')->where('user_id', auth()->user()->id)->get();
        return view('customer.booking.index', compact('services', 'cart'));

    }

    public function history(Request $request){

        // $orders = Order::with(['driver', 'orderedServices.service', 'orderedServices.selectedBagDetail'])
        //            ->where('customer_id', auth()->user()->id)
        //            ->orderByDesc('created_at')
        //            ->paginate(10);
        $query = Order::with(['payment', 'driver', 'orderedServices.service', 'orderedServices.selectedBagDetail'])->where('customer_id', auth()->user()->id);

        // Filter by reference number
        if ($request->filled('reference_number')) {
            $query->where('reference_number', 'like', '%' . $request->reference_number . '%');
        }

        // Filter by month and year
        if ($request->filled('month') && $request->filled('year')) {
            $query->whereMonth('pickup_date', $request->month)
                ->whereYear('pickup_date', $request->year);
        }else{
            if ($request->filled('month')) {
                $query->whereMonth('pickup_date', $request->month);
            }

            if ($request->filled('year')) {
                $query->whereYear('pickup_date', $request->year);
            }
        }

        $orders = $query->orderByDesc('pickup_date')->paginate(10);
        return view('customer.booking.history', compact('orders'));

    }

    public function orderDetail(Order $order){
        $order->load(['orderedServices.service', 'orderedServices.selectedBagDetail', 'voucher']);
        return view('customer.booking.order-detail', compact('order'));
    }

    public function schedule()
    {
        // Retrieve all service management records
        $services = ServiceManagement::with('bagDetails')->get();
        $cart = ServiceCart::with('service')->where('user_id', auth()->user()->id)->get();
        // $today = Carbon::now()->format('Y-m-d');
        $cutoffTime = Carbon::createFromTime(18, 0, 0); // 6:00 PM today
        $now = Carbon::now(); // respects app timezone

        // If it's past 6PM, set the pickup date to tomorrow
        $today = $now->greaterThanOrEqualTo($cutoffTime)
            ? $now->copy()->addDay()->format('Y-m-d')
            : $now->format('Y-m-d');
        return view('customer.booking.schedule', compact('services', 'cart', 'today'));

    }


    public function getServices()
    {
        $services = ServiceManagement::with('bagDetails')->get();

        // Loop through each service and generate the correct image URL
        $services->each(function ($service) {
            // Ensure that the service image is correctly concatenated with the storage path
            $service->service_image_url = Storage::url($service->service_img);
        });

        $cart = ServiceCart::with('service', 'bagDetail')->where('user_id', auth()->id())->get();

        return response()->json([
            'services' => $services,
            'cart' => $cart,
        ]);
    }


    public function getAvailableDrivers(Request $request)
    {
        $date = $request->pickup_date; // Pickup date from input
        $start = Carbon::parse($date . ' ' . $request->pickup_time_start); // Pickup start time as Carbon instance
        $end = Carbon::parse($date . ' ' . $request->pickup_time_end); // Pickup end time as Carbon instance

        // Step 1: Get the current date and time
        $currentDateTime = Carbon::now();

        // Step 2: Check if the current time is before the selected date, or outside the time range
        // If the current date is before the pickup date, it's valid
        // If the current date is the pickup date, we check if the time is between start and end
        if ($currentDateTime->greaterThan($end)) {
            return response()->json(['error' => 'The selected pickup time window has already passed.'], 400);
        }

        // Step 3: Get driver_ids who are already booked at this date/time
        $bookedDriverIds = Order::where('pickup_date', $date)
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($q) use ($start) {
                    $q->whereTime('pickup_time_start', '<', $start)
                        ->whereTime('pickup_time_end', '>', $start);
                })
                ->orWhere(function ($q) use ($end) {
                    $q->whereTime('pickup_time_start', '<', $end)
                        ->whereTime('pickup_time_end', '>', $end);
                })
                ->orWhere(function ($q) use ($start, $end) {
                    $q->whereTime('pickup_time_start', '>=', $start)
                        ->whereTime('pickup_time_end', '<=', $end);
                });
            })
            ->pluck('driver_id');

        // Step 4: Get all users with role "DeliveryDriver" (adjust as needed)
        $availableDrivers = User::with('delivery')->where('role', 'DeliveryDriver')
            ->whereNotIn('id', $bookedDriverIds)
            ->get();

        $availableDrivers->each(function ($d) {
            $d->delivery->driver_img = Storage::url($d->delivery->driver_img);
        });

        return response()->json($availableDrivers);
    }

    public function getAvailableVouchers()
    {
        $userId = Auth::id();

        $usedVoucherIds = Order::where('customer_id', $userId)
            ->pluck('voucher_id')
            ->filter() // removes nulls
            ->unique()
            ->values();

        $availableVouchers = Voucher::notExpired()
            ->whereNotIn('id', $usedVoucherIds)
            ->where('voucher_status', '=', 'active')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'vouchers' => $availableVouchers,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_management_id' => 'required|exists:service_management,id',
            'service_bag_details_id' => 'nullable|exists:service_bag_details,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $cartItem = ServiceCart::create([
                'user_id' => Auth::id(),
                'service_management_id' => $validated['service_management_id'],
                'service_bag_details_id' => $validated['service_bag_details_id'] ?? null,
                'quantity' => $validated['quantity']
            ]);

            if ($cartItem) {
                return response()->json([
                    'success' => true,
                    'message' => 'Service added to cart successfully!',
                    'cart_item' => $cartItem,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to add service to cart.',
                ], 500);
            }
        } catch (\Exception $e) {
            // Optionally log error for debugging
            Log::error('ServiceCart Insert Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $cartItem = ServiceCart::find($id);

            if (!$cartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart item not found.',
                ], 404);
            }

            $cartItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cart item deleted successfully!',
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart Deletion Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting cart item.',
            ], 500);
        }
    }

    public function duplicate($id)
    {
        try {
            $cartItem = ServiceCart::find($id);

            if (!$cartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart item not found.',
                ], 404);
            }

            $newCartItem = ServiceCart::create([
                'user_id' => $cartItem->user_id,
                'service_management_id' => $cartItem->service_management_id,
                'service_bag_details_id' => $cartItem->service_bag_details_id,
                'quantity' => $cartItem->quantity,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cart item duplicated successfully!',
                'cart_item' => $newCartItem,
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart Duplication Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while duplicating cart item.',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Find the cart record
        $cartItem = ServiceCart::find($id);

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.'
            ], 404);
        }

        // Validate the incoming data
        $request->validate([
            'service_management_id' => 'required|integer',
            'service_bag_details_id' => 'nullable|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        // Example of extra custom condition
        if ($request->quantity <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Quantity must be at least 1.'
            ], 400);
        }

        // Update fields
        $cartItem->service_management_id = $request->service_management_id;
        $cartItem->service_bag_details_id = $request->service_bag_details_id ?? null;
        $cartItem->quantity = $request->quantity;

        if ($cartItem->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart item updated successfully.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update cart item.'
            ], 500);
        }
    }

    public function submitOrder(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'pickup_date' => 'required|date',
            'pickup_time_start' => 'required|string',
            'pickup_time_end' => 'required|string',
            'delivery_timing' => 'nullable|string',
            'delivery_fee' => 'nullable|numeric',
            'driver_id' => 'required|exists:users,id',
            'voucher_id' => 'nullable|exists:vouchers,id',
            'voucher_amount' => 'nullable|numeric',
            'sub_total' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'order_status' => 'required|string',
            'remark' => 'nullable|string'
        ]);

        $user = Auth::user();

        $pickupTimeStart = Carbon::parse($validated['pickup_time_start'])->format('H:i:s');
        $pickupTimeEnd = Carbon::parse($validated['pickup_time_end'])->format('H:i:s');

        DB::beginTransaction();
        try {
            // Step 1: Create Order
            $orderInstance = new Order();
            $referenceNumber = $orderInstance->generateUniqueReferenceNumber();

            $order = Order::create([
                'address' => $validated['address'],
                'pickup_date' => $validated['pickup_date'],
                'pickup_time_start' => $pickupTimeStart,
                'pickup_time_end' => $pickupTimeEnd,
                'delivery_timing' => $validated['delivery_timing'] ?? null,
                'delivery_fee' => $validated['delivery_fee'] ?? 0,
                'driver_id' => $validated['driver_id'],
                'customer_id' => $user->id,
                'voucher_id' => $validated['voucher_id'],
                'voucher_amount' => $validated['voucher_amount'] ?? 0,
                'reference_number' => $referenceNumber,
                'subtotal' => $validated['sub_total'],
                'total_amount' => $validated['total_amount'],
                'order_status' => $validated['order_status'],
                'remark' => $validated['remark'] ?? null,
            ]);

            // Step 2: Transfer service cart items to OrderedService
            $cartItems = ServiceCart::with(['service', 'bagDetail'])->where('user_id', $user->id)->get();

            foreach ($cartItems as $item) {
                OrderedService::create([
                    'order_id' => $order->id,
                    'service_id' => $item->service_management_id,
                    'price' => $item->bagDetail ? $item->bagDetail->price : $item->service->pieces_price,
                    'qty' => $item->quantity,
                    'selected_bag_size' => $item->bagDetail ? $item->bagDetail->bag_size : null,
                    'selected_bag_size_id' => $item->bagDetail ? $item->bagDetail->id : null,
                ]);
            }

            // Step 3: Clear user's cart
            ServiceCart::where('user_id', $user->id)->delete();

            DB::commit();

            return response()->json(['message' => 'Order submitted successfully.', 'success' => true]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Order submission failed.', 'details' => $e->getMessage() , 'success' => false], 500);
        }
    }

}
