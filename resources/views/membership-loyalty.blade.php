

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership & Loyalty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .rewards-section, .points-section {
            margin-bottom: 20px;
        }
        .rewards-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .reward-item {
            flex: 1 1 calc(33.333% - 20px);
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }
        .reward-item button {
            margin-top: 10px;
            padding: 5px 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .reward-item button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Membership & Loyalty</h1>
        </div>
        <div class="points-section">
            <h2>Redeem Rewards</h2>
            <p>Points: <strong>125 pts</strong></p>
            <button>Voucher</button>
        </div>
        <div class="rewards-section">
            <h2>Rewards</h2>
            <div class="rewards-grid">
                <div class="reward-item">
                    <p>Redeem with 250 pts</p>
                    <p>Rewards: RM **</p>
                    <button>Redeem Now</button>
                </div>
                <div class="reward-item">
                    <p>Redeem with 150 pts</p>
                    <p>Rewards: RM **</p>
                    <button>Redeem Now</button>
                </div>
                <div class="reward-item">
                    <p>Redeem with 50 pts</p>
                    <p>Rewards: RM **</p>
                    <button>Redeem Now</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
