<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Feedback;
use Carbon\Carbon;

class CustomerFeedbackController extends Controller
{

    public function check(Order $order)
    {
        $feedback = Feedback::where('order_id', $order->id)->first();

        return response()->json([
            'exists' => $feedback ? true : false,
            'feedback' => $feedback
        ]);
    }

    /**
     * Store feedback submitted via modal.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'feedback_content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'driver_rating' => 'nullable|integer|min:1|max:5',
            'driver_comment' => 'nullable|string|max:1000',
        ]);

        // Check if already exists
        $existing = Feedback::where('order_id', $request->order_id)->first();
        if ($existing) {
            return response()->json(['message' => 'Feedback already submitted.'], 409);
        }

        $feedback = new Feedback();
        $feedback->order_id = $request->order_id;
        $feedback->feedback_content = $request->feedback_content;
        $feedback->rating = $request->rating;
        $feedback->driver_rating = $request->driver_rating;
        $feedback->driver_comment = $request->driver_comment;
        $feedback->feedback_date = Carbon::now();
        $feedback->user_id = auth()->id();
        $feedback->save();

        return response()->json(['message' => 'Feedback submitted successfully.'], 200);
    }
}
