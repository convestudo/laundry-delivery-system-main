<x-modal name="help-question" maxWidth="lg" focusable>
    <div class="p-6 relative">
        <!-- Close X Button -->

        <button x-on:click="$dispatch('close-modal', 'help-question')"
                class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">Prepare Laundry in Your Own Bags</h2>
        <p class="text-gray-700">Prepare your own laundry bags, and choose your laundry service and bag size. You can add more bags to your order.</p>

        <div class="mt-6 text-right">
            <button x-on:click="$dispatch('close-modal', 'help-question')"
                    class="bg-[#ffd65b] text-[#164272] text-[14px] font-semibold px-3 py-2 rounded hover:bg-yellow-400 cursor-pointer">
                Dismiss
            </button>
        </div>
    </div>
</x-modal>


<x-modal name="step-question" maxWidth="lg" focusable>
    <div class="p-6 relative">
        <!-- Close X Button -->

        <button x-on:click="$dispatch('close-modal', 'step-question')"
                class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">Prepare Laundry in Your Own Bags</h2>
        <p class="text-gray-700">Select the appropriate laundry service that best fit your needs.</p>

        <div class="mt-6 text-right">
            <button x-on:click="$dispatch('close-modal', 'step-question')"
                    class="bg-[#ffd65b] text-[#164272] text-[14px] font-semibold px-3 py-2 rounded hover:bg-yellow-400 cursor-pointer">
                Dismiss
            </button>
        </div>
    </div>
</x-modal>

<x-modal name="bagsize-question" maxWidth="lg" focusable>
    <div class="p-6 relative">
        <!-- Close X Button -->

        <button x-on:click="$dispatch('close-modal', 'bagsize-question')"
                class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">Choose the Correct Bag Size</h2>
        <p class="text-gray-700">We offer 3 different bag sizes that caters to most customer needs. Choose the correct bag size to avoid potential order issues.</p>

        <div class="mt-6 text-right">
            <button x-on:click="$dispatch('close-modal', 'bagsize-question')"
                    class="bg-[#ffd65b] text-[#164272] text-[14px] font-semibold px-3 py-2 rounded hover:bg-yellow-400 cursor-pointer">
                Dismiss
            </button>
        </div>
    </div>
</x-modal>


<x-modal name="piece-question" maxWidth="lg" focusable>
    <div class="p-6 relative">
        <!-- Close X Button -->

        <button x-on:click="$dispatch('close-modal', 'piece-question')"
                class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">By Clothing Pieces Only</h2>
        <p class="text-gray-700">Our Wash, Dry, Steam & Hang laundry service goes by individual clothing pieces only to ensure quality results.</p>

        <div class="mt-6 text-right">
            <button x-on:click="$dispatch('close-modal', 'piece-question')"
                    class="bg-[#ffd65b] text-[#164272] text-[14px] font-semibold px-3 py-2 rounded hover:bg-yellow-400 cursor-pointer">
                Dismiss
            </button>
        </div>
    </div>
</x-modal>

<x-modal name="schedule-question" maxWidth="lg" focusable>
    <div class="p-6 relative">
        <!-- Close X Button -->

        <button x-on:click="$dispatch('close-modal', 'schedule-question')"
                class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">Schedule Pickup & Return Time</h2>
        <p class="text-gray-700">Select the appropriate timing that works for you. We offer same day Pickup & Delivery (subjected to Terms).</p>

        <div class="mt-6 text-right">
            <button x-on:click="$dispatch('close-modal', 'schedule-question')"
                    class="bg-[#ffd65b] text-[#164272] text-[14px] font-semibold px-3 py-2 rounded hover:bg-yellow-400 cursor-pointer">
                Dismiss
            </button>
        </div>
    </div>
</x-modal>

<x-modal name="address-question" maxWidth="lg" focusable>
    <div class="p-6 relative">
        <!-- Close X Button -->

        <button x-on:click="$dispatch('close-modal', 'address-question')"
                class="cursor-pointer text-[16px] bg-gray-100 flex items-center justify-center w-[30px] h-[30px] rounded-full absolute top-3 right-5 text-gray-500 text-2xl font-bold focus:outline-none">
                <i class="fas fa-times"></i>
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#164272] mt-4">Start Checking your Addresses</h2>
        <p class="text-gray-700">We'll need your Pickup and Delivery addresses to ensure both locations are covered by dobiQueen. Ensure the addresses provided are accurate to avoid potential order issues.</p>

        <div class="mt-6 text-right">
            <button x-on:click="$dispatch('close-modal', 'address-question')"
                    class="bg-[#ffd65b] text-[#164272] text-[14px] font-semibold px-3 py-2 rounded hover:bg-yellow-400 cursor-pointer">
                Dismiss
            </button>
        </div>
    </div>
</x-modal>



