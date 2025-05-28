<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

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
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     $session = Session::create([
    //         'payment_method_types' => ['card', 'fpx', 'grabpay'], // Use correct lowercase keys
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'currency' => 'myr',
    //                     'unit_amount' => intval($request->input('total_amount') * 100),
    //                     'product_data' => [
    //                         'name' => 'Laundry Order',
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

    public function createSession(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'order_name' => 'required|string',
            'order_summary' => 'nullable|string',
            'total_amount' => 'required|numeric|min:1',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card', 'fpx', 'grabpay'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'unit_amount' => intval($request->input('total_amount') * 100),
                        'product_data' => [
                            'name' => $request->input('order_name'),
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

    public function paymentCancel()
    {
        return view('stripe.cancel');
    }
}

