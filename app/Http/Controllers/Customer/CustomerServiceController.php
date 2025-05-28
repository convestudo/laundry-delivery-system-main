<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceManagement;
use App\Models\ServiceBagDetail;
use App\Models\User;
use App\Models\Delivery;

class CustomerServiceController extends Controller
{

    public function index()
    {
        // Retrieve all service management records
        $deliveries = Delivery::with('user')->paginate(10);
        $services = ServiceManagement::with('bagDetails')->get();
        return view('customer.services.index', compact('services', 'deliveries'));

    }
}
