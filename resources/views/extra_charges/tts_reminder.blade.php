<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Extra Charge Reminder') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-2xl mx-auto px-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-[#164272] mb-4">Reminder Extra Charge</h3>
            <p class="text-gray-800 mb-4">
                You are required to pay an additional charge of <strong>RM {{ number_format($charge->extra_charge, 2) }}</strong>
                for the <strong>{{ $charge->service_name }}</strong> service.
            </p>

            <a href="{{ route('customer.payment.page', $charge->id) }}" class="btn bg-[#ffd65b] text-[#164272] font-bold px-5 py-3 rounded-md hover:bg-[#164272] hover:text-white transition">
                Pay Now
            </a>
        </div>
    </div>

    <script>
        window.onload = function () {
            const message = "Reminder. Extra Charge. Please pay now!";
            const utterance = new SpeechSynthesisUtterance(message);
            utterance.lang = 'en-GB';
            speechSynthesis.speak(utterance);
        };
    </script>
</x-app-layout>
