<!DOCTYPE html>
<html>
<head>
    <title>Extra Charge Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="background: white; padding: 20px; border-radius: 10px;">
        <h2>Hello {{ $charge->user->name }},</h2>
        <p>We’ve applied an extra charge for your laundry service. Here are the details:</p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <tr><td><strong>Service:</strong></td><td>{{ $charge->service_name }}</td></tr>
            <tr><td><strong>Package Weight:</strong></td><td>{{ $charge->package_weight }} KG</td></tr>
            <tr><td><strong>Bag Size:</strong></td><td>{{ ucfirst($charge->bag_size) }}</td></tr>
            <tr><td><strong>Capacity Exceeded:</strong></td><td>{{ $charge->capacity_exceeded }} KG</td></tr>
            <tr><td><strong>Extra Charge:</strong></td><td>RM {{ number_format($charge->extra_charge, 2) }}</td></tr>
            <tr><td><strong>Total Price:</strong></td><td><strong>RM {{ number_format($charge->total_price, 2) }}</strong></td></tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('extra_charges.pay', $charge->chargeID) }}"
               style="background-color: #28a745; color: white; padding: 10px 20px;
               text-decoration: none; border-radius: 5px;">Pay Now</a>
        </div>
    </div>
</body>
</html>
