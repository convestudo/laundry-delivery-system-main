<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'payment_status' => 'required|string',
            'payment_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id',
        ]);

        Payment::create($validatedData);

        return response()->json(['message' => 'Payment successfully recorded.']);
    }

    public function index()
    {
        $payments = Payment::with(['user', 'order'])->get();
        return view('payment.index', compact('payments'));
    }
}
