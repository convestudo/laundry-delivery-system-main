<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ExtraChargeMail;
use App\Models\ExtraCharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ExtraChargeController extends Controller
{

    // public function index()
    // {
    //     $extraCharges = ExtraCharge::with('user')->latest()->paginate(10);
    //     return view('extra_charges.index', compact('extraCharges'));
    // }

    // public function index()
    // {
    //     $extra_charges = ExtraCharge::with('user')->paginate(10); // or whatever your logic is
    //     return view('extra_charges.index', compact('extra_charges'));
    // }

    public function index()
    {
        // $extra_charges = ExtraCharge::with('user')->latest()->paginate(10);
        // return view('extra_charges.index', compact('extra_charges'));
        // $extra_charges = ExtraCharge::with('user')->whereNull('deleted_at')->latest()->paginate(10);
        $extra_charges = ExtraCharge::with('user')->latest()->paginate(10); // This should already exclude soft-deleted by default
        return view('extra_charges.index', compact('extra_charges'));
    }

    public function create()
    {
        return view('extra_charges.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'service_name' => 'required|in:wash & dry,fold,iron,dry cleaning',
            'package_weight' => 'required|in:3,8,15,30',
            'bag_size' => 'required|in:small,medium,large',
            'capacity_exceeded' => 'required|numeric|min:0',
            'extra_charge' => 'required|numeric|min:0',
        ]);

        $user = User::where('email', $validated['email'])->first();

        $base_price = $this->getBasePrice($validated['service_name'], $validated['package_weight']);
        $total_price = $base_price + $validated['extra_charge'];

        $charge = ExtraCharge::create([
            'user_id' => $user->id,
            'service_name' => $validated['service_name'],
            'package_weight' => $validated['package_weight'],
            'bag_size' => $validated['bag_size'],
            'capacity_exceeded' => $validated['capacity_exceeded'],
            'extra_charge' => $validated['extra_charge'],
            'total_price' => $total_price,
        ]);

        Mail::to($user->email)->send(new ExtraChargeMail($charge));

        // return redirect()->back()->with('success', 'Extra charge submitted and email sent.');
        return redirect()->route('extra_charges.index')->with('success', 'Extra charge submitted and email sent.');
    }

    private function getBasePrice(string $service, int $weight): float
    {
        return match($service) {
            'wash & dry' => match(true) {
                $weight === 3 => 30.00,
                $weight === 15 => 42.00,
                $weight === 30 => 50.00,
                default => 0
            },
            'fold' => match(true) {
                $weight === 8 => 20.00,
                $weight === 15 => 38.00,
                $weight === 30 => 41.00,
                default => 0
            },
            default => 0
        };
    }

    public function edit(ExtraCharge $extra_charge)
    {
        return view('extra_charges.edit', compact('extra_charge'));
    }

    // public function edit($id)
    // {
    //     $extra_charge = ExtraCharge::findOrFail($id);
    //     return view('extra_charges.edit', compact('extra_charge'));
    // }

    public function update(Request $request, ExtraCharge $extra_charge)
    {
        $validated = $request->validate([
            'service_name' => 'required|in:wash & dry,fold,iron,dry cleaning',
            'package_weight' => 'required|in:3,8,15,30',
            'bag_size' => 'required|in:small,medium,large',
            'capacity_exceeded' => 'required|numeric|min:0',
            'extra_charge' => 'required|numeric|min:0',
        ]);

        $base_price = $this->getBasePrice($validated['service_name'], $validated['package_weight']);
        $total_price = $base_price + $validated['extra_charge'];

        $extra_charge->update([
            'service_name' => $validated['service_name'],
            'package_weight' => $validated['package_weight'],
            'bag_size' => $validated['bag_size'],
            'capacity_exceeded' => $validated['capacity_exceeded'],
            'extra_charge' => $validated['extra_charge'],
            'total_price' => $total_price,
        ]);

        return redirect()->route('extra_charges.index')->with('success', 'Extra charge updated successfully!');
    }

    // public function destroy(ExtraCharge $extra_charge)
    // {
    //     $extra_charge->delete(); // Soft delete
    //     // return redirect()->route('extra_charges.index')->with('success', 'Extra charge deleted successfully!');
    //     return redirect()->route('extra_charges.index')->with('success', 'Extra charge deleted successfully!');
    // }

    // public function destroy(ExtraCharge $extra_charge)
    // {
    //     $extra_charge->delete();
    //     return redirect()->route('extra_charges.index')->with('success', 'Extra charge deleted successfully.');
    // }

    
    // public function destroy(ExtraCharge $extra_charge)
    // {
    //     $extra_charge->delete();
    //     return redirect()->route('extra_charges.index')->with('success', 'Extra charge deleted successfully.');
    // }

    public function destroy(ExtraCharge $extra_charge)
    {
        $id = $extra_charge->id;
        $extra_charge->delete();

        // Check if the record still exists
        $exists = \App\Models\ExtraCharge::find($id);

        if ($exists) {
            return redirect()->route('extra_charges.index')->with('error', 'Delete failed!');
        } else {
            return redirect()->route('extra_charges.index')->with('success', 'Extra charge deleted successfully.');
        }
    }


    // public function destroy($id)
    // {
    //     $charge = ExtraCharge::findOrFail($id);
    //     $charge->delete();

    //     return redirect()->route('extra_charges.index')->with('success', 'Extra charge deleted successfully.');
    // }


    public function restore($id)
    {
        $extra_charge = ExtraCharge::withTrashed()->findOrFail($id);

        $extra_charge->restore();

        return redirect()->route('extra_charges.index')->with('success', 'Extra charge restored successfully!');
    }

}