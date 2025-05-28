<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Service Management') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <h2 class="text-2xl font-bold">
            @if(request('action') == 'update')
                {{ __('Update Service') }}
            @elseif(request('action') == 'delete')
                {{ __('Delete Service') }}
            @endif
        </h2>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert-box bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer close-alert">
                        <svg class="fill-current h-6 w-6 text-green-800" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"><title>Close</title><path
                                d="M14.348 5.652a1 1 0 0 0-1.414-1.414L10 7.586 7.066 4.652A1 1 0 1 0 5.652 6.066L8.586 9l-2.934 2.934a1 1 0 0 0 1.414 1.414L10 10.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 9l2.934-2.934z" /></svg>
                    </span>
                </div>
            @elseif (session('error'))
                <div class="alert-box bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer close-alert">
                        <svg class="fill-current h-6 w-6 text-red-800" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"><title>Close</title><path
                                d="M14.348 5.652a1 1 0 0 0-1.414-1.414L10 7.586 7.066 4.652A1 1 0 1 0 5.652 6.066L8.586 9l-2.934 2.934a1 1 0 0 0 1.414 1.414L10 10.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 9l2.934-2.934z" /></svg>
                    </span>
                </div>
            @endif


            <div class="bg-white rounded-lg">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">Service List</h3>
                    <a href="{{ route('services.create') }}" class="btn bg-[#ffd65b] text-gray-800 border-0 hover:bg-[#164272] hover:text-white">Add New Service</a>
                </div>

                <div class="overflow-x-auto">
                    @if($services->isEmpty())
                        <p class="text-gray-600">No services found.</p>
                    @else

                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-[#164272] text-white">
                                    <th class="border border-gray-300 px-4 py-2">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Service Info</th>
                                    <th class="border border-gray-300 px-4 py-2">Calculate By</th>
                                    <th class="border border-gray-300 px-4 py-2">Pricing</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($services as $item)
                                    <tr class="text-gray-800">
                                        <td class="border border-gray-300 px-4 py-2">
                                            @php if($item->service_img == ''){
                                                $link = asset('assets/images/no-img.jpg');
                                            }else{
                                                $link = Storage::url($item->service_img);
                                            }@endphp

                                            <img src="{{ $link }}" width="160" class="rounded" />
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ ucfirst(str_replace('_', ' ', $item->service_name)) }} <br>
                                            <span class="text-[12px] text-gray-500">*{{ ucfirst(str_replace('_', ' ', $item->service_desc)) }}</span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->calculate_by == 'piece' ? 'Per Piece' : 'Per Bag' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">

                                            @if ($item->calculate_by === 'piece')
                                                RM{{ number_format($item->pieces_price, 2) }}
                                            @else
                                                @php
                                                    $bags = $item->bagDetails; // assuming the relationship is defined
                                                @endphp
                                                @if ($bags->isNotEmpty())
                                                    <ul class="list-disc pl-4">
                                                        @foreach ($bags as $bag)
                                                            <li>{{ ucfirst($bag->bag_size) }} ({{ $bag->weight_per_kg }}) - RM{{ number_format($bag->price, 2) }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-gray-500 italic">No bag pricing</span>
                                                @endif
                                            @endif



                                        </td>
                                        <td class="border px-4 py-2">
                                            <div class="flex justify-start space-x-4">
                                                <!-- Edit button -->
                                                <a href="{{ route('services.edit', $item->id) }}" 
                                                style="display: flex; align-items: center; gap: 6px; background-color: #2563eb; color: white; text-decoration: none; padding: 6px 12px; border-radius: 6px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    Update
                                                </a>

                                                <!-- Delete button -->
                                                <form action="{{ route('services.destroy', $item->id) }}" method="POST">
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
                            {{ $services->links() }}
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
