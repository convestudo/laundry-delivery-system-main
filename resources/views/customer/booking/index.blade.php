<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Book Laundry Services') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="min-height: calc(100vh - 190px);">



            @php $step = 1; @endphp


            <div class="flex justify-between items-center mb-6 mt-5">
                <div class="relative pr-6 md:pr-9">
                    <h1 class="text-[#164272] font-[800] text-xl md:text-4xl">Your Bag</h1>
                    <div x-data="" x-on:click="$dispatch('open-modal', 'help-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] md:w-[25px] md:h-[25px] flex items-center justify-center">?</div>
                </div>

                <div class="flex items-center gap-3">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="font-[600] rounded-full border-2 w-[20px] h-[20px] md:w-[25px] md:h-[25px] flex items-center justify-center
                            {{ $step === $i ? 'bg-[#ffd65b] text-[#164272] border-[#ffd65b] shadow-md' : 'text-[#164272] border-[#164272] shadow-md' }}">
                            {{ $i }}
                        </div>
                    @endfor
                </div>
            </div>

            <hr />

            <div class="cartBagBox">

                <div class="servicesCart">

                </div>

            </div>


            <div class="newBagBox">

                <div class="services">

                </div>

                <div class="addBagBox">

                </div>

            </div>

            <div class="updateBagBox">

                <div class="servicesEdit">

                </div>

                <div class="editBagBox">

                </div>

            </div>

            <div class="addAnotherBag">

            </div>

            <div class="pt-8 pb-5">
                <hr />
            </div>

            <div class="schedule-option">

            </div>
            <div class="flex items-center justify-between mb-3">
                <div class="schedule-btnbox">
                    {{-- <div class="cursor-pointer rounded-3xl px-4 py-2 border text-white bg-[#164272] font-[600] text-[14px]">Schedule Now</div> --}}
                </div>
                <div class="text-right">
                    <p class="text-[12px] md:text-[14px] font-[700] text-gray-700">Grand total</p>
                    <p class="text-[16px] md:text-[20px] font-[800] text-[#164272]" id="grand-total">RM0.00</p>
                </div>
            </div>

            @include('customer.booking.modal');


    </div>

    @push('scripts')
    <script>


        var sid = '';
        var serviceData = '';
        var cartData = '';
        var serviceDetailsData = '';
        var selectedBag = '';
        var editData = '';

        var minQty = 5;
        var currentNumber = 5;
        var pricePerPiece = 0;
        var totalItem = 0;
        var actionCurrent = 'add';


        $(document).ready(async function () {
            await initCartAndServices();
        });


        async function fetchCartAndServices() {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '/api/customer/services', // your controller route (adjust if needed)
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        resolve(response);
                    },
                    error: function (xhr, status, error) {
                        reject(error);
                    }
                });
            });
        }

        async function initCartAndServices(){

            $('.addBagBox').html(``);
            $('.schedule-btnbox').html(``);
            $('.schedule-option').html(``);
            try {
                const data = await fetchCartAndServices();
                $('#grand-total').html('RM0.00');
                if(data.services.length < 1){
                    $('.service-box').html('<p class="text-gray-700">No Services Available.</p>');
                }else{

                    serviceData = data.services;
                    cartData = data.cart;
                    if(cartData.length > 0){
                        renderServiceData(cartData.length, false);
                        var total = 0;
                        $(cartData).each(function(){

                            if(this.bag_detail){
                                var price = parseFloat(this.bag_detail.price);
                            }else{
                                var qtyPrice = this.service.pieces_price;
                                var qty = this.quantity;
                                var price = qtyPrice * qty;
                            }
                            console.log(price);
                            total = total + price;

                        });

                        $('#grand-total').html(`RM${total.toFixed(2)}`);
                        $(`.schedule-option`).html(`<label class="inline-flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded" id="term">
                            <span class="text-gray-800">If the clothing exceeds the specified weight, additional charges will be applied late.</span>
                        </label>`);
                        $('.schedule-btnbox').html(`<div class="schedule-href"><div class="cursor-pointer rounded-3xl px-4 py-2 border text-white bg-[#164272] font-[600] text-[12px] md:text-[14px]">Schedule Now</div></div>`);
                    }else{
                        renderServiceData(1);
                    }

                }
                console.log('Services:', data.services);
                console.log('Cart:', data.cart);
                // You can now update the DOM dynamically here
            } catch (error) {
                console.error('AJAX error:', error);
            }
        }

        $(document).on('click', '.schedule-href', function(){

            if (!$('#term').is(':checked')) {
                alert('Please agree to the terms before scheduling!');
            } else {
                window.location.href = "/schedule";
            }

        });

        function renderEditData(key){

            $('.addAnotherBag').html('');
            var servicesCard = '';
            servicesCard += `<div class="service-box mt-8 border border-gray-200 rounded-xl p-3 md:p-5" data-key="${key + 1}">`;
            servicesCard += initBagLabel(key, false, false, true);
            servicesCard += initServiceStepLabel();
            servicesCard += '<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-3">';
            $(serviceData).each(function (index, service) {
                servicesCard += `
                    <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-3 md:p-4 service-card">
                        <div class="flex gap-4 h-full">

                            <div class="w-[150px]">
                                <img src="${service.service_image_url}" alt="${service.service_name}" class="w-full rounded-md" />
                            </div>


                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-[#164272]">${service.service_name}</h2>
                                    <p class="text-gray-700 text-sm">${service.service_desc}</p>
                                </div>


                                <div class="ml-auto cursor-pointer mt-4 rounded-3xl shadow-md w-fit text-[#164272] px-3 py-2 font-[600] text-[14px] ml-auto get-this-btn" data-id="${service.id}" data-type="${service.calculate_by}">
                                    Get This
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            servicesCard += '</div>';
            servicesCard += `<div class="serviceDetails w-full" data-key="${key+1}"></div>`;
            servicesCard += '</div>';
            $('.servicesEdit').html(servicesCard);


        }

        function renderSingleNew(){

            var servicesCard = '';
            $('.services').html('');
            $('.addAnotherBag').html('');

            servicesCard += `<div class="service-box mt-8 border border-gray-200 rounded-xl p-3 md:p-5" data-key="${totalItem + 1}">`;
            servicesCard += initBagLabel(totalItem, false, true);
            servicesCard += initServiceStepLabel();
            servicesCard += '<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-3">';
            $(serviceData).each(function (index, service) {
                servicesCard += `
                    <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-3 md:p-4 service-card">
                        <div class="flex gap-4 h-full">

                            <div class="w-[150px]">
                                <img src="${service.service_image_url}" alt="${service.service_name}" class="w-full rounded-md" />
                            </div>


                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-[#164272]">${service.service_name}</h2>
                                    <p class="text-gray-700 text-sm">${service.service_desc}</p>
                                </div>


                                <div class="cursor-pointer mt-4 rounded-3xl w-fit text-[#164272] bg-white shadow-md px-3 py-2 font-[600] text-[14px] ml-auto get-this-btn" data-id="${service.id}" data-type="${service.calculate_by}">
                                    Get This
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            servicesCard += '</div>';
            servicesCard += `<div class="serviceDetails w-full" data-key="${totalItem+1}"></div>`;
            servicesCard += '</div>';
            $('.services').html(servicesCard);

        }

        function renderServiceData(repeatNumber, isEmptyCart = true) {

            var servicesCard = '';
            $('.services').html('');
            $('.servicesCart').html('');
            $('.addAnotherBag').html('');

            totalItem = repeatNumber;


            for (let i = 0; i < repeatNumber; i++) {
                servicesCard += `<div class="service-box mt-8 border border-gray-200 rounded-xl p-3 md:p-5" data-key="${i}">`;


                    servicesCard += initBagLabel(i, cartData.length > 0 ? false : true);
                    if(!isEmptyCart){

                    }else{
                        servicesCard += initServiceStepLabel();
                    }
                    servicesCard += '<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-3">';


                        if(!isEmptyCart){

                            servicesCard += `<div>
                                                <p class="text-gray-600 text-[16px] md:text-[18px] font-[500] mt-2">${cartData[i].service.service_name}</p>
                                                <div class="mt-4 cursor-pointer rounded-3xl px-4 md:px-5 py-2 border bg-[#ffd65b] text-[#164272] font-[600] text-[10px] md:text-[14px] w-fit btn-edit-item" data-key="${i}"><i class="fas fa-edit"></i> Edit</div>
                                            </div>`;


                        }else{

                            $(serviceData).each(function (index, service) {
                                servicesCard += `
                                    <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-3 md:p-4 service-card">
                                        <div class="flex gap-4 h-full">

                                            <div class="w-[150px]">
                                                <img src="${service.service_image_url}" alt="${service.service_name}" class="w-full rounded-md" />
                                            </div>


                                            <div class="flex-1 flex flex-col justify-between">
                                                <div>
                                                    <h2 class="text-lg font-bold text-[#164272]">${service.service_name}</h2>
                                                    <p class="text-gray-700 text-sm">${service.service_desc}</p>
                                                </div>


                                                <div class="ml-auto cursor-pointer mt-4 rounded-3xl shadow-md w-fit text-[#164272] bg-white px-3 py-2 font-[600] text-[14px] get-this-btn border-0" data-id="${service.id}" data-type="${service.calculate_by}">
                                                    Get This
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });

                        }


                    servicesCard += '</div>';
                    if(isEmptyCart){
                        servicesCard += `<div class="serviceDetails w-full" data-key="${i}"></div>`;
                    }


                servicesCard += '</div>';
            }

            if(isEmptyCart){
                $('.services').html(servicesCard);
            }else{
                $('.servicesCart').html(servicesCard);
                $('.addAnotherBag').html(`<p class="pt-5 text-[#164272] text-[20px] font-[600] cursor-pointer add-another-bag"><i class="fas fa-plus"></i> Add Another Bag</p>`);
            }

        }

        function initBagLabel(number, isEmptyCart = false, isSingleNew = false, isEdit = false){

            var label = ``;
            if(isEmptyCart){
                label += `<div class="bag-label flex items-center gap-3">
                            <h1 class="text-[#164272] text-[20px] md:text-[28px] font-[700] text-nowrap">Bag #${number+1}</h1>
                        </div>`;
            }else{

                if(isEdit){
                    label += `<div class="bag-label flex items-center gap-3">
                            <h1 class="text-[#164272]  text-[20px] md:text-[28px] font-[700] text-nowrap">Update Bag #${number+1}</h1>
                            <div class="w-full h-[2px] bg-gray-100"></div>
                            <div class="flex items-center gap-2">
                                <div onclick="closeEdit()" class="flex items-center gap-2 cursor-pointer border border-gray-200 shadow-sm rounded-3xl px-3 py-1 md:px-5 md:py-2 text-[#164272] w-fit font-[600] text-[10px] md:text-[14px]">
                                    <i class="fas fa-close"></i>
                                    Cancel
                                </div>
                            </div>
                        </div>`;
                }else{

                    if(!isSingleNew){

                        label += `<div class="bag-label flex items-center gap-3">
                                <h1 class="text-[#164272]  text-[20px] md:text-[28px] font-[700] text-nowrap">Bag #${number+1}</h1>
                                <div class="w-full h-[2px] bg-gray-100"></div>
                                <div class="flex items-center gap-2">
                                    <div onclick="duplicateCartItem(${cartData[number].id})" class="flex items-center gap-2 cursor-pointer border border-gray-200 shadow-sm rounded-3xl px-3 py-1 md:px-5 md:py-2 text-[#164272] w-fit font-[600] text-[10px] md:text-[14px]">
                                        <i class="fas fa-copy"></i>
                                        Duplicate
                                    </div>
                                    <div onclick="deleteCartItem(${cartData[number].id})" class="flex items-center gap-2 cursor-pointer border border-gray-200 shadow-sm rounded-3xl px-3 py-1 md:px-5 md:py-2 text-[#164272] w-fit font-[600] text-[10px] md:text-[14px]">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </div>
                                </div>
                            </div>`;

                    }else{

                        label += `<div class="bag-label flex items-center gap-3">
                            <h1 class="text-[#164272]  text-[20px] md:text-[28px] font-[700] text-nowrap">Bag #${number+1}</h1>
                            <div class="w-full h-[2px] bg-gray-100"></div>
                            <div class="flex items-center gap-2">
                                <div onclick="removeStaticItem()" class="flex items-center gap-2 cursor-pointer border border-gray-200 shadow-sm rounded-3xl px-3 py-1 md:px-5 md:py-2 text-[#164272] w-fit font-[600] text-[10px] md:text-[14px]">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </div>
                            </div>
                        </div>`;


                    }
                }



            }

            return label;

        }

        function closeEdit(){
            $('.servicesEdit').html('');
            $('.editBagBox').html('');
            $('.addAnotherBag').html(`<p class="pt-5 text-[#164272] text-[20px] font-[600] cursor-pointer add-another-bag"><i class="fas fa-plus"></i> Add Another Bag</p>`);
        }

        function removeStaticItem(){
            $('.newBagBox .services').html('');
            $('.newBagBox .addBagBox').html('');
            $('.addAnotherBag').html(`<p class="pt-5 text-[#164272] text-[20px] font-[600] cursor-pointer add-another-bag"><i class="fas fa-plus"></i> Add Another Bag</p>`);
        }

        function initServiceStepLabel(){

            var label = ` <div class="relative pr-8 w-fit mt-4">
                    <div class="flex items-center gap-2">
                        <div class="text-[#164272] text-xl bg-gray-100 rounded-md px-3 py-1 font-[600]">A</div>
                        <h1 class="text-[#164272] font-[800] text-xl">Select laundry service</h1>
                    </div>
                    <div x-data="" x-on:click="$dispatch('open-modal', 'step-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] flex items-center justify-center text-[12px]">?</div>
                </div>`;
            return label;
        }

        // $(document).on('click', '.get-this-btn', function () {


        //     var serviceId = $(this).data('id');
        //     sid = serviceId
        //     var service = serviceData.find(s => s.id === serviceId);
        //     minQty = 5;
        //     currentNumber = 5;
        //     $('.addBagBox').html(``);
        //     $('.editBagBox').html(``);
        //     selectedBag = ''

        //     if (service) {
        //         if(service.calculate_by == 'weight'){

        //             var addBagBtn = ``;
        //             var serviceDetails = ``;
        //             serviceDetailsData = service.bag_details;
        //             initBagDetails();

        //         }else{

        //             pricePerPiece = service.pieces_price;
        //             var title = `<div class="flex items-center gap-2 mt-8">
        //                     <div class="text-[#164272] text-xl bg-gray-100 rounded-md px-3 py-1 font-[600]">B</div>
        //                     <h1 class="text-[#164272] font-[800] text-xl">Specify laundry pieces.</h1>
        //                 </div>
        //                 <div x-data="" x-on:click="$dispatch('open-modal', 'piece-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] flex items-center justify-center text-[12px]">?</div>`;

        //                 var serviceDetails = `
        //                     <div class="relative pr-8 w-fit mt-4">
        //                         ${title}
        //                     </div>
        //                     <div class="flex items-center justify-between border border-gray-300 rounded-2xl p-4 w-full mt-4 mb-6">
        //                         <div class="flex items-center gap-2 border border-gray-300 rounded-full px-4 py-2 w-[20%] md:w-min-[200px] justify-between">
        //                             <span class="text-lg font-semibold quantity">5</span>
        //                             <div class="flex items-center gap-1">
        //                                 <button  class="increase w-6 h-6 flex items-center justify-center rounded-full border border-gray-300 text-gray-600 text-sm">
        //                                     <i class="fas fa-chevron-up"></i>
        //                                 </button>
        //                                 <button  class="decrease w-6 h-6 flex items-center justify-center rounded-full border border-gray-300 text-gray-600 text-sm">
        //                                     <i class="fas fa-chevron-down"></i>
        //                                 </button>
        //                             </div>
        //                         </div>
        //                         <div class="text-right">
        //                             <div class="text-[#164272] font-bold text-lg totalPrice" >Total: RM${(service.pieces_price * currentNumber).toFixed(2)}</div>
        //                             <div class="text-sm text-gray-500">
        //                                 <span class="text-[#164272] font-semibold">RM${service.pieces_price}/piece</span> with min of 5 pieces.
        //                             </div>
        //                         </div>
        //                     </div>
        //                 `;

        //             var actionClass = actionCurrent == 'add' ? 'add-this-bag' : 'edit-this-bag';
        //             var actionName = actionCurrent == 'add' ? 'Add this bag' : 'Update Bag';
        //             var addBagBtn = `<div  data-type="piece" class="mt-5 ${actionClass} flex items-center gap-3 font-[600] text-[14px] rounded-3xl py-3 px-6 cursor-pointer bg-[#ffd65b] text-[#164272] hover:bg-[#164272] hover:text-white w-fit transition delay-150 duration-300 ease-in-out">
        //                                 <i class="fas fa-check"></i> ${actionName}
        //                             </div>`;

        //             $(`.serviceDetails`).html(serviceDetails);

        //         }

        //         if(actionCurrent == 'add'){
        //             $('.addBagBox').html(addBagBtn);
        //         }else{
        //             $('.editBagBox').html(addBagBtn);
        //         }


        //     }else{
        //         $('.serviceDetails').html('');
        //     }
        // });

        $(document).on('click', '.get-this-btn', function () {
            var serviceId = $(this).data('id');
            // Remove highlight from all service cards
            $('.service-card')
                .removeClass('bg-yellow-50 border-[#d9ba5f]')
                .addClass('bg-white border-gray-200');
            // Add highlight to the selected card with soft yellow background and deep yellow border
            $(this).closest('.service-card')
                .removeClass('bg-white border-gray-200')
                .addClass('bg-yellow-50 border-[#d9ba5f]');
            // Reset all buttons: dark blue text, white bg, shadow, no border
            $('.get-this-btn')
                .removeClass('bg-[#ffd65b] text-[#164272] border-[#d9ba5f]')
                .addClass('bg-white text-[#164272] shadow-md border-0');
            // Highlight the clicked button: yellow bg, dark blue text, no border, shadow
            $(this)
                .removeClass('bg-white text-[#164272] shadow-md border-0')
                .addClass('bg-[#ffd65b] text-[#164272] border-[#d9ba5f] shadow-md');
            sid = serviceId
            var service = serviceData.find(s => s.id === serviceId);
            minQty = 5;
            currentNumber = 5;
            $('.addBagBox').html(``);
            $('.editBagBox').html(``);
            selectedBag = '';

            // --- NEW: Show modal if Dry Cleaning ---
            if (service && service.service_name && service.service_name.toLowerCase().includes('dry cleaning')) {
                $('#dry-cleaning-modal').removeClass('hidden');
                // Optionally, return here if you want to force user to close modal before proceeding
                // return;
    }

            if (service) {
                if(service.calculate_by == 'weight'){
                    var addBagBtn = ``;
                    var serviceDetails = ``;
                    serviceDetailsData = service.bag_details;
                    initBagDetails();
                }else{
                    pricePerPiece = service.pieces_price;
                    var title = `<div class="flex items-center gap-2 mt-8">
                            <div class="text-[#164272] text-xl bg-gray-100 rounded-md px-3 py-1 font-[600]">B</div>
                            <h1 class="text-[#164272] font-[800] text-xl">Specify laundry pieces.</h1>
                        </div>
                        <div x-data="" x-on:click="$dispatch('open-modal', 'piece-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] flex items-center justify-center text-[12px]">?</div>`;

                    var serviceDetails = `
                        <div class="relative pr-8 w-fit mt-4">
                            ${title}
                        </div>
                        <div class="flex items-center justify-between border border-gray-300 rounded-2xl p-4 w-full mt-4 mb-6">
                            <div class="flex items-center gap-2 border border-gray-300 rounded-full px-4 py-2 w-[20%] md:w-min-[200px] justify-between">
                                <span class="text-lg font-semibold quantity">5</span>
                                <div class="flex items-center gap-1">
                                    <button  class="increase w-6 h-6 flex items-center justify-center rounded-full border border-gray-300 text-gray-600 text-sm">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                    <button  class="decrease w-6 h-6 flex items-center justify-center rounded-full border border-gray-300 text-gray-600 text-sm">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-[#164272] font-bold text-lg totalPrice" >Total: RM${(service.pieces_price * currentNumber).toFixed(2)}</div>
                                <div class="text-sm text-gray-500">
                                    <span class="text-[#164272] font-semibold">RM${service.pieces_price}/piece</span> with min of 5 pieces.
                                </div>
                            </div>
                        </div>
                    `;

                    var actionClass = actionCurrent == 'add' ? 'add-this-bag' : 'edit-this-bag';
                    var actionName = actionCurrent == 'add' ? 'Add this bag' : 'Update Bag';
                    var addBagBtn = `<div  data-type="piece" class="mt-5 ${actionClass} flex items-center gap-3 font-[600] text-[14px] rounded-3xl py-3 px-6 cursor-pointer bg-[#ffd65b] text-[#164272] hover:bg-[#164272] hover:text-white w-fit transition delay-150 duration-300 ease-in-out">
                                        <i class="fas fa-check"></i> ${actionName}
                                    </div>`;

                    $(`.serviceDetails`).html(serviceDetails);
                }

                if(actionCurrent == 'add'){
                    $('.addBagBox').html(addBagBtn);
                }else{
                    $('.editBagBox').html(addBagBtn);
                }
            }else{
                $('.serviceDetails').html('');
            }
        });

        function initBagDetails(){


            var title = `<div class="flex items-center gap-2 mt-8">
                            <div class="text-[#164272] text-xl bg-gray-100 rounded-md px-3 py-1 font-[600]">B</div>
                            <h1 class="text-[#164272] font-[800] text-xl">Select bag size</h1>
                        </div>
                        <div x-data="" x-on:click="$dispatch('open-modal', 'bagsize-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] flex items-center justify-center text-[12px]">?</div>`;


            if(serviceDetailsData.length > 0){

                var detailCard = '';
                $(serviceDetailsData).each(function(){

                    if(this.bag_size == 'small'){
                        var desc = `<span class="text-[#164272] font-[600]">RM${this.price}/bag</span> for 1 person's weekly laundry, or a few bedsheets.`;
                        var img =  `<img src="{{ asset('assets/images/small.png') }}" width="100" class="border mb-2 p-2 rounded" />`;
                    }else if(this.bag_size == 'medium'){
                        var desc = `<span class="text-[#164272] font-[600]">RM${this.price}/bag</span> for For 1 - 3 persons' weekly laundry, or some big items like bedsheets, comforter, prayer mats.`;
                        var img =  `<img src="{{ asset('assets/images/medium.png') }}" width="100"  class="border mb-2 p-2 rounded" />`;
                    }else{
                        var desc = `<span class="text-[#164272] font-[600]">RM${this.price}/bag</span> for For 3 - 5 people's weekly laundry, or several big items like bedsheets, comforter, prayer mats.`;
                        var img =  `<img src="{{ asset('assets/images/big.png') }}" width="100" class="border mb-2 p-2 rounded"/>`;
                    }

                    // detailCard += `<div class="bg-white border border-gray-200 shadow-sm rounded-lg p-4">
                    //                     <div class="h-full">
                    //                         <div>
                    //                             <div>
                    //                                 ${img}
                    //                                 <h2 class="text-lg font-bold text-[#164272] capitalize mb-3">${this.bag_size}</h2>
                    //                                 <p class="text-gray-700 text-sm">${desc}</p>
                    //                             </div>
                    //                             <div class="ml-auto cursor-pointer mt-4 rounded-3xl shadow-md w-fit text-[#164272] border border-[#164272] px-3 py-2 font-[600] text-[14px] select-bag-btn" data-id="${this.id}">
                    //                                 Get This
                    //                             </div>
                    //                         </div>
                    //                     </div>
                    //                 </div>`;

                    detailCard += `<div class="bg-white border border-gray-200 shadow-sm rounded-lg p-4 bag-size-card transition-colors duration-200" data-id="${this.id}">
                    <div class="h-full">
                        <div>
                            ${img}
                            <h2 class="text-lg font-bold text-[#164272] capitalize mb-3">${this.bag_size}</h2>
                            <p class="text-gray-700 text-sm">${desc}</p>
                        </div>
                        <div class="ml-auto cursor-pointer mt-4 rounded-3xl shadow-md w-fit text-[#164272] px-3 py-2 font-[600] text-[14px] select-bag-btn border-0" data-id="${this.id}">
                            Get This
                        </div>
                    </div>
                </div>`;
                });

                var serviceDetails = `
                    <div class="relative pr-8 w-fit mt-4">
                        ${title}
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-3">
                        ${detailCard}
                    </div>
                `;

            }else{

                var serviceDetails = `
                            <div class="relative pr-8 w-fit mt-4">
                                ${title}
                            </div>
                            <div class="flex items-center justify-between border border-gray-300 rounded-2xl p-4 w-full mt-4 mb-6">
                                <p class="text-gray-700">No Bag Available.</p>
                            </div>
                        `;


            }

            $('.serviceDetails').html(serviceDetails);

        }

        function initAddBagBtnWeight(){
            if(selectedBag !== ''){
                var actionClass = actionCurrent == 'add' ? 'add-this-bag' : 'edit-this-bag';
                var actionName = actionCurrent == 'add' ? 'Add this bag' : 'Update Bag';
                var addBagBtn = `<div data-type="weight" class="mt-5 ${actionClass} flex items-center gap-3 font-[600] text-[14px] rounded-3xl py-3 px-6 cursor-pointer bg-[#ffd65b] text-[#164272] hover:bg-[#164272] hover:text-white w-fit transition delay-150 duration-300 ease-in-out">
                                        <i class="fas fa-check"></i> ${actionName}
                                    </div>`;
            }else{
                var addBagBtn = '';
            }

            if(actionCurrent == 'add'){
                $('.addBagBox').html(addBagBtn);
            }else{
                $('.editBagBox').html(addBagBtn);
            }

        }

        $(document).on('click', '.add-another-bag', function(){
            $('.servicesEdit').html('');
            $('.editBagBox').html('');
            actionCurrent = 'add';
            renderSingleNew();
        });

        $(document).on('click', '.btn-edit-item', function(){

            actionCurrent = 'edit';
            var key = $(this).data('key');
            $('.newBagBox .services').html('');
            $('.newBagBox .addBagBox').html('');
            editData = cartData[key];
            console.log(editData);
            renderEditData(key);

            var selectedServiceId = editData.service.id;
            var selectedType = editData.service.calculate_by;
            $(`.get-this-btn[data-id=${selectedServiceId}]`).click();
            if(selectedType == 'weight'){
                $(`.select-bag-btn[data-id=${editData.bag_detail.id}]`).click();
            }else{
                currentNumber =  editData.quantity;
                updateQty(editData.quantity);
            }

        });


        // $(document).on('click', '.select-bag-btn', function(){
        //     var bagId = $(this).data('id');
        //     // Remove highlight from all bag size cards
        //     $('.bag-size-card').removeClass('bg-yellow-50 border-[#ffd65b]');
        //     // Add highlight to the selected card with deep yellow
        //     $(this).closest('.bag-size-card').addClass('bg-yellow-50 border-[#d9ba5f]');
        //     // Highlight the button as well (optional)
        //     $('.select-bag-btn').removeClass('bg-[#ffd65b] text-[#164272] border-[#ffd65b]');
        //     $(`.select-bag-btn[data-id="${bagId}"]`).addClass('bg-[#ffd65b] text-[#164272]').removeClass('border border-[#164272]').addClass('border-0');
        //     selectedBag = bagId;
        //     initAddBagBtnWeight();
        // });

        $(document).on('click', '.select-bag-btn', function(){
            var bagId = $(this).data('id');
            // Reset all bag size cards to default: white bg, gray border
            $('.bag-size-card')
                .removeClass('bg-yellow-50 border-[#d9ba5f] bg-[#ffd65b] border-[#ffd65b]')
                .addClass('bg-white border-gray-200');
            // Add highlight to the selected card with soft yellow background and deep yellow border
            $(this).closest('.bag-size-card')
                .removeClass('bg-white border-gray-200')
                .addClass('bg-yellow-50 border-[#d9ba5f]');
            // Reset all buttons to default
            $('.select-bag-btn')
                .removeClass('bg-[#ffd65b] text-[#164272] border-0')
                .addClass('bg-white text-[#164272] shadow-md border-0');
            // Highlight the clicked button
            $(`.select-bag-btn[data-id="${bagId}"]`)
                .removeClass('bg-white text-[#164272] shadow-md')
                .addClass('bg-[#ffd65b] text-[#164272] border-0 shadow-md');
            selectedBag = bagId;
            initAddBagBtnWeight();
        });

        $(document).on('click', '.increase', function() {
            currentNumber++;
            updateQty(currentNumber);
        });

        $(document).on('click', '.decrease', function() {
            if (currentNumber > minQty) {
                currentNumber--;
                updateQty(currentNumber);
            }
        });

        function updateQty(qty) {
            $('.quantity').text(qty);
            var total = (qty * pricePerPiece).toFixed(2);
            $('.totalPrice').text(`Total: RM${total}`);
        }

        $(document).on('click', '.add-this-bag', async function(){

            var serviceType = $(this).data('type');
            if(serviceType == 'piece'){

                var selectedQty = currentNumber;

            }else{

                var selectedQty = 1;

            }


            const response = await $.ajax({
                url: '/api/service-cart',
                method: 'POST',
                data: {
                    service_management_id: sid,
                    service_bag_details_id: selectedBag,
                    quantity: selectedQty,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json'
            });

            if (response.success) {
                console.log(response.message);
                await initCartAndServices();
            } else {
                console.error(response.message);
            }


            console.log(serviceType);

        });

        $(document).on('click', '.edit-this-bag', async function(){

            var serviceType = $(this).data('type');

            if(serviceType == 'piece'){

                var selectedQty = currentNumber;

            }else{

                var selectedQty = 1;

            }


            const response = await $.ajax({
                url: `/api/service-cart/${editData.id}`,
                method: 'PUT',
                data: {
                    service_management_id: sid,
                    service_bag_details_id: selectedBag,
                    quantity: selectedQty,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json'
            });

            if (response.success) {
                $('.servicesEdit').html('');
                $('.editBagBox').html('');
                await initCartAndServices();
            } else {
                console.error(response.message);
            }
        });

        async function deleteCartItem(cartItemId) {
                const response = await $.ajax({
                    url: `/api/service-cart/${cartItemId}`, // <- pass the id in URL
                    method: 'DELETE',                      // <- DELETE method
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // csrf for DELETE
                    },
                    dataType: 'json'
                });

                if (response.success) {
                    console.log(response.message);
                    $('.newBagBox .services').html('');
                    $('.newBagBox .addBagBox').html('');
                    $('.servicesEdit').html('');
                    $('.editBagBox').html('');
                    await initCartAndServices();
                    // TODO: maybe refresh cart list here?
                } else {
                    console.error(response.message);
                }
        }

        async function duplicateCartItem(cartItemId) {

                const response = await $.ajax({
                    url: `/api/service-cart/duplicate/${cartItemId}`, // <- custom duplicate URL
                    method: 'POST',                                  // <- POST method for duplicate
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // csrf for POST
                    },
                    dataType: 'json'
                });

                if (response.success) {
                    console.log(response.message);
                    console.log('Duplicated Item:', response.cart_item);
                    $('.newBagBox .services').html('');
                    $('.newBagBox .addBagBox').html('');
                    $('.servicesEdit').html('');
                    $('.editBagBox').html('');
                    await initCartAndServices();
                    // TODO: maybe refresh cart list here?
                } else {
                    console.error(response.message);
                }

        }

        // Close Dry Cleaning Modal
        $(document).on('click', '#close-dry-cleaning-modal', function() {
            $('#dry-cleaning-modal').addClass('hidden');
        });
        // Optional: close when clicking outside the modal content
        $(document).on('click', '#dry-cleaning-modal', function(e) {
            if (e.target === this) {
                $(this).addClass('hidden');
            }
        });

        </script>
    @endpush

        <!-- Dry Cleaning Info Modal -->
        <div id="dry-cleaning-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
                <button id="close-dry-cleaning-modal" class="absolute top-2 right-2 text-gray-700 hover:text-gray-700 text-xl">&times;</button>
                <h2 class="text-xl font-bold text-[#164272] mb-3">Dry Cleaning - Suitable Clothes</h2>
                <ul class="space-y-4">
                    <li class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/dry1.jpg') }}" alt="Suits & Blazers" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200" />
                        <span class="text-lg font-semi text-black">Suits &amp; Blazers</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/dry2.jpg') }}" alt="Silk Garments" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200" />
                        <span class="text-lg font-semi text-black">Silk Garments</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/dry3.jpg') }}" alt="Delicate Dresses" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200" />
                        <span class="text-lg font-semi text-black">Delicate Dresses</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/dry4.jpg') }}" alt="Wool Coats" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200" />
                        <span class="text-lg font-semi text-black">Wool Coats</span>
                    </li>
                    <!-- <li class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/formal.png') }}" alt="Formal Wear" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200" />
                        <span class="text-lg font-semibold text-black">Formal Wear</span>
                    </li> -->
                    <li class="flex items-center gap-4">
                        <!-- <img src="{{ asset('assets/images/drycleanonly.png') }}" alt="Dry Clean Only" class="w-20 h-20 object-cover rounded-full border-2 border-gray-200" /> -->
                        <span class="text-lg font-semibold text-black text-center w-full block">Other "Dry Clean Only" labeled items</span>
                    </li>
                </ul>
                <p class="mt-4 text-sm text-center text-gray-500">Please check your garment labels for dry cleaning suitability.</p>
            </div>
        </div>

</x-app-layout>

