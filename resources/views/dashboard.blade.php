<x-app-layout>
    @if(auth()->user()->role == 'customer')

        @include('components.customer-body');
        @include('components.book-now')

    @else

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-8">
            <div class="max-w-7xl mx-auto px-3">
                @if(auth()->user()->role === 'admin')
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap gap-4 px-6 pb-4">

                    <input
                        type="date"
                        name="start_date"
                        value="{{ request('start_date') }}"
                        class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[180px] text-gray-800"
                        placeholder="Start Date"
                    />

                    <input
                        type="date"
                        name="end_date"
                        value="{{ request('end_date') }}"
                        class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[180px] text-gray-800"
                        placeholder="End Date"
                    />

                    <button type="submit" class="bg-[#ffd65b] hover:bg-[#164272] text-[#164272] hover:text-white px-4 py-1 rounded">
                        Filter
                    </button>

                    <a href="{{ route('dashboard') }}" class="text-sm underline mt-1 text-[#164272]">Reset</a>
                </form>

                <div class=" px-5 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Customers</h2>
                        <p class="text-3xl text-blue-600 mt-2">{{ $customerCount }}</p>
                    </div>

                    <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Drivers</h2>
                        <p class="text-3xl text-green-600 mt-2">{{ $driverCount }}</p>
                    </div> --}}


                    <div class="bg-white border  border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Pending Orders</h2>
                        <p class="text-3xl text-yellow-600 mt-2">{{ $pendingOrderCount }}</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Completed Orders</h2>
                        <p class="text-3xl text-purple-600 mt-2">{{ $completedOrderCount }}</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Total Sales Amount</h2>
                        <p class="text-3xl text-pink-600 mt-2">RM{{ number_format($totalSales, 2) }}</p>
                        <p class="text-muted text-sm">*Exclude Delivery Fee</p>
                    </div>
                </div>

                <div class=" px-5 mb-5 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="w-100 bg-white border border-gray-200 rounded-xl p-5 text-center flex flex-col items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-700">Each Service Sales</h2>
                        <canvas id="serviceChart" height="250"></canvas>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center flex flex-col items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-700">Services Ordered Count</h2>
                        <canvas id="servicePieChart" height="100"></canvas>
                    </div>
                </div>

                @elseif(auth()->user()->role === 'DeliveryDriver')
                <div class=" px-5 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="bg-white border  border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Pending Orders</h2>
                        <p class="text-3xl text-yellow-600 mt-2">{{ $pendingOrderCount }}</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Completed Orders</h2>
                        <p class="text-3xl text-purple-600 mt-2">{{ $completedOrderCount }}</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Average Rating</h2>
                        <p class="text-3xl text-purple-600 mt-2">{{ $averageDriverRating }}  <i class="fa-solid fa-star text-yellow-400"></i></p>
                    </div>
                </div>
                <div class="bg-white rounded-lg px-5 " >
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#164272]">Your Feedback</h3>
                    </div>

                    <div class="overflow-x-auto">
                        @if($userFeedback->isEmpty())
                            <p class="text-gray-600">No feedback found.</p>
                        @else
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-[#164272] text-white">
                                        <th class="border px-4 py-2">Order</th>
                                        <th class="border px-4 py-2">Rating</th>
                                        <th class="border px-4 py-2">Comment</th>
                                        <th class="border px-4 py-2">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userFeedback as $f)

                                        <tr class="text-gray-800">
                                            <td class="border px-4 py-2 text-nowrap"><a class="underline" href="{{ route('feedback.order.show', $f->id) }}">#{{ $f->reference_number }}</a></td>
                                            <td class="border px-4 py-2">{{ $f->feedback->driver_rating }} <i class="fa-solid fa-star text-yellow-400"></i></td>
                                            <td class="border px-4 py-2">{{ $f->feedback->driver_comment }}</td>
                                            <td class="border px-4 py-2 text-nowrap">{{ \Carbon\Carbon::parse($f->feedback->feedback_date)->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="mt-4">
                                {{ $userFeedback->links() }}
                            </div>
                        @endif
                    </div>
                </div>
                @else

                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="px-5 text-gray-900">
                        <i class="fa-solid fa-user"></i> &nbsp; Hi {{ $user->name }}, Welcome back to Royal Dobi!
                    </div>
                </div>

                @endif


            </div>
        </div>


    @endif

    @push('scripts')
    @if(auth()->user()->role === 'admin')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($serviceSales->pluck('service_name'));
        const data = @json($serviceSales->pluck('total_sales'));

        new Chart(document.getElementById('serviceChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Service Sales (RM)',
                    data: data,
                    backgroundColor: '#164272',
                    borderColor: '#164272',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                },
                barThickness: 50
            }
        });
        const ctx = document.getElementById('servicePieChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($serviceCounts->pluck('service_name')) !!},
                datasets: [{
                    data: {!! json_encode($serviceCounts->pluck('service_count')) !!},
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                        '#9966FF', '#FF9F40', '#5CDB95'
                    ],
                }]
            },
            options: {
                responsive: true,
                layout: {
                    padding: 10
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 16, // smaller legend boxes
                            font: {
                                size: 14 // smaller text
                            }
                        }
                    },
                    title: { display: true, text: 'Service Orders Distribution' }
                }
            }
        });
    </script>
    @endif
    @endpush



</x-app-layout>
