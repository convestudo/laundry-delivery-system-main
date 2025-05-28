{{-- filepath: resources/views/stripe/success.blade.php --}}
<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow text-center">
            <h1 class="text-2xl font-bold text-green-600 mb-4 transition-transform duration-500 ease-in-out animate-bounce"
                style="animation: pulse-success 1.2s infinite;">
                Payment Successful!
            </h1>
            <p class="text-gray-700">Thank you for your payment. Your laundry order has been received.</p>
            <a href="{{ route('dashboard') }}" class="mt-6 inline-block px-4 py-2 bg-[#164272] text-white rounded">Back to Home</a>
                <div>
                    <a href="{{ route('history.index') }}" class="mt-6 inline-block px-4 py-2 bg-[#164272] text-white rounded">My Booking</a>
                </div>
        </div>
    </div>
    <style>
        @keyframes pulse-success {
            0% { transform: scale(1);}
            50% { transform: scale(1.15);}
            100% { transform: scale(1);}
        }
        .animate-bounce {
            animation: pulse-success 1.2s infinite;
        }
    </style>
</x-app-layout>