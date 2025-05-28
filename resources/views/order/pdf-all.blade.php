<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>All Orders</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; }
        img { width: 80px; height: auto; }
        h3 { margin-bottom: 5px; color: #333; }
        .success { color: green; }
        .bordered-card { border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Orders</h2>

    @foreach ($orders as $order)
        <div class="bordered-card">
            <h3>Reference #: {{ $order->reference_number }}</h3>
            <p><strong>Pickup:</strong> {{ \Carbon\Carbon::parse($order->pickup_date)->format('M d, Y') }}
                {{ \Carbon\Carbon::parse($order->pickup_time_start)->format('g:i A') }} -
                {{ \Carbon\Carbon::parse($order->pickup_time_end)->format('g:i A') }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>

            <p>
                <strong>Status:</strong>
                @if(ucfirst($order->order_status) === 'Completed')
                    <span class="success">{{ ucfirst($order->order_status) }}</span>
                @else
                    {{ ucfirst($order->order_status) }}
                @endif
            </p>
            <p><strong>Total:</strong> RM {{ number_format($order->total_amount, 2) }}</p>

            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Service</th>
                        <th>Bag Size</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal = $order->orderedServices->sum(function($item) {
                            return $item->qty * $item->price;
                        });
                        $deliveryFee = $order->delivery_fee ?? 0;
                        $total = $subtotal + $deliveryFee;
                    @endphp

                    @foreach ($order->orderedServices as $item)
                        <tr>
                            <td>
                                @if($item->service && $item->service->service_img)
                                    <img src="{{ public_path('storage/' . $item->service->service_img) }}" alt="Service Image">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $item->service->service_name ?? '-' }}</td>
                            <td>{{ $item->selectedBagDetail->bag_size ?? '-' }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>RM {{ number_format($item->price, 2) }}</td>
                            <td>RM {{ number_format($item->price * $item->qty, 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="5" style="text-align: right;"><strong>Subtotal:</strong></td>
                        <td>RM {{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;"><strong>Delivery Fee:</strong></td>
                        <td>RM {{ number_format($deliveryFee, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                        <td><strong>RM {{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>

            {{-- Customer Details --}}
            @if($order->customer)
            <div style="margin-top: 10px;">
                <table style="width: 100%; border: 1px solid #ccc; border-radius: 8px;">
                    <thead>
                        <tr><th style="background-color: #f0f0f0; padding: 6px;">Customer Details</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p><strong>Name:</strong> {{ $order->customer->name ?? '-' }}</p>
                                <p><strong>Email:</strong> {{ $order->customer->email ?? '-' }}</p>
                                <p><strong>Phone Number:</strong> {{ $order->customer->phone_number ?? '-' }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

            {{-- Driver Details --}}
            @if($order->driver)
            <div style="margin-top: 10px;">
                <table style="width: 100%; border: 1px solid #ccc; border-radius: 8px;">
                    <thead>
                        <tr><th colspan="2" style="background-color: #f0f0f0; padding: 6px;">Driver Details</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 120px; padding: 10px;">
                                <img src="{{ public_path('storage/' . $order->driver->delivery->driver_img) }}" width="100" style="border-radius: 8px; border: 1px solid #ccc;" alt="Driver Photo">
                            </td>
                            <td style="padding: 10px;">
                                <p><strong>Driver Name:</strong> {{ $order->driver->name ?? '-' }}</p>
                                <p><strong>Vehicle Type:</strong> {{ ucfirst($order->driver->delivery->vehicle_type ?? '-') }}</p>
                                <p><strong>Plate Number:</strong> {{ $order->driver->delivery->plate_number ?? '-' }}</p>
                                <p><strong>Phone Number:</strong> {{ $order->driver->phone_number ?? '-' }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

        </div>
    @endforeach
</body>
</html>
