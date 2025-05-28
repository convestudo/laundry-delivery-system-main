<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Service') }}
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
                    <h3 class="text-lg font-semibold mb-0 text-[#164272]">Edit Service</h3>
                    <a href="{{ route('services.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                </div>
                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if($service->service_img)
                        <div class="mt-2">
                            <img src="{{ Storage::url($service->service_img) }}" width="300" class="rounded" />
                        </div>
                    @endif

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text text-gray-800 bg-white">Upload New Image (Optional)</span>
                        </label>
                        <input type="file" name="service_image" class="w-full text-gray-800 bg-white" />

                    </div>

                    <!-- Service Name -->
                    <div class="form-control w-full mb-4">
                        <fieldset class="fieldset">
                            <label class="label">
                                <span class="label-text text-gray-800">Service Name</span>
                            </label>
                            <input name="service_name" value="{{ old('service_name', $service->service_name) }}" type="text" class="input w-full bg-white input-bordered text-sm text-gray-800" placeholder="Enter Service Name" />
                        </fieldset>
                        @error('service_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Service Description -->
                    <div class="form-control w-full mb-4">
                        <fieldset class="fieldset">
                            <label class="label">
                                <span class="label-text text-gray-800">Service Description</span>
                            </label>
                            <input name="service_desc" value="{{ old('service_desc', $service->service_desc) }}" type="text" class="input w-full bg-white input-bordered text-sm text-gray-800" placeholder="Enter Service Description" />
                        </fieldset>
                        @error('service_desc')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Calculate By -->
                    <div class="form-control w-full mb-4">
                        <fieldset class="fieldset">
                            <label class="label">
                                <span class="label-text text-gray-800">Calculate By</span>
                            </label>
                            <select name="calculate_by" id="calculate_by" class="text-gray-800 select select-bordered w-full text-sm bg-white" required>
                                <option value="piece" {{ $service->calculate_by == 'piece' ? 'selected' : '' }}>Pieces</option>
                                <option value="weight" {{ $service->calculate_by == 'weight' ? 'selected' : '' }}>Weight</option>
                            </select>
                        </fieldset>
                        @error('calculate_by')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price per Pieces Section -->
                    <div class="bypieces" id="bypieces" style="{{ $service->calculate_by == 'piece' ? 'display:block;' : 'display:none;' }}">
                        <!-- Price -->
                        <div class="form-control w-full mb-4">
                            <label class="label">
                                <span class="label-text text-gray-800 pricelabel">Price per Pieces</span>
                            </label>
                            <input type="number" name="pieces_price" value="{{ old('pieces_price', $service->pieces_price) }}" class="input input-bordered w-full text-gray-800 bg-white text-sm" step="0.01" placeholder="Enter Price">
                        </div>
                    </div>

                    <!-- Service Bags Section for Weight -->
                    <div class="byweight" id="byweight" style="{{ $service->calculate_by == 'weight' ? 'display:block;' : 'display:none;' }}">
                        <label class="label">
                            <span class="label-text text-gray-800">Service Bag</span>
                        </label>
                        <div id="bag-container">
                            @foreach($service->bagDetails as $i => $bag)
                                <div class="bag-card border border-gray-200 px-4 py-3 rounded-lg mb-4 relative">
                                    @if($i != 0)
                                        <button type="button" class="remove-bag absolute top-2 right-2 text-red-500 text-sm">Remove</button>
                                    @endif
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <fieldset class="fieldset">
                                                <label class="label">
                                                    <span class="label-text text-gray-800">Bag Size</span>
                                                </label>
                                                <select name="bag_size[]" class="bag-size text-gray-800 select select-bordered w-full text-sm bg-white">
                                                    <option value="small" {{ $bag->bag_size == 'small' ? 'selected' : '' }}>Small</option>
                                                    <option value="medium" {{ $bag->bag_size == 'medium' ? 'selected' : '' }}>Medium</option>
                                                    <option value="large" {{ $bag->bag_size == 'large' ? 'selected' : '' }}>Large</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div>
                                            <fieldset class="fieldset">
                                                <label class="label">
                                                    <span class="label-text text-gray-800">Weight/kg</span>
                                                </label>
                                                <input name="weight_per_kg[]" value="{{ $bag->weight_per_kg }}" type="text" class="bag-weight input w-full bg-white input-bordered text-sm readonly:bg-white text-gray-800 readonly:border-gray-200" readonly />
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="label">
                                            <span class="label-text text-gray-800 pricelabel">Price per Bag</span>
                                        </label>
                                        <input type="number" name="price[]" value="{{ $bag->price }}" class="input input-bordered w-full bg-white text-sm text-gray-800" step="0.01" placeholder="Enter price" required>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-bag" class="btn mt-2 bg-[#164272] text-white text-sm py-3 px-5 h-auto min-h-0">+ Add New Bag</button>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn bg-[#ffd65b] border-0 text-[#164272] hover:bg-[#164272] hover:text-white w-full">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function () {

            function getBagCard(index = null) {
                const bagCard = `
                    <div class="bag-card border border-gray-200 px-4 py-3 rounded-lg mb-4 relative">
                        ${index !== 0 ? `
                            <button type="button" class="remove-bag absolute top-2 right-2 text-red-500 text-sm">Remove</button>
                        ` : ''}
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <fieldset class="fieldset">
                                    <label class="label">
                                        <span class="label-text text-gray-800">Bag Size</span>
                                    </label>
                                    <select name="bag_size[]" class="bag-size text-gray-800 select select-bordered w-full text-sm bg-white">
                                        <option value="small" selected>Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div>
                                <fieldset class="fieldset">
                                    <label class="label">
                                        <span class="label-text text-gray-800">Weight/kg</span>
                                    </label>
                                    <input name="weight_per_kg[]" value="8kg" type="text" class="bag-weight input w-full bg-white input-bordered text-sm readonly:bg-white text-gray-800 readonly:border-gray-200" readonly />
                                </fieldset>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="label">
                                <span class="label-text text-gray-800 pricelabel">Price per Bag</span>
                            </label>
                            <input type="number" name="price[]" class="input input-bordered w-full bg-white dark:bg-white text-sm text-gray-800" step="0.01" placeholder="Enter price" required>
                        </div>
                    </div>
                `;
                return bagCard;
            }

            // Show/hide bag/piece section without resetting
            $('#calculate_by').on('change', function () {
                const selected = $(this).val();
                if (selected === 'piece') {
                    $('#pieces_price').attr('required', true).val('');
                    $('#bypieces').show();
                    $('#byweight').hide();
                } else {
                    $('#pieces_price').removeAttr('required');
                    $('#bypieces').hide();
                    $('#byweight').show();
                }
            });

            // Add new bag
            $('#add-bag').on('click', function () {
                $('#bag-container').append(getBagCard());
            });

            // Remove bag
            $(document).on('click', '.remove-bag', function () {
                $(this).closest('.bag-card').remove();
            });

            // Update weight based on selected size
            $(document).on('change', '.bag-size', function () {
                const selected = $(this).val();
                let weight = '8kg';
                if (selected === 'medium') weight = '15kg';
                else if (selected === 'large') weight = '30kg';
                $(this).closest('.bag-card').find('.bag-weight').val(weight);
            });

            // Trigger on load to show the correct sections based on the initial value
            $('#calculate_by').trigger('change');
        });
    </script>
    @endpush
</x-app-layout>
