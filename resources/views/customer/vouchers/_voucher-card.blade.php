<div class="bg-white shadow-md rounded-2xl p-6 border border-gray-200 flex flex-col justify-between opacity-{{ $used ? '50' : '100' }}">
    <div>
        <h3 class="text-[#164272] text-xl font-bold mb-2">{{ $voucher->voucher_code }}</h3>
        <p class="text-gray-700 text-lg font-semibold">RM {{ number_format($voucher->voucher_amount, 2) }} OFF</p>

        @if ($voucher->isExpired())
            {{-- <span class="inline-block mt-3 text-red-500 font-semibold text-sm">Expired on {{ $voucher->expired_at->format('d M Y') }}</span> --}}
        @else
            @if(!$used)
                <span class="inline-block mt-3 text-green-600 font-medium text-sm">Valid until {{ $voucher->expired_at?->format('d M Y') ?? 'Unlimited' }}</span>
            @endif
        @endif
    </div>

    <div class="mt-4">
        @if ($used)
            <div class="bg-gray-400 text-[14px] text-white font-semibold px-4 py-2 rounded-xl w-fit cursor-not-allowed" disabled>
                Already Used
            </div>
        @else
            <div class="bg-[#164272] text-[14px] text-white font-semibold px-4 py-2 rounded-xl hover:bg-[#1d517f] w-fit">
                Available
            </div>
        @endif
    </div>
</div>
