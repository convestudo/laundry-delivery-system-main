<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{
    public function index()
    {
        // Fetch all vouchers including soft-deleted ones
        $vouchers = Voucher::latest()->paginate(10);
        return view('vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        // Validate voucher data
        $request->validate([
            'voucher_code' => [
                'required',
                // Check uniqueness while excluding soft-deleted vouchers
                Rule::unique('vouchers')->whereNull('deleted_at'),
            ],
            'voucher_amount' => 'required|numeric|min:0',
            'expired_at' => 'required|date|after:today',
        ]);

        // Check if a voucher with the same code exists, including soft-deleted ones
        $existingVoucher = Voucher::withTrashed()->where('voucher_code', $request->voucher_code)->first();

        if ($existingVoucher) {
            if ($existingVoucher->trashed()) {
                // If the voucher is soft-deleted, restore it
                $existingVoucher->restore();

                // Optionally, update its details after restoring
                $existingVoucher->update($request->only('voucher_amount', 'voucher_status' ,'expired_at'));

                return redirect()->route('vouchers.index')->with('success', 'Voucher restored and updated successfully!');
            } else {
                // If the voucher is not soft-deleted, show an error
                return redirect()->route('vouchers.index')->with('error', 'Voucher code already exists!');
            }
        }

        // If no soft-deleted voucher exists, create a new voucher
        Voucher::create($request->only('voucher_code', 'voucher_amount',  'voucher_status', 'expired_at'));

        return redirect()->route('vouchers.index')->with('success', 'Voucher created successfully!');
    }


    public function edit(Voucher $voucher)
    {
        return view('vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'voucher_code' => 'required|unique:vouchers,voucher_code,' . $voucher->id,
            'voucher_amount' => 'required|numeric|min:0',
            'expired_at' => 'required|date|after:today',
        ]);

        $voucher->update($request->only('voucher_code', 'voucher_amount', 'voucher_status' ,'expired_at'));

        return redirect()->route('vouchers.index')->with('success', 'Voucher updated successfully!');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete(); // Soft delete
        return redirect()->route('vouchers.index')->with('success', 'Voucher deleted successfully!');
    }

    public function restore($id)
    {
        $voucher = Voucher::withTrashed()->findOrFail($id);

        // Restore the soft-deleted voucher
        $voucher->restore();

        return redirect()->route('vouchers.index')->with('success', 'Voucher restored successfully!');
    }
}
