<!-- resources/views/components/sidebar.blade.php -->
@php
    if(auth()->user()->role === 'customer'){
        $sidebar = 'd-none';
    }else{
        $sidebar = 'w-50 md:col-span-2 p-4';
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
    <ul class="menu bg-white rounded-box p-4">
        <h2 class="menu-title text-[#164272] text-lg mb-4 font-semibold">Menu</h2>

        {{-- Dashboard --}}
        <li class="mb-[2px]">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('dashboard') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M3 4h18v10H3z" />
                    <path d="M7 20h10" /><path d="M9 16v4" /><path d="M15 16v4" />
                    <path d="M8 12l3-3 2 2 3-3" />
                </svg>
                Dashboard
            </a>
        </li>

        {{-- Orders --}}
        <li class="mb-0">
            <a href="{{ route('orders.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('orders.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-list"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                Orders List
            </a>
        </li>

        {{-- Services --}}
        <li class="mb-[2px]">
            <a href="{{ route('services.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('services.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="35"  height="35"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-wash-machine"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M12 14m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 6h.01" /><path d="M11 6h.01" /><path d="M14 6h2" /><path d="M8 14c1.333 -.667 2.667 -.667 4 0c1.333 .667 2.667 .667 4 0" /></svg>
                Service Management
            </a>
        </li>

        {{-- Vouchers --}}
        <li class="mb-[2px]">
            <a href="{{ route('vouchers.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('vouchers.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg class="w-9 h-9" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M3 5h18v14H3z" /><path d="M7 9l2 6 2-6" /><circle cx="15.5" cy="12" r="1.5" />
                </svg>
                Voucher Management
            </a>
        </li>

        {{-- Extra Charges --}}
        <li>
            <a href="{{ route('extra_charges.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('extra_charges.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5" /><path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4" /></svg>
                Extra Charges
            </a>
        </li>

        {{-- Membership --}}
        <li>
            <a href="{{ route('memberships.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('memberships.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="38"  height="36"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                Membership Management
            </a>
        </li>

        {{-- Delivery --}}
        <li class="mb-[2px]">
            <a href="{{ route('delivery.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('delivery.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="35"  height="35"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" /><path d="M3 9l4 0" /></svg>
                Delivery Management
            </a>
        </li>

        {{-- Feedback --}}
        <li class="mb-[2px]">
            <a href="{{ route('feedback.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('feedback.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="36"  height="36"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-stars"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17.8 19.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /><path d="M6.2 19.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /><path d="M12 9.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /></svg>
                Feedback Management
            </a>
        </li>

        {{-- Logs --}}
        <li>
            <a href="{{ route('logs.index') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('logs.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="29"  height="29"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-login"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M21 12h-13l3 -3" /><path d="M11 15l-3 -3" /></svg>
                Logs
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
        {{-- Dashboard --}}
        <li class="mb-[2px]">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
               {{ request()->routeIs('dashboard') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M3 4h18v10H3z" />
                    <path d="M7 20h10" /><path d="M9 16v4" /><path d="M15 16v4" />
                    <path d="M8 12l3-3 2 2 3-3" />
                </svg>
                Dashboard
            </a>
        </li>

        <li class="mb-[2px]">
        <a href="{{ route('deliver.order.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
        {{ request()->routeIs('deliver.order.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M6 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M17 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
            </svg>
            My Orders
        </a>
    </li>

    <li class="mb-[2px]">
        <a href="{{ route('deliver.myinfo.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
        {{ request()->routeIs('deliver.myinfo.index') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-info-octagon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0z" /><path d="M12 9h.01" /><path d="M11 12h1v4h1" /></svg>
            My Information
        </a>
    </li>

    <li class="mb-[2px]">
        <a href="{{ route('chatify') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md transition-all duration-150
        {{ request()->is('chat*') ? 'bg-[#f0f4f9] font-semibold text-[#164272]' : 'text-black hover:bg-gray-100' }}">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="black"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-chatbot"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /><path d="M9.5 9h.01" /><path d="M14.5 9h.01" /><path d="M9.5 13a3.5 3.5 0 0 0 5 0" /></svg>
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

