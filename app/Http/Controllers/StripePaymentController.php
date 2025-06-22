<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as LaravelSession;

use App\Models\Order;
use App\Models\ServiceCart;
use App\Models\Payment;
use App\Models\OrderedService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class StripePaymentController extends Controller
{
    // public function createSession(Request $request)
    // {
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     $session = Session::create([
    //         'payment_method_types' => ['fpx'],
    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'myr',
    //                 'unit_amount' => 3000, // RM30.00
    //                 'product_data' => [
    //                     'name' => 'Laundry Order #001',
    //                 ],
    //             ],
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
    //         'cancel_url' => route('stripe.cancel'),
    //     ]);

    //     return redirect($session->url);
    // }

    // public function createSession(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'order_name' => 'required|string',
    //         'order_summary' => 'nullable|string',
    //         'total_amount' => 'required|numeric|min:1',
    //     ]);

    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     $session = Session::create([
    //         'payment_method_types' => ['card', 'fpx', 'grabpay'],
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'currency' => 'myr',
    //                     'unit_amount' => intval($request->input('total_amount') * 100),
    //                     'product_data' => [
    //                         'name' => $request->input('order_name'),
    //                         'description' => $request->input('order_summary'),
    //                     ],
    //                 ],
    //                 'quantity' => 1,
    //             ]
    //         ],
    //         'mode' => 'payment',
    //         'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
    //         'cancel_url' => route('stripe.cancel'),
    //         'customer_email' => $request->input('email'),
    //     ]);

    //     return redirect($session->url);
    // }

    public function createSession(Request $request)
    {

        $orderData = LaravelSession::get('order_data');
        // dd($orderData);
        $request->validate([
            'email' => 'required|email',
            'order_name' => 'required|string',
            'order_summary' => 'nullable|string',
            'total_amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:card,fpx,grabpay',
        ]);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => [$request->input('payment_method')],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'unit_amount' => intval($request->input('total_amount') * 100),
                        'product_data' => [
                            'name' => $request->input('order_name', 'Laundry Order'),
                            'description' => $request->input('order_summary'),
                        ],
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
            'customer_email' => $request->input('email'),
        ]);

        return redirect($session->url);
    }

    // public function paymentSuccess(Request $request)
    // {

    //     dd($request);
    //     if (!LaravelSession::has('order_data')) {
    //         return redirect('/schedule')->with('error', 'No order data found.');
    //     }

    //     $orderData = LaravelSession::get('order_data');

    //     $orderSuccess = $this->processOrderFromSession($orderData);

    //     LaravelSession::forget('order_data'); // clear after processing

    //     if ($orderSuccess) {
    //         return redirect('/booking-history')->with('success', 'Payment successful. Order placed!');
    //     } else {
    //         return redirect('/schedule')->with('error', 'Payment succeeded but order failed. Please contact support.');
    //     }
    // }

    public function successPage(){
        return view('stripe.success');
    }

    public function cancelPage(){
        return view('stripe.cancel');
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->query('session_id');  // get session_id from URL

        if (!$sessionId) {
            return redirect('/schedule')->with('error', 'No Stripe session ID found.');
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Retrieve the checkout session from Stripe
            $checkoutSession = \Stripe\Checkout\Session::retrieve($sessionId);

            // Retrieve payment intent to get payment details
            $paymentIntent = \Stripe\PaymentIntent::retrieve($checkoutSession->payment_intent);

            // You can now access payment info like:
            $amountReceived = $paymentIntent->amount_received / 100;  // amount in your currency units
            $currency = strtoupper($paymentIntent->currency);
            $paymentStatus = $paymentIntent->status;  // 'succeeded', 'requires_payment_method', etc.
            $paymentMethod = $paymentIntent->payment_method_types[0] ?? null;

            // Retrieve customer email from session or PaymentIntent charges
            $customerEmail = $checkoutSession->customer_email;

        } catch (\Exception $e) {
            \Log::error('Stripe payment success retrieval error: ' . $e->getMessage());
            return redirect('/schedule')->with('error', 'Unable to verify payment. Please contact support.');
        }

        // Now you have $checkoutSession and $paymentIntent, you can proceed to
        // - Process your order (use your existing processOrderFromSession)
        // - Save payment data to your payment table

        if (!LaravelSession::has('order_data')) {
            return redirect('/schedule')->with('error', 'No order data found.');
        }

        $orderData = LaravelSession::get('order_data');

        $orderSuccess = $this->processOrderFromSession($orderData);

        if ($orderSuccess) {
            $user = Auth::user();

            // Find the latest order for this user (you might want to improve this logic)
            $order = Order::where('customer_id', $user->id)->orderBy('created_at', 'desc')->first();

            // Save payment to DB
            Payment::create([
                'amount' => $amountReceived,
                'payment_status' => $paymentStatus,
                'payment_date' => now(),
                'user_id' => $user->id,
                'order_id' => $order->id,
                'stripe_email' => $customerEmail,
                'stripe_payment_intent_id' => $checkoutSession->payment_intent,
                'stripe_charge_id' => $paymentIntent->charges->data[0]->id ?? null,
                'currency' => $currency,
                'payment_method' => $paymentMethod,
                'payment_response' => json_encode($paymentIntent),  // store full payment intent JSON if needed
            ]);

            LaravelSession::forget('order_data'); // clear session

            // return redirect('/payment/success')->with('success', 'Payment successful. Order placed!');
            return redirect()->route('stripe.success.page')->with('success', 'Payment successful. Order placed!');

        } else {
            LaravelSession::forget('order_data');
            return redirect('/schedule')->with('error', 'Payment succeeded but order failed. Please contact support.');
        }
    }


    public function paymentCancel()
    {
        LaravelSession::forget('order_data'); // clear any temp data
        // return redirect('/payment/cancel')->with('error', 'Payment was cancelled. Please try again.');
        return redirect()->route('stripe.cancel.page')->with('error', 'Payment was cancelled. Please try again.');
    }

    public function orderSession(Request $request){

        LaravelSession::put('order_data', $request->all());
        try {
            // Store order data in session
            LaravelSession::put('order_data', $request->all());

            // Optional: Check if session was set
            if (LaravelSession::has('order_data')) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to store session data']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }

    private function processOrderFromSession($orderData)
    {
        $user = Auth::user();

        $pickupTimeStart = Carbon::parse($orderData['pickup_time_start'])->format('H:i:s');
        $pickupTimeEnd = Carbon::parse($orderData['pickup_time_end'])->format('H:i:s');

        DB::beginTransaction();
        try {
            // Step 1: Create Order
            $orderInstance = new Order();
            $referenceNumber = $orderInstance->generateUniqueReferenceNumber();

            $order = Order::create([
                'address' => $orderData['address'],
                'pickup_date' => $orderData['pickup_date'],
                'pickup_time_start' => $pickupTimeStart,
                'pickup_time_end' => $pickupTimeEnd,
                'delivery_timing' => $orderData['delivery_timing'] ?? null,
                'delivery_fee' => $orderData['delivery_fee'] ?? 0,
                'driver_id' => $orderData['driver_id'],
                'customer_id' => $user->id,
                'voucher_id' => $orderData['voucher_id'] ?? null,
                'voucher_amount' => $orderData['voucher_amount'] ?? 0,
                'reference_number' => $referenceNumber,
                'subtotal' => $orderData['sub_total'],
                'total_amount' => $orderData['total_amount'],
                'order_status' => $orderData['order_status'],
                'remark' => $orderData['remark'] ?? null,
            ]);

            // Step 2: Transfer service cart items
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

            // Step 3: Clear cart
            ServiceCart::where('user_id', $user->id)->delete();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Order submission failed after payment: ' . $e->getMessage());
            return false;
        }
    }

    public function payNow()
    {
        return view('stripe.pay-now');
    }



}

