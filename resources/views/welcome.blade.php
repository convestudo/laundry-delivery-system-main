<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Royal Doby - Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .banner-img {
      width: 100%;
      height: auto;
      max-height: 24rem;
      object-fit: cover;
      display: block;
    }

    .card-section {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      padding: 20px;
    }

    .welcome-card {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 600px;
      text-align: center;
    }

    .icon-crown {
      width: 48px;
      height: 48px;
      color: goldenrod;
      margin-bottom: 10px;
    }

    .btn-custom {
      margin: 10px;
      width: 130px;
    }

    @media (max-width: 576px) {
      .welcome-card {
        padding: 20px;
      }

      .btn-custom {
        width: 100px;
        font-size: 14px;
        margin: 5px;
      }
    }
  </style>
</head>
<body>

  <!-- Banner (Image Only) -->
  <div>
    <img src="{{ asset('assets/images/banner.png') }}" alt="Laundry Banner" class="banner-img">
  </div>

  <!-- Welcome Card Section -->
  <div class="card-section">
    <div class="welcome-card">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon-crown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
      </svg>
      <h2>Welcome to Royal Doby</h2>
      <p class="lead">Same day laundry pickup and delivery in <b>Parit Raja</b> and <b>Batu Pahat</b></p>
      <p>Pickup before <strong>11:00 AM</strong> for same-day delivery or receive it the next day!</p>
      <div class="d-flex justify-content-center mt-4 flex-wrap">
        <a href="{{ route('login') }}" class="btn btn-success btn-custom">Login</a>
        <a href="{{ route('register') }}" class="btn btn-dark btn-custom">Register</a>
      </div>
    </div>
  </div>

</body>
</html>
