<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Action Logs') }}
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
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-[#164272]">Logs List</h3>
                </div>

                <div class="overflow-x-auto">
                    @if($logs->isEmpty())
                        <p class="text-gray-600">No logs found.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-[#164272] text-white">
                                    <th class="border px-4 py-2">User</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr class="text-gray-800">
                                        <td class="border px-4 py-2">
                                            Name: {{ $log->user->name ?? 'N/A' }} <br>
                                            Email: {{ $log->user->email ?? 'N/A' }} <br>
                                            @php
                                                if($log->user->role == 'admin'){
                                                    $roleShow = "Admin";
                                                }else if($log->user->role == 'customer'){
                                                    $roleShow = "Customer";
                                                }else{
                                                    $roleShow = "Delivery Staff";
                                                }

                                            @endphp
                                            Role: {{ $roleShow }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $log->action }}</td>
                                        <td class="border px-4 py-2">{{ $log->created_at->format('M d, Y h:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $logs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).on('click', '.close-alert', function () {
            $(this).closest('.alert-box').fadeOut();
        });
    </script>
    @endpush
</x-app-layout>
