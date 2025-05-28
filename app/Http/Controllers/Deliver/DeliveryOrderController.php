<?php

namespace App\Http\Controllers\Deliver;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderedService;
use Illuminate\Http\Request;


class DeliveryOrderController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Order::with(['driver', 'orderedServices.service', 'orderedServices.selectedBagDetail'])
                   ->where('driver_id', $user->id);
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

        $orders =   $query->orderByDesc('pickup_date')
                   ->paginate(10);
        return view('deliver.order.index', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Eager load related data like ordered services and service details
        $order->load(['orderedServices.service', 'orderedServices.selectedBagDetail', 'voucher']);

        return view('deliver.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order->order_status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}

