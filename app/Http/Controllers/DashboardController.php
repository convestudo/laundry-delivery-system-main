<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderedService;
use App\Models\Feedback;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user(); // Get the logged-in user

    //     $customerCount = User::where('role', 'customer')->count();
    //     $driverCount = User::where('role', 'DeliveryDriver')->count();
    //     $pendingOrderCount = Order::where('order_status', 'pending')->count();
    //     $completedOrderCount = Order::where('order_status', 'completed')->count();

    //     return view('dashboard', compact(
    //         'user',
    //         'customerCount',
    //         'driverCount',
    //         'pendingOrderCount',
    //         'completedOrderCount'
    //     ));

    // }

    public function index(Request $request)
    {
        $user = auth()->user(); // Get the logged-in user
        $order = new Order();

        $serviceSales = null;
        $serviceCounts = null;

        if ($user->role === 'admin') {
            // Admin sees everything
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $orderQuery = Order::query();

            if ($startDate) {
                $orderQuery->whereDate('created_at', '>=', $startDate);
            }

            if ($endDate) {
                $orderQuery->whereDate('created_at', '<=', $endDate);
            }

            $orderQuery->where('order_status', '!=', 'cancelled');

            $customerCount = User::where('role', 'customer')->count();
            $driverCount = User::where('role', 'DeliveryDriver')->count();
            // $pendingOrderCount = Order::where('order_status', 'pending')->count();
            // $completedOrderCount = Order::where('order_status', 'completed')->count();
            $pendingOrderCount = (clone $orderQuery)
            ->where('order_status', 'pending')
            ->count();

            $completedOrders = (clone $orderQuery)
                ->where('order_status', 'completed')
                ->get();

            $completedOrderCount = $completedOrders->count();

            $totalSales = (clone $orderQuery)
                ->sum('subtotal');

            $filteredOrderIds = $orderQuery->pluck('id');

            $userFeedback = null;
            $averageDriverRating = null;

            $serviceSales = DB::table('service_management')
            ->leftJoin('ordered_services', 'service_management.id', '=', 'ordered_services.service_id')
            ->leftJoin('orders', 'ordered_services.order_id', '=', 'orders.id')
            ->select(
                'service_management.service_name',
                DB::raw('COALESCE(SUM(ordered_services.price * ordered_services.qty), 0) as total_sales')
            )
            ->when($startDate, fn($query) => $query->whereDate('orders.created_at', '>=', $startDate))
            ->when($endDate, fn($query) => $query->whereDate('orders.created_at', '<=', $endDate))
            ->where(function($query) {
                $query->whereNull('orders.order_status') // to allow services not linked to any order yet
                    ->orWhere('orders.order_status', '!=', 'cancelled');
            })
            ->groupBy('service_management.service_name')
            ->orderByDesc('total_sales')
            ->get();

            $serviceCounts = DB::table('service_management')
                ->leftJoin('ordered_services', 'service_management.id', '=', 'ordered_services.service_id')
                ->leftJoin('orders', 'ordered_services.order_id', '=', 'orders.id')
                ->select(
                    'service_management.service_name',
                    DB::raw('COUNT(ordered_services.id) as service_count')
                )
                ->when($startDate, fn($query) => $query->whereDate('orders.created_at', '>=', $startDate))
                ->when($endDate, fn($query) => $query->whereDate('orders.created_at', '<=', $endDate))
                ->where(function($query) {
                    $query->whereNull('orders.order_status')
                        ->orWhere('orders.order_status', '!=', 'cancelled');
                })
                ->groupBy('service_management.service_name')
                ->get();



        } elseif ($user->role === 'DeliveryDriver') {
            // Driver sees only their own orders
            $customerCount = null;
            $driverCount = null;
            $pendingOrderCount = Order::where('order_status', 'pending')
                ->where('driver_id', $user->id)
                ->count();
            $completedOrderCount = Order::where('order_status', 'completed')
                ->where('driver_id', $user->id)
                ->count();
            $userFeedback = Order::with(['driver', 'orderedServices.service', 'orderedServices.selectedBagDetail', 'feedback'])
                   ->where('driver_id', $user->id)
                   ->where('order_status', 'completed')
                   ->paginate(10);

            $averageDriverRating = Feedback::whereHas('order', function ($query) use ($user) {
                    $query->where('driver_id', $user->id);
                })->pluck('driver_rating');

            $total = 0;
            $num = $averageDriverRating->count();
            foreach ($averageDriverRating as $rating) {
                $total += floatval($rating);
            }

            $averageDriverRating = $averageDriverRating->count() > 0
            ? floor(($total / $averageDriverRating->count()) * 10) / 10
            : 0;

            $totalSales = 0;


        } else {
            // Other roles (e.g. customer) — optionally handle this
            $customerCount = null;
            $driverCount = null;
            $pendingOrderCount = null;
            $completedOrderCount = null;
            $userFeedback = null;
            $averageDriverRating = null;
            $totalSales = 0;
        }

        return view('dashboard', compact(
            'user',
            'customerCount',
            'driverCount',
            'pendingOrderCount',
            'completedOrderCount',
            'userFeedback',
            'averageDriverRating',
            'totalSales',
            'serviceSales',
            'serviceCounts'
        ));
    }

}

