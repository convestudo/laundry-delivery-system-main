
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Apply Extra Charge') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-2 lg:px-2">
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white p-6 rounded-lg">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">Apply Extra Charge</h3>
                    <a href="{{ route('extra_charges.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>
                <form method="POST" action="{{ route('extra_charges.store') }}">
                    @csrf

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">User Email</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered w-full bg-white text-gray-800" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Service</span>
                        </label>
                        <select name="service_name" class="select select-bordered w-full bg-white text-gray-800" required>
                            <option>wash & dry</option>
                            <option>fold</option>
                            <!-- <option>iron</option>
                            <option>dry cleaning</option> -->
                        </select>
                        @error('service_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Package Weight (kg)</span>
                        </label>
                        <select name="package_weight" class="select select-bordered w-full bg-white text-gray-800" required>
                            <!-- <option value="3">3kg</option> -->
                            <option value="8">8kg</option>
                            <option value="15">15kg</option>
                            <option value="30">30kg</option>
                        </select>
                        @error('package_weight')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Bag Size</span>
                        </label>
                        <select name="bag_size" class="select select-bordered w-full bg-white text-gray-800" required>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                        @error('bag_size')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Capacity Exceeded (kg)</span>
                        </label>
                        <input type="number" step="0.1" name="capacity_exceeded" class="input input-bordered w-full bg-white text-gray-800" required>
                        @error('capacity_exceeded')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Extra Charge (RM)</span>
                        </label>
                        <input type="number" step="0.01" name="extra_charge" class="input input-bordered w-full bg-white text-gray-800" required>
                        @error('extra_charge')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control mt-6">
                        <button class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">
                            Send Charge to Customer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>