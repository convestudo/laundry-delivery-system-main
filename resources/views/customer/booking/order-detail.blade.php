<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <x-modal name="feedback-modal" maxWidth="lg" focusable>
        <div class="p-6 relative">
            <!-- Close X Button -->
            <button x-on:click="$dispatch('close-modal', 'feedback-modal')"
                    class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
            </button>

            <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">Submit Your Feedback</h2>

            <form id="feedbackForm">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="rating" id="rating" value="0">
                <input type="hidden" name="driver_rating" id="driver_rating" value="0">

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Order Rating*</label>
                    <div id="starRating" class="flex gap-1 mt-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg data-value="{{ $i }}" class="h-8 w-8 cursor-pointer fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Your Feedback On Order*</label>
                    <textarea name="feedback_content" id="feedbackContent" class="mt-2 text-[14px] text-gray-600 w-full border border-gray-200 p-2 rounded" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Driver Rating*</label>
                    <div id="driverRating" class="flex gap-1 mt-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg data-value="{{ $i }}" class="h-8 w-8 cursor-pointer fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Your Feedback On Driver*</label>
                    <textarea name="driver_comment" id="driver_comment" class="mt-2 text-[14px] text-gray-600 w-full border border-gray-200 p-2 rounded" required></textarea>
                </div>

                <div class="text-right">
                    <button x-on:click="$dispatch('close-modal', 'feedback-modal')"
                            type="button"
                            class="bg-gray-500 text-white text-[14px] px-4 py-2 rounded mr-2 ">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-[#164272] text-white text-[14px] px-4 py-2 rounded">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </x-modal>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-[#164272]">Reference No: {{ $order->reference_number }}</h3>
                    <div class="flex items-center gap-4">
                        <div id="feedbackButtonContainer"></div>
                        <a href="{{ route('history.index') }}" class="btn bg-[#164272] text-white border-0 py-3 px-5 h-auto min-h-0">Back</a>
                    </div>
                </div>
                <hr />
                <!-- <div class="img-trackbox">
                    <div class="img-track track1">
                        <img src="{{ asset('assets/images/ico10.png') }}" class="img1">
                        <p class="text-[#164272]">Pick Up</p>
                    </div>
                    <div class="img-track track2">
                        <img src="{{ asset('assets/images/ico2.png') }}" class="img2">
                        <p class="text-[#164272]">Process</p>
                    </div>
                    <div class="img-track track3">
                        <img src="{{ asset('assets/images/ico3.png') }}" class="img3">
                        <p class="text-[#164272]">Delivery</p>
                    </div>
                    <div class="img-track track3">
                        <img src="{{ asset('assets/images/ico4.png') }}" class="img3">
                        <p class="text-[#164272]">Completed</p>
                    </div>
                </div>-->
                {{-- @php

                    $status = strtolower($order->order_status);
                    $stepClasses = [
                        'step1' => '',
                        'step2' => '',
                        'step3' => '',
                        'step4' => '',
                    ];

                    if ($status === 'pick up') {
                        $stepClasses['step1'] = 'is-active';
                    } elseif ($status === 'processing') {
                        $stepClasses['step1'] = 'is-complete';
                        $stepClasses['step2'] = 'is-active';
                    } elseif ($status === 'delivery') {
                        $stepClasses['step1'] = 'is-complete';
                        $stepClasses['step2'] = 'is-complete';
                        $stepClasses['step3'] = 'is-active';
                    } elseif ($status === 'completed') {
                        $stepClasses['step1'] = 'is-complete';
                        $stepClasses['step2'] = 'is-complete';
                        $stepClasses['step3'] = 'is-complete';
                        $stepClasses['step4'] = 'is-active';
                    } elseif ($status === 'cancelled') {
                        $stepClasses['step1'] = 'is-active';
                    }
                @endphp
                <div class="tracking">
                    <div class="progress-custom">
                        <div class="progress-track-p"></div>
                        <div class="psteps">
                            <div id="step1" class="progress-step {{ $stepClasses['step1'] }}"></div>
                            <div id="step2" class="progress-step {{ $stepClasses['step2'] }}"></div>
                            <div id="step3" class="progress-step {{ $stepClasses['step3'] }}"></div>
                            <div id="step4" class="progress-step {{ $stepClasses['step4'] }}"></div>
                        </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto p-6">

                    <!-- <div class="flex justify-between items-center mb-4">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/ico10.png') }}" alt="Pick Up" class="mx-auto w-10 h-10">
                            <p class="text-[#164272] text-sm mt-2">Pick Up</p>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/ico2.png') }}" alt="Process" class="mx-auto w-10 h-10">
                            <p class="text-[#164272] text-sm mt-2">Process</p>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/ico3.png') }}" alt="Delivery" class="mx-auto w-10 h-10">
                            <p class="text-[#164272] text-sm mt-2">Delivery</p>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/ico4.png') }}" alt="Completed" class="mx-auto w-10 h-10">
                            <p class="text-[#164272] text-sm mt-2">Completed</p>
                        </div>
                    </div> -->


                    @php
                        $status = strtolower($order->order_status);
                        $stepClasses = [
                            'step1' => '',
                            'step2' => '',
                            'step3' => '',
                            'step4' => '',
                        ];

                        if ($status === 'pick up') {
                            $stepClasses['step1'] = 'bg-green-500 border-green-500';
                        } elseif ($status === 'processing') {
                            $stepClasses['step1'] = 'bg-green-500 border-green-500';
                            $stepClasses['step2'] = 'bg-green-500 border-green-500';
                        } elseif ($status === 'delivery') {
                            $stepClasses['step1'] = 'bg-green-500 border-green-500';
                            $stepClasses['step2'] = 'bg-green-500 border-green-500';
                            $stepClasses['step3'] = 'bg-green-500 border-green-500';
                        } elseif ($status === 'completed') {
                            $stepClasses['step1'] = 'bg-green-500 border-green-500';
                            $stepClasses['step2'] = 'bg-green-500 border-green-500';
                            $stepClasses['step3'] = 'bg-green-500 border-green-500';
                            $stepClasses['step4'] = 'bg-green-500 border-green-500';
                        } elseif ($status === 'cancelled') {
                            $stepClasses['step1'] = 'bg-green-500 border-green-500';
                        }

                        // Calculate width percentage for the progress bar
                        $progressWidths = [
                            'pick up' => '0%',
                            'processing' => '33%',
                            'delivery' => '66%',
                            'completed' => '100%',
                            'cancelled' => '0%',
                        ];
                        $progressWidth = $progressWidths[$status] ?? '0%';
                    @endphp


                    <div class="relative w-full h-2 bg-gray-300 rounded-full mb-8 overflow-hidden">
                        <div class="absolute top-0 left-0 h-2 bg-green-500 transition-all duration-500"
                            style="width: {{ $progressWidth }};"></div>
                        <div class="absolute top-[-0.65rem] w-full flex justify-between">
                            <div id="step1" class="w-5 h-5 rounded-full border-2 bg-gray-300 border-gray-300 {{ $stepClasses['step1'] }}"></div>
                            <div id="step2" class="w-5 h-5 rounded-full border-2 bg-gray-300 border-gray-300 {{ $stepClasses['step2'] }}"></div>
                            <div id="step3" class="w-5 h-5 rounded-full border-2 bg-gray-300 border-gray-300 {{ $stepClasses['step3'] }}"></div>
                            <div id="step4" class="w-5 h-5 rounded-full border-2 bg-gray-300 border-gray-300 {{ $stepClasses['step4'] }}"></div>
                        </div>
                    </div>
                </div> --}}

                @php

                    $status = strtolower($order->order_status);
                    $stepClasses = [
                        'step1' => '',
                        'step2' => '',
                        'step3' => '',
                        'step4' => '',
                    ];

                    if ($status === 'pick up') {
                        $stepClasses['step1'] = 'is-active';
                    } elseif ($status === 'processing') {
                        $stepClasses['step1'] = 'is-complete';
                        $stepClasses['step2'] = 'is-active';
                    } elseif ($status === 'delivery') {
                        $stepClasses['step1'] = 'is-complete';
                        $stepClasses['step2'] = 'is-complete';
                        $stepClasses['step3'] = 'is-active';
                    } elseif ($status === 'completed') {
                        $stepClasses['step1'] = 'is-complete';
                        $stepClasses['step2'] = 'is-complete';
                        $stepClasses['step3'] = 'is-complete';
                        $stepClasses['step4'] = 'is-active';
                    } elseif ($status === 'cancelled') {
                        $stepClasses['step1'] = 'is-active';
                    }
                    $progressWidths = [
                        'pick up' => '0%',
                        'processing' => '33%',
                        'delivery' => '66%',
                        'completed' => '100%',
                        'cancelled' => '0%',
                    ];
                    $progressWidth = $progressWidths[$status] ?? '0%';
                @endphp


                <div class="max-w-4xl mx-auto p-6">
                    <div class="tracking">
                        <!-- <div class="progress-custom">
                            <div class="progress-track-p">

                            </div>
                            <div class="progress-track-done" style="width: {{ $progressWidth }};">

                            </div>
                            <div class="psteps">
                                <div id="step1" class="progress-step {{ $stepClasses['step1'] }}"></div>
                                <div id="step2" class="progress-step {{ $stepClasses['step2'] }}"></div>
                                <div id="step3" class="progress-step {{ $stepClasses['step3'] }}"></div>
                                <div id="step4" class="progress-step {{ $stepClasses['step4'] }}"></div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="max-w-4xl mx-auto">
                    <!-- Icons Section -->
                    <div class="flex justify-between items-center px-3 py-4">
                        <div class="w-[37%] flex justify-between items-center">

                            <div>
                                <img src="{{ asset('assets/images/ico10.png') }}" alt="Pick Up" class="mx-auto w-10 h-10">
                                <p class="text-[#164272] text-sm mt-2">Pick Up</p>
                            </div>

                            <div>
                                <img src="{{ asset('assets/images/ico2.png') }}" alt="Process" class="mx-auto w-10 h-10">
                                <p class="text-[#164272] text-sm mt-2">Process</p>
                            </div>

                        </div>

                        <div class="w-[37%] flex justify-between items-center">

                            <div>
                                <img src="{{ asset('assets/images/ico3.png') }}" alt="Delivery" class="mx-auto w-10 h-10">
                                <p class="text-[#164272] text-sm mt-2">Delivery</p>
                            </div>
                            <div>
                                <img src="{{ asset('assets/images/ico4.png') }}" alt="Completed" class="mx-auto w-10 h-10">
                                <p class="text-[#164272] text-sm mt-2">Completed</p>
                            </div>

                        </div>


                    </div>
                    <div class="max-w-4xl mx-auto p-6">
                    <div class="tracking">
                        <div class="progress-custom">
                            <div class="progress-track-p">

                            </div>
                            <div class="progress-track-done" style="width: {{ $progressWidth }};">

                            </div>
                            <div class="psteps">
                                <div id="step1" class="progress-step {{ $stepClasses['step1'] }}"></div>
                                <div id="step2" class="progress-step {{ $stepClasses['step2'] }}"></div>
                                <div id="step3" class="progress-step {{ $stepClasses['step3'] }}"></div>
                                <div id="step4" class="progress-step {{ $stepClasses['step4'] }}"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 border p-4 rounded-lg">
                    <h1 class="text-gray-800 text-[18px] mb-2"><strong>Order Details</strong></h1>
                    <hr />
                    <p class="text-gray-800 mt-4 mb-2"><strong>Pickup Date:</strong> {{ \Carbon\Carbon::parse($order->pickup_date)->format('M d, Y') }}</p>
                    <p class="text-gray-800 mb-2"><strong>Pickup Time:</strong> {{ \Carbon\Carbon::parse($order->pickup_time_start)->format('g:i A') }} - {{ \Carbon\Carbon::parse($order->pickup_time_end)->format('g:i A') }}</p>
                    <p class="text-gray-800 mb-2"><strong>Address:</strong> {{ $order->address }}</p>
                    <p class="text-gray-800 mb-2"><strong>Shipping Method:</strong> {{ $order->delivery_timing }}</p>
                    @php

                        $statusClass = '';
                        switch ($order->order_status) {
                            case 'pending':
                                $statusClass = 'text-yellow-600';
                                break;
                            case 'completed':
                                $statusClass = 'text-green-600';
                                break;
                            case 'cancelled':
                                $statusClass = 'text-red-600';
                                break;
                            default:
                                $statusClass = 'text-gray-600';
                        }
                    @endphp
                    <p class="{{$statusClass}} mb-2"><strong class="text-gray-800">Status:</strong> {{ ucfirst($order->order_status) }}</p>
                    <p class="text-gray-800 mb-2"><strong>Remark:</strong> {{ $order->remark ?? 'No Remark' }}</p>
                </div>

                <h4 class="mt-6 font-semibold text-[#164272]">Ordered Services</h4>
                <table class="w-full text-sm text-left border mt-2">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="border px-4 py-2">Service</th>
                            <th class="border px-4 py-2">Calculated By</th>
                            <th class="border px-4 py-2">Bag Size</th>
                            <th class="border px-4 py-2">Qty</th>
                            <th class="border px-4 py-2">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp

                        @foreach ($order->orderedServices as $orderedService)

                            <tr>
                                <td class="border px-4 py-2 text-gray-700">{{ $orderedService->service->service_name }}</td>
                                <td class="border px-4 py-2 text-gray-700">
                                    {{ $orderedService->service->calculate_by == 'piece' ? 'By Pieces' : 'By Bag / Weight' }}
                                </td>
                                <td class="border px-4 py-2 text-gray-700 capitalize">{{ $orderedService->selectedBagDetail->bag_size ?? '-' }}</td>
                                <td class="border px-4 py-2 text-gray-700">
                                    {{ $orderedService->qty }} qty /
                                    {{ $orderedService->service->calculate_by == 'piece'
                                        ? 'RM' . $orderedService->service->pieces_price . ' Per Qty'
                                        : 'RM' . ($orderedService->selectedBagDetail->price ?? '0.00') . ' Per Bag' }}
                                </td>
                                @if($orderedService->service->calculate_by == 'piece')
                                    <td class="border px-4 py-2 text-gray-700">RM {{ number_format($orderedService->price * $orderedService->qty, 2) }}</td>
                                @else
                                    <td class="border px-4 py-2 text-gray-700">RM {{ number_format($orderedService->price, 2) }}</td>
                                @endif
                            </tr>
                        @endforeach

                        {{-- Delivery Fee --}}
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-right font-semibold text-gray-700">Delivery Fee</td>
                            <td class="border px-4 py-2 text-gray-700">
                                RM {{ number_format($order->delivery_fee ?? 0, 2) }}
                            </td>
                        </tr>

                        @if($order->voucher_id)
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-right font-semibold text-gray-700">Voucher Applied - [{{ $order->voucher->voucher_code }}]</td>
                                <td class="border px-4 py-2 text-gray-700">
                                    - RM {{ number_format($order->voucher_amount ?? 0, 2) }}
                                </td>
                            </tr>
                        @endif

                        {{-- Total --}}
                        <tr class="bg-gray-100">
                            <td colspan="4" class="border px-4 py-2 text-right font-bold text-gray-900">Total Amount</td>
                            <td class="border px-4 py-2 text-gray-900 font-bold">
                                RM {{ number_format($order->total_amount , 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-8 border p-4 rounded-lg">
                    <h1 class="text-gray-800 text-[18px] mb-2"><strong>Driver Details</strong></h1>
                    <hr />
                    <div class="flex items-center mt-4">
                        <div class="mt-3 mb-3 border p-2 rounded-lg w-fit">
                            <img src="{{ Storage::url($order->driver->delivery->driver_img) }}" width="100" class="rounded" />
                        </div>
                        <div class="pl-4">
                            <p class="text-gray-800 mb-2"><strong>Driver Name:</strong> {{ $order->driver->name }}</p>
                            <p class="text-gray-800 mb-2 capitalize"><strong>Vehicle Type:</strong> {{ $order->driver->delivery->vehicle_type }}</p>
                            <p class="text-gray-800 mb-2"><strong>Plate Number:</strong> {{ $order->driver->delivery->plate_number }}</p>
                            <p class="text-gray-800"><strong>Phone Number:</strong> {{ $order->driver->phone_number }}</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    @push('scripts')

    <script>
        var isViewOnly = false;
        const orderId = '{{ $order->id }}';
        const orderStatus = '{{$status}}';

        $(document).ready(function () {
            $.ajax({
                url: `/api/feedback/${orderId}`,
                type: 'GET',
                success: function (data) {
                    if (!data.exists) {

                        isViewOnly = false;
                        if(orderStatus == 'completed'){
                            $('#feedbackButtonContainer').html(`
                                <div class="flex justify-end">
                                    <button id="openFeedbackBtn"
                                            @click="$dispatch('open-modal', 'feedback-modal')"
                                            class="font-[600] bg-[#ffd65b] text-[#164272] text-[14px] px-4 py-2 rounded-md">
                                        Submit Feedback
                                    </button>
                                </div>
                            `);
                        }
                        Alpine.start(); // Ensure Alpine reinitializes the new DOM
                        $(document).on('mouseover', '#starRating svg', function () {
                            const val = $(this).data('value');
                            highlightStars(val);
                        });

                        $(document).on('click', '#starRating svg', function () {
                            const val = $(this).data('value');
                            $('#rating').val(val);
                        });

                        $(document).on('mouseleave', '#starRating', function () {
                            highlightStars($('#rating').val());
                        });

                        $(document).on('mouseover', '#driverRating svg', function () {
                            const val = $(this).data('value');
                            highlightStars1(val);
                        });

                        $(document).on('click', '#driverRating svg', function () {
                            const val = $(this).data('value');
                            $('#driver_rating').val(val);
                        });

                        $(document).on('mouseleave', '#driverRating', function () {
                            highlightStars1($('#driver_rating').val());
                        });
                    }else{

                        isViewOnly = true;
                        $('#feedbackButtonContainer').html(`
                            <div class="flex justify-end">
                                <button id="viewFeedbackBtn"
                                        @click="$dispatch('open-modal', 'feedback-modal')"
                                        class="font-[600]  bg-[#ffd65b] text-[#164272] text-[14px] px-4 py-2 rounded-md">
                                    View Feedback
                                </button>
                            </div>
                        `);

                        // Fill the modal with the submitted feedback in read-only mode
                        $('#feedbackContent').val(data.feedback.feedback_content).prop('readonly', true);
                        $('#rating').val(data.feedback.rating).prop('disabled', true);

                        $('#driver_comment').val(data.feedback.driver_comment).prop('readonly', true);
                        $('#driver_rating').val(data.feedback.driver_rating).prop('disabled', true);

                        // Highlight stars based on saved rating
                        highlightStars(data.feedback.rating);
                        highlightStars1(data.feedback.driver_rating);

                        // Hide the submit button
                        $('#feedbackForm button[type="submit"]').hide();

                        Alpine.start();
                    }
                }
            });

            $(document).on('submit', '#feedbackForm', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('feedback.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function () {
                        alert('Feedback submitted successfully.');
                        $('#feedbackButtonContainer').html('');
                        window.dispatchEvent(new CustomEvent('close-modal', { detail: 'feedback-modal' }));
                        window.location.reload();
                    },
                    error: function () {
                        alert('Something went wrong.');
                    }
                });
            });


            function highlightStars(count) {
                $('#starRating svg').each(function () {
                    $(this).toggleClass('text-yellow-400', $(this).data('value') <= count);
                    $(this).toggleClass('text-gray-300', $(this).data('value') > count);
                });
            }

            function highlightStars1(count) {
                $('#driverRating svg').each(function () {
                    $(this).toggleClass('text-yellow-400', $(this).data('value') <= count);
                    $(this).toggleClass('text-gray-300', $(this).data('value') > count);
                });
            }
        });
    </script>


    @endpush



</x-app-layout>
