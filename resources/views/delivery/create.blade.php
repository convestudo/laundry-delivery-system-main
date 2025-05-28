<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Register Delivery Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg">

                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">New Delivery Driver</h3>
                    <a href="{{ route('delivery.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>
                <form action="{{ route('delivery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Driver Name -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Driver Name</span>
                        </label>
                        <input type="text" name="name" class="input input-bordered w-full text-gray-800 bg-white"
                            placeholder="Enter driver name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror


                    <!-- Email -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Email</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered w-full text-gray-800  bg-white"
                            placeholder="Enter email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Phone Number -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Phone Number</span>
                        </label>
                        <input type="text" name="phone_number" class="input input-bordered w-full text-gray-800 bg-white"
                            placeholder="Enter phone number" value="{{ old('phone_number') }}">
                    </div>
                    @error('phone_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Password -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full text-gray-800 bg-white"
                            placeholder="Enter password">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Gender -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Gender</span>
                        </label>
                        <div>
                            <label>
                                <input class="text-gray-800" type="radio" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }}> Male
                            </label>
                            <label class="ml-4">
                                <input class="text-gray-800" type="radio" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}> Female
                            </label>
                        </div>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Age Range -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Age Range</span>
                        </label>
                        <select name="old" class="input input-bordered w-full text-gray-800 bg-white">
                            <option value="18-25" {{ old('old') === '18-25' ? 'selected' : '' }}>18-25</option>
                            <option value="26-35" {{ old('old') === '26-35' ? 'selected' : '' }}>26-35</option>
                            <option value="36-45" {{ old('old') === '36-45' ? 'selected' : '' }}>36-45</option>
                        </select>
                    </div>
                    @error('old')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Vehicle Type -->
                    {{-- <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Type of Vehicle</span>
                        </label>
                        <input type="text" class="input input-bordered w-full text-gray-800 bg-white" value="Car" readonly>
                        <select name="vehicle_type" class="input input-bordered w-full text-gray-800 bg-white">
                            <option value="car" {{ old('vehicle_type') === 'car' ? 'selected' : '' }}>Car</option>
                            <option value="motorcycle" {{ old('vehicle_type') === 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                        </select>
                    </div> --}}
                    <input type="hidden" name="vehicle_type" class="input input-bordered w-full text-gray-800 bg-white" value="car" readonly>
                    @error('vehicle_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <!-- Vehicle Type Display (Read-only) -->
                    <!-- <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Type of Vehicle</span>
                        </label>
                        <input type="text" class="input input-bordered w-full bg-white-800 text-gray-800" value="Car" disabled>
                    </div> -->


                    <!-- Plate Number -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Car Plate Number</span>
                        </label>
                        <input type="text" name="plate_number" class="input input-bordered w-full text-gray-800 bg-white"
                            placeholder="Enter plate number" value="{{ old('plate_number') }}">
                    </div>
                    @error('plate_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror


                    <!-- Insurance Document -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Insurance Document</span>
                        </label>
                        <input type="file" name="insurance_document" class="w-full text-gray-800 bg-white">
                    </div>
                    @error('insurance_document')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Driver Image -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Driver Image</span>
                        </label>
                        <input type="file" name="driver_img" class="w-full text-gray-800 bg-white">
                    </div>
                    @error('driver_img')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Submit Button -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">Register Delivery Driver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
