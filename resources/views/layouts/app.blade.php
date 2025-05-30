<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @if(auth()->user()->role === 'customer')
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-[#164272] shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @if(auth()->user()->role === 'customer')


                <div>
                    <!-- Main Content Layout with Sidebar -->
                    <div class="grid grid-cols-12">
                        <!-- Sidebar Component (e.g., col-2) -->
                        <x-sidebar/>
                        <!-- Main Content (e.g., col-10) -->
                        <div class="col-span-12">
                            <!-- 10-column wide content -->
                            <div class="bg-white overflow-hidden">
                                <main>
                                    {{ $slot }}
                                </main>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <div class="text-center text-gray-500">
                            &copy; {{ date('Y') }} Royal Doby. All rights reserved.
                        </div>
                    </div>
                </div>


            @else

                <div class="max-w-7xl mx-auto py-5">
                    <!-- Main Content Layout with Sidebar -->
                    <div class="grid grid-cols-12 gap-4">
                        <!-- Sidebar Component (e.g., col-2) -->
                        <x-sidebar/>
                        <!-- Main Content (e.g., col-10) -->
                        <div class="col-span-12 md:col-span-10 py-4 px-4 md:px-0">
                            <!-- 10-column wide content -->
                            <div class="bg-white overflow-hidden shadow-sm rounded-box">
                                <main>
                                    {{ $slot }}
                                </main>
                            </div>
                        </div>
                    </div>
                </div>

            @endif


        </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        @stack('scripts')

        @stack('modals')
        @livewireScripts
        <!-- Add Alpine.js here -->
        <script src="//unpkg.com/alpinejs" defer></script>

    </body>
</html>
