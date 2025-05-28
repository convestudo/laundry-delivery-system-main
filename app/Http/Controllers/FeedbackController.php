<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\Order;
use App\Models\OrderedService;
use Illuminate\Http\Request;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = feedback::with(['user', 'order']);

        if ($request->filled('reference_number')) {
            $query->whereHas('order', function ($q) use ($request) {
                $q->where('reference_number', 'like', '%' . $request->reference_number . '%');
            });
        }

        if ($request->filled('month') && $request->filled('year')) {
            $query->whereMonth('created_at', $request->month)
                ->whereYear('created_at', $request->year);
        }else{
            if ($request->filled('month')) {
                $query->whereMonth('created_at', $request->month);
            }

            if ($request->filled('year')) {
                $query->whereYear('created_at', $request->year);
            }
        }
        $feedbacks =  $query->orderByDesc('created_at')->paginate(10);
        return view('feedback.index', compact('feedbacks'));
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

    public function showDetail($id)
    {

        $order = new Order;

        // Eager load related data like ordered services and service details
        $order = Order::with([
            'orderedServices.service',
            'orderedServices.selectedBagDetail',
            'voucher'
        ])->findOrFail($id);

        return view('feedback.show', compact('order'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully.');
    }
}
