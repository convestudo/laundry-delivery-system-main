<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Delivery Management') }}
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
                    <h3 class="text-lg font-semibold text-[#164272]">Driver List</h3>
                    <a href="{{ route('delivery.create') }}" class="btn bg-[#ffd65b] text-gray-800 border-0 hover:bg-[#164272] hover:text-white px-4 py-2 rounded-lg shadow">Add New Delivery</a>
                </div>

                <div class="overflow-x-auto">
                    @if($deliveries->isEmpty())
                        <p class="text-gray-600">No deliveries found.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-[#164272] text-white">
                                    <th class="border border-gray-300 px-4 py-2">Driver Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Driver Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Email</th>
                                    <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                                    <th class="border border-gray-300 px-4 py-2">Gender</th>
                                    <th class="border border-gray-300 px-4 py-2">Age Range</th>
                                    <th class="border border-gray-300 px-4 py-2">Vehicle Type</th>
                                    <th class="border border-gray-300 px-4 py-2">Plate Number</th>
                                    <th class="border border-gray-300 px-4 py-2">Insurance Document</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveries as $delivery)
                                    <tr class="text-gray-800">
                                        <td class="border border-gray-300 px-4 py-2"><img src="{{ Storage::url($delivery->driver_img) }}" width="100" class="rounded" /></td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $delivery->user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $delivery->user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $delivery->user->phone_number }}</td>
                                        <td class="border border-gray-300 px-4 py-2 capitalize">{{ $delivery->gender }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $delivery->old }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $delivery->vehicle_type }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $delivery->plate_number }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if($delivery->insurance_document)
                                                <a href="{{ Storage::url($delivery->insurance_document) }}" class="text-blue-500 hover:text-blue-700" target="_blank">View Document</a>
                                            @else
                                                <span class="text-red-500">No Document</span>
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-4">
                                                <a href="{{ route('delivery.edit', $delivery->id) }}" 
                                                    style="display: flex; align-items: center; gap: 6px; background-color: #2563eb; color: white; text-decoration: none; padding: 6px 12px; border-radius: 6px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                        </svg>
                                                        Update
                                                </a>

                                                <form action="{{ route('delivery.destroy', $delivery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this delivery?')">
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

                        <div class="mt-4 flex justify-center">
                            {{ $deliveries->links() }}
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
