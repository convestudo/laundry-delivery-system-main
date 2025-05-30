<nav x-data="{ open: false }" class="bg-[#ffd65b] border-b border-[#ffd65b]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex basis-2/12">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/images/logo 2.png') }}" alt="Logo" style="width: 60px; height: auto;">
                    </a>
                </div>
            </div>

            @if(auth()->user()->role === 'customer')
                <div class="gap-6 items-center hidden md:flex basis-8/12 justify-center">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Home</a>
                    <a href="{{ route('services-list.index') }}" class="{{ request()->routeIs('services-list.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Services Info</a>
                    <a href="{{ route('vouchers-list.index') }}" class="{{ request()->routeIs('vouchers-list.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Vouchers</a>
                    <a href="{{ route('customer-booking.index') }}" class="{{ request()->routeIs('customer-booking.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Book Now</a>
                    <a href="{{ route('history.index') }}" class="{{ request()->routeIs('history.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">My Bookings</a>
                    <a href="{{ route('chatify') }}" class="{{ request()->is('chat*') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Chat</a>
                </div>
            @endif

            <!-- <div class="hidden md:flex items-center ms-6 basis-2/12 justify-end">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#164272] focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div> -->

            <!-- Replace your <x-dropdown> ... </x-dropdown> block with this: -->
<div x-data="{ open: false }" class="relative ms-6 basis-2/12 flex items-center justify-end">
    <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#164272] focus:outline-none transition ease-in-out duration-150">
        <div>{{ Auth::user()->name }}</div>
        <div class="ms-1">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
    </button>
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow z-50"
         x-transition>
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
        </form>
    </div>
</div>

            <div class="flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="md:hidden">
        @if(auth()->user()->role === 'customer')
            <div class="px-4 flex flex-col gap-6 py-4">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-gray-900' : 'text-gray-500' }} font-semibold">Home</a>
                <a href="{{ route('services-list.index') }}" class="{{ request()->routeIs('services-list.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Services Info</a>
                <a href="{{ route('vouchers-list.index') }}" class="{{ request()->routeIs('vouchers-list.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Vouchers</a>
                <a href="{{ route('customer-booking.index') }}" class="{{ request()->routeIs('customer-booking.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Book Now</a>
                <a href="{{ route('history.index') }}" class="{{ request()->routeIs('history.index') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">My Bookings</a>
                <!-- <a href="{{ route('chatify') }}" class="{{ request()->is('chat*') ? 'text-[#164272]' : 'text-gray-500' }} font-semibold">Chat</a> -->

                <li class="relative">
                    <a href="{{ route('chatify') }}" class="chat-link">
                        Chat
                        <span id="chat-badge" class="absolute top-0 right-0 bg-red-600 text-white text-xs font-bold px-1.5 rounded-full hidden">0</span>
                    </a>
                </li>

            </div>
        @endif

        <div class="pt-4 pb-1 border-t border-[#164272]">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
