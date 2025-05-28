<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CustomerVoucherController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $usedVoucherIds = Order::where('customer_id', $userId)
            ->pluck('voucher_id')
            ->filter() // removes nulls
            ->unique()
            ->values();

        $availableVouchers = Voucher::notExpired()
            ->whereNotIn('id', $usedVoucherIds)
            ->where('voucher_status', '=', 'active')
            ->latest()
            ->paginate(10, ['*'], 'available_page');

        $usedVouchers = Voucher::whereIn('id', $usedVoucherIds)
            ->latest()
            ->paginate(10, ['*'], 'used_page');

        return view('customer.vouchers.index', compact('availableVouchers', 'usedVouchers'));
    }

    public function checkVoucherUsage(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string'
        ]);

        $user = Auth::user();

        $voucher = Voucher::where('voucher_code', $request->voucher_code)->first();

        if (!$voucher) {
            return response()->json([
                'isExist'=> false,
                'used' => false,
                'voucher' => null,
                'voucher_amount' => 0
            ]);
        }

        $isExpired = $voucher->expired_at && Carbon::now()->gt(Carbon::parse($voucher->expired_at));

        $used = Order::where('customer_id', $user->id)
                    ->where('voucher_id', $voucher->id)
                    ->exists();

        return response()->json([
            'isExist'=> true,
            'used' => $used,
            'expired' => $isExpired,
            'voucher' => $voucher,
            'voucher_amount' => $voucher->amount ?? 0
        ]);
    }

}
