<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Customer') }}
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
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">Edit Customer</h3>
                    <a href="{{ route('memberships.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>

                <form action="{{ route('memberships.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="form-control w-full mb-4">
                        <label class="label"><span class="label-text text-gray-800">Name</span></label>
                        <input name="name" type="text" value="{{ old('name', $user->name) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-control w-full mb-4">
                        <label class="label"><span class="label-text text-gray-800">Email</span></label>
                        <input name="email" type="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="form-control w-full mb-4">
                        <label class="label"><span class="label-text text-gray-800">Phone Number</span></label>
                        <input name="phone_number" type="text" value="{{ old('phone_number', $user->phone_number) }}" class="input input-bordered w-full bg-white text-sm text-gray-800">
                        @error('phone_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password (optional) -->
                    <div class="form-control w-full mb-4">
                        <label class="label"><span class="label-text text-gray-800">Password <small>(Leave blank to keep current password)</small></span></label>
                        <input name="password" type="password" class="input input-bordered w-full bg-white text-sm text-gray-800">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
