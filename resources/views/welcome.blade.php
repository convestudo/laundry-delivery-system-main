<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Doby - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('{{ asset('assets/images/template 1.png') }}') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.88);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.47);
            width: 50%;
            height: 60%;
            max-width: 600px;
            margin-left: 150px;
        }
        .crown {
            color: goldenrod;
            font-size: 48px;
        }
        .btn-custom {
            margin: 15px;
            width: 140px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .icon-crown {
            width: 48px;
            height: 48px;
            color: goldenrod;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-crown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" /></svg>
        <h1>Welcome to Royal Doby</h1>
        <p class="lead">Same day laundry pickup and delivery in <b>Parit Raja</b> and <b>Batu Pahat</b></p>
        <p>Pickup before <strong>11:00 AM</strong> for same-day delivery or receive it the next day!</p>
        <div class="d-flex justify-content-center mt-4">
            <nav class="-mx-3 flex flex-1 justify-end">
            <a href="{{ route('login') }}" class="btn btn-success btn-custom">Login</a>
            <a href="{{ route('register') }}" class="btn btn-dark btn-custom">Register</a>

            </nav>
        </div>
    </div>
</body>
</html>
