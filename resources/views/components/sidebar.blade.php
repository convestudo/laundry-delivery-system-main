<!-- resources/views/components/sidebar.blade.php -->
@php
    if(auth()->user()->role === 'customer'){
        $sidebar = 'd-none';
    }else{
        $sidebar = 'col-span-12 md:col-span-2 p-4';
    }
@endphp

<div class="{{ $sidebar }}">

    <!-- Sidebar content -->
    <!-- @if(auth()->user()->role === 'admin')
        <ul class="menu bg-white rounded-box w-50">
            <h2 class="menu-title text-[#164272]">Menu</h2>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('orders.index') }}" class="{{ request()->routeIs('orders.index') ? 'active' : '' }}">Orders List</a></li>
            <li><a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.index') ? 'active' : '' }}">Service Management</a></li>
            <li><a href="{{ route('vouchers.index') }}" class="{{ request()->routeIs('vouchers.index') ? 'active' : '' }}">Voucher Management</a></li>
            <li><a href="{{ route('extra_charges.index') }}" class="{{ request()->routeIs('extra_charges.index') ? 'active' : '' }}">Extra Charges Management</a></li>
            <li><a href="{{ route('memberships.index') }}" class="{{ request()->routeIs('memberships.index') ? 'active' : '' }}">Customer Management</a></li>
            <li><a href="{{ route('delivery.index') }}" class="{{ request()->routeIs('delivery.index') ? 'active' : '' }}">Delivery Driver Management</a></li>
            <li><a href="{{ route('feedback.index') }}" class="{{ request()->routeIs('feedback.index') ? 'active' : '' }}">Feedback Customer List</a></li>
            <li><a href="{{ route('logs.index') }}" class="{{ request()->routeIs('logs.index') ? 'active' : '' }}">Logs List</a></li>
        </ul>
    @endif -->
    @if(auth()->user()->role === 'admin')
    <ul class="menu bg-white rounded-box w-50">
        <h2 class="menu-title text-[#164272] text-lg mb-2">Menu</h2>

        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 {{ request()->routeIs('dashboard') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Pie_Line_Graph_23' width='23' height='23' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(1.83 0 0 1.83 24 24)" >
                <g style="" >
                <g transform="matrix(1 0 0 1 0 0)" >
                <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" x="-11.5" y="-11.5" rx="1" ry="1" width="23" height="23" />
                </g>
                <g transform="matrix(1 0 0 1 -0.15 -0.15)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.85, -11.85)" d="M 23.207 0.793 C 23.019507268642542 0.6054506251890481 22.765194813478814 0.5000566374054949 22.5 0.4999999999999999 L 1.5 0.5 C 0.9477152501692065 0.5 0.5 0.9477152501692065 0.5 1.5 L 0.5 22.5 C 0.5000566374054948 22.765194813478814 0.6054506251890479 23.019507268642542 0.7929999999999997 23.207 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -0.09 -0.09)" >
                <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x="-11.5" y="-11.5" rx="1" ry="1" width="23" height="23" />
                </g>
                <g transform="matrix(1 0 0 1 -4.84 5.41)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-7.25, -17.5)" d="M 3.5 20.5 L 5.7 17.417 C 5.778143822652263 17.307609581468274 5.897045856887877 17.234295235479046 6.0298780318246825 17.213599004256597 C 6.162710206761487 17.19290277303415 6.2982805170648914 17.226568453443644 6.406000000000001 17.307000000000002 L 7.6 18.2 C 7.820913899932317 18.365685424949238 8.13431457505076 18.320913899932314 8.299999999999999 18.099999999999998 L 11 14.5" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 6.65 -6.8)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-18.74, -5.29)" d="M 20.472 6.576 C 20.29169205290285 5.102160053367476 19.201048280238627 3.902491985898159 17.751 3.5829999999999997 L 17 7 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 4.89 -5.07)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16.98, -7.02)" d="M 20.472 6.576 L 17 7 L 17.751 3.583 C 16.25135639233756 3.2453164660147658 14.705896553318386 3.9189436746894106 13.932480263127992 5.24739704654546 C 13.159063972937599 6.575850418401509 13.336267230729092 8.252400070429758 14.370313793466948 9.389813286995137 C 15.404360356204803 10.527226503560517 17.056496656820638 10.86288313536657 18.452409563686448 10.219153164359293 C 19.848322470552255 9.575423193352016 20.665706201858193 8.100939023859397 20.472 6.575999999999999 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 5.41 4.91)" >
                <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" x="-3" y="-3.5" rx="0.5" ry="0.5" width="6" height="7" />
                </g>
                <g transform="matrix(1 0 0 1 5.41 4.41)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-1" y1="0" x2="1" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 4.91 6.41)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-0.5" y1="0" x2="0.5" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 -5.59 -5.09)" >
                <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" x="-3" y="-3.5" rx="0.5" ry="0.5" width="6" height="7" />
                </g>
                <g transform="matrix(1 0 0 1 -5.59 -6.59)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-1" y1="0" x2="1" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 -6.09 -4.59)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-0.5" y1="0" x2="0.5" y2="0" />
                </g>
                </g>
                </g>
            </svg>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('orders.index') }}" class="flex items-center gap-2 {{ request()->routeIs('orders.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Task_List_Text_1_27' width='27' height='27' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 -0.09 -0.09)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 20.5 2.5 L 15.052 2.5 C 14.521278465974227 1.2889078370311324 13.324274394323387 0.5065627557282908 12.001999999999999 0.5065627557282908 C 10.679725605676612 0.5065627557282908 9.482721534025773 1.2889078370311327 8.952 2.500000000000001 L 3.5 2.5 C 2.9477152501692068 2.5 2.5 2.9477152501692068 2.5 3.5 L 2.5 22.5 C 2.5 23.052284749830793 2.9477152501692068 23.5 3.5 23.5 L 20.5 23.5 C 21.052284749830793 23.5 21.5 23.052284749830793 21.5 22.5 L 21.5 3.5 C 21.5 2.9477152501692068 21.052284749830793 2.5 20.5 2.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 1)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -13)" d="M 18.018 17.56 C 18.327995780365143 17.197683652338462 18.498865208076317 16.7368324987606 18.5 16.259999999999998 L 18.5 5.5 L 5.5 5.5 L 5.5 20.5 L 14.58 20.5 C 15.164274267304432 20.499746256474683 15.719221745536744 20.24401009139067 16.099 19.8 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.01 -0.01)" >
                    <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-6.49,6.49 6.49,-6.49 -6.49,-6.49 -6.49,6.49 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 -3.59)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -8.5)" d="M 15.5 8.5 L 8.5 8.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 0.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12.5)" d="M 15.5 12.5 L 8.5 12.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -1.34 4.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-10.75, -16.5)" d="M 13 16.5 L 8.5 16.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 0.91)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -13)" d="M 18.018 17.56 C 18.327995780365143 17.197683652338462 18.498865208076317 16.7368324987606 18.5 16.259999999999998 L 18.5 5.5 L 5.5 5.5 L 5.5 20.5 L 14.58 20.5 C 15.164274267304432 20.499746256474683 15.719221745536744 20.24401009139067 16.099 19.8 Z" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                Orders List
            </a>
        </li>

        <li>
            <a href="{{ route('services.index') }}" class="flex items-center gap-2 {{ request()->routeIs('services.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Laundry_Machine_2_30' width='30' height='30' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>


                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 0 -9.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -2.5)" d="M 21.5 1.5 C 21.5 0.9477152501692065 21.052284749830793 0.5 20.5 0.5 L 3.5 0.5 C 2.9477152501692068 0.5 2.5 0.9477152501692065 2.5 1.5 L 2.5 4.5 L 21.5 4.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 1.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -13.5)" d="M 3.5 22.5 L 20.5 22.5 C 21.052284749830793 22.5 21.5 22.052284749830793 21.5 21.5 L 21.5 4.5 L 2.5 4.5 L 2.5 21.5 C 2.5 22.052284749830793 2.9477152501692068 22.5 3.5 22.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 1.5)" >
                    <circle style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="6" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.88 0.62)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.12, -12.62)" d="M 7.757 17.743 C 5.4136558064679425 15.399655806467942 5.413655806467942 11.600344193532056 7.756999999999999 9.256999999999998 C 10.100344193532056 6.91365580646794 13.899655806467942 6.91365580646794 16.243000000000002 9.256999999999996 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 1.5)" >
                    <circle style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="3.5" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.51 0.99)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.49, -12.99)" d="M 9.525 15.975 C 8.158095244168786 14.608095244168785 8.158095244168786 12.391904755831213 9.524999999999999 11.024999999999999 C 10.891904755831213 9.658095244168784 13.108095244168787 9.658095244168784 14.475000000000001 11.024999999999999 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 -0.59)" >
                    <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x="-9.5" y="-11" rx="1" ry="1" width="19" height="22" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 -7.59)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-9.5" y1="0" x2="9.5" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 1.41)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="3.5" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5.59 -9.59)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-2" y1="0" x2="2" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 -8.59 10.91)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="-0.5" x2="0" y2="0.5" />
                    </g>
                    <g transform="matrix(1 0 0 1 8.41 10.91)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="-0.5" x2="0" y2="0.5" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 1.41)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="6" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.16 -9.59)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-19.25, -2.5)" d="M 19.25 2.25 C 19.388071187457697 2.25 19.5 2.3619288125423017 19.5 2.5 C 19.5 2.6380711874576983 19.388071187457697 2.75 19.25 2.75 C 19.111928812542303 2.75 19 2.6380711874576983 19 2.5 C 19 2.3619288125423017 19.111928812542303 2.25 19.25 2.25" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.66 -9.59)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.75, -2.5)" d="M 16.75 2.25 C 16.888071187457697 2.25 17 2.3619288125423017 17 2.5 C 17 2.6380711874576983 16.888071187457697 2.75 16.75 2.75 C 16.611928812542303 2.75 16.5 2.6380711874576983 16.5 2.5 C 16.5 2.3619288125423017 16.611928812542303 2.25 16.75 2.25" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 2.16 -9.59)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-14.25, -2.5)" d="M 14.25 2.25 C 14.3880711874577 2.25 14.5 2.3619288125423017 14.5 2.5 C 14.5 2.6380711874576983 14.3880711874577 2.75 14.25 2.75 C 14.111928812542303 2.75 14 2.6380711874576983 14 2.5 C 14 2.3619288125423017 14.1119288125423 2.25 14.25 2.25" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                Service Management
            </a>
        </li>

        <li>
            <a href="{{ route('vouchers.index') }}" class="flex items-center gap-2 {{ request()->routeIs('vouchers.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Shopping_Voucher_Mail_31' width='31' height='31' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 -0.09 0.53)" >
                    <polygon style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" points="11.5,-1.13 4,3.88 -4,3.88 -11.5,-1.13 -7.5,-3.88 7.5,-3.88 11.5,-1.13 " />
                    </g>
                    <g transform="matrix(1 0 0 1 0 -3.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -8.5)" d="M 19.5 16.5 L 19.5 1.5 C 19.5 0.9477152501692065 19.052284749830793 0.5 18.5 0.5 L 5.5 0.5 C 4.947715250169207 0.5 4.5 0.9477152501692065 4.5 1.5 L 4.5 16.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.14 -3.98)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.86, -8.02)" d="M 19.215 0.812 C 19.029345477136566 0.6146214925730038 18.77096561680084 0.5018739171537772 18.5 0.5000000000000001 L 5.5 0.5 C 4.947715250169207 0.5 4.5 0.9477152501692065 4.5 1.5 L 4.5 15.53 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 -3.59)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -8.5)" d="M 19.5 16.5 L 19.5 1.5 C 19.5 0.9477152501692065 19.052284749830793 0.5 18.5 0.5 L 5.5 0.5 C 4.947715250169207 0.5 4.5 0.9477152501692065 4.5 1.5 L 4.5 16.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0.16 -5.34)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12.25, -6.75)" d="M 16 4 L 14.120000000000001 9.171 C 14.048091736824249 9.368579536647998 13.860258097669014 9.500063084056661 13.65 9.5 L 10.068 9.5 C 9.868919488258003 9.500295511493691 9.688632073101303 9.382460599626567 9.609 9.2 L 8.536999999999999 6.199999999999999 C 8.46918985897695 6.044648333009042 8.484705291792027 5.865520013853115 8.578217107748761 5.724141458410966 C 8.671728923705498 5.582762902968818 8.830501445231317 5.4983889153458545 9 5.5 L 15.455 5.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -1.34 -0.84)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-10.75, -11.25)" d="M 10.747 11 C 10.885071187457699 11 10.997 11.1119288125423 10.997 11.25 C 10.997 11.388071187457697 10.885071187457699 11.5 10.747 11.5 C 10.608928812542302 11.5 10.497 11.3880711874577 10.497 11.25 C 10.497 11.1119288125423 10.6089288125423 11 10.747 11" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 5.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -17.5)" d="M 15.723 16.683 L 23.5 11.5 L 23.5 22 C 23.5 22.82842712474619 22.82842712474619 23.5 22 23.5 L 2 23.5 C 1.1715728752538097 23.5 0.5 22.82842712474619 0.5 22 L 0.5 11.5 L 8.274 16.68 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.16 -0.84)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.25, -11.25)" d="M 13.247 11 C 13.385071187457699 11 13.497 11.1119288125423 13.497 11.25 C 13.497 11.388071187457697 13.385071187457699 11.5 13.247 11.5 C 13.108928812542302 11.5 12.997 11.3880711874577 12.997 11.25 C 12.997 11.1119288125423 13.1089288125423 11 13.247 11" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 5.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -17.5)" d="M 17.709 15.359 L 23.5 11.5 L 23.5 22 C 23.5 22.82842712474619 22.82842712474619 23.5 22 23.5 L 2 23.5 C 1.1715728752538097 23.5 0.5 22.82842712474619 0.5 22 L 0.5 11.5 L 6.506 15.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 6.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -18.5)" d="M 3.5 20.5 L 8.5 16.5 L 15.5 16.5 L 20.5 20.5" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                Voucher Management
            </a>
        </li>

        <li>
            <a href="{{ route('extra_charges.index') }}" class="flex items-center gap-2 {{ request()->routeIs('extra_charges.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Cash_Payment_Bag_45' width='45' height='45' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 1.48 -3.86)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.48, -8.14)" d="M 15.428 4.752 C 15.304486975675708 4.687585577833988 15.213445129592312 4.574565314123877 15.176808753283241 4.4401686590626195 C 15.140172376974169 4.305772004001361 15.161263233428105 4.162184492283194 15.235000000000001 4.044 L 16.977 1.2559999999999998 C 17.073334352460122 1.1018654647516766 17.078435322059995 0.9075930219492154 16.990322285530496 0.7486154914183927 C 16.902209249000993 0.5896379608875699 16.734762929168586 0.49099957131293426 16.553 0.49099999999999977 L 10.4 0.49099999999999977 C 10.218237070831416 0.49099957131293426 10.050790750999008 0.5896379608875699 9.962677714469507 0.7486154914183927 C 9.874564677940004 0.9075930219492154 9.879665647539877 1.1018654647516763 9.976 1.2559999999999998 L 11.718 4.044 C 11.791736766571896 4.162184492283193 11.812827623025832 4.305772004001361 11.77619124671676 4.4401686590626195 C 11.739554870407689 4.574565314123877 11.648513024324293 4.687585577833988 11.525 4.752 C 10.261000000000001 5.413 7.498 6.852 7.498 10.382 C 7.5631528479628845 11.897862276411676 8.236206691436564 13.32356834740434 9.365193999642482 14.337210785621886 C 10.494181307848402 15.350853223839433 11.983903834486938 15.866959870479185 13.498000000000001 15.768999999999998 C 16.525000000000002 15.748999999999999 19.466 13.591999999999999 19.454 10.381999999999998 C 19.455 6.852 16.692 5.413 15.428 4.752 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.48 0.01)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.48, -12.01)" d="M 13.5 11.665 C 11.111905298614722 11.766276744054029 8.899401052455655 10.414278613633257 7.9 8.243000000000002 C 7.629593781244241 8.923423148946585 7.493751181023312 9.64984145362799 7.5 10.381999999999996 C 7.565152847962884 11.897862276411676 8.238206691436563 13.32356834740434 9.367193999642483 14.337210785621886 C 10.496181307848403 15.350853223839433 11.985903834486937 15.866959870479185 13.5 15.768999999999998 C 16.527 15.749999999999998 19.468 13.591999999999999 19.456 10.381999999999998 C 19.462741860819484 9.648500048248264 19.326890917825867 8.92067862115997 19.056 8.238999999999995 C 18.02711122187739 10.363638503225559 15.86040185975748 11.699697947902091 13.5 11.665 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.39 -4.53)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.48, -7.56)" d="M 17.137 14.638 C 18.578243113438003 13.701284715603975 19.449885357754457 12.100892398170487 19.455000000000002 10.381999999999998 C 19.455000000000002 6.852 16.692 5.412999999999999 15.428 4.752 C 15.304486975675708 4.687585577833988 15.213445129592312 4.574565314123877 15.176808753283241 4.4401686590626195 C 15.140172376974169 4.305772004001361 15.161263233428105 4.162184492283194 15.235000000000001 4.044 L 16.977 1.2559999999999998 C 17.073334352460122 1.1018654647516766 17.078435322059995 0.9075930219492154 16.990322285530496 0.7486154914183927 C 16.902209249000993 0.5896379608875699 16.734762929168586 0.49099957131293426 16.553 0.49099999999999977 L 10.4 0.49099999999999977 C 10.218237070831416 0.49099957131293426 10.050790750999008 0.5896379608875699 9.962677714469507 0.7486154914183927 C 9.874564677940004 0.9075930219492154 9.879665647539877 1.1018654647516763 9.976 1.2559999999999998 L 11.718 4.044 C 11.791736766571896 4.162184492283193 11.812827623025832 4.305772004001361 11.77619124671676 4.4401686590626195 C 11.739554870407689 4.574565314123877 11.648513024324293 4.687585577833988 11.525 4.752 C 10.261000000000001 5.413 7.498 6.852 7.498 10.382 C 7.494115936272085 11.511221471150884 7.869116847198268 12.609111462012708 8.563 13.500000000000002" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 -0.1)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -11.99)" d="M 13.5 11.491 L 13.5 12.491" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 -5.1)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -6.99)" d="M 13.5 6.491 L 13.5 7.491" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 -2.6)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -9.49)" d="M 11.5 11.491 L 14.5 11.491 C 15.052284749830793 11.491 15.5 11.043284749830793 15.5 10.491 C 15.5 9.938715250169206 15.052284749830793 9.491 14.5 9.491 L 12.5 9.491 C 11.947715250169207 9.491 11.5 9.043284749830793 11.5 8.491 C 11.5 7.938715250169206 11.947715250169207 7.491 12.5 7.491 L 15.5 7.491" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 7.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -19.5)" d="M 20.5 17.509 L 16.079 18.977 L 16.068 18.977 C 16.253932807334813 18.635859074075785 16.227030311350177 18.218186017527156 15.99886939643921 17.903717041170466 C 15.77070848152824 17.589248064813773 15.381993808970105 17.43408547333342 15 17.505 L 12 17.505 C 10.814801465023951 16.28188093759887 9.20208739449819 15.56511912847631 7.500000000000001 15.504999999999999 L 4.5 15.504999999999999 L 0.5 17.505 L 0.5 23.505 L 4.5 21.005 C 15.228 24.582 11.271 24.618 23.5 18.505 C 22.80796567868483 17.57652320283407 21.609923874461998 17.178773323832093 20.499999999999996 17.509 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 8.36)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -20.45)" d="M 16.079 18.977 L 20.5 17.509 C 21.610768708616813 17.17963576437271 22.809003574482922 17.579047386328078 23.5 18.509 C 11.271 24.622 15.228 24.586 4.5 21.009 L 0.5 23.509" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -3.74 5.42)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-8.35, -17.51)" d="M 9.5 19.505 L 15 19.505 C 15.39994201097768 19.57682940702348 15.804217448152649 19.403455097858835 16.027864366102648 19.064198363290924 C 16.25151128405265 18.724941628723013 16.25151128405265 18.285058371276985 16.027864366102648 17.945801636709074 C 15.804217448152649 17.606544902141163 15.39994201097768 17.433170592976516 15 17.505 L 12 17.505 C 10.814801465023951 16.28188093759887 9.20208739449819 15.56511912847631 7.500000000000001 15.504999999999999 L 4.5 15.504999999999999 L 0.5 17.505" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                Extra Charges Management
            </a>
        </li>

        <li>
            <a href="{{ route('memberships.index') }}" class="flex items-center gap-2 {{ request()->routeIs('memberships.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Information_Desk_Customer_43' width='43' height='43' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 0 6.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -18.5)" d="M 0.626 23 C 0.626 23.2761423749154 0.8498576250846033 23.5 1.126 23.5 L 22.874 23.5 C 23.150142374915397 23.5 23.374 23.2761423749154 23.374 23 L 23.374 13.5 L 1.126 13.5 C 0.8498576250846032 13.5 0.6259999999999999 13.723857625084603 0.6259999999999999 14 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 0 3)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -15)" d="M 23.374 16.5 L 23.374 13.5 L 1.126 13.5 C 0.8498576250846032 13.5 0.6259999999999999 13.723857625084603 0.6259999999999999 14 L 0.6259999999999999 16.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 5.28 1.41)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-6.002999999999999" y1="0" x2="6.002999999999999" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5.62 4.25)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-6.38, -16.25)" d="M 8.377 23.5 L 8.877 17.5 L 11.377 17.5 L 11.377 14 C 11.377 11.238576250846034 9.138423749153969 9 6.377000000000001 9 C 3.6155762508460336 9 1.3770000000000007 11.238576250846032 1.3770000000000007 14 L 1.3770000000000007 17.5 L 3.8770000000000007 17.5 L 4.377000000000001 23.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5.62 0.88)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-6.38, -12.88)" d="M 6.377 9 C 3.6155762508460327 9 1.3769999999999998 11.238576250846034 1.3769999999999998 14 L 1.3769999999999998 16.753 C 1.3769999999999998 13.991576250846034 3.6155762508460327 11.753 6.377 11.753 C 9.138423749153967 11.753 11.376999999999999 13.991576250846032 11.376999999999999 16.753 L 11.376999999999999 14 C 11.376999999999999 11.238576250846034 9.138423749153965 9 6.376999999999999 9 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5.71 4.16)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-6.38, -16.25)" d="M 8.377 23.5 L 8.877 17.5 L 11.377 17.5 L 11.377 14 C 11.377 11.238576250846034 9.138423749153969 9 6.377000000000001 9 C 3.6155762508460336 9 1.3770000000000007 11.238576250846032 1.3770000000000007 14 L 1.3770000000000007 17.5 L 3.8770000000000007 17.5 L 4.377000000000001 23.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5.71 -8.09)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="3.5" />
                    </g>
                    <g transform="matrix(1 0 0 1 5.79 -5.34)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="2.25" />
                    </g>
                    <g transform="matrix(1 0 0 1 5.79 -0.34)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-17.88, -11.75)" d="M 22.377 13.5 C 21.852462626452752 11.442974874724104 19.999849929284725 10.003491176436665 17.877 10.003491176436665 C 15.754150070715275 10.003491176436665 13.901537373547248 11.442974874724104 13.376999999999999 13.5 Z" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
            </svg>
                Customer Management
            </a>
        </li>

        <li>
            <a href="{{ route('delivery.index') }}" class="flex items-center gap-2 {{ request()->routeIs('delivery.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Taxi_Driver_50' width='50' height='50' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(1.83 0 0 1.83 24 24)" >
                <g style="" >
                <g transform="matrix(1 0 0 1 -3 5.5)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-9, -17.5)" d="M 17.5 20.5 L 1.5 20.5 C 0.9477152501692065 20.5 0.5 20.052284749830793 0.5 19.5 L 0.5 16.5 C 0.5 15.395430500338414 1.395430500338413 14.5 2.5 14.5 L 15 14.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -3.83 4.5)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-8.17, -16.5)" d="M 2.5 16.5 L 15.833 16.5 L 15 14.5 L 2.5 14.5 C 1.395430500338413 14.5 0.5 15.395430500338414 0.5 16.5 L 0.5 18.5 C 0.5 17.395430500338414 1.395430500338413 16.5 2.5 16.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -3 0)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-9, -12)" d="M 13 9.5 L 5.34 9.5 C 4.29982573011192 9.500051537816189 3.4333344632299037 10.297414800968028 3.3469999999999995 11.334 L 3 14.5 L 15 14.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -5 0)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-7, -12)" d="M 11 9.5 L 5.34 9.5 C 4.29982573011192 9.500051537816189 3.4333344632299037 10.297414800968028 3.3469999999999995 11.334 L 3 14.5 L 6 14.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 4.5 5.5)" >
                <circle style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="1" />
                </g>
                <g transform="matrix(1 0 0 1 7.91 -8.84)" >
                <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="2.75" />
                </g>
                <g transform="matrix(1 0 0 1 7.91 0.66)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-20, -12.75)" d="M 23.5 10.5 C 23.5 8.567003375592222 21.932996624407778 7 20 7 C 18.067003375592222 7 16.5 8.567003375592222 16.5 10.5 L 16.5 13.5 L 18.083 13.5 L 18.5 18.5 L 21.5 18.5 L 21.917 13.5 L 23.5 13.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -3.09 5.41)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-9, -17.5)" d="M 17.5 20.5 L 1.5 20.5 C 0.9477152501692065 20.5 0.5 20.052284749830793 0.5 19.5 L 0.5 16.5 C 0.5 15.395430500338414 1.395430500338413 14.5 2.5 14.5 L 15 14.5" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -4.09 -0.09)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-8, -12)" d="M 3 14.5 L 3.347 11.334 C 3.4333344632299037 10.297414800968028 4.299825730111918 9.500051537816189 5.339999999999999 9.5 L 13 9.5" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -8.59 5.41)" >
                <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="1" />
                </g>
                <g transform="matrix(1 0 0 1 -8.09 9.91)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-4, -22)" d="M 5.5 20.5 L 5.5 22 C 5.5 22.82842712474619 4.82842712474619 23.5 4 23.5 C 3.1715728752538097 23.5 2.5 22.82842712474619 2.5 22 L 2.5 20.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 3.91 9.91)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -22)" d="M 17.5 20.5 L 17.5 22 C 17.5 22.82842712474619 16.82842712474619 23.5 16 23.5 C 15.17157287525381 23.5 14.5 22.82842712474619 14.5 22 L 14.5 20.5 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -10.34 1.41)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-1.25" y1="-1" x2="1.25" y2="1" />
                </g>
                <g transform="matrix(1 0 0 1 3.91 5.41)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -17.5)" d="M 16.5 18.5 C 15.947715250169207 18.5 15.5 18.052284749830793 15.5 17.5 C 15.5 16.947715250169207 15.947715250169207 16.5 16.5 16.5" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -5.59 -5.34)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0.75" x2="0" y2="-0.75" />
                </g>
                <g transform="matrix(1 0 0 1 -4.84 -8.84)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-7.25, -3.25)" d="M 6.5 4 L 6.5 3 C 6.5 2.7238576250846034 6.723857625084603 2.5 7 2.5 L 8 2.5" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -1 -9.59)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-0.9089999999999998" y1="0" x2="0.9089999999999998" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 2.66 -9.59)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-0.75" y1="0" x2="0.75" y2="0" />
                </g>
                </g>
                </g>
            </svg>
                Delivery Driver Management
            </a>
        </li>

        <li>
            <a href="{{ route('feedback.index') }}" class="flex items-center gap-2 {{ request()->routeIs('feedback.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Notes_Paper_Text_35' width='35' height='35' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(1.83 0 0 1.83 24 24)" >
                <g style="" >
                <g transform="matrix(1 0 0 1 0 0.05)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12.05)" d="M 23.5 1.545 L 23.5 15.545 L 16.5 15.545 C 16.234783510160455 15.545 15.980429597261486 15.650356840365419 15.792893218813452 15.837893218813454 C 15.605356840365417 16.02542959726149 15.5 16.279783510160456 15.5 16.545 L 15.5 23.545 L 1.5 23.545 C 0.9477152501692065 23.545 0.5 23.097284749830795 0.5 22.545 L 0.5 1.5450000000000017 C 0.5 0.9927152501692083 0.9477152501692065 0.5450000000000017 1.5 0.5450000000000017 L 22.5 0.5450000000000017 C 23.052284749830793 0.5450000000000017 23.5 0.9927152501692071 23.5 1.5449999999999997 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 7.5 7.55)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-19.5, -19.55)" d="M 23.5 15.545 L 15.5 23.545 L 15.5 16.545 C 15.5 15.992715250169208 15.947715250169207 15.545000000000002 16.5 15.545000000000002 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -0.09 -0.05)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12.05)" d="M 23.5 1.545 L 23.5 15.545 L 16.5 15.545 C 16.234783510160455 15.545 15.980429597261486 15.650356840365419 15.792893218813452 15.837893218813454 C 15.605356840365417 16.02542959726149 15.5 16.279783510160456 15.5 16.545 L 15.5 23.545 L 1.5 23.545 C 0.9477152501692065 23.545 0.5 23.097284749830795 0.5 22.545 L 0.5 1.5450000000000017 C 0.5 0.9927152501692083 0.9477152501692065 0.5450000000000017 1.5 0.5450000000000017 L 22.5 0.5450000000000017 C 23.052284749830793 0.5450000000000017 23.5 0.9927152501692071 23.5 1.5449999999999997 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 7.41 7.45)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-19.5, -19.55)" d="M 23.5 15.545 L 15.5 23.545 L 15.5 16.545 C 15.5 15.992715250169208 15.947715250169207 15.545000000000002 16.5 15.545000000000002 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -0.09 -3.09)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -9)" d="M 5 10 L 6 9 C 6.552464417108003 8.448149175812487 7.447535582891996 8.448149175812487 8 9 C 8.552464417108002 9.551850824187513 9.447535582891998 9.551850824187513 10 9 C 10.552464417108002 8.448149175812487 11.447535582891996 8.448149175812487 12 9 C 12.552464417108002 9.551850824187513 13.447535582891998 9.551850824187513 14 9 C 14.552464417108002 8.448149175812487 15.447535582891996 8.448149175812487 16 9 C 16.552464417108002 9.551850824187513 17.447535582891998 9.551850824187513 18 9 L 19 8" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -4.59 2.2)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-7.5, -14.29)" d="M 5 15 L 6 14 C 6.552464417108003 13.448149175812487 7.447535582891996 13.448149175812487 8 14 C 8.552464417108002 14.551850824187513 9.447535582891998 14.551850824187513 10 14" stroke-linecap="round" />
                </g>
                </g>
                </g>
            </svg>
                Feedback Customer List
            </a>
        </li>

        <li>
            <a href="{{ route('logs.index') }}" class="flex items-center gap-2 {{ request()->routeIs('logs.index') ? 'active font-semibold text-[#164272]' : '' }}">
                <svg id='Login_1_32' width='32' height='32' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(1.83 0 0 1.83 24 24)" >
                <g style="" >
                <g transform="matrix(1 0 0 1 -5 0)" >
                <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" x="-4.5" y="-9.5" rx="1" ry="1" width="9" height="19" />
                </g>
                <g transform="matrix(1 0 0 1 -5.09 -0.09)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-7, -12)" d="M 13.5 5 L 13.5 1.5 C 13.5 0.9477152501692065 13.052284749830793 0.5 12.5 0.5 L 1.5 0.5 C 0.9477152501692065 0.5 0.5 0.9477152501692065 0.5 1.5 L 0.5 22.5 C 0.5 23.052284749830793 0.9477152501692065 23.5 1.5 23.5 L 12.5 23.5 C 13.052284749830793 23.5 13.5 23.052284749830793 13.5 22.5 L 13.5 19" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 1.91 -0.09)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-9.5" y1="0" x2="9.5" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 -5.09 -0.09)" >
                <polyline style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" points="2.5,-5 -2.5,0 2.5,5 " />
                </g>
                </g>
                </g>
            </svg>
                Logs List
            </a>
        </li>
    </ul>
@endif

    <!-- @if(auth()->user()->role === 'customer')
        <ul class="menu bg-white rounded-box w-50">
            <li><a href="">Membership</a></li>
            <li><a href="">Service Management</a></li>
            <li><a href="">Book Laundry Service</a></li>
            <li><a href="">Chat</a></li>
            <li><a href="">Payment</a></li>
            <li><a href="">Tracking</a></li>
        </ul>
    @endif -->
    <!-- @if(auth()->user()->role === 'DeliveryDriver')
        <ul class="menu bg-white rounded-box w-50">
            <h2 class="menu-title text-[#164272]">Menu</h2>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('deliver.order.index') }}" class="{{ request()->routeIs('deliver.order.index') ? 'active' : '' }}">My Orders</a></li>
            <li><a href="{{ route('deliver.myinfo.index') }}" class="{{ request()->routeIs('deliver.myinfo.index') ? 'active' : '' }}">My Information</a></li>
            <li><a href="{{ route('chatify') }}" class="{{ request()->is('chat*') ? 'active' : '' }}">Chat</a>

            {{-- <li><a href="">Payment Status</a></li>
            <li><a href="">Delivery Status</a></li> --}}
        </ul>
    @endif -->

    @if(auth()->user()->role === 'DeliveryDriver')
    <ul class="menu bg-white rounded-box w-50">
        <h2 class="menu-title text-[#164272] font-bold text-lg mb-2">Menu</h2>
        
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg id='Pie_Line_Graph_23' width='23' height='23' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(1.83 0 0 1.83 24 24)" >
                <g style="" >
                <g transform="matrix(1 0 0 1 0 0)" >
                <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" x="-11.5" y="-11.5" rx="1" ry="1" width="23" height="23" />
                </g>
                <g transform="matrix(1 0 0 1 -0.15 -0.15)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-11.85, -11.85)" d="M 23.207 0.793 C 23.019507268642542 0.6054506251890481 22.765194813478814 0.5000566374054949 22.5 0.4999999999999999 L 1.5 0.5 C 0.9477152501692065 0.5 0.5 0.9477152501692065 0.5 1.5 L 0.5 22.5 C 0.5000566374054948 22.765194813478814 0.6054506251890479 23.019507268642542 0.7929999999999997 23.207 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 -0.09 -0.09)" >
                <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x="-11.5" y="-11.5" rx="1" ry="1" width="23" height="23" />
                </g>
                <g transform="matrix(1 0 0 1 -4.84 5.41)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-7.25, -17.5)" d="M 3.5 20.5 L 5.7 17.417 C 5.778143822652263 17.307609581468274 5.897045856887877 17.234295235479046 6.0298780318246825 17.213599004256597 C 6.162710206761487 17.19290277303415 6.2982805170648914 17.226568453443644 6.406000000000001 17.307000000000002 L 7.6 18.2 C 7.820913899932317 18.365685424949238 8.13431457505076 18.320913899932314 8.299999999999999 18.099999999999998 L 11 14.5" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 6.65 -6.8)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-18.74, -5.29)" d="M 20.472 6.576 C 20.29169205290285 5.102160053367476 19.201048280238627 3.902491985898159 17.751 3.5829999999999997 L 17 7 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 4.89 -5.07)" >
                <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16.98, -7.02)" d="M 20.472 6.576 L 17 7 L 17.751 3.583 C 16.25135639233756 3.2453164660147658 14.705896553318386 3.9189436746894106 13.932480263127992 5.24739704654546 C 13.159063972937599 6.575850418401509 13.336267230729092 8.252400070429758 14.370313793466948 9.389813286995137 C 15.404360356204803 10.527226503560517 17.056496656820638 10.86288313536657 18.452409563686448 10.219153164359293 C 19.848322470552255 9.575423193352016 20.665706201858193 8.100939023859397 20.472 6.575999999999999 Z" stroke-linecap="round" />
                </g>
                <g transform="matrix(1 0 0 1 5.41 4.91)" >
                <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" x="-3" y="-3.5" rx="0.5" ry="0.5" width="6" height="7" />
                </g>
                <g transform="matrix(1 0 0 1 5.41 4.41)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-1" y1="0" x2="1" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 4.91 6.41)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-0.5" y1="0" x2="0.5" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 -5.59 -5.09)" >
                <rect style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" x="-3" y="-3.5" rx="0.5" ry="0.5" width="6" height="7" />
                </g>
                <g transform="matrix(1 0 0 1 -5.59 -6.59)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-1" y1="0" x2="1" y2="0" />
                </g>
                <g transform="matrix(1 0 0 1 -6.09 -4.59)" >
                <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-0.5" y1="0" x2="0.5" y2="0" />
                </g>
                </g>
                </g>
            </svg>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('deliver.order.index') }}" class="{{ request()->routeIs('deliver.order.index') ? 'active' : '' }}">
                <svg id='Style_Three_Pin_Cart_30' width='30' height='30' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 0 0)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 12 0.574 C 14.164191454542598 0.5708217927894342 16.284418651356113 1.1848273782540808 18.111999999999995 2.343999999999994 C 22.862000000000002 5.355 23.212000000000003 11.574 19.427000000000003 16.121 C 17.267218507359086 18.714868342874382 14.88991851940171 21.119601288756414 12.321000000000009 23.309000000000008 C 12.13525894419429 23.464530242172728 11.864741055805718 23.464530242172728 11.679000000000004 23.308999999999997 C 9.110148580432663 21.119165688288042 6.732857010223933 18.714106710208874 4.573000000000009 16.120000000000005 C 0.789 11.574 1.138 5.355 5.888 2.344 C 7.7155813486438785 1.1848273782540844 9.835808545457397 0.5708217927894355 11.999999999999995 0.5739999999999985 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5 0)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-7, -12)" d="M 12 0.574 C 9.835808545457404 0.570821792789437 7.715581348643874 1.1848273782540866 5.887999999999996 2.344000000000001 C 1.138 5.355 0.7880000000000003 11.574 4.573 16.121 C 6.732857010223929 18.71510671020888 9.110148580432668 21.120165688288054 11.679000000000016 23.310000000000013 C 11.769081679481886 23.385121115912018 11.882706104014826 23.426181655618628 12 23.426 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.71 -1.93)" >
                    <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" points="4.29,-2.5 -4.29,-2.5 -2.79,2.5 3.21,2.5 4.29,-2.5 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -3.09 2.48)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="1" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.91 2.48)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="1" />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.59 -3.02)" >
                    <polyline style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" points="4.07,-1.5 -4.5,-1.5 -3,3.5 3,3.5 4.5,-3.5 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.09 -0.09)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 12 0.574 C 14.164191454542598 0.5708217927894342 16.284418651356113 1.1848273782540808 18.111999999999995 2.343999999999994 C 22.862000000000002 5.355 23.212000000000003 11.574 19.427000000000003 16.121 C 17.267218507359086 18.714868342874382 14.88991851940171 21.119601288756414 12.321000000000009 23.309000000000008 C 12.13525894419429 23.464530242172728 11.864741055805718 23.464530242172728 11.679000000000004 23.308999999999997 C 9.110148580432663 21.119165688288042 6.732857010223933 18.714106710208874 4.573000000000009 16.120000000000005 C 0.789 11.574 1.138 5.355 5.888 2.344 C 7.7155813486438785 1.1848273782540844 9.835808545457397 0.5708217927894355 11.999999999999995 0.5739999999999985 Z" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                My Orders
            </a>
        </li>

        <li>
            <a href="{{ route('deliver.myinfo.index') }}" class="{{ request()->routeIs('deliver.myinfo.index') ? 'active' : '' }}">
                <svg id='Single_Man_Actions_Information_2_30' width='30' height='30' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 -3.5 -3.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-8.5, -8.5)" d="M 0.5 16.5 C 0.923 14.214 0.853 12.92 2.109 12.382 L 6.5 10.5 L 6.5 8.5 C 6.5 8.5 5.555 8.15 5.555 6 C 4.574 6 4.574 4 5.555 4 C 5.555 3.712 3.9109999999999996 1.5699999999999998 5.976999999999999 2 C 6.467999999999999 0 11.308 0 11.799 2 C 11.928563442003782 2.698732767009149 11.769849855870683 3.4201581585232335 11.359 4 C 12.31 4 12.05 6 11.366 6 C 11.366 8.15 10.5 8.5 10.5 8.5 L 10.5 10.5 L 14.891 12.382 C 16.144 12.919 16.075 14.201 16.5 16.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -3.6 -9.84)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-8.4, -2.16)" d="M 5.977 3.812 C 6.436 1.9419999999999997 10.693000000000001 1.8209999999999997 11.648 3.447 C 11.877396470886534 3.000515161936914 11.931611028323415 2.4844068421266057 11.8 2.0000000000000004 C 11.309000000000001 0 6.469 0 5.978000000000001 2 C 4.2170000000000005 1.634 5.149000000000001 3.1319999999999997 5.464 3.762 C 5.636382733785291 3.758131321947511 5.808608612036086 3.774917469925172 5.977000000000001 3.8120000000000007 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.5 1.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-13.5, -13.5)" d="M 10.5 10.994 C 10.50008834399173 11.793912160037907 10.97679237645014 12.516834611901405 11.712 12.832 L 14.891 14.194 C 15.763 14.567 15.991 15.312000000000001 16.197 16.5 L 16.497 16.5 C 16.072 14.2 16.141 12.919 14.888 12.382 L 10.5 10.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -8.5 1.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-3.5, -13.5)" d="M 2.109 14.194 L 5.288 12.832 C 6.023207623549861 12.516834611901405 6.499911656008271 11.793912160037907 6.5 10.994 L 6.5 10.5 L 2.109 12.382 C 0.853 12.92 0.923 14.214 0.5 16.5 L 0.8 16.5 C 1 15.317 1.236 14.568 2.109 14.194 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -5.84 -3.59)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-6.25, -8.5)" d="M 9 16.5 L 0.5 16.5 C 0.923 14.214 0.853 12.921 2.109 12.382 L 6.5 10.5 L 6.5 8.5 C 6.5 8.5 5.555 8.151 5.555 6 C 4.574 6 4.574 4 5.555 4 C 5.555 3.712 3.9109999999999996 1.5710000000000002 5.976999999999999 2 C 6.467999999999999 0 11.308 0 11.799 2 C 11.92879667372739 2.6987366209912964 11.77006317050282 3.4202525447393484 11.359 3.999999999999999 C 12.31 4 12.05 6 11.366 6 C 11.366 8.151 10.5 8.5 10.5 8.5 L 10.5 10.5 L 12 11.143" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 5.46 5.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-17.46, -17.5)" d="M 17.462 23.5 C 20.77570849898476 23.5 23.462 20.81370849898476 23.462 17.5 C 23.462 14.186291501015239 20.77570849898476 11.5 17.462 11.5 C 14.148291501015239 11.5 11.462 14.186291501015239 11.462 17.5 C 11.462 20.81370849898476 14.148291501015239 23.5 17.462 23.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.72 4.76)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16.72, -16.76)" d="M 17.462 11.5 C 14.96184705428518 11.49826896395954 12.723216325663433 13.048546004947934 11.845427017472574 15.389540169587836 C 10.967637709281718 17.73053433422774 11.635082171886873 20.370485911867558 13.520000000000001 22.013 L 21.978 13.555000000000001 C 20.841024563059104 12.248695565358721 19.193803586692194 11.499129775625772 17.461999999999996 11.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 5.37 5.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-17.46, -17.5)" d="M 17.462 23.5 C 20.77570849898476 23.5 23.462 20.81370849898476 23.462 17.5 C 23.462 14.186291501015239 20.77570849898476 11.5 17.462 11.5 C 14.148291501015239 11.5 11.462 14.186291501015239 11.462 17.5 C 11.462 20.81370849898476 14.148291501015239 23.5 17.462 23.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.62 6.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.71, -18.5)" d="M 17.462 20.5 L 17.462 17 C 17.462 16.7238576250846 17.238142374915398 16.5 16.962 16.5 L 15.962 16.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.62 2.16)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.71, -14.25)" d="M 16.709 14 C 16.847071187457697 14 16.959 14.1119288125423 16.959 14.25 C 16.959 14.388071187457697 16.847071187457697 14.5 16.709 14.5 C 16.570928812542302 14.5 16.459 14.3880711874577 16.459 14.25 C 16.459 14.1119288125423 16.570928812542302 14 16.709 14" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 5.37 8.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-17.46, -20.5)" d="M 15.959 20.5 L 18.959 20.5" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                My Information
            </a>
        </li>

        <li>
            <a href="{{ route('chatify') }}" class="{{ request()->is('chat*') ? 'active' : '' }}">
                <svg id='Messages_People_Man_Bubble_30' width='30' height='30' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='48' height='48' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.83 0 0 1.83 24 24)" >
                    <g style="" >
                    <g transform="matrix(1 0 0 1 4 -5.75)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -6.25)" d="M 9.859 9.511 C 6.06 4.746 10.974 -0.009 14.994 2 C 15.85553640817821 1.0297158861362061 17.096548738482994 0.48221044629586074 18.394 0.5000000000000004 C 24.866999999999997 0.5 25.494 10.5 18.494 10.5 C 17.95006869392637 11.37262738103503 17.019933009653794 11.930708791598574 15.994 12 C 14.942384659224176 12.01922894751782 13.97191108902584 11.436944805398818 13.494 10.5 C 12.192694595815379 10.83639323067286 10.810490403773265 10.460327220788498 9.859 9.511 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.01 -8.68)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16.01, -3.32)" d="M 16 3.5 C 19.234 3.5 22.047 4.563 23.483 6.127 C 23.6474213575329 4.684391273572628 23.18358540514768 3.2407343991260795 22.20967434812274 2.1638632028440323 C 21.2357632910978 1.0869920065619851 19.84582275024395 0.48089444448736796 18.394 0.5 C 17.096548738482994 0.48221044629586035 15.855536408178205 1.0297158861362081 14.993999999999996 2.000000000000004 C 13.579922191523758 1.3100072575469655 11.908622285367588 1.4059468328918627 10.582790047267348 2.25322182336245 C 9.256957809167108 3.1004968138330375 8.4678394385068 4.5768910618309775 8.5 6.1499999999999995 C 9.926 4.573 12.75 3.5 16 3.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -4 3.5)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(223,249,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-8, -15.5)" d="M 15.5 23.5 L 15.5 21 C 15.5 20.5 12.5 19 10 18 L 10 16 C 10 16 11 15.65 11 13.5 C 11.7 13.5 12 11.5 11.032 11.5 C 11.434808510040689 10.732327205532656 11.597846926769414 9.861395492238195 11.5 9 C 11 7 6 7 5.5 9 C 3.394 8.57 5 11.211 5 11.5 C 4 11.5 4.3 13.5 5 13.5 C 5 15.65 6 16 6 16 L 6 18 C 3.5 19 0.5 20.5 0.5 21 L 0.5 23.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -7.75 3.51)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-4.25, -15.51)" d="M 8 7.522 C 6.807 7.6290000000000004 5.720000000000001 8.122 5.5 9 C 3.394 8.57 5 11.211 5 11.5 C 4 11.5 4.3 13.5 5 13.5 C 5 15.65 6 16 6 16 L 6 18 C 3.5 19 0.5 20.5 0.5 21 L 0.5 23.5 L 8 23.5 Z" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 3.97 -5.84)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.06, -6.25)" d="M 13.494 10.5 C 13.97191108902584 11.436944805398818 14.942384659224176 12.01922894751782 15.994 12 C 17.019933009653794 11.930708791598576 17.95006869392637 11.37262738103503 18.494 10.5 C 25.494 10.5 24.867 0.5 18.394 0.5 C 17.096548738482994 0.48221044629586035 15.855536408178205 1.0297158861362081 14.993999999999996 2.000000000000004 C 13.767807504544173 1.4018959814106071 12.33733073421773 1.3884075488558991 11.100077832933454 1.9632829364214182 C 9.862824931649179 2.538158323986937 8.95063793701295 3.640138639179942 8.617 4.9630000000000045" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 -4.09 3.41)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-8, -15.5)" d="M 15.5 23.5 L 15.5 21 C 15.5 20.5 12.5 19 10 18 L 10 16 C 10 16 11 15.65 11 13.5 C 11.7 13.5 12 11.5 11.032 11.5 C 11.434808510040689 10.732327205532656 11.597846926769414 9.861395492238195 11.5 9 C 11 7 6 7 5.5 9 C 3.394 8.57 5 11.211 5 11.5 C 4 11.5 4.3 13.5 5 13.5 C 5 15.65 6 16 6 16 L 6 18 C 3.5 19 0.5 20.5 0.5 21 L 0.5 23.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.91 2.91)" >
                    <circle style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: rgb(159,234,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="1" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.66 -6.09)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.53 -6.22)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.63, -5.88)" d="M 13.5 5.75 C 13.6380711874577 5.75 13.75 5.861928812542302 13.75 6" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 -6.34)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.28 -6.22)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.38, -5.88)" d="M 13.25 6 C 13.25 5.861928812542302 13.3619288125423 5.75 13.5 5.75" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.16 -6.09)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.28 -5.97)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.38, -6.13)" d="M 13.5 6.25 C 13.3619288125423 6.25 13.25 6.138071187457698 13.25 6" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 -5.84)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.53 -5.97)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.63, -6.13)" d="M 13.75 6 C 13.75 6.138071187457698 13.6380711874577 6.25 13.5 6.25" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.66 -6.09)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.53 -6.22)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.63, -5.88)" d="M 16.5 5.75 C 16.638071187457697 5.75 16.75 5.861928812542302 16.75 6" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.41 -6.34)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.28 -6.22)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.38, -5.88)" d="M 16.25 6 C 16.25 5.861928812542302 16.361928812542303 5.75 16.5 5.75" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.16 -6.09)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.28 -5.97)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.38, -6.13)" d="M 16.5 6.25 C 16.361928812542303 6.25 16.25 6.138071187457698 16.25 6" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.41 -5.84)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 4.53 -5.97)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.63, -6.13)" d="M 16.75 6 C 16.75 6.138071187457698 16.638071187457697 6.25 16.5 6.25" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.66 -6.09)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.53 -6.22)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-19.63, -5.88)" d="M 19.5 5.75 C 19.638071187457697 5.75 19.75 5.861928812542302 19.75 6" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.41 -6.34)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.28 -6.22)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-19.37, -5.87)" d="M 19.25 6 C 19.24973285123923 5.93361434032255 19.27598626511866 5.869870525559595 19.322928395339126 5.822928395339127 C 19.369870525559595 5.77598626511866 19.43361434032255 5.749732851239228 19.5 5.75" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.16 -6.09)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.28 -5.97)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-19.37, -6.13)" d="M 19.5 6.25 C 19.43361434032255 6.250267148760772 19.369870525559595 6.22401373488134 19.322928395339126 6.177071604660873 C 19.27598626511866 6.130129474440406 19.24973285123923 6.06638565967745 19.25 6" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.41 -5.84)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 7.53 -5.97)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-19.63, -6.13)" d="M 19.75 6 C 19.75 6.138071187457698 19.638071187457697 6.25 19.5 6.25" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.66 4.41)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.53 4.28)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.63, -16.38)" d="M 13.5 16.25 C 13.6380711874577 16.25 13.75 16.361928812542303 13.75 16.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 4.16)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.28 4.28)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.38, -16.38)" d="M 13.25 16.5 C 13.25 16.361928812542303 13.3619288125423 16.25 13.5 16.25" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.16 4.41)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.28 4.53)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.38, -16.63)" d="M 13.5 16.75 C 13.3619288125423 16.75 13.25 16.638071187457697 13.25 16.5" stroke-linecap="round" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.41 4.66)" >
                    <line style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="0" y1="0" x2="0" y2="0" />
                    </g>
                    <g transform="matrix(1 0 0 1 1.53 4.53)" >
                    <path style="stroke: rgb(0,48,62); stroke-width: 0.819672131147541; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-13.63, -16.63)" d="M 13.75 16.5 C 13.75 16.638071187457697 13.6380711874577 16.75 13.5 16.75" stroke-linecap="round" />
                    </g>
                    </g>
                    </g>
                </svg>
                Chat
            </a>
        </li>

        {{-- Uncomment if needed in the future
        <li>
            <a href="#">
                <svg>...icon...</svg>
                Payment Status
            </a>
        </li>
        <li>
            <a href="#">
                <svg>...icon...</svg>
                Delivery Status
            </a>
        </li>
        --}}
    </ul>
@endif

</div>