<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Set the page title -->
    <title>{{ config('app.name', 'RoyalDoby') }}</title>

    <!-- Favicon (Icon on Browser Tab) -->
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon" sizes="45x45">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @if(auth()->user()->role === 'customer')
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #background-container {
            transition: background-color 1s ease;
        }
    </style>
</head>
<body class="font-sans antialiased">

    <!-- Background container with dynamic or static background depending on role -->
    <div id="background-container" class="min-h-screen {{ auth()->user()->role === 'customer' ? 'bg-white' : '' }}">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-[#164272] shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Main Layout -->
        <div class="w-full">
            <div class="grid grid-cols-12 min-h-screen">
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'DeliveryDriver')
                    <!-- Sidebar -->
                    <div class="col-span-12 md:col-span-2 p-4">
                        <div class="bg-white shadow-md rounded-xl p-4">
                            <x-sidebar/>
                        </div>
                    </div>

                    <!-- Main Content for Admin/Driver -->
                    <div class="col-span-12 md:col-span-10 px-4 py-6">
                        <div class="bg-white min-h-screen w-full overflow-hidden shadow-sm rounded-lg p-6">
                            <main>
                                {{ $slot }}
                            </main>
                        </div>
                    </div>
                @else
                    <!-- Customer View (no background effect) -->
                    <div class="col-span-12 p-0 m-0">
                        <main class="w-screen min-h-screen p-0 m-0 bg-white">
                            {{ $slot }}
                        </main>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="w-full py-4 px-4 sm:px-6 lg:px-8 flex justify-center items-center">
                <div class="text-center text-gray-500">
                    &copy; {{ date('Y') }} Royal Doby. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @stack('scripts')
    @stack('modals')
    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Background Color Animation (Admins and Drivers only) -->
    @if(auth()->user()->role !== 'customer')
    <script>
        const bgContainer = document.getElementById('background-container');
        const colors = ['#FFF9DB', '#D6F0FF'];
        let index = 0;

        function changeBackgroundColor() {
            bgContainer.style.backgroundColor = colors[index];
            index = (index + 1) % colors.length;
        }

        changeBackgroundColor(); // Initial background
        setInterval(changeBackgroundColor, 5000); // Every 5 seconds
    </script>
    @endif

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>