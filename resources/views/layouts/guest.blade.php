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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Static Background Image Styling -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: url('{{ asset('assets/images/gif6.gif') }}') no-repeat top right;
            background-size: 2100px 800px;
            background-color: #f7f7f7;
        }

        @media (max-width: 1024px) {
            body {
                background-size: 350px 450px;
            }
        }

        @media (max-width: 640px) {
            body {
                background-size: 250px 350px;
                background-position: bottom right;
            }
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="h-screen flex items-center justify-center px-4">
        <div class="w-full sm:max-w-md bg-white bg-opacity-80 px-6 py-6 shadow-50 rounded-lg">
            <div class="flex justify-center mb-4">
                <a href="/">
                    <img src="{{ asset('assets/images/logo 2.png') }}" alt="Logo" style="width: 150px; height: auto;">
                </a>
            </div>

            <!-- Form Content -->
            {{ $slot }}
        </div>
    </div>
</body>
</html>
