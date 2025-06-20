<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Extra Charge Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
        .charge-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .charge-box h3 {
            color: #164272;
        }
        .btn-pay {
            background-color: #164272;
            color: white;
        }
        .btn-pay:hover {
            background-color: #0e2b4c;
            color:white;
        }

            .banner-img {
      width: 100%;
      height: 24rem;
      display: block;
    }
    </style>
</head>
<body>

  <div>
    <img src="{{ asset('assets/images/banner.png') }}" alt="Laundry Banner" class="banner-img">
  </div>
  <br>
    <div class="charge-box">
        <h3 class="mb-4">Extra Charge Payment</h3>

        <ul class="list-unstyled mb-4">
            <li><strong>Service:</strong> {{ $charge->service_name }}</li>
            <li><strong>Package Weight:</strong> {{ $charge->package_weight }} KG</li>
            <li><strong>Bag Size:</strong> {{ ucfirst($charge->bag_size) }}</li>
            <li><strong>Capacity Exceeded:</strong> {{ $charge->capacity_exceeded }} KG</li>
            <li><strong>Extra Charge:</strong> RM {{ number_format($charge->extra_charge, 2) }}</li>
            <li><strong>Total Price:</strong> <span class="text-success fw-bold">RM {{ number_format($charge->total_price, 2) }}</span></li>
        </ul>

        <form method="POST" action="{{ route('extra_charges.pay_now', $charge->chargeID) }}">
            @csrf
            <div class="mb-3">
                <label for="payment_method" class="form-label">Select Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-select">
                    <option value="card">Credit/Debit Card</option>
                    <option value="fpx">FPX (Online Banking)</option>
                    <option value="grabpay">GrabPay</option>
                </select>
            </div>

            <button type="submit" class="btn btn-pay w-100">Pay</button>
        </form>
    </div>
  <br>  <br>
</body>
</html>
