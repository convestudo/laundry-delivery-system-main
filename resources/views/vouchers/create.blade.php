<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create Voucher') }}
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
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">New Voucher</h3>
                    <a href="{{ route('vouchers.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>

                <form action="{{ route('vouchers.store') }}" method="POST">
                    @csrf

                    <!-- Voucher Code -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Voucher Code</span>
                        </label>
                        <input name="voucher_code" type="text" value="{{ old('voucher_code') }}" class="input w-full bg-white input-bordered text-sm text-gray-800" placeholder="e.g. SPRING2025" required />
                        @error('voucher_code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Voucher Amount -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Voucher Amount (RM)</span>
                        </label>
                        <input name="voucher_amount" type="number" step="0.01" value="{{ old('voucher_amount') }}" class="input input-bordered w-full bg-white text-sm text-gray-800" placeholder="e.g. 10.00" required />
                        @error('voucher_amount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Voucher Status -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Voucher Status</span>
                        </label>
                        <select name="voucher_status" class="select select-bordered w-full bg-white text-sm text-gray-800" required>
                            <option value="active" {{ old('voucher_status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('voucher_status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('voucher_status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Expiry Date -->
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800">Expiry Date</span>
                        </label>
                        <input name="expired_at" type="date" value="{{ old('expired_at') }}" class="input input-bordered w-full bg-white text-sm text-gray-800" required />
                        @error('expired_at')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">Create Voucher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
