<x-app-layout>
    @if(auth()->user()->role == 'customer')

        @include('components.customer-body');
        @include('components.book-now')

    @else

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-8">
            <div class="max-w-7xl mx-auto px-3">
                @if(auth()->user()->role === 'admin')
                <!-- Greeting Box -->
                <div class="bg-white overflow-hidden sm:rounded-lg mb-4">
                    <div class="px-5 py-3 text-gray-900 flex items-center">
                        <svg id='Administrator_Male_Skin_Type_1_65' width='65' height='65' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.92 0 0 0.92 24 24)" >
                            <g style="" >
                            <g transform="matrix(1 0 0 1 0 9)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,204,128); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -33)" d="M 24 39 L 19 33 L 19 27 L 29 27 L 29 33 L 24 39 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -3)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,204,128); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -21)" d="M 35 21 C 35 22.106 34.104 23 33 23 C 31.894 23 31 22.106 31 21 C 31 19.895 31.894 19 33 19 C 34.104 19 35 19.895 35 21 M 17 21 C 17 19.895 16.104 19 15 19 C 13.894 19 13 19.895 13 21 C 13 22.106 13.894 23 15 23 C 16.104 23 17 22.106 17 21" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -3.39)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,224,178); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -20.61)" d="M 33 15 C 33 7.365 15 10.029 15 15 L 15 22 C 15 26.971 19.028 31 24 31 C 28.971 31 33 26.971 33 22 L 33 15 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -10.5)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,87,34); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -13.5)" d="M 24 6 C 17.925 6 14 10.926 14 17 L 14 19.285 L 16 21 L 16 16 L 28 12 L 32 16 L 32 21 L 34 19.258 L 34 17 C 34 12.975 32.962 8.984 28 8 L 27 6 L 24 6 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -3)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(120,71,25); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -21)" d="M 27 21 C 27 20.449 27.448 20 28 20 C 28.552 20 29 20.449 29 21 C 29 21.551 28.552 22 28 22 C 27.448 22 27 21.551 27 21 M 19 21 C 19 21.551 19.448 22 20 22 C 20.552 22 21 21.551 21 21 C 21 20.449 20.552 20 20 20 C 19.448 20 19 20.449 19 21" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 15)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -39)" d="M 24 45 L 19 33 L 24 34 L 29 33 L 24 45 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 15.73)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(211,47,47); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -39.73)" d="M 23 37 L 22.333 41.465 L 24 45.465 L 25.667 41.465 L 25 37 L 26 36 L 24 34 L 22 36 L 23 37 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 15.5)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(63,81,181); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -39.5)" d="M 29 33 L 29 33 L 24 45 L 19 33 C 19 33 8 34.986 8 46 L 40 46 C 40 35.025 29 33 29 33" stroke-linecap="round" />
                            </g>
                            </g>
                            </g>
                        </svg>
                        <!-- <span class="font-family: 'Times New Roman' font-bold text-[30px]">
                            Hi {{ $user->name }}, Welcome back to Royal Dobi!
                        </span> -->
                        <span class="font-bold text-[30px] inline-block animate-pulse-loop glow-text" style="font-family: 'Times New Roman', Times, serif;">
                            Hi {{ $user->name }}, Welcome back to Royal Dobi!
                        </span>

                        <style>
                        @keyframes pulse-loop {
                        0%, 100% {
                            opacity: 1;
                            transform: scale(1);
                        }
                        50% {
                            opacity: 0.7;
                            transform: scale(1.08);
                        }
                        }

                        .animate-pulse-loop {
                        animation: pulse-loop 1.5s ease-in-out infinite;
                        }

                        /* .glow-text {
                        color: #2d2a2a;
                        text-shadow: 0 0 5px rgba(255, 215, 0, 0.5),
                                    0 0 10px rgba(255, 215, 0, 0.4),
                                    0 0 15px rgba(255, 215, 0, 0.3);
                        } */
                        </style>

                    </div>
                </div>

                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap gap-4 px-6 pb-4">

                    <input
                        type="date"
                        name="start_date"
                        value="{{ request('start_date') }}"
                        class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[180px] text-gray-800"
                        placeholder="Start Date"
                    />

                    <input
                        type="date"
                        name="end_date"
                        value="{{ request('end_date') }}"
                        class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[180px] text-gray-800"
                        placeholder="End Date"
                    />

                    <button type="submit" class="bg-[#ffd65b] hover:bg-[#164272] text-[#164272] hover:text-white px-4 py-1 rounded">
                        Filter
                    </button>

                    <a href="{{ route('dashboard') }}" class="text-sm underline mt-1 text-[#164272]">Reset</a>
                </form>

                <div class="px-5 mb-10 space-y-6">
                    <!-- Top row with 3 cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
                        <!-- Pending Orders -->
                        <div class="bg-yellow-100 text-yellow-800 shadow-xl rounded-2xl p-6 w-full max-w-sm text-center">
                            <div class="flex justify-center mb-3">
                               <svg id='Data_Pending_54' width='54' height='54' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                        <g transform="matrix(0.92 0 0 0.92 24 24)" >
                                        <g style="" >
                                        <g transform="matrix(1 0 0 1 0 0)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,7); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -24)" d="M 37 5 L 11 5 L 6 12 L 6 40 C 6 41.657 7.343 43 9 43 L 39 43 C 40.656 43 42 41.657 42 40 L 42 35 L 42 12 L 37 5 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 6)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,151,167); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -30)" d="M 33 30 C 33 34.971000000000004 28.971 39 24 39 C 19.029 39 15 34.971000000000004 15 30 C 15 25.028999999999996 19.029 21 24 21 C 28.971 21 33 25.029 33 30" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 6)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(238,238,238); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -30)" d="M 30.631 30 C 30.631 33.664 27.662 36.632 24 36.632 C 20.337 36.632 17.368000000000002 33.664 17.368000000000002 30 C 17.368000000000002 26.337 20.337000000000003 23.369 24 23.369 C 27.662 23.369 30.631 26.337 30.631 30" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 1.18 5.06)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25.18, -29.06)" d="M 25 29.563 L 25 25 L 23 25 L 23 29.609 L 23 30.438 L 23.61 31 L 25.996 33.119 L 27.352 31.648 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 -11.5)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(219,133,9); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -12.5)" d="M 12.029 7 L 8.458 12 L 18 12 C 18 15.314 20.687 18 24 18 C 27.313 18 30 15.314 30 12 L 39.542 12 L 35.971000000000004 7 L 12.029 7 z" stroke-linecap="round" />
                                        </g>
                                        </g>
                                        </g>
                                    </svg>

                                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold">Pending Orders</h2>
                            <p class="text-3xl font-semibold">{{ $pendingOrderCount }}</p>
                        </div>

                        <!-- Completed Orders -->
                        <div class="bg-blue-100 text-blue-800 shadow-xl rounded-2xl p-6 w-full max-w-sm text-center">
                            <div class="flex justify-center mb-3">
                                <svg id='Order_Completed_55' width='55' height='55' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                <g transform="matrix(0.92 0 0 0.92 24 24)" >
                                <g style="" >
                                <g transform="matrix(1 0 0 1 0 0)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(80,230,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -24)" d="M 39 16 L 39 41 C 39 42.105 38.105 43 37 43 L 11 43 C 9.895 43 9 42.105 9 41 L 9 7 C 9 5.895 9.895 5 11 5 L 28 5 L 39 16 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 9.5 -13.5)" >
                                <linearGradient id="SVGID_scXuHPPH38xPkLPu1xF6na_1" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 598)" x1="28.529" y1="-582.528" x2="33.6" y2="-587.6">
                                <stop offset="0%" style="stop-color:rgb(48,121,214);stop-opacity: 1"/>
                                <stop offset="100%" style="stop-color:rgb(41,124,210);stop-opacity: 1"/>
                                </linearGradient>
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: url(#SVGID_scXuHPPH38xPkLPu1xF6na_1); fill-rule: nonzero; opacity: 1;" transform=" translate(-33.5, -10.5)" d="M 28 5 L 28 14 C 28 15.105 28.895 16 30 16 L 39 16 L 28 5 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 0 -4)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -20)" d="M 35.5 21 L 12.5 21 C 12.224 21 12 20.776 12 20.5 L 12 19.5 C 12 19.224 12.224 19 12.5 19 L 35.5 19 C 35.776 19 36 19.224 36 19.5 L 36 20.5 C 36 20.776 35.776 21 35.5 21 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -10.5 2)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -26)" d="M 14.5 27 L 12.5 27 C 12.224 27 12 26.776 12 26.5 L 12 25.5 C 12 25.224 12.224 25 12.5 25 L 14.5 25 C 14.776 25 15 25.224 15 25.5 L 15 26.5 C 15 26.776 14.776 27 14.5 27 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 2.5 2)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-26.5, -26)" d="M 35.5 27 L 17.5 27 C 17.224 27 17 26.776 17 26.5 L 17 25.5 C 17 25.224 17.224 25 17.5 25 L 35.5 25 C 35.776 25 36 25.224 36 25.5 L 36 26.5 C 36 26.776 35.776 27 35.5 27 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 2.5 10)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-26.5, -34)" d="M 35.5 35 L 17.5 35 C 17.224 35 17 34.776 17 34.5 L 17 33.5 C 17 33.224 17.224 33 17.5 33 L 35.5 33 C 35.776 33 36 33.224 36 33.5 L 36 34.5 C 36 34.776 35.776 35 35.5 35 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 2.5 6)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-26.5, -30)" d="M 35.5 31 L 17.5 31 C 17.224 31 17 30.776 17 30.5 L 17 29.5 C 17 29.224 17.224 29 17.5 29 L 35.5 29 C 35.776 29 36 29.224 36 29.5 L 36 30.5 C 36 30.776 35.776 31 35.5 31 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 8.5 10.5)" >
                                <radialGradient id="SVGID_scXuHPPH38xPkLPu1xF6nb_2" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 -1 0 -472)" cx="37.649" cy="-509.947" r="11.868" fx="37.649" fy="-509.947">
                                <stop offset="0%" style="stop-color:rgb(0,0,0);stop-opacity: 1"/>
                                <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity: 0"/>
                                </radialGradient>
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: url(#SVGID_scXuHPPH38xPkLPu1xF6nb_2); fill-rule: nonzero; opacity: 1;" transform=" translate(-32.5, -34.5)" d="M 38 26 C 31.383 26 26 31.383 26 38 C 26 39.786 26.403 41.476 27.105 43 L 37 43 C 38.105 43 39 42.105 39 41 L 39 26.051 C 38.669 26.023 38.338 26 38 26 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -10.5 6)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -30)" d="M 14.5 31 L 12.5 31 C 12.224 31 12 30.776 12 30.5 L 12 29.5 C 12 29.224 12.224 29 12.5 29 L 14.5 29 C 14.776 29 15 29.224 15 29.5 L 15 30.5 C 15 30.776 14.776 31 14.5 31 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -10.5 10)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -34)" d="M 14.5 35 L 12.5 35 C 12.224 35 12 34.776 12 34.5 L 12 33.5 C 12 33.224 12.224 33 12.5 33 L 14.5 33 C 14.776 33 15 33.224 15 33.5 L 15 34.5 C 15 34.776 14.776 35 14.5 35 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 14 14)" >
                                <linearGradient id="SVGID_scXuHPPH38xPkLPu1xF6nc_3" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 -1 0 -1850)" x1="30.929" y1="-1880.929" x2="45.071" y2="-1895.071">
                                <stop offset="0%" style="stop-color:rgb(33,173,100);stop-opacity: 1"/>
                                <stop offset="100%" style="stop-color:rgb(8,130,66);stop-opacity: 1"/>
                                </linearGradient>
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: url(#SVGID_scXuHPPH38xPkLPu1xF6nc_3); fill-rule: nonzero; opacity: 1;" transform=" translate(-38, -38)" d="M 48 38 C 48 43.522 43.522 48 38 48 C 32.478 48 28 43.522 28 38 C 28 32.478 32.478 28 38 28 C 43.522 28 48 32.478 48 38 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 14.25 14.4)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-38.25, -38.4)" d="M 36.646 42.354 L 32.646 38.354 C 32.451 38.159 32.451 37.842 32.646 37.647 L 33.353 36.94 C 33.548 36.745 33.865 36.745 34.06 36.94 L 37 39.879 L 42.439 34.44 C 42.634 34.245 42.951 34.245 43.146 34.44 L 43.853 35.147 C 44.048 35.342 44.048 35.659 43.853 35.854 L 37.353 42.354 C 37.158 42.549 36.842 42.549 36.646 42.354 z" stroke-linecap="round" />
                                </g>
                                </g>
                                </g>
                            </svg>
                            </div>
                            <h2 class="text-xl font-bold">Completed Orders</h2>
                            <p class="text-3xl font-semibold">{{ $completedOrderCount }}</p>
                        </div>

                        <!-- Total Sales -->
                        <div class="bg-green-100 text-green-800 shadow-xl rounded-2xl p-6 w-full max-w-sm text-center">
                            <div class="flex justify-center mb-3">
                                <svg id='Total_Sales_55' width='55' height='55' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                <g transform="matrix(0.92 0 0 0.92 24 24)" >
                                <g style="" >
                                <g transform="matrix(1 0 0 1 0 8)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(76,175,80); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -32)" d="M 40 21 L 44 21 L 44 43 L 40 43 z M 34 27 L 38 27 L 38 43 L 34 43 z M 28 30 L 32 30 L 32 43 L 28 43 z M 22 32 L 26 32 L 26 43 L 22 43 z M 16 36 L 20 36 L 20 43 L 16 43 z M 10 39 L 14 39 L 14 43 L 10 43 z M 4 41 L 8 41 L 8 43 L 4 43 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 15.5 -10.5)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(56,142,60); fill-rule: nonzero; opacity: 1;" transform=" translate(-39.5, -13.5)" d="M 44 9 L 35 9 L 44 18 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -13 -12)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,7); fill-rule: nonzero; opacity: 1;" transform=" translate(-11, -12)" d="M 11 5 C 7.140000000000001 5 4 8.14 4 12 C 4 15.86 7.140000000000001 19 11 19 C 14.86 19 18 15.86 18 12 C 18 8.14 14.86 5 11 5 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -13.71 -12)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,248,225); fill-rule: nonzero; opacity: 1;" transform=" translate(-10.29, -12)" d="M 11.994 15.974 L 10.440999999999999 15.974 L 10.440999999999999 9.893 L 8.588 10.474 L 8.588 9.206 L 11.828 8.026 L 11.994 8.026 L 11.994 15.974 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -0.75 -0.25)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(56,142,60); fill-rule: nonzero; opacity: 1;" transform=" translate(-23.25, -23.75)" d="M 6.914 36.914 L 4.086 34.086 L 14 24.172 L 17 27.172 L 27.5 16.672 L 30.5 19.672 L 39.586 10.586 L 42.414 13.414 L 30.5 25.328 L 27.5 22.328 L 17 32.828 L 14 29.828 z" stroke-linecap="round" />
                                </g>
                                </g>
                                </g>
                            </svg>
                            </div>
                            <h2 class="text-xl font-bold">Total Sales Amount</h2>
                            <p class="text-3xl font-semibold">RM{{ number_format($totalSales, 2) }}</p>
                            <p class="text-sm italic text-gray-600">*Exclude Delivery Fee</p>
                        </div>
                    </div>

                    <!-- Bottom row with 2 centered cards -->
                    <div class="flex flex-col lg:flex-row justify-center items-center gap-6">
                        
                        <!-- Customers -->
                        <div class="bg-purple-100 text-purple-800 shadow-xl rounded-2xl p-6 w-full max-w-sm text-center">
                            <div class="flex justify-center mb-3">
                                <svg id='Customer_54' width='54' height='54' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                        <g transform="matrix(0.44 0 0 0.44 24 24)" >
                                        <g style="" >
                                        <g transform="matrix(1 0 0 1 2.96 -19.7)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(240,146,21); fill-rule: nonzero; opacity: 1;" transform=" translate(-52.96, -30.3)" d="M 67.661 22.811 C 65.605 18.557000000000002 61.244 15.244 56.644000000000005 14.238 C 46.80200000000001 12.084999999999999 37.022000000000006 19.477 36.68900000000001 29.610999999999997 C 36.52900000000001 34.486 38.702000000000005 39.768 42.531000000000006 42.857 C 47.07600000000001 46.524 53.45700000000001 47.885 58.992000000000004 45.686 C 59.92 45.317 60.769000000000005 44.72 61.412000000000006 43.974 C 63.36000000000001 42.559999999999995 65.021 40.69799999999999 66.32300000000001 38.657 C 67.73 36.449999999999996 68.75900000000001 33.937999999999995 69.108 31.339999999999996 C 69.51 28.345 68.973 25.526 67.661 22.811 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 2.3 18.63)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(115,61,126); fill-rule: nonzero; opacity: 1;" transform=" translate(-52.3, -68.63)" d="M 80.957 65.455 C 79.20899999999999 63.278 77.056 61.498999999999995 74.773 59.903 C 70.098 56.637 63.878 54.339 58.07299999999999 54.658 C 52.590999999999994 53.777 47.120999999999995 54.196 41.623999999999995 54.994 C 36.24399999999999 55.775 30.949999999999996 57.55 26.840999999999994 61.231 C 23.056999999999995 64.621 20.349999999999994 69.691 19.283999999999992 74.625 C 18.365999999999993 78.875 21.179999999999993 82.735 25.590999999999994 82.905 C 38.79599999999999 83.413 51.99699999999999 82.75 65.204 82.808 C 68.33699999999999 82.822 71.47 82.88000000000001 74.6 83.012 C 76.393 83.088 78.094 83.244 79.862 82.762 C 83.128 81.872 85.463 78.668 85.48599999999999 75.326 C 85.511 71.653 83.169 68.211 80.957 65.455 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 -9.87 17.88)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(129,94,162); fill-rule: nonzero; opacity: 1;" transform=" translate(-40.13, -67.88)" d="M 50.149 61.844 C 49.471000000000004 60.685 48.051 60.411 46.907000000000004 60.994 C 46.61300000000001 61.144 46.327000000000005 61.309 46.037000000000006 61.467 C 45.48100000000001 61.12 44.794000000000004 60.964 44.132000000000005 61.119 C 44.066 61.134 44.00300000000001 61.158 43.938 61.175 C 43.357 60.687999999999995 42.548 60.486999999999995 41.769000000000005 60.68 C 36.11300000000001 62.079 31.497000000000007 66.592 29.885000000000005 72.175 C 29.560000000000006 73.29899999999999 30.187000000000005 74.53999999999999 31.257000000000005 74.97 C 32.27700000000001 75.38 33.693000000000005 75.078 34.21600000000001 74.001 C 34.32200000000001 73.78200000000001 34.43900000000001 73.568 34.55500000000001 73.37 C 34.70300000000001 73.7 34.928000000000004 74.003 35.25200000000001 74.245 C 36.107000000000006 74.884 37.62100000000001 74.997 38.36300000000001 74.06 C 39.876000000000005 72.15 41.577000000000005 70.398 43.45700000000001 68.84700000000001 C 45.07900000000001 67.50900000000001 47.22500000000001 66.14200000000001 49.29900000000001 65.08500000000001 C 50.439 64.505 50.769 62.902 50.149 61.844 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 2.58 -22.5)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-52.58, -27.5)" d="M 54.476 43.499 C 57.846 43.132000000000005 61.129 41.726 63.783 39.2 C 67.316 35.838 69.471 30.548000000000002 68.908 25.661 C 67.388 12.467 52.033 7.357000000000003 41.886 15.232000000000001 C 39.499 17.085 37.904 19.471 36.935 22.327 C 35.417 26.801000000000002 36.203 32.221000000000004 38.777 36.165 C 40.32 38.528999999999996 42.384 40.355 44.719 41.606" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 2.73 -23.54)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-52.73, -26.46)" d="M 54.476 43.499 C 54.476 43.499 54.795 43.436 55.385999999999996 43.279 C 55.977 43.123000000000005 56.842 42.86300000000001 57.888999999999996 42.400000000000006 C 59.958999999999996 41.49300000000001 62.848 39.648 64.908 36.290000000000006 C 66.958 32.992000000000004 68.294 28.199000000000005 66.663 23.508000000000006 C 65.939 21.164000000000005 64.554 18.951000000000008 62.58 17.247000000000007 C 60.613 15.540000000000006 58.079 14.347000000000007 55.336 13.873000000000006 C 52.591 13.392000000000007 49.791 13.654000000000007 47.295 14.531000000000006 C 46.647 14.694000000000006 46.076 15.031000000000006 45.479 15.295000000000005 C 44.867 15.535000000000005 44.338 15.916000000000006 43.792 16.257000000000005 C 42.657000000000004 16.904000000000003 41.758 17.722000000000005 40.947 18.617000000000004 C 39.362 20.404000000000003 38.300000000000004 22.652000000000005 37.812000000000005 24.775000000000006 C 37.322 26.941000000000006 37.36600000000001 29.108000000000004 37.703 31.032000000000004 C 38.389 34.917 40.367000000000004 37.696000000000005 41.962 39.31100000000001 C 42.762 40.13000000000001 43.467000000000006 40.696000000000005 43.956 41.062000000000005 C 44.447 41.428000000000004 44.719 41.604000000000006 44.719 41.604000000000006 C 44.719 41.604000000000006 44.418 41.48700000000001 43.861000000000004 41.21600000000001 C 43.306000000000004 40.94500000000001 42.496 40.50900000000001 41.53 39.81000000000001 C 40.567 39.11100000000001 39.452 38.13200000000001 38.383 36.77400000000001 C 37.309000000000005 35.41700000000001 36.325 33.653000000000006 35.653000000000006 31.543000000000006 C 35.001000000000005 29.434000000000005 34.644000000000005 26.964000000000006 34.964000000000006 24.293000000000006 C 35.31 21.608000000000008 36.30200000000001 18.857000000000006 38.18600000000001 16.361000000000004 C 39.12700000000001 15.142000000000005 40.288000000000004 13.972000000000005 41.608000000000004 13.104000000000005 C 42.258 12.643000000000004 42.899 12.148000000000005 43.642 11.800000000000004 C 44.369 11.429000000000004 45.079 10.994000000000003 45.879000000000005 10.743000000000004 C 48.980000000000004 9.513000000000003 52.554 9.094000000000005 56.065000000000005 9.711000000000004 C 59.574000000000005 10.317000000000004 62.834 11.934000000000005 65.304 14.259000000000004 C 67.787 16.575000000000003 69.412 19.580000000000005 70.096 22.550000000000004 C 70.387 24.042000000000005 70.656 25.489000000000004 70.60900000000001 26.964000000000006 C 70.57600000000001 28.419000000000004 70.34100000000001 29.801000000000005 69.977 31.081000000000007 C 69.238 33.64200000000001 68.02600000000001 35.81000000000001 66.623 37.52100000000001 C 63.803000000000004 41.00800000000001 60.37500000000001 42.45700000000001 58.10300000000001 43.02300000000001 C 56.94600000000001 43.31400000000001 56.03200000000001 43.41200000000001 55.415000000000006 43.45600000000001 C 54.799 43.503 54.476 43.499 54.476 43.499 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 4.69 23.14)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-54.69, -73.14)" d="M 28.579 64.707 C 28.579 64.707 28.479 64.78699999999999 28.286 64.943 C 28.092000000000002 65.099 27.8 65.328 27.441000000000003 65.658 C 26.715000000000003 66.307 25.683000000000003 67.324 24.541000000000004 68.808 C 23.410000000000004 70.295 22.166000000000004 72.25 21.132000000000005 74.74000000000001 C 20.871000000000006 75.361 20.629000000000005 76.01700000000001 20.404000000000003 76.70400000000001 C 20.284000000000002 77.046 20.193000000000005 77.403 20.084000000000003 77.76100000000001 C 19.991000000000003 78.13100000000001 19.890000000000004 78.55000000000001 19.837000000000003 78.96300000000001 C 19.612000000000002 80.62500000000001 19.874000000000002 82.555 20.933000000000003 84.23400000000001 C 21.951000000000004 85.918 23.781000000000002 87.28900000000002 25.921000000000003 87.74700000000001 C 26.186000000000003 87.81900000000002 26.454000000000004 87.86400000000002 26.726000000000003 87.89300000000001 C 26.992000000000004 87.92700000000002 27.291000000000004 87.96700000000001 27.500000000000004 87.97800000000001 C 27.960000000000004 88.01200000000001 28.424000000000003 88.046 28.892000000000003 88.081 C 29.830000000000002 88.143 30.783 88.206 31.751000000000005 88.27 C 35.626000000000005 88.50399999999999 39.761 88.694 44.111000000000004 88.839 C 52.81400000000001 89.13 62.373000000000005 89.286 72.432 89.145 C 74.953 89.10799999999999 77.421 89.051 79.94200000000001 88.926 L 80.902 88.869 C 81.258 88.844 81.873 88.765 82.31 88.671 C 83.10300000000001 88.43700000000001 83.857 88.111 84.555 87.706 C 85.93900000000001 86.88000000000001 87.08500000000001 85.763 87.926 84.473 C 88.772 83.187 89.331 81.723 89.529 80.198 C 89.72699999999999 78.607 89.53699999999999 77.27499999999999 89.24199999999999 75.92599999999999 C 88.93499999999999 74.59299999999999 88.42899999999999 73.35699999999999 87.817 72.23799999999999 C 87.21 71.11299999999999 86.50999999999999 70.08399999999999 85.741 69.16199999999999 C 82.662 65.457 78.948 63.04899999999999 75.369 61.21799999999999 C 71.768 59.40299999999999 68.19200000000001 58.24099999999999 64.838 57.59799999999999 C 63.15899999999999 57.28199999999999 61.529999999999994 57.10499999999999 59.97299999999999 57.09199999999999 C 58.477999999999994 57.087999999999994 57.07999999999999 57.10499999999999 55.763999999999996 57.13599999999999 C 53.13399999999999 57.20199999999999 50.867999999999995 57.34799999999999 49.025999999999996 57.551999999999985 C 47.184 57.749999999999986 45.766999999999996 57.98699999999999 44.812 58.16999999999999 C 43.866 58.36399999999999 43.361 58.46799999999999 43.361 58.46799999999999 C 43.361 58.46799999999999 43.873999999999995 58.44099999999999 44.836999999999996 58.389999999999986 C 45.803999999999995 58.347999999999985 47.229 58.31199999999998 49.059 58.35799999999999 C 50.888999999999996 58.39699999999999 53.122 58.53299999999999 55.708999999999996 58.76899999999999 C 57.007999999999996 58.89999999999999 58.391 59.03999999999999 59.852 59.18799999999999 C 61.25 59.350999999999985 62.723 59.66599999999999 64.24 60.10899999999999 C 67.27 61.00399999999999 70.499 62.38599999999999 73.663 64.30699999999999 C 76.804 66.22299999999998 79.98599999999999 68.68299999999999 82.298 71.83099999999999 C 83.437 73.39499999999998 84.336 75.13799999999999 84.662 76.92699999999999 C 84.82100000000001 77.79599999999999 84.888 78.788 84.753 79.499 C 84.623 80.26899999999999 84.299 81.04299999999999 83.823 81.713 C 83.353 82.39 82.725 82.952 82.035 83.34299999999999 C 81.68599999999999 83.53099999999999 81.322 83.67499999999998 80.951 83.77999999999999 C 80.87899999999999 83.78699999999999 80.836 83.76899999999999 80.779 83.77299999999998 L 80.7 83.77799999999998 L 80.659 83.78399999999998 L 80.551 83.78799999999998 L 79.686 83.82399999999998 C 77.328 83.90399999999998 74.84200000000001 83.94299999999998 72.35000000000001 83.97899999999998 C 62.357000000000006 84.11899999999999 52.80900000000001 84.28599999999999 44.13600000000001 84.47999999999999 C 39.82700000000001 84.57099999999998 35.70900000000001 84.657 31.827000000000012 84.73799999999999 C 30.86700000000001 84.75199999999998 29.923000000000012 84.76599999999999 28.993000000000013 84.77999999999999 C 28.530000000000012 84.78499999999998 28.071000000000012 84.78999999999999 27.61700000000001 84.79499999999999 C 27.36900000000001 84.80299999999998 27.21500000000001 84.78699999999999 27.030000000000012 84.78299999999999 C 26.84900000000001 84.78299999999999 26.670000000000012 84.77099999999999 26.49800000000001 84.73699999999998 C 25.092000000000013 84.56999999999998 23.86600000000001 83.82999999999998 23.068000000000012 82.78299999999999 C 22.24700000000001 81.74399999999999 21.897000000000013 80.41399999999999 21.927000000000014 79.14499999999998 C 21.934000000000015 78.82199999999999 21.973000000000013 78.52099999999999 22.016000000000012 78.18699999999998 C 22.080000000000013 77.84799999999998 22.127000000000013 77.50899999999999 22.202000000000012 77.18199999999999 C 22.33800000000001 76.52299999999998 22.494000000000014 75.88799999999999 22.670000000000012 75.27899999999998 C 23.365000000000013 72.83799999999998 24.311000000000014 70.82399999999998 25.209000000000014 69.25199999999998 C 26.116000000000014 67.68199999999999 26.979000000000013 66.54799999999999 27.597000000000016 65.80899999999998 C 27.901000000000014 65.43399999999998 28.154000000000014 65.16499999999998 28.322000000000017 64.98199999999999 C 28.492 64.802 28.579 64.707 28.579 64.707 z" stroke-linecap="round" />
                                        </g>
                                        </g>
                                        </g>
                                    </svg>

                                    <path d="M16 21v-2a4 4 0 00-3-3.87M12 3a4 4 0 11-4 4 4 4 0 014-4zM6 21v-2a4 4 0 013-3.87"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold">Customers</h2>
                            <p class="text-3xl font-semibold">{{ $customerCount }}</p>
                        </div>

                        <!-- Drivers -->
                        <div class="bg-orange-100 text-orange-800 shadow-xl rounded-2xl p-6 w-full max-w-sm text-center">
                            <div class="flex justify-center mb-3">
                                <svg id='Driver_55' width='55' height='55' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                        <g transform="matrix(0.37 0 0 0.37 24 24)" >
                                        <g style="" >
                                        <g transform="matrix(1 0 0 1 0 35.51)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 0.35;" transform=" translate(-60, -95.51)" d="M 97 114.011 L 23 114.011 L 23 104.61099999999999 C 23 89.368 38.357 77.011 53.6 77.011 L 66.4 77.011 C 81.643 77.011 97 89.368 97 104.61099999999999 L 97 114.011 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 32.51)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,117,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-60, -92.51)" d="M 97 111.011 L 23 111.011 L 23 100.544 C 23 85.89 34.879 74.011 49.533 74.011 L 70.46600000000001 74.011 C 85.121 74.011 97 85.89 97 100.544 L 97 111.011 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 36.71)" >
                                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,117,0); fill-rule: nonzero; opacity: 1;" points="-4,14.3 -7,-14.3 7,-14.3 4,14.3 " />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 15.5)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,191); fill-rule: nonzero; opacity: 1;" transform=" translate(-60, -75.5)" d="M 60 85 L 60 85 C 54.477000000000004 85 50 80.523 50 75 L 50 66 L 70 66 L 70 75 C 70 80.523 65.523 85 60 85 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 -7.99)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 0.35;" transform=" translate(-60, -52.01)" d="M 85.5 44.011 L 84 44.011 L 84 24.011000000000003 L 36 24.011000000000003 L 36 44.011 L 34.5 44.011 C 30.91 44.011 28 46.92100000000001 28 50.511 C 28 54.101 30.91 57.011 34.5 57.011 L 36.367 57.011 L 36 54.275 C 36 60.53 38.381 66.55 42.659 71.114 L 45.419 74.058 C 48.98 77.85700000000001 53.955 80.012 59.162 80.012 L 60.903 80.012 C 66.132 80.012 71.125 77.839 74.688 74.012 L 77.398 71.102 C 81.641 66.544 84 60.549 84 54.322 L 83.725 57.010000000000005 L 85.5 57.010000000000005 C 89.09 57.010000000000005 92 54.10000000000001 92 50.510000000000005 C 92 46.92 89.09 44.011 85.5 44.011 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 -22.99)" >
                                        <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(156,64,0); fill-rule: nonzero; opacity: 1;" x="-29" y="-7" rx="0" ry="0" width="58" height="14" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 -10.99)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,191); fill-rule: nonzero; opacity: 1;" transform=" translate(-60, -49.01)" d="M 77.397 68.101 L 74.68700000000001 71.011 C 71.12400000000001 74.83699999999999 66.13000000000001 77.011 60.902000000000015 77.011 L 59.161000000000016 77.011 C 53.954000000000015 77.011 48.98000000000002 74.856 45.41800000000001 71.057 L 42.658000000000015 68.113 C 38.381 63.55 36 57.53 36 51.275 L 36 21.011 L 84 21.011 L 84 51.323 C 84 57.549 81.641 63.544 77.397 68.101 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 -16.67 -34.27)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(156,64,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-43.33, -25.73)" d="M 31 30.011 C 31 10.011 55.667 15.011 55.667 15.011 C 43.334 15.011 54 31.011 31 37.010999999999996 C 31 35.011 31 30.011 31 30.011 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 20.16 -35.95)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(156,64,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-80.16, -24.05)" d="M 71.228 12.1 C 71.228 12.1 71 36.01 89 36.01 L 89 32.01 C 89 32.011 91.456 12.1 71.228 12.1 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 -27.7 -12.49)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,191); fill-rule: nonzero; opacity: 1;" transform=" translate(-32.3, -47.51)" d="M 34.5 54.011 L 36 54.011 L 36.6 54.011 L 36 41.011 L 34.5 41.011 C 30.91 41.011 28 43.92100000000001 28 47.511 L 28 47.511 C 28 51.101 30.91 54.011 34.5 54.011 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 27.69 -12.49)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,191); fill-rule: nonzero; opacity: 1;" transform=" translate(-87.69, -47.51)" d="M 85.5 54.011 L 84 54.011 L 83.386 54.011 L 84 41.011 L 85.5 41.011 C 89.09 41.011 92 43.92100000000001 92 47.511 L 92 47.511 C 92 51.101 89.09 54.011 85.5 54.011 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 -5 -41.99)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 0.35;" transform=" translate(-55, -18.01)" d="M 31 15.411 C 31 15.411 43 31.011 58 31.011 C 70 31.011 79 22.011 79 22.011 C 79 22.011 76 5.010999999999999 56 5.010999999999999 C 42 5.011 31 15.411 31 15.411 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 -6.5 -43.49)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(156,64,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-53.5, -16.51)" d="M 31 12.411 C 31 12.411 43 28.011 58 28.011 C 66 28.011 76 21.011 76 21.011 C 76 21.011 74 5.010999999999999 54 5.010999999999999 C 40 5.011 31 12.411 31 12.411 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 38.01)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,55,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-60, -98.01)" d="M 60 85 C 44.605000000000004 85 31.801 96.282 29.407 111.011 L 37.567 111.011 C 38.473 106.941 40.443 103.268 43.194 100.321 L 49.772000000000006 111.011 L 59.164 111.011 L 49.612 95.49 C 52.735 93.901 56.263 93 60 93 C 64.041 93 67.839 94.051 71.142 95.888 L 61.836 111.01100000000001 L 71.228 111.01100000000001 L 77.399 100.983 C 79.842 103.809 81.59100000000001 107.241 82.431 111.01100000000001 L 90.593 111.01100000000001 C 88.199 96.282 75.395 85 60 85 z" stroke-linecap="round" />
                                        </g>
                                        </g>
                                        </g>
                                    </svg>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 13h2l.4 2M7 13h10l1.4-2.8a1 1 0 011.1-.7h1a1 1 0 011 1v5a1 1 0 01-1 1h-1M5 17a2 2 0 104 0 2 2 0 00-4 0m10 0a2 2 0 104 0 2 2 0 00-4 0"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold">Drivers</h2>
                            <p class="text-3xl font-semibold">{{ $driverCount }}</p>
                        </div>
                    </div>
                </div>

                <div class=" px-5 mb-5 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="w-100 bg-white border border-gray-200 rounded-xl p-5 text-center flex flex-col items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-700">Each Service Sales</h2>
                        <canvas id="serviceChart" height="250"></canvas>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center flex flex-col items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-700">Services Ordered Count</h2>
                        <canvas id="servicePieChart" height="100"></canvas>
                    </div>
                </div>

                @elseif(auth()->user()->role === 'DeliveryDriver')

                <!-- Greeting Box -->
                <div class="bg-white overflow-hidden sm:rounded-lg mb-4">
                    <div class="px-5 py-3 text-gray-900 flex items-center">
                        <svg id='Administrator_Male_Skin_Type_1_65' width='65' height='65' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.92 0 0 0.92 24 24)" >
                            <g style="" >
                            <g transform="matrix(1 0 0 1 0 9)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,204,128); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -33)" d="M 24 39 L 19 33 L 19 27 L 29 27 L 29 33 L 24 39 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -3)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,204,128); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -21)" d="M 35 21 C 35 22.106 34.104 23 33 23 C 31.894 23 31 22.106 31 21 C 31 19.895 31.894 19 33 19 C 34.104 19 35 19.895 35 21 M 17 21 C 17 19.895 16.104 19 15 19 C 13.894 19 13 19.895 13 21 C 13 22.106 13.894 23 15 23 C 16.104 23 17 22.106 17 21" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -3.39)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,224,178); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -20.61)" d="M 33 15 C 33 7.365 15 10.029 15 15 L 15 22 C 15 26.971 19.028 31 24 31 C 28.971 31 33 26.971 33 22 L 33 15 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -10.5)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,87,34); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -13.5)" d="M 24 6 C 17.925 6 14 10.926 14 17 L 14 19.285 L 16 21 L 16 16 L 28 12 L 32 16 L 32 21 L 34 19.258 L 34 17 C 34 12.975 32.962 8.984 28 8 L 27 6 L 24 6 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 -3)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(120,71,25); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -21)" d="M 27 21 C 27 20.449 27.448 20 28 20 C 28.552 20 29 20.449 29 21 C 29 21.551 28.552 22 28 22 C 27.448 22 27 21.551 27 21 M 19 21 C 19 21.551 19.448 22 20 22 C 20.552 22 21 21.551 21 21 C 21 20.449 20.552 20 20 20 C 19.448 20 19 20.449 19 21" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 15)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -39)" d="M 24 45 L 19 33 L 24 34 L 29 33 L 24 45 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 15.73)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(211,47,47); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -39.73)" d="M 23 37 L 22.333 41.465 L 24 45.465 L 25.667 41.465 L 25 37 L 26 36 L 24 34 L 22 36 L 23 37 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 15.5)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(63,81,181); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -39.5)" d="M 29 33 L 29 33 L 24 45 L 19 33 C 19 33 8 34.986 8 46 L 40 46 C 40 35.025 29 33 29 33" stroke-linecap="round" />
                            </g>
                            </g>
                            </g>
                        </svg>
                        <!-- <span class="font-family: 'Times New Roman' font-bold text-[30px]">
                            Hi {{ $user->name }}, Welcome back to Royal Dobi!
                        </span> -->
                        <span class="font-bold text-[30px] inline-block animate-pulse-loop glow-text" style="font-family: 'Times New Roman', Times, serif;">
                            Hi {{ $user->name }}, Welcome back to Royal Dobi!
                        </span>

                        <style>
                        @keyframes pulse-loop {
                        0%, 100% {
                            opacity: 1;
                            transform: scale(1);
                        }
                        50% {
                            opacity: 0.7;
                            transform: scale(1.08);
                        }
                        }

                        .animate-pulse-loop {
                        animation: pulse-loop 1.5s ease-in-out infinite;
                        }

                        /* .glow-text {
                        color: #2d2a2a;
                        text-shadow: 0 0 5px rgba(255, 215, 0, 0.5),
                                    0 0 10px rgba(255, 215, 0, 0.4),
                                    0 0 15px rgba(255, 215, 0, 0.3);
                        } */
                        </style>

                    </div>
                </div>
                
                <!-- <div class=" px-5 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="bg-white border  border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Pending Orders</h2>
                        <p class="text-3xl text-yellow-600 mt-2">{{ $pendingOrderCount }}</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Completed Orders</h2>
                        <p class="text-3xl text-purple-600 mt-2">{{ $completedOrderCount }}</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-5 text-center">
                        <h2 class="text-xl font-bold text-gray-700">Average Rating</h2>
                        <p class="text-3xl text-purple-600 mt-2">{{ $averageDriverRating }}  <i class="fa-solid fa-star text-yellow-400"></i></p>
                    </div>
                </div> -->
                <div class="px-5 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Pending Orders -->
                    <div class="bg-yellow-100 text-yellow-800 shadow-xl border border-yellow-300 rounded-2xl p-6 text-center">
                        <div class="flex justify-center mb-3">
                            <svg id='Data_Pending_54' width='54' height='54' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                        <g transform="matrix(0.92 0 0 0.92 24 24)" >
                                        <g style="" >
                                        <g transform="matrix(1 0 0 1 0 0)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,193,7); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -24)" d="M 37 5 L 11 5 L 6 12 L 6 40 C 6 41.657 7.343 43 9 43 L 39 43 C 40.656 43 42 41.657 42 40 L 42 35 L 42 12 L 37 5 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 6)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,151,167); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -30)" d="M 33 30 C 33 34.971000000000004 28.971 39 24 39 C 19.029 39 15 34.971000000000004 15 30 C 15 25.028999999999996 19.029 21 24 21 C 28.971 21 33 25.029 33 30" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 6)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(238,238,238); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -30)" d="M 30.631 30 C 30.631 33.664 27.662 36.632 24 36.632 C 20.337 36.632 17.368000000000002 33.664 17.368000000000002 30 C 17.368000000000002 26.337 20.337000000000003 23.369 24 23.369 C 27.662 23.369 30.631 26.337 30.631 30" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 1.18 5.06)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25.18, -29.06)" d="M 25 29.563 L 25 25 L 23 25 L 23 29.609 L 23 30.438 L 23.61 31 L 25.996 33.119 L 27.352 31.648 z" stroke-linecap="round" />
                                        </g>
                                        <g transform="matrix(1 0 0 1 0 -11.5)" >
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(219,133,9); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -12.5)" d="M 12.029 7 L 8.458 12 L 18 12 C 18 15.314 20.687 18 24 18 C 27.313 18 30 15.314 30 12 L 39.542 12 L 35.971000000000004 7 L 12.029 7 z" stroke-linecap="round" />
                                        </g>
                                        </g>
                                        </g>
                                    </svg>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold">Pending Orders</h2>
                        <p class="text-3xl font-semibold mt-2">{{ $pendingOrderCount }}</p>
                    </div>

                    <!-- Completed Orders -->
                    <div class="bg-blue-100 text-blue-800 shadow-xl border border-purple-300 rounded-2xl p-6 text-center">
                        <div class="flex justify-center mb-3">
                            <svg id='Order_Completed_55' width='55' height='55' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                                <g transform="matrix(0.92 0 0 0.92 24 24)" >
                                <g style="" >
                                <g transform="matrix(1 0 0 1 0 0)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(80,230,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -24)" d="M 39 16 L 39 41 C 39 42.105 38.105 43 37 43 L 11 43 C 9.895 43 9 42.105 9 41 L 9 7 C 9 5.895 9.895 5 11 5 L 28 5 L 39 16 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 9.5 -13.5)" >
                                <linearGradient id="SVGID_scXuHPPH38xPkLPu1xF6na_1" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 598)" x1="28.529" y1="-582.528" x2="33.6" y2="-587.6">
                                <stop offset="0%" style="stop-color:rgb(48,121,214);stop-opacity: 1"/>
                                <stop offset="100%" style="stop-color:rgb(41,124,210);stop-opacity: 1"/>
                                </linearGradient>
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: url(#SVGID_scXuHPPH38xPkLPu1xF6na_1); fill-rule: nonzero; opacity: 1;" transform=" translate(-33.5, -10.5)" d="M 28 5 L 28 14 C 28 15.105 28.895 16 30 16 L 39 16 L 28 5 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 0 -4)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-24, -20)" d="M 35.5 21 L 12.5 21 C 12.224 21 12 20.776 12 20.5 L 12 19.5 C 12 19.224 12.224 19 12.5 19 L 35.5 19 C 35.776 19 36 19.224 36 19.5 L 36 20.5 C 36 20.776 35.776 21 35.5 21 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -10.5 2)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -26)" d="M 14.5 27 L 12.5 27 C 12.224 27 12 26.776 12 26.5 L 12 25.5 C 12 25.224 12.224 25 12.5 25 L 14.5 25 C 14.776 25 15 25.224 15 25.5 L 15 26.5 C 15 26.776 14.776 27 14.5 27 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 2.5 2)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-26.5, -26)" d="M 35.5 27 L 17.5 27 C 17.224 27 17 26.776 17 26.5 L 17 25.5 C 17 25.224 17.224 25 17.5 25 L 35.5 25 C 35.776 25 36 25.224 36 25.5 L 36 26.5 C 36 26.776 35.776 27 35.5 27 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 2.5 10)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-26.5, -34)" d="M 35.5 35 L 17.5 35 C 17.224 35 17 34.776 17 34.5 L 17 33.5 C 17 33.224 17.224 33 17.5 33 L 35.5 33 C 35.776 33 36 33.224 36 33.5 L 36 34.5 C 36 34.776 35.776 35 35.5 35 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 2.5 6)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-26.5, -30)" d="M 35.5 31 L 17.5 31 C 17.224 31 17 30.776 17 30.5 L 17 29.5 C 17 29.224 17.224 29 17.5 29 L 35.5 29 C 35.776 29 36 29.224 36 29.5 L 36 30.5 C 36 30.776 35.776 31 35.5 31 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 8.5 10.5)" >
                                <radialGradient id="SVGID_scXuHPPH38xPkLPu1xF6nb_2" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 -1 0 -472)" cx="37.649" cy="-509.947" r="11.868" fx="37.649" fy="-509.947">
                                <stop offset="0%" style="stop-color:rgb(0,0,0);stop-opacity: 1"/>
                                <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity: 0"/>
                                </radialGradient>
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: url(#SVGID_scXuHPPH38xPkLPu1xF6nb_2); fill-rule: nonzero; opacity: 1;" transform=" translate(-32.5, -34.5)" d="M 38 26 C 31.383 26 26 31.383 26 38 C 26 39.786 26.403 41.476 27.105 43 L 37 43 C 38.105 43 39 42.105 39 41 L 39 26.051 C 38.669 26.023 38.338 26 38 26 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -10.5 6)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -30)" d="M 14.5 31 L 12.5 31 C 12.224 31 12 30.776 12 30.5 L 12 29.5 C 12 29.224 12.224 29 12.5 29 L 14.5 29 C 14.776 29 15 29.224 15 29.5 L 15 30.5 C 15 30.776 14.776 31 14.5 31 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 -10.5 10)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,112,147); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -34)" d="M 14.5 35 L 12.5 35 C 12.224 35 12 34.776 12 34.5 L 12 33.5 C 12 33.224 12.224 33 12.5 33 L 14.5 33 C 14.776 33 15 33.224 15 33.5 L 15 34.5 C 15 34.776 14.776 35 14.5 35 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 14 14)" >
                                <linearGradient id="SVGID_scXuHPPH38xPkLPu1xF6nc_3" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 -1 0 -1850)" x1="30.929" y1="-1880.929" x2="45.071" y2="-1895.071">
                                <stop offset="0%" style="stop-color:rgb(33,173,100);stop-opacity: 1"/>
                                <stop offset="100%" style="stop-color:rgb(8,130,66);stop-opacity: 1"/>
                                </linearGradient>
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: url(#SVGID_scXuHPPH38xPkLPu1xF6nc_3); fill-rule: nonzero; opacity: 1;" transform=" translate(-38, -38)" d="M 48 38 C 48 43.522 43.522 48 38 48 C 32.478 48 28 43.522 28 38 C 28 32.478 32.478 28 38 28 C 43.522 28 48 32.478 48 38 z" stroke-linecap="round" />
                                </g>
                                <g transform="matrix(1 0 0 1 14.25 14.4)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-38.25, -38.4)" d="M 36.646 42.354 L 32.646 38.354 C 32.451 38.159 32.451 37.842 32.646 37.647 L 33.353 36.94 C 33.548 36.745 33.865 36.745 34.06 36.94 L 37 39.879 L 42.439 34.44 C 42.634 34.245 42.951 34.245 43.146 34.44 L 43.853 35.147 C 44.048 35.342 44.048 35.659 43.853 35.854 L 37.353 42.354 C 37.158 42.549 36.842 42.549 36.646 42.354 z" stroke-linecap="round" />
                                </g>
                                </g>
                                </g>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold">Completed Orders</h2>
                        <p class="text-3xl font-semibold mt-2">{{ $completedOrderCount }}</p>
                    </div>

                    <!-- Average Rating -->
                    <div class="bg-pink-100 text--800 shadow-xl border border-blue-300 rounded-2xl p-6 text-center">
                        <div class="flex justify-center mb-3">
                            <svg id='Rating_55' width='55' height='55' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.55 0 0 0.55 24 24)" >
                            <g style="" >
                            <g transform="matrix(1 0 0 1 0 0)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(247,143,143); fill-rule: nonzero; opacity: 1;" transform=" translate(-40, -40)" d="M 10 73.5 C 8.07 73.5 6.5 71.93 6.5 70 L 6.5 10 C 6.5 8.07 8.07 6.5 10 6.5 L 70 6.5 C 71.93 6.5 73.5 8.07 73.5 10 L 73.5 70 C 73.5 71.93 71.93 73.5 70 73.5 L 10 73.5 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 0)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(199,67,67); fill-rule: nonzero; opacity: 1;" transform=" translate(-40, -40)" d="M 70 7 C 71.654 7 73 8.346 73 10 L 73 70 C 73 71.654 71.654 73 70 73 L 10 73 C 8.346 73 7 71.654 7 70 L 7 10 C 7 8.346 8.346 7 10 7 L 70 7 M 70 6 L 10 6 C 7.791 6 6 7.791 6 10 L 6 70 C 6 72.209 7.791 74 10 74 L 70 74 C 72.209 74 74 72.209 74 70 L 74 10 C 74 7.791 72.209 6 70 6 L 70 6 z" stroke-linecap="round" />
                            </g>
                            <g transform="matrix(1 0 0 1 0 0.31)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,238,163); fill-rule: nonzero; opacity: 1;" transform=" translate(-40, -40.31)" d="M 40 22 L 46.252 34.205 L 60 36 L 49.764 45.381 L 52.175 58.615 L 40 52.404 L 27.795 58.615 L 30.236 45.381 L 20 36 L 34.304 34.205 z" stroke-linecap="round" />
                            </g>
                            </g>
                            </g>
                        </svg>
                        </div>
                        <h2 class="text-xl font-bold">Average Rating</h2>
                        <p class="text-3xl font-semibold mt-2">
                            {{ $averageDriverRating }}
                            <i class="fa-solid fa-star text-yellow-400"></i>
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded-lg px-5 " >
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#164272]">Your Feedback</h3>
                    </div>

                    <div class="overflow-x-auto">
                        @if($userFeedback->isEmpty())
                            <p class="text-gray-600">No feedback found.</p>
                        @else
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-[#164272] text-white">
                                        <th class="border px-4 py-2">Order</th>
                                        <th class="border px-4 py-2">Rating</th>
                                        <th class="border px-4 py-2">Comment</th>
                                        <th class="border px-4 py-2">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userFeedback as $f)

                                        <tr class="text-gray-800">
                                            <td class="border px-4 py-2 text-nowrap"><a class="underline" href="{{ route('feedback.order.show', $f->id) }}">#{{ $f->reference_number }}</a></td>
                                            <td class="border px-4 py-2">{{ $f->feedback->driver_rating }} <i class="fa-solid fa-star text-yellow-400"></i></td>
                                            <td class="border px-4 py-2">{{ $f->feedback->driver_comment }}</td>
                                            <td class="border px-4 py-2 text-nowrap">{{ \Carbon\Carbon::parse($f->feedback->feedback_date)->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="mt-4">
                                {{ $userFeedback->links() }}
                            </div>
                        @endif
                    </div>
                </div>
                @else

                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="px-5 text-gray-900">
                        <i class="fa-solid fa-user"></i> &nbsp; Hi {{ $user->name }}, Welcome back to Royal Dobi!
                    </div>
                </div>

                @endif


            </div>
        </div>


    @endif

    @push('scripts')
    @if(auth()->user()->role === 'admin')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($serviceSales->pluck('service_name'));
        const data = @json($serviceSales->pluck('total_sales'));

        new Chart(document.getElementById('serviceChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Service Sales (RM)',
                    data: data,
                    backgroundColor: '#164272',
                    borderColor: '#164272',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                },
                barThickness: 50
            }
        });
        const ctx = document.getElementById('servicePieChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($serviceCounts->pluck('service_name')) !!},
                datasets: [{
                    data: {!! json_encode($serviceCounts->pluck('service_count')) !!},
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                        '#9966FF', '#FF9F40', '#5CDB95'
                    ],
                }]
            },
            options: {
                responsive: true,
                layout: {
                    padding: 10
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 16, // smaller legend boxes
                            font: {
                                size: 14 // smaller text
                            }
                        }
                    },
                    title: { display: true, text: 'Service Orders Distribution' }
                }
            }
        });
    </script>
    @endif
    @endpush



</x-app-layout>
