<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Services Information') }}
        </h2>
    </x-slot>

    @include('components.book-now')
    <div class="py-20">
        <h1 class="mb-8 text-[#164272] text-center font-[700] text-[28px] uppercase">All Services</h1>
        <div class="flex flex-wrap gap-6 justify-center">
            @foreach ($services as $service)
                <div class="bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-between hover:shadow-lg transition w-full sm:w-[47%] md:w-[30%] lg:w-[22%]">
                    <div>
                        @php 
                            $link = $service->service_img == '' 
                                ? asset('assets/images/no-img.jpeg') 
                                : Storage::url($service->service_img);
                        @endphp

                        <img src="{{ $link }}" class="rounded-[5px] border-2 border-gray-100" />
                        <h3 class="text-lg font-bold text-[#164272] mb-0 mt-3">{{ $service->service_name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $service->service_desc }}</p>

                        <div class="text-sm text-gray-800 mb-3">
                            <span class="font-semibold">Calculate By:</span>
                            {{ ucfirst($service->calculate_by) }}
                        </div>

                        @if($service->calculate_by === 'piece')
                            <div class="text-sm text-gray-800">
                                <span class="font-semibold">Price per Piece:</span>
                                RM{{ number_format($service->pieces_price, 2) }}
                            </div>
                        @elseif($service->calculate_by === 'weight')
                            <div class="mt-2">
                                <span class="font-semibold text-sm text-gray-800">Bag Prices:</span>
                                <ul class="mt-1 space-y-1 text-sm text-gray-700 list-disc list-inside">
                                    @foreach($service->bagDetails as $bag)
                                        <li>
                                            {{ ucfirst($bag->bag_size) }} ({{ $bag->weight_per_kg }}):
                                            RM{{ number_format($bag->price, 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- <h1 class="mt-20 mb-8 text-[#164272] text-center font-[700] text-[28px] uppercase">Bag Size Guides</h1>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4 mt-3 mb-4">
                <img src="{{ asset('assets/images/guide1.png') }}" alt="Image 1" class="w-full h-auto rounded-lg">
                <img src="{{ asset('assets/images/guide2.png') }}" alt="Image 2" class="w-full h-auto rounded-lg">
                <img src="{{ asset('assets/images/guide3.png') }}" alt="Image 3" class="w-full h-auto rounded-lg">
            </div>
        </div> -->

        <h1 class="mt-20 mb-8 text-[#164272] text-center font-[700] text-[28px] uppercase">Bag Size Guides</h1>
        <div class="container mx-auto mb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-4">
                <!-- Small Bag -->
                <div class="bg-white rounded-2xl shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('assets/images/guide1.png') }}" alt="Small Bag" class="w-full h-70 object-cover rounded-lg mb-4">
                    <h2 class="text-[#164272] font-bold text-lg mb-1">Small Bag</h2>
                    <p class="text-gray-700 text-md mb-1">Fits 8KG Machine</p>
                    <p class="text-gray-600 text-md">45cm x 45cm x 18cm</p>
                    <p class="text-gray-500 text-md mt-1">Equivalent to Ikea S size bag</p>
                </div>

                <!-- Medium Bag -->
                <div class="bg-white rounded-2xl shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('assets/images/guide2.png') }}" alt="Medium Bag" class="w-full h-70 object-cover rounded-lg mb-4">
                    <h2 class="text-[#164272] font-bold text-lg mb-1">Medium Bag</h2>
                    <p class="text-gray-700 text-md mb-1">Fits 15KG Machine</p>
                    <p class="text-gray-600 text-md">35cm x 55cm x 37cm</p>
                    <p class="text-gray-500 text-md mt-1">Equivalent to Ikea M size bag</p>
                </div>

                <!-- Large Bag -->
                <div class="bg-white rounded-2xl shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('assets/images/guide3.png') }}" alt="Large Bag" class="w-full h-70 object-cover rounded-lg mb-4">
                    <h1 class="mb-7">
                    <h2 class="text-[#164272] font-bold text-lg mb-1">Large Bag</h2>
                    <p class="text-gray-700 text-md mb-1">Fits 30KG Machine</p>
                    <p class="text-gray-600 text-md">30cm x 73cm x 35cm</p>
                    <p class="text-gray-500 text-md mt-1">Equivalent to Ikea L size bag</p>
                </div>
            </div>
        </div>

        <h1 class="mb-8 text-[#164272] text-center font-[700] text-[28px] uppercase">Service Fee by City</h1>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-4">
                <!-- Parit Raja -->
                <div class="bg-white rounded-2xl shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('assets/images/parit raja.jpg') }}" alt="Parit Raja" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h2 class="text-[#164272] font-bold text-lg mb-1">Parit Raja</h2>
                    <p class="text-gray-700 text-md">RM 5.00</p>
                </div>

                <!-- Ayer Hitam -->
                <div class="bg-white rounded-2xl shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('assets/images/ayer hitam.jpg') }}" alt="Ayer Hitam" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h2 class="text-[#164272] font-bold text-lg mb-1">Ayer Hitam</h2>
                    <p class="text-gray-700 text-md">RM 10.00</p>
                </div>

                <!-- Batu Pahat -->
                <div class="bg-white rounded-2xl shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('assets/images/batu pahat.jpg') }}" alt="Batu Pahat" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h2 class="text-[#164272] font-bold text-lg mb-1">Batu Pahat</h2>
                    <p class="text-gray-700 text-md">RM 15.00</p>
                </div>
            </div>
        </div>

        <h1 class="mb-10">
        <h1 class="mb-8 text-[#164272] text-center font-[700] text-[28px] uppercase">Our Runners</h1>
        <div class="p-4 container mx-auto">
            @if($deliveries->isEmpty())
                <p class="text-gray-600">No deliveries found.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($deliveries as $delivery)
                        <div class="bg-white rounded-2xl shadow p-4 flex items-start hover:shadow-lg transition">
                            <div class="w-1/3 pr-4">
                                <img src="{{ Storage::url($delivery->driver_img) }}" alt="Driver Image" class="w-full h-auto rounded object-cover">
                            </div>

                            <div class="w-2/3">
                                <h4 class="text-[#164272] font-bold text-lg mb-1 pt-4 text-[24px]">{{ $delivery->user->name }}</h4>
                                <div class="pt-4">
                                    <p class="text-sm text-gray-600 mb-2 text-[16px]"><i class="fas fa-envelope text-gray-600 mr-3"></i> {{ $delivery->user->email }}</p>
                                    <p class="text-sm text-gray-600 mb-2 text-[16px]"><i class="fas fa-phone text-gray-600 mr-3"></i> {{ $delivery->user->phone_number }}</p>
                                </div>

                                <div class="text-sm text-gray-700 mt-2">
                                    <p><span class="font-semibold">Gender:</span> {{ ucfirst($delivery->gender) }}</p>
                                    <p class="mb-4"><span class="font-semibold">Age:</span> {{ $delivery->old }}</p>

                                    <div class="flex items-center gap-2 bg-[#164272] rounded-3xl text-white px-3 py-2 w-fit">
                                        <!-- @if(strtolower($delivery->vehicle_type) === 'car')
                                            <i class="fas fa-car"></i>
                                        @elseif(strtolower($delivery->vehicle_type) === 'motorcycle')
                                            <i class="fas fa-motorcycle"></i>
                                        @else
                                            <span>{{ $delivery->vehicle_type }}</span>
                                        @endif -->
                                        @if(strtolower($delivery->vehicle_type) === 'car')
                                            <div class="flex items-center gap-2 bg-[#164272] rounded-3xl text-white px-3 py-2 w-fit">
                                                <i class="fas fa-car"></i>
                                                <span>{{ $delivery->plate_number }}</span>
                                            </div>
                                        @endif
                                        <!-- <span> {{ $delivery->plate_number }}</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">
                    {{ $deliveries->links() }}
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
