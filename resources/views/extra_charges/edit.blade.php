
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Extra Charge') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-2 lg:px-2">
            @if(session('message'))
                <div class="alert alert-success mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">Edit Extra Charge</h3>
                    <a href="{{ route('extra_charges.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>

                <!-- Edit Extra Charge Form -->
                <form action="{{ route('extra_charges.update', $extra_charge->chargeID) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- User ID (readonly or hidden) -->
                    <input type="hidden" name="user_id" value="{{ old('user_id', $extra_charge->user_id) }}">

                    <!-- Service Name -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Service Name</span>
                        </label>
                        <input name="service_name" type="text" value="{{ old('service_name', $extra_charge->service_name) }}" class="input w-full bg-white input-bordered text-sm text-gray-800" required />
                        @error('service_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Package Weight -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Package Weight (kg)</span>
                        </label>
                        <input name="package_weight" type="number" step="0.01" value="{{ old('package_weight', $extra_charge->package_weight) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required />
                        @error('package_weight')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bag Size -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Bag Size</span>
                        </label>
                        <input name="bag_size" type="text" value="{{ old('bag_size', $extra_charge->bag_size) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required />
                        @error('bag_size')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Capacity Exceeded -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Capacity Exceeded (kg)</span>
                        </label>
                        <input name="capacity_exceeded" type="number" step="0.01" value="{{ old('capacity_exceeded', $extra_charge->capacity_exceeded) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required />
                        @error('capacity_exceeded')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Extra Charge -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Extra Charge (RM)</span>
                        </label>
                        <input name="extra_charge" type="number" step="0.01" value="{{ old('extra_charge', $extra_charge->extra_charge) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required />
                        @error('extra_charge')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Total Price -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Total Price (RM)</span>
                        </label>
                        <input name="total_price" type="number" step="0.01" value="{{ old('total_price', $extra_charge->total_price) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required />
                        @error('total_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">Update Extra Charge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>