<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('My Booking History') }}
        </h2>
    </x-slot>

    @include('components.book-now')

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="min-height: calc(100vh - 190px);">

        <form method="GET" action="{{ route('history.index') }}" class="flex flex-wrap gap-4 px-6 pb-4">
            <input type="text" name="reference_number" placeholder="Reference Number"
                value="{{ request('reference_number') }}"
                class="border border-gray-300 rounded px-3 py-1 text-sm text-gray-800">

            <select name="month" class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[150px] text-gray-800">
                <option value="">-- Month --</option>
                @foreach(range(1, 12) as $m)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                    </option>
                @endforeach
            </select>

            <select name="year" class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[150px] text-gray-800">
                <option value="">-- Year --</option>
                @for ($y = now()->year; $y >= now()->year - 5; $y--)
                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>

            <button type="submit" class="bg-[#ffd65b] hover:bg-[#164272] text-[#164272] hover:text-white px-4 py-1 rounded">
                Filter
            </button>

            <a href="{{ route('history.index') }}" class="text-sm underline mt-1 text-[#164272]">Reset</a>
        </form>
        <div class="overflow-x-auto px-6 pb-6">
            @if($orders->isEmpty())
                <p class="text-gray-600">No orders found.</p>
            @else
                <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-[#164272] text-white">
                            <th class="border border-gray-300 px-4 py-2">Reference No</th>
                            <th class="border border-gray-300 px-4 py-2">Address</th>
                            <th class="border border-gray-300 px-4 py-2">Pickup Date</th>
                            <th class="border border-gray-300 px-4 py-2">Time</th>
                            <th class="border border-gray-300 px-4 py-2">Total</th>
                            <th class="border border-gray-300 px-4 py-2">Payment Method</th> <!-- Payment Method -->
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="text-gray-800">
                                <td class="border border-gray-300 px-4 py-2 text-nowrap">{{ $order->reference_number }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $order->address }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-nowrap">
                                    {{ \Carbon\Carbon::parse($order->pickup_date)->format('M d, Y') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-nowrap">
                                    {{ \Carbon\Carbon::parse($order->pickup_time_start)->format('g:i A') }} -
                                    {{ \Carbon\Carbon::parse($order->pickup_time_end)->format('g:i A') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-nowrap">RM {{ number_format($order->total_amount, 2) }}</td>
                                @php

                                    $statusClass = '';
                                    switch ($order->order_status) {
                                        case 'pending':
                                            $statusClass = 'text-yellow-600';
                                            break;
                                        case 'completed':
                                            $statusClass = 'text-green-600';
                                            break;
                                        case 'cancelled':
                                            $statusClass = 'text-red-600';
                                            break;
                                        default:
                                            $statusClass = 'text-gray-600';
                                    }
                                @endphp
                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($order->payment_method) }}</td> <!-- Show payment method -->
                                <td class="border border-gray-300 px-4 py-2 capitalize font-600  {{$statusClass}}">{{ $order->order_status }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('customer.order.detail', $order->id) }}"
                                        class="bg-[#ffd65b] hover:bg-[#164272] hover:text-white text-gray-800 px-4 py-1 rounded-lg shadow">
                                         View
                                     </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
