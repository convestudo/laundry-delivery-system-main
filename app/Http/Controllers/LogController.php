<?php

namespace App\Http\Controllers;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        // Eager load user to avoid N+1 problem
        $logs = Log::with('user')->latest()->paginate(10);

        return view('logs.index', compact('logs'));
    }

}
