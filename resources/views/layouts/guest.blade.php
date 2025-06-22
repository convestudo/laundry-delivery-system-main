<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RoyalDoby') }}</title>

    <!-- Favicon (Icon on Browser Tab) -->
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon" sizes="45x45">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f7f7f7;
            background-image: url('{{ asset('assets/images/gif6.gif') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        @media (max-width: 1024px) {
            body {
                background-size: contain;
                background-position: top center;
                background-attachment: scroll;
            }
        }

        @media (max-width: 768px) {
            body {
                background-size: 100% auto;
                background-position: top center;
            }
        }

        @media (max-width: 480px) {
            body {
                background-size: cover;
                background-position: bottom right;
            }

            .form-container {
                padding: 1.25rem !important;
            }

            .logo-img {
                width: 120px !important;
            }
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md bg-white bg-opacity-90 px-6 py-6 shadow-2xl rounded-xl form-container">
            <div class="flex justify-center mb-4">
                <a href="/">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo-img" style="width: 150px; height: auto;">
                </a>
            </div>

            <!-- Form Content -->
            {{ $slot }}
        </div>
    </div>
</body>
</html>
