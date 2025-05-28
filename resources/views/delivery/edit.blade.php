<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Delivery Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg">

                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">Edit Delivery Driver</h3>
                    <a href="{{ route('delivery.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>

                <form action="{{ route('delivery.update', $delivery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Driver Name -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Driver Name</span>
                        </label>
                        <input type="text" name="name" class="input input-bordered w-full text-gray-800 bg-white" value="{{ old('name', $delivery->user->name) }}" placeholder="Enter driver name">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Email -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Email</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered w-full text-gray-800 bg-white" value="{{ old('email', $delivery->user->email) }}" placeholder="Enter email">
                    </div>
                    @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Phone Number -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Phone Number</span>
                        </label>
                        <input type="text" name="phone_number" class="input input-bordered w-full text-gray-800 bg-white" value="{{ old('phone_number', $delivery->user->phone_number) }}" placeholder="Enter phone number">
                    </div>
                    @error('phone_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Gender -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Gender</span>
                        </label>
                        <div>
                            <label>
                                <input type="radio" name="gender" value="male" {{ old('gender', $delivery->gender) == 'male' ? 'checked' : '' }} class="text-gray-800"> Male
                            </label>
                            <label class="ml-4">
                                <input type="radio" name="gender" value="female" {{ old('gender', $delivery->gender) == 'female' ? 'checked' : '' }} class="text-gray-800"> Female
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
                            <option value="18-25" {{ old('old', $delivery->old) == '18-25' ? 'selected' : '' }}>18-25</option>
                            <option value="26-35" {{ old('old', $delivery->old) == '26-35' ? 'selected' : '' }}>26-35</option>
                            <option value="36-45" {{ old('old', $delivery->old) == '36-45' ? 'selected' : '' }}>36-45</option>
                        </select>
                    </div>
                    @error('old')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Vehicle Type -->
                    {{-- <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Vehicle Type</span>
                        </label>
                        <select name="vehicle_type" class="input input-bordered w-full text-gray-800 bg-white">
                            <option value="car" {{ old('vehicle_type', $delivery->vehicle_type) == 'car' ? 'selected' : '' }}>Car</option>
                            <option value="motorcycle" {{ old('vehicle_type', $delivery->vehicle_type) == 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                        </select>
                    </div>
                    @error('vehicle_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror --}}

                    <input type="hidden" name="vehicle_type" class="input input-bordered w-full text-gray-800 bg-white" value="{{ $delivery->vehicle_type }}" readonly>
                    @error('vehicle_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Plate Number -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Plate Number</span>
                        </label>
                        <input type="text" name="plate_number" class="input input-bordered w-full text-gray-800 bg-white" value="{{ old('plate_number', $delivery->plate_number) }}" placeholder="Enter plate number">
                    </div>
                    @error('plate_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror


                    <!-- Insurance Document -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">New Insurance Document</span>
                        </label>
                        <input type="file" name="insurance_document" class="w-full">
                        @if($delivery->insurance_document)
                            <p class="mt-2 text-sm text-gray-600">Current Document: <a href="{{ Storage::url($delivery->insurance_document) }}" target="_blank" class="text-blue-500 underline">View</a></p>
                        @endif
                    </div>
                    @error('insurance_document')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Driver Image -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">New Driver Image</span>
                        </label>
                        <input type="file" name="driver_img" class="w-full">
                        @if($delivery->driver_img)
                            <p class="mt-2 text-sm text-gray-600">
                                Current Image:
                                <a href="{{ Storage::url($delivery->driver_img) }}" target="_blank" class="text-blue-500 underline">View</a>
                            </p>
                        @endif
                    </div>
                    @error('driver_img')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Submit Button -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">Update Delivery Driver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
