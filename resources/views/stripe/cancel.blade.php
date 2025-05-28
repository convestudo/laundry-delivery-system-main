<!-- {{-- filepath: resources/views/stripe/cancel.blade.php --}}
<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow text-center">
            <h1 class="text-2xl font-bold text-red-600 mb-4">Payment Cancelled</h1>
            <p class="text-gray-700">Your payment was cancelled. Please try again or contact support.</p>
            <a href="{{ route('dashboard') }}" class="mt-6 inline-block px-4 py-2 bg-[#164272] text-white rounded">Back to Home</a>
        </div>
    </div>
</x-app-layout> -->

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