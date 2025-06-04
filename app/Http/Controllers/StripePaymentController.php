<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
// use App\Models\Order;

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

    
    public function createSession(Request $request)
    {
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

    public function paymentSuccess(Request $request)
    {
        return view('stripe.success');
    }

    
    // public function createSession(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'order_name' => 'required|string',
    //         'order_summary' => 'nullable|string',
    //         'address' => 'required|string',
    //         'pickup_date' => 'required|date',
    //         'pickup_time_start' => 'required',
    //         'pickup_time_end' => 'required',
    //         'total_amount' => 'required|numeric|min:1',
    //         'payment_method' => 'required|string|in:card,fpx,grabpay',
    //     ]);

    //     // 1. Generate reference number
    //     $generatedReference = uniqid('REF-');

    //     // 2. Store order data in session
    //     session([
    //         'order_data' => [
    //             'reference_number' => $generatedReference,
    //             'address' => $request->address,
    //             'pickup_date' => $request->pickup_date,
    //             'pickup_time_start' => $request->pickup_time_start,
    //             'pickup_time_end' => $request->pickup_time_end,
    //             'total_amount' => $request->total_amount,
    //             'payment_method' => $request->payment_method,
    //         ]
    //     ]);

    //     // 3. Create Stripe session and redirect
    //     \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    //     $session = \Stripe\Checkout\Session::create([
    //         'payment_method_types' => [$request->input('payment_method')],
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'currency' => 'myr',
    //                     'unit_amount' => intval($request->input('total_amount') * 100),
    //                     'product_data' => [
    //                         'name' => $request->input('order_name', 'Laundry Order'),
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

    // public function paymentSuccess(Request $request)
    // {
    //     // Retrieve order data from session or request (you must store it before redirecting to Stripe)
    //     $orderData = session('order_data'); // Example: you stored all order info in session

    //     if ($orderData) {
    //         $order = new \App\Models\Order();
    //         // $order->user_id = auth()->id();
    //         $order->reference_number = $orderData['reference_number'];
    //         $order->address = $orderData['address'];
    //         $order->pickup_date = $orderData['pickup_date'];
    //         $order->pickup_time_start = $orderData['pickup_time_start'];
    //         $order->pickup_time_end = $orderData['pickup_time_end'];
    //         $order->total_amount = $orderData['total_amount'];
    //         $order->order_status = 'paid';
    //         $order->payment_method = $orderData['payment_method'];
    //         $order->save();

    //         // Optionally clear the session
    //         session()->forget('order_data');
    //     }

    //     return view('stripe.success');
    // }

//     public function paymentSuccess(Request $request)
// {
//     // Retrieve order data from session
//     $orderData = session('order_data');

//     // Ensure all required fields are present
//     if (
//         !$orderData ||
//         empty($orderData['reference_number']) ||
//         empty($orderData['address']) ||
//         empty($orderData['pickup_date']) ||
//         empty($orderData['pickup_time_start']) ||
//         empty($orderData['pickup_time_end']) ||
//         empty($orderData['total_amount']) ||
//         empty($orderData['payment_method'])
//     ) {
//         return redirect()->route('stripe.cancel')->with('error', 'Order session is invalid or missing. Please try again.');
//     }

//     // Save order
//     $order = new \App\Models\Order();
//     $order->reference_number = $orderData['reference_number'];
//     $order->address = $orderData['address'];
//     $order->pickup_date = $orderData['pickup_date'];
//     $order->pickup_time_start = $orderData['pickup_time_start'];
//     $order->pickup_time_end = $orderData['pickup_time_end'];
//     $order->total_amount = $orderData['total_amount'];
//     $order->order_status = 'paid';
//     $order->payment_method = $orderData['payment_method'];
//     $order->save();

//     // Clear session after saving
//     session()->forget('order_data');

//     return view('stripe.success');
// }


    public function paymentCancel()
    {
        return view('stripe.cancel');
    }
}

