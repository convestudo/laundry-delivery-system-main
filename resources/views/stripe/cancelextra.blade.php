<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Cancelled</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fef2f2;
        }

        @keyframes pulse-cancel {
            0% { transform: scale(1); }
            50% { transform: scale(1.15); }
            100% { transform: scale(1); }
        }

        .animate-bounce {
            animation: pulse-cancel 1.2s infinite;
        }
    </style>
</head>
<body class="bg-[#fef2f2] min-h-screen flex flex-col items-center justify-center px-4">

    <div class="bg-white p-8 rounded shadow text-center w-full max-w-md">
        <h1 class="text-2xl font-bold text-red-600 mb-4 animate-bounce">
            Payment Cancelled
        </h1>
        <p class="text-gray-700 mb-4">Your payment was cancelled. Please try again.</p>

        <a href="{{ route('/') }}"
           class="inline-block px-4 py-2 bg-[#164272] hover:bg-[#0e2b4c] text-white rounded w-full">
            Back to Home
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: "Payment Cancelled",
                icon: "warning",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    const audio = new Audio("{{ asset('mp3/ttsmaker-file-2025-6-19-16-29-23.mp3') }}");
                    audio.play().catch(err => console.log("Playback error:", err));
                }
            });
        });
    </script>

</body>
</html>
