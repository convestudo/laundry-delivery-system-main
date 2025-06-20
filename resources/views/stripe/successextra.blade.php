<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .banner-img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
        }

        @keyframes pulse-success {
            0% { transform: scale(1); }
            50% { transform: scale(1.15); }
            100% { transform: scale(1); }
        }

        .animate-bounce {
            animation: pulse-success 1.2s infinite;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-start items-center">

    <!-- Banner -->
    <div class="w-full">
        <img src="{{ asset('assets/images/banner.png') }}" alt="Laundry Banner" class="banner-img">
    </div>

    <!-- Content -->
    <div class="bg-white p-8 mt-6 rounded shadow text-center w-[90%] max-w-md">
        <h1 class="text-2xl font-bold text-green-600 mb-4 animate-bounce">
            Payment Successful!
        </h1>
        <p class="text-gray-700 mb-4">Thank you for your payment.</p>

        <a href="{{ route('/') }}"
           class="inline-block mb-2 px-4 py-2 bg-[#164272] hover:bg-[#0e2b4c] text-white rounded w-full">
            Back to Home
        </a>
    </div>

    <!-- SweetAlert with Audio -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: "Payment Successful!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    const audio = new Audio("{{ asset('mp3/ttsmaker-file-2025-6-19-16-28-13.mp3') }}");
                    audio.play().catch(err => console.log("Playback error:", err));
                }
            });
        });
    </script>

</body>
</html>
