<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::with(['payment', 'driver', 'orderedServices.service', 'orderedServices.selectedBagDetail']);

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

        return view('order.index', compact('orders'));
    }

    public function exportAllPdf(Request $request)
    {
        $query = Order::with(['driver', 'orderedServices.service', 'orderedServices.selectedBagDetail']);

        if ($request->filled('reference_number')) {
            $query->where('reference_number', 'like', '%' . $request->reference_number . '%');
        }

        if ($request->filled('month')) {
            $query->whereMonth('pickup_date', $request->month);
        }

        if ($request->filled('year')) {
            $query->whereYear('pickup_date', $request->year);
        }

        // $orders = $query->where('order_status', '!=', 'cancelled')->get();
        $orders = $query->get();



        $pdf = Pdf::loadView('order.pdf-all', compact('orders'))
                ->setPaper('a4', 'portrait');

        return $pdf->download('all_orders.pdf');
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

        return view('order.show', compact('order'));
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
            'status' => 'required|in:pending,processing,completed',
        ]);

        $order->order_status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
