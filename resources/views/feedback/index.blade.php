<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Feedback Management') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert-box bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer close-alert">
                        &times;
                    </span>
                </div>
            @endif

            <div class="bg-white rounded-lg">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-[#164272]">Feedback List</h3>
                </div>

                <form method="GET" action="{{ route('feedback.index') }}" class="flex flex-wrap gap-4 pb-4">
                    <input type="text" name="reference_number" placeholder="Reference Number"
                        value="{{ request('reference_number') }}"
                        class="border border-gray-300 rounded px-3 py-1 text-sm text-gray-800">

                    <select name="month" class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[150px] text-gray-800">
                        <option value="">-- Month --</option>
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                            </option>
                        @endforeach
                    </select>

                    <select name="year" class="border border-gray-300 rounded px-2 py-1 text-sm min-w-[150px] text-gray-800">
                        <option value="">-- Year --</option>
                        @for ($y = now()->year; $y >= now()->year - 5; $y--)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>

                    <button type="submit" class="bg-[#ffd65b] hover:bg-[#164272] text-[#164272] hover:text-white px-4 py-1 rounded">
                        Filter
                    </button>

                    <a href="{{ route('feedback.index') }}" class="text-sm underline mt-1 text-[#164272]">Reset</a>
                </form>

                <div class="overflow-x-auto">
                    @if($feedbacks->isEmpty())
                        <p class="text-gray-600">No feedback found.</p>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-[#164272] text-white">
                                    <th class="border px-4 py-2">Customer</th>
                                    <th class="border px-4 py-2">Order</th>
                                    <th class="border px-4 py-2">Content</th>
                                    <th class="border px-4 py-2">Date</th>
                                    <th class="border px-4 py-2">Rating</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $feedback)
                                    <tr class="text-gray-800">
                                        <td class="border px-4 py-2">{{ $feedback->user->name }}</td>
                                        <td class="border px-4 py-2 text-nowrap"><a class="underline" href="{{ route('feedback.order.show', $feedback->order->id) }}">#{{ $feedback->order->reference_number ?? $feedback->order->id }}</a></td>
                                        <td class="border px-4 py-2">{{ $feedback->feedback_content }}</td>
                                        <td class="border px-4 py-2 text-nowrap">{{ \Carbon\Carbon::parse($feedback->feedback_date)->format('M d, Y') }}</td>
                                        <td class="border px-4 py-2">{{ $feedback->rating }} <i class="fa-solid fa-star text-yellow-400"></i></td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button style="display: flex; align-items: center; gap: 8px; background-color: red; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $feedbacks->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).on('click', '.close-alert', function () {
            $(this).closest('.alert-box').fadeOut();
        });
    </script>
    @endpush
</x-app-layout>
