{{-- filepath: resources/views/stripe/cancel.blade.php --}}
<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow text-center">
            <h1 
                class="text-2xl font-bold text-red-600 mb-4 transition-transform duration-500 ease-in-out animate-bounce"
                style="animation: pulse-cancel 1.2s infinite;">
                Payment Cancelled
            </h1>
            <p class="text-gray-700">Your payment was cancelled. Please try again or contact support.</p>
            <a href="{{ route('dashboard') }}" class="mt-6 inline-block px-4 py-2 bg-[#164272] text-white rounded">Back to Home</a>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: "Payment Cancelled",
                text: "Click OK to hear the cancellation message.",
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

    <style>
        @keyframes pulse-cancel {
            0% { transform: scale(1);}
            50% { transform: scale(1.15);}
            100% { transform: scale(1);}
        }
        .animate-bounce {
            animation: pulse-cancel 1.2s infinite;
        }
    </style>
</x-app-layout>
