<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Voucher Management') }}
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
                    <h3 class="text-lg font-semibold text-[#164272]">Voucher List</h3>
                    <a href="{{ route('vouchers.create') }}" class="btn bg-[#ffd65b] text-gray-800 border-0 hover:bg-[#164272] hover:text-white">Add New Voucher</a>
                </div>

                <div class="overflow-x-auto">
                    @if($vouchers->isEmpty())
                        <p class="text-gray-600">No vouchers found.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-[#164272] text-white">
                                    <th class="border px-4 py-2">Voucher Code</th>
                                    <th class="border px-4 py-2">Amount</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Expired At</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vouchers as $voucher)
                                    <tr class="text-gray-800">
                                        <td class="border px-4 py-2">{{ $voucher->voucher_code }}</td>
                                        <td class="border px-4 py-2">RM{{ number_format($voucher->voucher_amount, 2) }}</td>
                                        <td class="border px-4 py-2 capitalize">{{ $voucher->voucher_status }}</td>
                                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($voucher->expired_at)->format('d M Y') }}</td>

                                        <td class="border px-4 py-2">
                                            <div class="flex justify-start space-x-4">
                                                <!-- Edit button -->
                                                <a href="{{ route('vouchers.edit', $voucher->id) }}" 
                                                style="display: flex; align-items: center; gap: 6px; background-color: #2563eb; color: white; text-decoration: none; padding: 6px 12px; border-radius: 6px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    Update
                                                </a>

                                                <!-- Delete button -->
                                                <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="display: flex; align-items: center; gap: 8px; background-color: red; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $vouchers->links() }}
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
