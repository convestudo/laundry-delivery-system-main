<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Payment Records
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-error mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4 flex justify-between">
                    <h3 class="text-lg font-semibold">Payment List</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <!-- <th class="border border-gray-300 px-4 py-2">ID</th> -->
                                <th class="border border-gray-300 px-4 py-2">Customer Name</th>
                                <th class="border border-gray-300 px-4 py-2">Order Details</th>
                                <th class="border border-gray-300 px-4 py-2">Total Amount</th>
                                <th class="border border-gray-300 px-4 py-2">Payment Date</th>
                                <!-- <th class="border border-gray-300 px-4 py-2">Status</th> -->
                                <!-- <th class="border border-gray-300 px-4 py-2">Filter</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <!-- <td class="border px-4 py-2">{{ $payment->id }}</td> -->
                                    <td class="border px-4 py-2">{{ $payment->user->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $payment->order->id ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">RM{{ number_format($payment->amount, 2) }}</td>
                                    <!-- <td class="border px-4 py-2">{{ ucfirst($payment->payment_status) }}</td> -->
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y, h:i A') }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Example of actions: Edit or Delete -->
                                        <div class="flex space-x-2">
                                            <!-- Edit -->
                                            <a href="{{ route('payment.edit', $payment->id) }}" class="text-blue-500 hover:text-blue-700">
                                                Edit
                                            </a>
                                            <!-- Delete -->
                                            <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
