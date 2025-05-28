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
    @if(auth()->user()->role === 'admin')
        <ul class="menu bg-white rounded-box w-50">
            <h2 class="menu-title text-[#164272]">Menu</h2>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('orders.index') }}" class="{{ request()->routeIs('orders.index') ? 'active' : '' }}">Orders List</a></li>
            <li><a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.index') ? 'active' : '' }}">Service Management</a></li>
            <li><a href="{{ route('vouchers.index') }}" class="{{ request()->routeIs('vouchers.index') ? 'active' : '' }}">Voucher Management</a></li>
            <li><a href="{{ route('memberships.index') }}" class="{{ request()->routeIs('memberships.index') ? 'active' : '' }}">Customer Management</a></li>
            <li><a href="{{ route('delivery.index') }}" class="{{ request()->routeIs('delivery.index') ? 'active' : '' }}">Delivery Driver Management</a></li>
            <li><a href="{{ route('feedback.index') }}" class="{{ request()->routeIs('feedback.index') ? 'active' : '' }}">Feedback Customer List</a></li>
            <li><a href="{{ route('logs.index') }}" class="{{ request()->routeIs('logs.index') ? 'active' : '' }}">Logs List</a></li>
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
    @if(auth()->user()->role === 'DeliveryDriver')
        <ul class="menu bg-white rounded-box w-50">
            <h2 class="menu-title text-[#164272]">Menu</h2>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('deliver.order.index') }}" class="{{ request()->routeIs('deliver.order.index') ? 'active' : '' }}">My Orders</a></li>
            <li><a href="{{ route('deliver.myinfo.index') }}" class="{{ request()->routeIs('deliver.myinfo.index') ? 'active' : '' }}">My Information</a></li>
            <li><a href="{{ route('chatify') }}" class="{{ request()->is('chat*') ? 'active' : '' }}">Chat</a>

            {{-- <li><a href="">Payment Status</a></li>
            <li><a href="">Delivery Status</a></li> --}}
        </ul>
    @endif
</div>