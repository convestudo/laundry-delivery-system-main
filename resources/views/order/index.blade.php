<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert-box bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer close-alert">
                        &times;
                    </span>
                </div>
            @endif

            <div class="bg-white rounded-lg">
                <div class="mb-4 flex justify-between items-center px-6 pt-6">
                    <h3 class="text-lg font-semibold text-[#164272]">Order List</h3>
                    <a href="{{ route('orders.export.all', request()->query()) }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow ml-auto block text-sm">
                        Export All to PDF
                    </a>
                </div>

                <form method="GET" action="{{ route('orders.index') }}" class="flex flex-wrap gap-4 px-6 pb-4">
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

                    <a href="{{ route('orders.index') }}" class="text-sm underline mt-1 text-[#164272]">Reset</a>
                </form>

                <div class="overflow-x-auto px-6 pb-6">
                    @if($orders->isEmpty())
                        <p class="text-gray-600">No orders found.</p>
                    @else


                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-[#164272] text-white">
                                    <th class="border border-gray-300 px-4 py-2">Reference No</th>
                                    <th class="border border-gray-300 px-4 py-2">Address</th>
                                    <th class="border border-gray-300 px-4 py-2">Pickup Date/Time</th>
                                    <th class="border border-gray-300 px-4 py-2">Total</th>
                                    <th class="border border-gray-300 px-4 py-2">Payment Method</th>
                                    <th class="border border-gray-300 px-4 py-2">Status</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="text-gray-800">
                                        <td class="border border-gray-300 px-4 py-2 text-nowrap">{{ $order->reference_number }}</td>
                                        <td class="border border-gray-300 px-4 py-2 min-w-[200px]" >{{ $order->address }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-nowrap">
                                            {{ \Carbon\Carbon::parse($order->pickup_date)->format('M d, Y') }}<br>
                                            {{ \Carbon\Carbon::parse($order->pickup_time_start)->format('g:i A') }} -
                                            {{ \Carbon\Carbon::parse($order->pickup_time_end)->format('g:i A') }}
                                        </td>

                                        <td class="border border-gray-300 px-4 py-2 text-nowrap">RM {{ number_format($order->total_amount, 2) }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-nowrap uppercase">{{ $order->payment ? $order->payment->payment_method : '-' }}</td>
                                        <td class="border border-gray-300 px-4 py-2 capitalize" >{{ $order->order_status }}</td>
                                        <!-- <td class="border border-gray-300 px-4 py-2 capitalize">
                                            <form action="{{ route('order.updateStatus', $order->id) }}" method="POST" class="inline update-status-form">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="mt-1 text-sm rounded border-gray-300 text-gray-700 status-select">
                                                    <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="completed" {{ $order->order_status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                </select>
                                            </form>
                                        </td> -->
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a href="{{ route('orders.show', $order->id) }}"
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
        </div>
    </div>

    <!-- Modal -->
    <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <h2 class="text-lg font-bold mb-4">Ordered Services</h2>
            <table class="w-full text-sm text-left border">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border px-4 py-2">Service</th>
                        <th class="border px-4 py-2">Bag Size</th>
                        <th class="border px-4 py-2">Qty</th>
                        <th class="border px-4 py-2">Price</th>
                    </tr>
                </thead>
                <tbody id="modalContent">
                    <!-- Filled dynamically with jQuery -->
                </tbody>
            </table>
            <div class="mt-4 text-right">
                <button class="px-4 py-2 bg-red-500 text-white rounded close-modal">Close</button>
            </div>
        </div>
    </div>

    @push('scripts')

    <script>
        $(document).on('change', '.status-select', function (e) {
            const form = $(this).closest('form');
            const selected = $(this).val();
            const confirmed = confirm(`Are you sure you want to change status to "${selected}"?`);

            if (confirmed) {
                form.submit();
            } else {
                // Reset to default option
                $(this).val('');
            }
        });
        $(document).on('click', '.close-alert', function () {
            $(this).closest('.alert-box').fadeOut();
        });
    </script>

    @endpush
</x-app-layout>
