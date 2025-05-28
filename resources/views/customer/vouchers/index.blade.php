<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Royal Doby Vouchers') }}
        </h2>
    </x-slot>

    @include('components.book-now')

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="min-height: calc(100vh - 190px);">

        {{-- Available Vouchers --}}
        <h1 class="mb-0 text-[#164272] font-bold text-lg uppercase mt-5">Available Vouchers</h1>
        <p class="mb-6 text-[14px]">*Enter voucher code on checkout page.</p>
        @if ($availableVouchers->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                @foreach ($availableVouchers as $voucher)
                    @include('customer.vouchers._voucher-card', ['voucher' => $voucher, 'used' => false])
                @endforeach
            </div>
            {{ $availableVouchers->onEachSide(1)->links() }}
        @else
            <p class="text-gray-600 mb-10">No available vouchers.</p>
        @endif

        {{-- Used Vouchers --}}
        <h1 class="mt-10 mb-6 text-[#164272] font-bold text-lg uppercase">Used Vouchers</h1>
        @if ($usedVouchers->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                @foreach ($usedVouchers as $voucher)
                    @include('customer.vouchers._voucher-card', ['voucher' => $voucher, 'used' => true])
                @endforeach
            </div>
            {{ $usedVouchers->onEachSide(1)->links() }}
        @else
            <p class="text-gray-600">No used vouchers.</p>
        @endif

    </div>
</x-app-layout>
