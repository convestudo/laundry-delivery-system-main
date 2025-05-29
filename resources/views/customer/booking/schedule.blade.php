<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Book Laundry Services') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="min-height: calc(100vh - 190px);">


            <div id="schedule-header" class="flex justify-between items-center mb-6 mt-5"></div>

            <hr />

            <div class="section-delivery mt-5">

                <div class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-5 gap-12">
                    <!-- Pickup Timing (40% width on md screens) -->
                    <div class="md:col-span-2">
                        <h2 class="text-2xl font-bold mb-6 text-[#164272]">Pickup Timing</h2>

                        <!-- Pickup Date -->
                        <div class="mb-6">
                            <label for="pickup_date" class="block text-lg font-medium mb-2 text-[#164272]">Pickup Date</label>

                            <!-- Make the wrapper clickable -->
                            <div id="pickup_date_wrapper" class="flex items-center border rounded-full px-6 py-3 cursor-pointer">

                                <i class="fas fa-calendar text-[#164272]"></i>

                                <input type="date" id="pickup_date" name="pickup_date" class="bg-transparent focus:outline-none w-full text-gray-700 pl-2" value="{{ $today }}" min="{{ $today }}" />
                            </div>
                        </div>

                        <!-- Pickup Time -->
                        <div>
                            <label for="pickup_time" class="block text-lg font-medium mb-2 text-[#164272]">Pickup Time</label>
                            <div class="flex items-center border rounded-full px-4 py-3">
                                <select id="pickup_time" name="pickup_time" class="bg-transparent focus:outline-none w-full text-gray-700 appearance-none border-0 shadow-none focus:shadow-none focus:ring-0">
                                    <option value="9:30am - 10:30am" selected>9:30 am - 10:30 am</option>
                                    <option value="10:30am - 11:30am">10:30 am - 11:30 am</option>
                                    <option value="11:30am - 12:30pm">11:30 am - 12:30 pm</option>
                                    <option value="12:30pm - 1:00pm">12:30 pm - 1:00 pm</option>
                                    <option value="2:00pm - 3:00pm">2:00 pm - 3:00 pm</option>
                                    <option value="3:00pm - 4:00pm">3:00 pm - 4:00 pm</option>
                                    <option value="4:00pm - 5:00pm">4:00 pm - 5:00 pm</option>
                                    <option value="5:00pm - 6:00pm">5:00 pm - 6:00 pm</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Timing (60% width on md screens) -->
                    <div class="md:col-span-3">
                        <h2 class="text-2xl font-bold mb-6 text-[#164272]">Delivery Timing</h2>

                        <!-- Options -->
                        <div class="space-y-4">
                            @php
                                $options = [
                                    ['title' => 'Same/Next Day (2-Way-Trip)', 'price' => 25, 'image' => asset('assets/images/delivery1.jpg'), 'desc' => 'Receive your laundry on the same day if your pickup slot is between 9.30am - 12.30pm. Else, next day. Pickup and return delivery.'],
                                    ['title' => 'Same/Next Day + Door to Door (2-Way Trip)', 'price' => 37, 'image' => asset('assets/images/delivery2.jpg'), 'desc' => 'Receive your laundry on the same day if your pickup slot is between 9.30am - 12.30pm. Else, next day. Pickup and return delivery directly to your doorstep.'],
                                    ['title' => '2 Days Later (2-Way Trip)', 'price' => 18, 'image' => asset('assets/images/delivery3.jpg'), 'desc' => 'Receive your laundry in 2 days from order date. Pickup and return delivery.'],
                                    ['title' => '2 Days Later + Door to Door (2-Way Trip)', 'price' => 30, 'image' => asset('assets/images/delivery4.jpg'), 'desc' => 'Receive your laundry in 2 days from order date. Pickup and return delivery directly at your doorstep.'],
                                ];
                            @endphp

                            <!-- @foreach ($options as $option)
                                <div class="flex items-center border rounded-full px-4 py-3 justify-between">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $option['image'] }}" alt="{{ $option['title'] }}" class="w-10 h-10 text-gray-400 rounded-md">
                                        <div class="pr-3">
                                            <span class="text-gray-700 text-[16px] font-[600]">{{ $option['title'] }}</span>
                                            <p class="text-[12px]">
                                                <span class="text-[#164272] font-[700]">RM{{ number_format($option['price'], 2) }}</span>
                                                <span class="text-gray-700">{{ $option['desc'] }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button type="button" class="bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-full btn-select-delivery" data-option="{{ $option['title'] }}" data-price="{{ $option['price'] }}">
                                        Select
                                    </button>
                                </div>
                            @endforeach -->

                            <!-- @foreach ($options as $option)
                                <div class="flex items-center border rounded-full px-4 py-3 justify-between delivery-option transition-colors duration-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $option['image'] }}" alt="{{ $option['title'] }}" class="w-10 h-10 text-gray-400 rounded-md">
                                        <div class="pr-3">
                                            <span class="text-gray-700 text-[16px] font-[600]">{{ $option['title'] }}</span>
                                            <p class="text-[12px]">
                                                <span class="text-[#164272] font-[700]">RM{{ number_format($option['price'], 2) }}</span>
                                                <span class="text-gray-700">{{ $option['desc'] }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button type="button" class="bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-full btn-select-delivery"
                                        data-option="{{ $option['title'] }}" data-price="{{ $option['price'] }}">
                                        Select
                                    </button>
                                </div>
                            @endforeach -->

                            @foreach ($options as $option)
    <div class="flex items-center border rounded-full px-4 py-3 justify-between delivery-option transition-colors duration-200">
        <div class="flex items-center space-x-3">
            <img src="{{ $option['image'] }}" alt="{{ $option['title'] }}" class="w-10 h-10 text-gray-400 rounded-md">
            <div class="pr-3">
                <span class="text-gray-700 text-[16px] font-[600]">{{ $option['title'] }}</span>
                <p class="text-[12px]">
                    <span class="text-[#164272] font-[700]">RM{{ number_format($option['price'], 2) }}</span>
                    <span class="text-gray-700">{{ $option['desc'] }}</span>
                </p>
            </div>
        </div>
        <button type="button" class="bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-full btn-select-delivery"
            data-option="{{ $option['title'] }}" data-price="{{ $option['price'] }}">
            Select
        </button>
    </div>
@endforeach
                            
                            @push('scripts')
                            <script>
                            $(document).on('click', '.btn-select-delivery', function () {
                                var selectedOption = $(this).data('option');
                                var selectedPrice = $(this).data('price');
                                deliveryTiming = selectedOption;
                                deliveryTimingFee = parseFloat(selectedPrice);

                                // Remove highlight from all options
                                $('.delivery-option').removeClass('bg-yellow-50 border-[#ffd65b]');
                                // Add highlight to the selected option
                                $(this).closest('.delivery-option').addClass('bg-yellow-50 border-[#ffd65b]');

                                // Update the grand total
                                finaltotal = parseFloat(subTotal) + deliveryTimingFee + cityFee - parseFloat(voucherAmount || 0);
                                $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
                            });
                            </script>
                            @endpush
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-driver mt-5 hidden">
            </div>

            <div class="section-address mt-5 hidden"></div>

            <div class="section-payment mt-5 hidden"></div>

            <div class="pt-8 pb-5">
                <hr />
            </div>

            <div class="flex items-center justify-between mb-3">
                <div class="text-left flex items-center gap-4">
                    <p class="text-[16px] md:text-[20px] font-[700] text-gray-700">Total:</p>
                    <p class="text-[16px] md:text-[20px] font-[800] text-[#164272]" id="grand-total">RM0.00</p>
                </div>
                <div class="schedule-btnbox"></div>
            </div>

            @include('customer.booking.modal');


    </div>

    @push('scripts')
    <script>



        var serviceData = '';
        var cartData = '';

        // render header
        let currentStep = 2; // Laravel variable
        var totalSteps = 4;
        var currentPharse = 'delivery';


        // delivery method
        var pickupTime = '';
        var pickupDate = '';
        var deliveryTiming = '';
        var deliveryFee = 0;
        var address = '';
        var remark = '';
        var selectedDriveId = 0;
        var deliveryTimingFee = 0;
        var cityFee = 0;


        var voucherId = 0;
        var voucherAmount = 0;
        var voucherData = '';

        var prevFinalTotal = 0;
        var subTotal = 0;
        var finaltotal = 0;




        $(document).ready(async function () {
            renderHeader('delivery');
            await initCartAndServices();
            $('#pickup_date_wrapper').on('click', function() {
                const input = $('#pickup_date')[0];
                if (input.showPicker) {
                    input.showPicker();  // Open date picker (modern browsers)
                } else {
                    input.focus();       // Fallback for older browsers
                }
            });
        });

        function renderHeader(type){

            if(type == 'delivery'){
                var leftSection = `
                    <div class="relative pr-6 md:pr-9">
                        <div class="flex items-center gap-3">
                            <a href="/customer-booking" class="flex items-center justify-center text-[12px] md:text-[16px] w-[25px] h-[25px] md:w-[30px] md:h-[30px] rounded-full bg-[#164272] text-white">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h1 class="text-[#164272] font-[800] text-xl md:text-4xl">Schedule</h1>
                        </div>
                        <div x-data="" x-on:click="$dispatch('open-modal', 'schedule-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] md:w-[25px] md:h-[25px] flex items-center justify-center">?</div>
                    </div>
                `;
                currentStep = 2;
            }else if(type == 'driver'){
                var leftSection = `
                    <div class="relative pr-6 md:pr-9">
                        <div class="flex items-center gap-3">
                            <div onclick="backToDelivery()" class="cursor-pointer flex items-center justify-center text-[12px] md:text-[16px] w-[25px] h-[25px] md:w-[30px] md:h-[30px] rounded-full bg-[#164272] text-white">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <h1 class="text-[#164272] font-[800] text-xl md:text-4xl">Choose Available Delivery Driver</h1>
                        </div>
                    </div>
                `;
                currentStep = 2;
            }else if(type == 'address'){
                var leftSection = `
                    <div class="relative pr-6 md:pr-9">
                        <div class="flex items-center gap-3">
                            <div onclick="backToDriver()" class="cursor-pointer flex items-center justify-center text-[12px] md:text-[16px] w-[25px] h-[25px] md:w-[30px] md:h-[30px] rounded-full bg-[#164272] text-white">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <h1 class="text-[#164272] font-[800] text-xl md:text-4xl">Address</h1>
                        </div>
                        <div x-data="" x-on:click="$dispatch('open-modal', 'address-question')" class="cursor-pointer absolute top-0 right-0 font-[600] bg-[#ffd65b] text-[#164272] rounded-full border-2 border-[#ffd65b] w-[20px] h-[20px] md:w-[25px] md:h-[25px] flex items-center justify-center">?</div>
                    </div>
                `;
                currentStep = 3;
            }else{

                var leftSection = `
                    <div class="relative pr-6 md:pr-9">
                        <div class="flex items-center gap-3">
                            <div onclick="backToAddress()" class="cursor-pointer flex items-center justify-center text-[12px] md:text-[16px] w-[25px] h-[25px] md:w-[30px] md:h-[30px] rounded-full bg-[#164272] text-white">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <h1 class="text-[#164272] font-[800] text-xl md:text-4xl">Payment</h1>
                        </div>
                    </div>
                `;
                currentStep = 4;
            }



            // Right Section (Steps)
            let stepHtml = '<div class="flex items-center gap-3">';
            for (let i = 1; i <= totalSteps; i++) {
                const isActive = i === currentStep;
                const bgClass = isActive ? 'bg-[#ffd65b]' : 'bg-transparent';
                const textClass = isActive ? 'text-[#164272]' : 'text-[#164272]';
                const borderClass = isActive ? 'border-[#ffd65b]' : 'border-[#164272]';
                stepHtml += `
                    <div class="font-[600] rounded-full border-2 w-[20px] h-[20px] md:w-[25px] md:h-[25px] flex items-center justify-center ${bgClass} ${textClass} ${borderClass} shadow-md">
                        ${i}
                    </div>
                `;
            }
            stepHtml += '</div>';

            // Combine and render
            $('#schedule-header').html(leftSection + stepHtml);
        }

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

            $('.schedule-btnbox').html(``);
            try {
                const data = await fetchCartAndServices();
                $('#grand-total').html('RM0.00');
                serviceData = data.services;
                cartData = data.cart;
                if(cartData.length < 1){
                    alert('Please add item to cart first!');
                    window.location.href = '/customer-booking';
                }
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

                subTotal = total;

                $('#grand-total').html(`RM${total.toFixed(2)}`);
                $('.schedule-btnbox').html(`<div class="btn-continue cursor-pointer rounded-3xl px-4 py-2 border text-white bg-[#164272] font-[600] text-[12px] md:text-[14px]">Continue</div>`);


                console.log('Services:', data.services);
                console.log('Cart:', data.cart);
                // You can now update the DOM dynamically here
            } catch (error) {
                console.error('AJAX error:', error);
            }
        }

        // $(document).on('click', '.btn-select-delivery', function () {
        //     var selectedOption = $(this).data('option');
        //     var selectedPrice = $(this).data('price');
        //     deliveryTiming = selectedOption;
        //     deliveryFee = selectedPrice;

        //     // Remove Tailwind highlight classes from all
        //     $('.btn-select-delivery')
        //         .closest('.flex.items-center')
        //         .removeClass('border-1 border-[#ffd65b] bg-yellow-50');

        //     // Add highlight to selected one
        //     $(this)
        //         .closest('.flex.items-center')
        //         .addClass('border-1 border-[#ffd65b] bg-yellow-50');

        //     // Update the grand total

        //     finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee);
        //     $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        // });

        $(document).on('click', '.btn-select-delivery', function () {
            var selectedOption = $(this).data('option');
            var selectedPrice = $(this).data('price');
            deliveryTiming = selectedOption;
            deliveryTimingFee = parseFloat(selectedPrice);

            // Highlight selected
            $('.delivery-option').removeClass('bg-yellow-50 border-[#ffd65b]');
            $(this).closest('.delivery-option').addClass('bg-yellow-50 border-[#ffd65b]');

            // Show total WITHOUT city fee
            finaltotal = parseFloat(subTotal) + deliveryTimingFee - parseFloat(voucherAmount || 0);
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        });


        $(document).on('click', '.btn-continue', function () {
            pickupDate = $('#pickup_date').val();
            pickupTime = $('#pickup_time').val();

            if (!pickupDate) {
                alert('Pickup date is empty.');
                return;
            }

            if (!pickupTime) {
                alert('Pickup time is empty.');
                return;
            }

            if (!deliveryTiming) {
                alert('Please select delivery timing to continue.');
                return;
            }

            // If pickup date is today, check time
            const now = new Date();
            const selectedDate = new Date(pickupDate);
            const isToday = now.toDateString() === selectedDate.toDateString();

            if (isToday) {
                const timeMatch = pickupTime.match(/(\d{1,2}):(\d{2})(am|pm)/i);
                if (timeMatch) {
                    let hour = parseInt(timeMatch[1]);
                    const minute = parseInt(timeMatch[2]);
                    const period = timeMatch[3].toLowerCase();

                    // Convert to 24-hour format
                    if (period === 'pm' && hour !== 12) hour += 12;
                    if (period === 'am' && hour === 12) hour = 0;

                    const pickupDateTime = new Date(pickupDate);
                    pickupDateTime.setHours(hour);
                    pickupDateTime.setMinutes(minute);
                    pickupDateTime.setSeconds(0);

                    if (now > pickupDateTime) {
                        alert('The current time already passed your selected date/time range start time. Please choose another time option.');
                        backToDelivery();
                        return;
                    }
                }
            }

        //     if(currentPharse == 'delivery'){
        //         getDriverList();
        //     }else if(currentPharse == 'driver'){
        //         if(selectedDriveId != 0){
        //             toAddress();
        //         }else{
        //             alert('Please select a driver first!');
        //             return;
        //         }
        //     }else if(currentPharse == 'address'){

        //         var address1 = $('#address1').val();
        //         var address2 = $('#address2').val();
        //         var city = $('#city').val();
        //         var postcode = $('#postcode').val();
        //         var state = 'Johor';

        //         if(address1 == '' || city == '' || postcode == ''){
        //             alert('Please fill in required field for address!');
        //             return;
        //         }

        //         address = `${address1} ${address2} ,${postcode} ${city}, ${state}`;
        //         // remark = $('#remark').val();
        //         toPayment();

        //     }else if('payment'){

        //         submitOrder();

        //     }else{
        //         console.log('Error: Unknown phase');
        //         return;
        //     }

        // });

                if(currentPharse == 'delivery'){
                getDriverList();
            }else if(currentPharse == 'driver'){
                if(selectedDriveId != 0){
                    toAddress();
                }else{
                    alert('Please select a driver first!');
                    return;
                }
            }else if(currentPharse == 'address'){
                var address1 = $('#address1').val();
                var address2 = $('#address2').val();
                var city = $('#city').val();
                var postcode = $('#postcode').val();
                var state = 'Johor';

                if(address1 == '' || city == '' || postcode == ''){
                    alert('Please fill in required field for address!');
                    return;
                }

                address = `${address1} ${address2} ,${postcode} ${city}, ${state}`;
                toPayment();
            console.log('Current phase:', payment);
            }else if(currentPharse == 'payment'){
                // Build order summary string from cartData
                let orderSummaryString = '';
                cartData.forEach(item => {
                    orderSummaryString += `${item.service.service_name} x${item.quantity || 1}, `;
                });
                orderSummaryString = orderSummaryString.replace(/, $/, '');

                let userEmail = $('#user-email').val() || '';

                $('#stripe-order-name').val('Laundry Order');
                $('#stripe-total-amount').val(finaltotal);
                $('#stripe-order-summary').val(orderSummaryString);
                $('#stripe-email').val(userEmail);
                $('#stripe-payment-method').val($('#payment_method').val() || 'card');

                // Submit the form as a normal POST
                $('#stripe-payment-form')[0].submit();
                return;
                        
                    }else{
                        console.log('Error: Unknown phase');
                        return;
                    }
        });

        function submitOrder(){

            if (confirm("Are you sure you want to submit the order?")) {

                remark = $('#remark').val();
                $.ajax({
                    url: '/api/service-cart/submit-order',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        address: address,
                        pickup_date: pickupDate,
                        pickup_time_start: pickupTime.split(' - ')[0],
                        pickup_time_end: pickupTime.split(' - ')[1],
                        delivery_timing: deliveryTiming,
                        delivery_fee: deliveryFee,
                        driver_id: selectedDriveId,
                        voucher_id: voucherId == 0 ? null : voucherId,
                        voucher_amount: voucherAmount == 0 ? null : voucherAmount,
                        sub_total: subTotal,
                        total_amount: finaltotal,
                        order_status: 'pending',
                        remark: remark
                    },
                    success: function (response) {
                        // Handle success response here
                        console.log(response);
                        if(response.success){
                            alert('Order submitted successfully!');
                            window.location.href = '/booking-history';
                        }else{
                            alert('Submit failed!');
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error response here
                        console.error(xhr.responseText);
                    }
                });

            }

        }


        function getDriverList() {
            const [startTime, endTime] = pickupTime.split(' - ');
            $('.section-driver').html('');
            $.ajax({
                url: '/api/service-cart/get-available-drivers',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    pickup_date: pickupDate,
                    pickup_time_start: startTime,
                    pickup_time_end: endTime,
                },
                success: function (d) {
                    // Handle successful response here

                    if(d.length > 0){
                        var driverCard = `<div class="flex items-center border border-gray-300 rounded-full px-4 py-2 text-sm text-gray-700 w-fit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                        </svg>
                                        <span>
                                            Chat with the delivery driver for any question and more information (such as for the delivered, for the drop the laundry, and so on)
                                        </span>
                                        </div>
                                        `;
                        driverCard += '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-8"> ';

                        $(d).each(function(){

                            var icon = this.delivery.vehicle_type == 'car' ? 'fas fa-car' : 'fas fa-motorcycle';
                            driverCard += `<div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden driverCard">
                                                <img src="${this.delivery.driver_img}" alt="Card image" class="w-full h-48 object-contain">
                                                <div class="p-4">\
                                                    <h3 class="text-xl font-semibold text-gray-800">${this.name}</h3>
                                                    <div class="flex items-center gap-2 bg-[#164272] rounded-3xl text-white px-3 py-2 w-fit mt-3">
                                                            <i class="text-[12px] ${icon}"></i>
                                                            <span class="text-[12px]"> ${this.delivery.plate_number } </span>
                                                    </div>

                                                    <div class="pt-4">
                                                        <p class="text-sm text-gray-600 mb-2 text-[16px]"><i class="fas fa-envelope text-gray-600 mr-3"></i> ${this.email}</p>
                                                        <p class="text-sm text-gray-600 mb-2 text-[16px]"><i class="fas fa-phone text-gray-600 mr-3"></i> ${this.phone_number}</p>
                                                    </div>

                                                    <div class="cursor-pointer bg-[#ffd65b] text-[#164272] rounded-md text-center  px-3 py-2 mt-4 text-[14px] btn-select-driver" data-driver="${this.id}">Select</div>
                                                </div>
                                        </div>`;

                        });

                        driverCard += `</div>`;

                        $('.section-driver').html(driverCard);
                        toDriver();

                    }else{
                        alert('No Driver Available!');
                        backToDelivery();
                    }


                    // For example, populate a list of available drivers
                },
                error: function (xhr, status, error) {
                    // Handle error response here
                    if (xhr.status === 400) {
                        // Error message from the server (like invalid time range or passed date)
                        console.log('Error: ' + xhr.responseJSON.error);
                        backToDelivery();
                        alert('Expired! Please reselect the pickup date and time.');
                    } else {
                        // Handle other types of errors (e.g., network issues)
                        backToDelivery();
                        console.log('An error occurred: ' + error);
                    }
                }
            });
        }

        $(document).on('click', '.btn-select-driver', function(){
            selectedDriveId = $(this).data('driver');
            console.log(selectedDriveId);
            $('.driverCard').removeClass('bg-yellow-50 border-yellow-400');

            $(this)
            .closest('.driverCard')
            .addClass('bg-yellow-50 border-yellow-400');
        });

        // function getDeliveryFeeByCity(city) {
        //     if (city === 'Batu Pahat') return 15.00;
        //     if (city === 'Ayer Hitam') return 10.00;
        //     if (city === 'Parit Raja') return 5.00;
        //     return 0;
        // }

        function getDeliveryFeeByCity(city) {
            if (city === 'Batu Pahat') return 15.00;
            if (city === 'Ayer Hitam') return 10.00;
            if (city === 'Parit Raja') return 5.00;
            return 0;
        }

        // Listen for city change in the address section
        // $(document).on('change', '#city', function () {
        //     const city = $(this).val();
        //     deliveryFee = getDeliveryFeeByCity(city);

        //     // Recalculate the total
        //     finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee) - parseFloat(voucherAmount || 0);
        //     $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        //     $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        // });

        $(document).on('change', '#city', function () {
            const city = $(this).val();
            cityFee = getDeliveryFeeByCity(city);

            // Now add city fee to total
            finaltotal = parseFloat(subTotal) + deliveryTimingFee + cityFee - parseFloat(voucherAmount || 0);
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        });

        function backToDelivery(){
            resetValue();
            $('.section-driver').html('');
            $('.section-driver').addClass('hidden');
            $('.section-delivery').removeClass('hidden');
            $('.section-address').html('');
            $('.section-address').addClass('hidden');
            currentPharse = 'delivery';
            renderHeader('delivery');
            $('.btn-continue').text('Continue');
        }

        function toDriver(){
            selectedDriveId = 0;
            $('.section-address').html('');
            $('.section-address').addClass('hidden');
            $('.section-delivery').addClass('hidden');
            $('.section-driver').removeClass('hidden');
            currentPharse = 'driver';
            renderHeader('driver');
            $('.btn-continue').text('Continue');
        }

        function backToDriver(){
            address = '';
            $('.section-address').html('');
            $('.section-address').addClass('hidden');
            $('.section-delivery').addClass('hidden');
            $('.section-driver').removeClass('hidden');
            currentPharse = 'driver';
            renderHeader('driver');
            $('.btn-continue').text('Continue');
        }

        function toPayment(){
            renderPaymentLayout();
            $('.section-address').addClass('hidden');
            $('.section-delivery').addClass('hidden');
            $('.section-driver').addClass('hidden');
            $('.section-payment').removeClass('hidden');
            currentPharse = 'payment';
            renderHeader('payment');
            $('.btn-continue').text('Pay Now');
        }

        // function renderPaymentLayout(){
        //     $('.section-payment').html('');
        //     var content = "<div class='py-8'>";
        //     content += `<div class="flex flex-col md:flex-row md:space-x-6 w-full">
        //                     <div class="w-full md:w-[60%] space-y-4">`;
        //             content += `<p class="font-[600] text-[#164272] text-[20px] mb-3">Charge Summary<p>`;
        //             content += `<div class="p-4 border border-gray-200 rounded-md">`;
        //                 var number = 0;
        //                 var subtotalProduct = 0;
        //                 $(cartData).each(function(){
        //                     var sname = this.service.service_name;
        //                     if(this.service.calculate_by == 'weight'){
        //                         var desc = `${this.bag_detail.bag_size} Bag (${this.bag_detail.weight_per_kg})`;
        //                         var price = parseFloat(this.bag_detail.price);
        //                     }else{
        //                         var desc = `${this.quantity} qty/ RM${this.service.pieces_price} Per Pieces`;
        //                         var price = parseFloat(this.service.pieces_price) * this.quantity;
        //                     }

        //                     content += `<div class="mb-5">
        //                                     <div class="bag-label flex items-center gap-3">
        //                                         <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Bag #${number+1}</h1>
        //                                         <div class="w-full h-[2px] bg-gray-100"></div>
        //                                         <p class="text-[#164272] font-[600] text-[16px]">RM${price.toFixed(2)}</p>
        //                                     </div>
        //                                     <p class="text-[#164272] text-[16px]">${sname}</p>
        //                                     <p class="text-gray-600 text-[12px] capitalize">${desc}</p>
        //                                 </div>`;
        //                     subtotalProduct = subtotalProduct + price;
        //                     number++;

        //                 });
        //                 content += `<div class="my-5">
        //                                 <div class="bag-label flex items-center gap-3">
        //                                     <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Delivery</h1>
        //                                     <div class="w-full h-[2px] bg-gray-100"></div>
        //                                     <p class="text-[#164272] font-[600] text-[16px]">RM${deliveryFee.toFixed(2)}</p>
        //                                 </div>
        //                                 <p class="text-[#164272] text-[16px]">${deliveryTiming}</p>
        //                                 <p class="text-gray-600 text-[12px] capitalize">Estimate pickup at ${pickupTime}, ${pickupDate}</p>
        //                             </div>`;

        //                 content += `<div class="my-5 voucher-amount">
        //                 </div>`;
        //                 subtotalProduct = subtotalProduct + parseFloat(deliveryFee);
        //                 content += `<hr />`;
        //                 content += `<div class="flex items-center justify-between mt-5">
        //                                 <div class="text-[#164272] text-[16px] font-[600]">
        //                                     Amount
        //                                 </div>
        //                                 <div class="text-[#164272] text-[16px] font-[600]" id="total-summary">
        //                                     RM${subtotalProduct.toFixed(2)}
        //                                 </div>
        //                             </div>`;
        //             content += `</div>`;

        //     content += `    </div>
        //                     <div class="w-full md:w-[40%] space-y-4">
        //                         <div>
        //                             <label class="block mb-1 font-[600] text-[#164272] text-[20px]">Remark</label>
        //                             <textarea id="remark" rows="8" class="w-full border border-gray-200 rounded-md px-4 py-2 resize-none text-gray-700" placeholder="Optional note"></textarea>
        //                         </div>
        //                         <div>
        //                             <label class="block mb-3 font-[600] text-[#164272] text-[20px]">Voucher</label>
        //                             <div class="flex items-center gap-4 voucher-box overflow-auto">
        //                                 <div class="input-box">
        //                                     <input type="text" id="voucher" class="w-full border border-gray-200 rounded-sm px-4 py-2 text-gray-700" />
        //                                 </div>
        //                                 <div class="bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-sm text-nowrap">
        //                                     Apply Now
        //                                 </div>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>`;
        //     content += '</div>';
        //     $('.section-payment').html(content);
        //     getVoucherData();
        // }

// ...existing code...
function renderPaymentLayout(){
    $('.section-payment').html('');
    var content = "<div class='py-8'>";
    content += `<div class="flex flex-col md:flex-row md:space-x-6 w-full">
                    <div class="w-full md:w-[60%] space-y-4">`;
            content += `<p class="font-[600] text-[#164272] text-[20px] mb-3">Charge Summary<p>`;
            content += `<div class="p-4 border border-gray-200 rounded-md">`;
                var number = 0;
                var subtotalProduct = 0;
                $(cartData).each(function(){
                    var sname = this.service.service_name;
                    if(this.service.calculate_by == 'weight'){
                        var desc = `${this.bag_detail.bag_size} Bag (${this.bag_detail.weight_per_kg})`;
                        var price = parseFloat(this.bag_detail.price);
                    }else{
                        var desc = `${this.quantity} qty/ RM${this.service.pieces_price} Per Pieces`;
                        var price = parseFloat(this.service.pieces_price) * this.quantity;
                    }

                    content += `<div class="mb-5">
                                    <div class="bag-label flex items-center gap-3">
                                        <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Bag #${number+1}</h1>
                                        <div class="w-full h-[2px] bg-gray-100"></div>
                                        <p class="text-[#164272] font-[600] text-[16px]">RM${price.toFixed(2)}</p>
                                    </div>
                                    <p class="text-[#164272] text-[16px]">${sname}</p>
                                    <p class="text-gray-600 text-[12px] capitalize">${desc}</p>
                                </div>`;
                    subtotalProduct = subtotalProduct + price;
                    number++;
                });

                // Delivery Timing Fee
                content += `<div class="my-5">
                                <div class="bag-label flex items-center gap-3">
                                    <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Delivery Timing</h1>
                                    <div class="w-full h-[2px] bg-gray-100"></div>
                                    <p class="text-[#164272] font-[600] text-[16px]">RM${deliveryTimingFee.toFixed(2)}</p>
                                </div>
                                <p class="text-[#164272] text-[16px]">${deliveryTiming}</p>
                                <p class="text-gray-600 text-[12px] capitalize">Estimate pickup at ${pickupTime}, ${pickupDate}</p>
                            </div>`;

                // City Fee (Service City Fee)
                if (cityFee > 0) {
                    content += `<div class="my-5">
                                    <div class="bag-label flex items-center gap-3">
                                        <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Service City Fee</h1>
                                        <div class="w-full h-[2px] bg-gray-100"></div>
                                        <p class="text-[#164272] font-[600] text-[16px]">RM${cityFee.toFixed(2)}</p>
                                    </div>
                                    <p class="text-[#164272] text-[16px]">${$('#city').val() || 'Selected City'}</p>
                                </div>`;
                }

                content += `<div class="my-5 voucher-amount"></div>`;

                // Calculate subtotal for summary
                var subtotalSummary = subtotalProduct + deliveryTimingFee + cityFee;

                content += `<hr />`;
                content += `<div class="flex items-center justify-between mt-5">
                                <div class="text-[#164272] text-[16px] font-[600]">
                                    Amount
                                </div>
                                <div class="text-[#164272] text-[16px] font-[600]" id="total-summary">
                                    RM${subtotalSummary.toFixed(2)}
                                </div>
                            </div>`;
                    content += `
            <div class="mb-4 mt-8">
                <label for="user-email" class="block font-semibold mb-1 text-[#164272] text-[18px]">Email</label>
                <input type="email" id="user-email" class="border rounded px-3 py-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="payment_method" class="block font-semibold mb-1 text-[#164272] text-[18px]">Payment Method</label>
                <select id="payment_method" class="border rounded px-3 py-2 w-full">
                    <option value="card">Credit/Debit Card</option>
                    <option value="fpx">FPX (Online Banking)</option>
                    <option value="grabpay">GrabPay</option>
                </select>
            </div>
        `;
            content += `</div>`;

    content += `    </div>
                    <div class="w-full md:w-[40%] space-y-4">
                        <div>
                            <label class="block mb-1 font-[600] text-[#164272] text-[20px]">Remark</label>
                            <textarea id="remark" rows="8" class="w-full border border-gray-200 rounded-md px-4 py-2 resize-none text-gray-700" placeholder="Optional note"></textarea>
                        </div>
                        <div>
                            <label class="block mb-3 font-[600] text-[#164272] text-[20px]">Voucher</label>
                            <div class="flex items-center gap-4 voucher-box overflow-auto">
                                <div class="input-box">
                                    <input type="text" id="voucher" class="w-full border border-gray-200 rounded-sm px-4 py-2 text-gray-700" />
                                </div>
                                <div class="bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-sm text-nowrap">
                                    Apply Now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

    // content += `
    //     <div class="schedule-btnbox mt-8 flex justify-end">
    //         <button type="button" class="btn-continue cursor-pointer rounded-3xl px-4 py-2 border text-white bg-[#164272] font-[600] text-[12px] md:text-[14px]">Pay Now</button>
    //     </div>
    // `;

    content += '</div>';
    $('.section-payment').html(content);
    getVoucherData();
}
// ...existing code...

        function getVoucherData(){

            $.ajax({
                url: '/api/service-cart/get-available-vouchers',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (d) {

                    if(d.success){
                        console.log(d);
                        voucherData = d.vouchers;
                        var voucherItem = '';
                        $(d.vouchers).each(function(){
                            voucherItem += `<div class="bg-white shadow-md rounded-2xl p-6 border border-gray-200 flex flex-col justify-between min-w-[280px]">
                                                <div>
                                                    <h3 class="text-[#164272] text-sm font-bold mb-2">${ this.voucher_code }</h3>
                                                    <p class="text-gray-700 text-sm">RM${this.voucher_amount} OFF</p>
                                                    <div class="cursor-pointer bg-[#164272] text-[12px] text-white font-semibold px-4 py-1 rounded-xl hover:bg-[#1d517f] w-fit mt-4 btn-apply-voucher" data-code="${this.voucher_code}">
                                                        Apply
                                                    </div>
                                                </div>
                                            </div>`;
                        });
                        $('.voucher-box').html(voucherItem);
                    }

                },
                error: function (xhr, status, error) {
                    if (xhr.status === 400) {
                        console.log('Error: ' + xhr.responseJSON.error);
                        alert('Failed to get voucher data.');
                    } else {
                        console.log('An error occurred: ' + error);
                    }
                }
            });

        }

        // function initVoucherBox(){
        //     $('.voucher-box').html(`
        //         <div class="input-box">
        //             <input type="text" id="voucher" class="w-full border border-gray-200 rounded-sm px-4 py-2 text-gray-700" />
        //         </div>
        //         <div class="cursor-pointer bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-sm btn-apply-voucher text-nowrap">
        //             Apply Now
        //         </div>
        //     `);
        // }

        // function initSuccessAppliedVoucher(voucher){

        //     $('.voucher-box').html(`
        //         <div id="vouchercode" class="inline-block bg-[#164272] text-white rounded-md px-6 py-2 text-sm font-semibold">
        //             <i class="fas fa-ticket-alt"></i> ${voucher.voucher_code}
        //         </div>
        //         <div class="cursor-pointer bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-sm btn-remove-voucher text-nowrap">
        //             Remove
        //         </div>
        //     `);

        //     var voucherAmount = parseFloat(voucher.voucher_amount);
        //     var voucherCode = voucher.voucher_code;

        //     var amount = `<div class="bag-label flex items-center gap-3">
        //         <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Voucher Applied</h1>
        //         <div class="w-full h-[2px] bg-gray-100"></div>
        //         <p class="text-[#164272] font-[600] text-[16px]">RM${voucherAmount.toFixed(2)}</p>
        //     </div>
        //     <p class="text-[#164272] text-[16px]">${voucherCode}</p>`;
        //     $('.voucher-amount').html(amount);

        // }

        function initSuccessAppliedVoucher(voucher){
            $('.voucher-box').html(`
                <div id="vouchercode" class="inline-block bg-[#164272] text-white rounded-md px-6 py-2 text-sm font-semibold">
                    <i class="fas fa-ticket-alt"></i> ${voucher.voucher_code}
                </div>
                <div class="cursor-pointer bg-[#ffd65b] text-[#164272] text-sm font-semibold px-4 py-2 rounded-sm btn-remove-voucher text-nowrap">
                    Remove
                </div>
            `);

            var voucherAmount = parseFloat(voucher.voucher_amount);
            var voucherCode = voucher.voucher_code;

            // Show as negative value on the same line
            var amount = `<div class="bag-label flex items-center gap-3">
                <h1 class="text-[#164272] text-[14px] md:text-[16px] font-[700] text-nowrap">Voucher Applied</h1>
                <div class="w-full h-[2px] bg-gray-100"></div>
                <p class="text-[#164272] font-[600] text-[16px] whitespace-nowrap">- RM${voucherAmount.toFixed(2)}</p>
            </div>
            <p class="text-[#164272] text-[16px]">${voucherCode}</p>`;
            $('.voucher-amount').html(amount);

            // Update the total accurately
            finaltotal = parseFloat(subTotal) + deliveryTimingFee + cityFee - voucherAmount;
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        }

        // $(document).on('click', '.btn-remove-voucher', function(){

        //     getVoucherData();
        //     // finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee);
        //     // $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        //     // $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        //     finaltotal = parseFloat(subTotal) + deliveryTimingFee + cityFee - parseFloat(voucherAmount || 0);
        //     $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        //     $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        //     voucherId = 0;
        //     voucherAmount = 0;
        //     $('.voucher-amount').html('');
        // });

        $(document).on('click', '.btn-remove-voucher', function(){
            getVoucherData();
            voucherId = 0;
            voucherAmount = 0;
            $('.voucher-amount').html('');
            // Update the total accurately
            finaltotal = parseFloat(subTotal) + deliveryTimingFee + cityFee;
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        });

        $(document).on('click', '.btn-apply-voucher', function () {
            // let voucherCode = $('#voucher').val().trim();
            let voucherCode = $(this).data('code');
            // $('.voucher-alert').remove();

            // if (!voucherCode) {
            //     alert('Please enter a voucher code.');
            //     return;
            // }

            $.ajax({
                url: '/api/check-voucher-usage',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // or from blade: {{ csrf_token() }}
                    voucher_code: voucherCode
                },
                success: function (d) {

                    if(!d.isExist){
                        // $('.voucher-box .input-box').append(`
                        //     <div class="absolute voucher-alert text-red-500 text-sm mt-2">Voucher code does not exist.</div>
                        // `);
                        alert('Voucher code does not exist.');
                        getVoucherData();

                    }else if(d.expired){

                        alert('Voucher code is expired.');
                        getVoucherData();

                    }else{
                        if (d.used) {
                            // $('.voucher-box .input-box').append(`
                            //     <div class="absolute voucher-alert text-red-500 text-sm mt-2">You have already used this voucher.</div>
                            // `);
                            alert('Voucher code is being used.');
                            getVoucherData();

                        } else {

                            // initSuccessAppliedVoucher(d.voucher);
                            // voucherId = d.voucher.id;
                            // voucherAmount = d.voucher.voucher_amount;

                            // finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee) - parseFloat(voucherAmount);
                            // $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
                            // $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);

                            initSuccessAppliedVoucher(d.voucher);
                            voucherId = d.voucher.id;
                            voucherAmount = d.voucher.voucher_amount;

                            // Always use the correct calculation
                            finaltotal = parseFloat(subTotal) + deliveryTimingFee + cityFee - parseFloat(voucherAmount);
                            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
                            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);

                            console.log(voucherId);
                            console.log(voucherAmount);

                        }
                    }

                },
                error: function (xhr) {
                    alert('An error occurred: ' + xhr.responseJSON.message);
                }
            });
        });


        // function backToAddress(){
        //     $('.section-payment').html('');
        //     $('.section-payment').addClass('hidden');
        //     $('.section-delivery').addClass('hidden');
        //     $('.section-driver').addClass('hidden');
        //     $('.section-address').removeClass('hidden');
        //     remark = '';
        //     currentPharse = 'address';
        //     renderHeader('address');
        //     $('.btn-continue').text('Continue');
        //     finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee);
        //     $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        //     $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        //     voucherAmount = 0;
        //     voucherId = 0;
        // }

        function backToAddress() {
            $('.section-payment').html('');
            $('.section-payment').addClass('hidden');
            $('.section-delivery').addClass('hidden');
            $('.section-driver').addClass('hidden');
            $('.section-address').removeClass('hidden');
            remark = '';
            currentPharse = 'address';
            renderHeader('address');
            $('.btn-continue').text('Continue');

            deliveryFee = getDeliveryFeeByCity($('#city').val()); // Get delivery fee based on city
            finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee) - parseFloat(voucherAmount); // Correct calculation
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
            voucherAmount = 0;
            voucherId = 0;
        }

        // function toAddress(){
        //     var content = `<div class="md:flex gap-6 space-y-4 md:space-y-0">
        //                         <!-- Address fields (left side) -->
        //                         <div class="flex-1 space-y-4">
        //                             <p class="text-gray-800 text-[18px]">Pickup & Delivery Address</p>
        //                             <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 text-sm text-gray-700">
        //                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        //                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
        //                                 </svg>
        //                                 <span>Make sure you are in Johor, Parit Raja & Batu Pahat</span>
        //                             </div>
        //                             <div>
        //                                 <label class="block mb-1 font-medium text-[#164272]">Address Line 1*</label>
        //                                 <input type="text" id="address1" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" />
        //                             </div>
        //                             <div>
        //                                 <label class="block mb-1 font-medium text-[#164272]">Address Line 2</label>
        //                                 <input type="text" id="address2" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" />
        //                             </div>

        //                             <div class="grid grid-cols-2 gap-4">
        //                                 <div>
        //                                     <label class="block mb-1 font-medium text-[#164272]">City*</label>
        //                                     <select type="text" id="city" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700">
        //                                         <option value="Batu Pahat" selected>Batu Pahat</option>
        //                                         <option value="Ayer Hitam">Ayer Hitam</option>
        //                                         <option value="Parit Raja">Parit Raja</option>
        //                                     </select>
        //                                 </div>
        //                                 <div>
        //                                     <label class="block mb-1 font-medium text-[#164272]">Postcode*</label>
        //                                     <input type="text" id="postcode" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" />
        //                                 </div>
        //                             </div>

        //                             <div>
        //                                 <label class="block mb-1 font-medium text-[#164272]">State*</label>
        //                                 <div id="state" class="inline-block bg-[#164272] text-white rounded-full px-4 py-1 text-sm font-semibold">
        //                                     Johor
        //                                 </div>
        //                             </div>

        //                         </div>

        //                     </div>
        //         `;

        //     $('.section-driver').addClass('hidden');
        //     $('.section-delivery').addClass('hidden');
        //     $('.section-address').html(content);
        //     $('.section-address').removeClass('hidden');
        //     currentPharse = 'address';
        //     renderHeader('address');
        //     $('.btn-continue').text('Continue');
        // }

        function toAddress() {
            var content = `<div class="md:flex gap-6 space-y-4 md:space-y-0">
                                <!-- Address fields (left side) -->
                                <div class="flex-1 space-y-4">
                                    <p class="text-gray-800 text-[18px]">Pickup & Delivery Address</p>
                                    <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 text-sm text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                        </svg>
                                        <span>Make sure you are in Johor, Parit Raja & Batu Pahat</span>
                                    </div>
                                    <div>
                                        <label class="block mb-1 font-medium text-[#164272]">Address Line 1*</label>
                                        <input type="text" id="address1" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" />
                                    </div>
                                    <div>
                                        <label class="block mb-1 font-medium text-[#164272]">Address Line 2</label>
                                        <input type="text" id="address2" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" />
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block mb-1 font-medium text-[#164272]">City*</label>
                                            <select id="city" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" onchange="updateDeliveryFee()">
                                                <option value="Batu Pahat" selected>Batu Pahat</option>
                                                <option value="Ayer Hitam">Ayer Hitam</option>
                                                <option value="Parit Raja">Parit Raja</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block mb-1 font-medium text-[#164272]">Postcode*</label>
                                            <input type="text" id="postcode" class="w-full border border-gray-200 rounded-full px-4 py-2 text-gray-700" />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block mb-1 font-medium text-[#164272]">State*</label>
                                        <div id="state" class="inline-block bg-[#164272] text-white rounded-full px-4 py-1 text-sm font-semibold">
                                            Johor
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            
            $('.section-driver').addClass('hidden');
            $('.section-delivery').addClass('hidden');
            $('.section-address').html(content);
            $('.section-address').removeClass('hidden');
            currentPharse = 'address';
            renderHeader('address');
            $('.btn-continue').text('Continue');

            // Show total WITHOUT city fee
            finaltotal = parseFloat(subTotal) + deliveryTimingFee - parseFloat(voucherAmount || 0);
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);

            // $('.section-driver').addClass('hidden');
            // $('.section-delivery').addClass('hidden');
            // $('.section-address').html(content);
            // $('.section-address').removeClass('hidden');
            // currentPharse = 'address';
            // renderHeader('address');
            // $('.btn-continue').text('Continue');

            // updateDeliveryFee(); // Initialize delivery fee correctly on page load
        }

        function updateDeliveryFee() {
            const city = $('#city').val();
            deliveryFee = getDeliveryFeeByCity(city);
            finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee) - parseFloat(voucherAmount); // Correct addition and subtraction
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            $('#total-summary').html(`RM${finaltotal.toFixed(2)}`);
        }

        // function resetValue(){
        //     address = '';
        //     selectedDriveId = 0;
        //     voucherId = 0;
        //     remark = '';

        //     finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee) - parseFloat(voucherAmount);
        //     $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
        //     voucherAmount = 0;
        // }

        function resetValue() {
            address = '';
            selectedDriveId = 0;
            voucherId = 0;
            remark = '';
            
            deliveryFee = getDeliveryFeeByCity($('#city').val());
            finaltotal = parseFloat(subTotal) + parseFloat(deliveryFee) - parseFloat(voucherAmount); // Fix here too
            $('#grand-total').html(`RM${finaltotal.toFixed(2)}`);
            voucherAmount = 0;
        }

        </script>
    @endpush

    <!-- <form id="stripe-payment-form" action="{{ route('stripe.simulated') }}" method="POST" class="hidden">
        @csrf
    </form> -->

    <!-- <form id="stripe-payment-form" action="{{ route('stripe.simulated') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="total_amount" id="stripe-total-amount" value="">
        <input type="hidden" name="order_summary" id="stripe-order-summary" value="">
        <input type="hidden" name="order_name" id="stripe-order-name" value="">
        <input type="hidden" name="email" id="stripe-email" value="">
    </form> -->

    <form id="stripe-payment-form" action="{{ route('stripe.simulated') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="total_amount" id="stripe-total-amount" value="">
        <input type="hidden" name="order_summary" id="stripe-order-summary" value="">
        <input type="hidden" name="order_name" id="stripe-order-name" value="">
        <input type="hidden" name="email" id="stripe-email" value="">
        <input type="hidden" name="payment_method" id="stripe-payment-method" value="card">
    </form>

</x-app-layout>

