<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">  
            {{ __('Order Laundry Service List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h2 class="text-2xl font-bold">
            @if(request('action') == 'update')
                {{ __('Update Service') }}
            @elseif(request('action') == 'delete')
                {{ __('Delete Service') }}
            @endif
        </h2>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-error mb-4">
                    {{ session('error') }}
                </div>
            @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
              <div class="mb-4 flex justify-between">
                    <h3 class="text-lg font-semibold">Order List</h3>
                    <!-- <a href="{{ route('services.create') }}" class="btn btn-primary">Add New Service</a> -->
              </div>


    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
                <div class="overflow-x-auto">
                  <!-- @if(session('message'))
                    <div class="alert alert-success">
                      {{ session('message') }}
                    </div>
                  @endif -->
                    <table class="table-auto w-full border-collapse border border-gray-300">
                      <!-- head -->
                      <thead>
                        <tr class="bg-gray-100">
                          <th class="border border-gray-300 px-4 py-2">Customer Name</th>
                          <th class="border border-gray-300 px-4 py-2">Service Name</th>
                          <th class="border border-gray-300 px-4 py-2">Details service</th>
                          <th class="border border-gray-300 px-4 py-2">Quantity Bag</th>
                          <th class="border border-gray-300 px-4 py-2">Pickup Time</th>
                          <th class="border border-gray-300 px-4 py-2">Pickup Date</th>
                          <th class="border border-gray-300 px-4 py-2">Delivery Time</th>
                          <th class="border border-gray-300 px-4 py-2">Total Price</th>
                          <th class="border border-gray-300 px-4 py-2">Status</th>
                          <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        {{-- @foreach ($rooms as $room) --}}
                        @foreach ($roomReservations as $index => $reservation)
                            <tr>
                                {{-- <th>{{ $loop->iteration }}</th> --}}
                                <th>{{ $roomReservations->firstItem() + $index }}</th>
                                <td>{{ $reservation->room->name }}</td>
                                <td>{{ $reservation->start_date }}</td>
                                <td>{{ $reservation->end_date }}</td>
                                <td>{{ $reservation->status }}</td>
                                <td>
                                  <form action="{{ route('roomreservations.updateStatus', $reservation->id) }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <select name="status" onchange="this.form.submit()" class="select w-full max-w-xs">
                                          <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                          <option value="approved" {{ $reservation->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                          <option value="rejected" {{ $reservation->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                      </select>
                                  </form>
                              </td>
                            </tr> 
                        @endforeach
                      </tbody>
                    </table>
                    {{ $roomReservations->links() }}
                  </div>
            </div>
        </div>
    </div>


</x-app-layout>