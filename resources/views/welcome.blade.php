<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Royal Doby - Premium Laundry Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
      --secondary-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
      --gold-gradient: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      --blue-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      --shadow-light: 0 10px 30px rgba(0, 0, 0, 0.1);
      --shadow-medium: 0 15px 40px rgba(0, 0, 0, 0.15);
      --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Floating particles background */
    .particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
    }

    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: rgba(251, 191, 36, 0.6);
      border-radius: 50%;
      animation: float 15s infinite linear;
    }

    .particle:nth-child(even) {
      background: rgba(59, 130, 246, 0.4);
    }

    @keyframes float {
      0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100vh) rotate(360deg);
        opacity: 0;
      }
    }

    /* Banner Section */
    .banner-container {
      position: relative;
      height: 60vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .banner-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, rgba(30, 58, 138, 0.8), rgba(59, 130, 246, 0.8));
      z-index: 1;
    }

    .banner-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
      max-width: 800px;
      padding: 0 20px;
      animation: fadeInUp 1s ease-out;
    }

    .banner-title {
      font-size: 4rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      background: var(--secondary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: titleGlow 3s ease-in-out infinite alternate;
    }

    @keyframes titleGlow {
      from {
        filter: drop-shadow(0 0 10px rgba(251, 191, 36, 0.5));
      }
      to {
        filter: drop-shadow(0 0 20px rgba(251, 191, 36, 0.8));
      }
    }

    .banner-subtitle {
      font-size: 1.5rem;
      font-weight: 300;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    .scroll-indicator {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateX(-50%) translateY(0);
      }
      40% {
        transform: translateX(-50%) translateY(-10px);
      }
      60% {
        transform: translateX(-50%) translateY(-5px);
      }
    }

    /* Main Content Section */
    .main-section {
      position: relative;
      background: white;
      margin-top: -50px;
      border-radius: 50px 50px 0 0;
      z-index: 3;
      padding: 80px 0;
    }

    .welcome-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .welcome-card {
      background: white;
      padding: 60px 40px;
      border-radius: 30px;
      box-shadow: var(--shadow-heavy);
      text-align: center;
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      animation: fadeInUp 1s ease-out 0.3s both;
    }

    .welcome-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--gold-gradient);
    }

    .crown-container {
      position: relative;
      margin-bottom: 30px;
    }

    .crown-icon {
      width: 80px;
      height: 80px;
      color: #f59e0b;
      filter: drop-shadow(0 5px 15px rgba(245, 158, 11, 0.4));
      animation: crownFloat 3s ease-in-out infinite;
    }

    @keyframes crownFloat {
      0%, 100% {
        transform: translateY(0px) rotate(0deg);
      }
      50% {
        transform: translateY(-10px) rotate(2deg);
      }
    }

    .welcome-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      background: var(--blue-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: textShine 2s ease-in-out infinite alternate;
    }

    @keyframes textShine {
      from {
        filter: brightness(1);
      }
      to {
        filter: brightness(1.2);
      }
    }

    .welcome-lead {
      font-size: 1.3rem;
      color: #555;
      margin-bottom: 20px;
      font-weight: 400;
    }

    .highlight-text {
      background: var(--secondary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 600;
      animation: highlightPulse 2.5s ease-in-out infinite;
    }

    @keyframes highlightPulse {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.02);
      }
    }

    .service-info {
      background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
      border-radius: 20px;
      padding: 30px;
      margin: 30px 0;
      border-left: 5px solid #f59e0b;
      animation: serviceInfoFloat 4s ease-in-out infinite;
    }

    @keyframes serviceInfoFloat {
      0%, 100% {
        transform: translateY(0px);
        box-shadow: 0 5px 15px rgba(245, 158, 11, 0.2);
      }
      50% {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
      }
    }

    .service-info p {
      margin: 0;
      font-size: 1.1rem;
      color: #444;
    }

    .time-highlight {
      color: #1d4ed8;
      font-weight: 600;
      font-size: 1.2rem;
      animation: timeGlow 2s ease-in-out infinite alternate;
    }

    @keyframes timeGlow {
      from {
        text-shadow: 0 0 5px rgba(29, 78, 216, 0.3);
      }
      to {
        text-shadow: 0 0 10px rgba(29, 78, 216, 0.6);
      }
    }

    /* Enhanced Buttons */
    .button-container {
      display: flex;
      gap: 20px;
      justify-content: center;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    .btn-enhanced {
      padding: 15px 40px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 50px;
      border: none;
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      min-width: 160px;
      box-shadow: var(--shadow-light);
    }

    .btn-enhanced::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s;
    }

    .btn-enhanced:hover::before {
      left: 100%;
    }

    .btn-login {
      background: var(--blue-gradient);
      color: white;
      transform: translateY(0);
      animation: buttonGlow 3s ease-in-out infinite alternate;
    }

    .btn-login:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 15px 30px rgba(29, 78, 216, 0.4);
      color: white;
    }

    .btn-register {
      background: var(--secondary-gradient);
      color: white;
      transform: translateY(0);
      animation: buttonGlow 3s ease-in-out infinite alternate 0.5s;
    }

    .btn-register:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 15px 30px rgba(245, 158, 11, 0.4);
      color: white;
    }

    @keyframes buttonGlow {
      from {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }
      to {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      }
    }

    /* Features Section */
    .features-section {
      padding: 60px 0;
      background: linear-gradient(135deg, #fef3c7 0%, #dbeafe 100%);
    }

    .feature-card {
      background: white;
      padding: 30px;
      border-radius: 20px;
      text-align: center;
      box-shadow: var(--shadow-light);
      transition: all 0.4s ease;
      height: 100%;
      border-top: 4px solid transparent;
      background-clip: padding-box;
      animation: cardFloat 6s ease-in-out infinite;
    }

    .feature-card:hover {
      transform: translateY(-15px) rotate(1deg);
      box-shadow: var(--shadow-medium);
    }

    .feature-card:nth-child(1) {
      border-top-color: #3b82f6;
      animation-delay: 0s;
    }

    .feature-card:nth-child(2) {
      border-top-color: #f59e0b;
      animation-delay: 2s;
    }

    .feature-card:nth-child(3) {
      border-top-color: #1d4ed8;
      animation-delay: 4s;
    }

    @keyframes cardFloat {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-8px);
      }
    }

    .feature-icon {
      width: 60px;
      height: 60px;
      margin: 0 auto 20px;
      color: #3b82f6;
      animation: iconSpin 4s ease-in-out infinite;
    }

    .feature-card:nth-child(2) .feature-icon {
      color: #f59e0b;
    }

    .feature-card:nth-child(3) .feature-icon {
      color: #1d4ed8;
    }

    @keyframes iconSpin {
      0%, 100% {
        transform: rotate(0deg) scale(1);
      }
      25% {
        transform: rotate(5deg) scale(1.05);
      }
      75% {
        transform: rotate(-5deg) scale(1.05);
      }
    }

    .feature-title {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 15px;
      color: #333;
    }

    .feature-description {
      color: #666;
      font-size: 1rem;
      line-height: 1.6;
    }

    /* Laundry Animation Styles */
    .laundry-animation {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
      overflow: hidden;
    }

    /* Washing Machine Animation */
    .washing-machine {
      position: absolute;
      top: 20%;
      right: 10%;
      animation: machineFloat 4s ease-in-out infinite;
    }

    .machine-body {
      width: 80px;
      height: 100px;
      background: linear-gradient(145deg, #e5e7eb, #d1d5db);
      border-radius: 12px;
      position: relative;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .machine-door {
      width: 60px;
      height: 60px;
      background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
      border-radius: 50%;
      position: absolute;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      border: 3px solid #9ca3af;
    }

    .door-glass {
      width: 50px;
      height: 50px;
      background: rgba(59, 130, 246, 0.3);
      border-radius: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      overflow: hidden;
      animation: waterSpin 2s linear infinite;
    }

    .water-bubble {
      position: absolute;
      background: rgba(251, 191, 36, 0.6);
      border-radius: 50%;
      animation: bubbleMove 1.5s ease-in-out infinite;
    }

    .water-bubble:nth-child(1) {
      width: 8px;
      height: 8px;
      top: 20%;
      left: 30%;
      animation-delay: 0s;
    }

    .water-bubble:nth-child(2) {
      width: 6px;
      height: 6px;
      top: 60%;
      left: 60%;
      animation-delay: 0.5s;
    }

    .water-bubble:nth-child(3) {
      width: 4px;
      height: 4px;
      top: 40%;
      left: 20%;
      animation-delay: 1s;
    }

    .machine-controls {
      position: absolute;
      bottom: 15px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 8px;
    }

    .control-button {
      width: 12px;
      height: 12px;
      background: #f59e0b;
      border-radius: 50%;
      animation: buttonBlink 2s ease-in-out infinite alternate;
    }

    .control-button:nth-child(2) {
      background: #3b82f6;
      animation-delay: 1s;
    }

    /* Floating Clothes Animation */
    .floating-clothes {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .cloth {
      position: absolute;
      font-size: 2rem;
      animation: clothFloat 8s ease-in-out infinite;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    }

    .cloth-1 {
      top: 15%;
      left: 15%;
      animation-delay: 0s;
    }

    .cloth-2 {
      top: 25%;
      right: 25%;
      animation-delay: 2s;
    }

    .cloth-3 {
      top: 45%;
      left: 20%;
      animation-delay: 4s;
    }

    .cloth-4 {
      top: 35%;
      right: 15%;
      animation-delay: 6s;
    }

    /* Soap Bubbles Animation */
    .soap-bubbles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .bubble {
      position: absolute;
      background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(59, 130, 246, 0.3));
      border-radius: 50%;
      animation: bubbleFloat 6s ease-in-out infinite;
      box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.5);
    }

    .bubble-1 {
      width: 20px;
      height: 20px;
      top: 70%;
      left: 10%;
      animation-delay: 0s;
    }

    .bubble-2 {
      width: 15px;
      height: 15px;
      top: 60%;
      left: 25%;
      animation-delay: 1s;
    }

    .bubble-3 {
      width: 25px;
      height: 25px;
      top: 50%;
      right: 20%;
      animation-delay: 2s;
    }

    .bubble-4 {
      width: 12px;
      height: 12px;
      top: 40%;
      right: 35%;
      animation-delay: 3s;
    }

    .bubble-5 {
      width: 18px;
      height: 18px;
      top: 65%;
      left: 45%;
      animation-delay: 4s;
    }

    .bubble-6 {
      width: 22px;
      height: 22px;
      top: 30%;
      left: 35%;
      animation-delay: 5s;
    }

    /* Animation Keyframes */
    @keyframes machineFloat {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-15px);
      }
    }

    @keyframes waterSpin {
      0% {
        transform: translate(-50%, -50%) rotate(0deg);
      }
      100% {
        transform: translate(-50%, -50%) rotate(360deg);
      }
    }

    @keyframes bubbleMove {
      0%, 100% {
        transform: translateY(0px);
        opacity: 0.6;
      }
      50% {
        transform: translateY(-10px);
        opacity: 1;
      }
    }

    @keyframes buttonBlink {
      0% {
        opacity: 0.5;
        box-shadow: 0 0 5px rgba(245, 158, 11, 0.3);
      }
      100% {
        opacity: 1;
        box-shadow: 0 0 15px rgba(245, 158, 11, 0.8);
      }
    }

    @keyframes clothFloat {
      0%, 100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.7;
      }
      25% {
        transform: translateY(-20px) rotate(5deg);
        opacity: 1;
      }
      50% {
        transform: translateY(-10px) rotate(-3deg);
        opacity: 0.8;
      }
      75% {
        transform: translateY(-25px) rotate(8deg);
        opacity: 0.9;
      }
    }

    @keyframes bubbleFloat {
      0% {
        transform: translateY(0px) scale(1);
        opacity: 0;
      }
      20% {
        opacity: 0.8;
      }
      80% {
        opacity: 0.6;
      }
      100% {
        transform: translateY(-100px) scale(0.5);
        opacity: 0;
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .banner-title {
        font-size: 2.5rem;
      }

      .banner-subtitle {
        font-size: 1.2rem;
      }

      .welcome-card {
        padding: 40px 20px;
        border-radius: 20px;
      }

      .welcome-title {
        font-size: 2rem;
      }

      .welcome-lead {
        font-size: 1.1rem;
      }

      .button-container {
        flex-direction: column;
        align-items: center;
      }

      .btn-enhanced {
        width: 100%;
        max-width: 250px;
      }

      .main-section {
        margin-top: -30px;
        border-radius: 30px 30px 0 0;
      }
    }

    @media (max-width: 576px) {
      .banner-container {
        height: 50vh;
      }

      .banner-title {
        font-size: 2rem;
      }

      .service-info {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <!-- Floating Particles Background -->
  <div class="particles">
    <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
    <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
    <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
    <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
    <div class="particle" style="left: 60%; animation-delay: 10s;"></div>
    <div class="particle" style="left: 70%; animation-delay: 12s;"></div>
    <div class="particle" style="left: 80%; animation-delay: 14s;"></div>
    <div class="particle" style="left: 90%; animation-delay: 16s;"></div>
  </div>

  <!-- Hero Banner Section -->
  <div class="banner-container">
    <div class="banner-overlay"></div>
    
    <!-- Animated Laundry Elements -->
    <div class="laundry-animation">
      <!-- Washing Machine -->
      <div class="washing-machine">
        <div class="machine-body">
          <div class="machine-door">
            <div class="door-glass">
              <div class="water-bubble"></div>
              <div class="water-bubble"></div>
              <div class="water-bubble"></div>
            </div>
          </div>
          <div class="machine-controls">
            <div class="control-button"></div>
            <div class="control-button"></div>
          </div>
        </div>
      </div>
      
      <!-- Floating Clothes -->
      <div class="floating-clothes">
        <div class="cloth cloth-1">👕</div>
        <div class="cloth cloth-2">👗</div>
        <div class="cloth cloth-3">👔</div>
        <div class="cloth cloth-4">🧦</div>
      </div>
      
      <!-- Soap Bubbles -->
      <div class="soap-bubbles">
        <div class="bubble bubble-1"></div>
        <div class="bubble bubble-2"></div>
        <div class="bubble bubble-3"></div>
        <div class="bubble bubble-4"></div>
        <div class="bubble bubble-5"></div>
        <div class="bubble bubble-6"></div>
      </div>
    </div>
    
    <div class="banner-content">
      <h1 class="banner-title">Royal Doby</h1>
      <p class="banner-subtitle">Premium Laundry Service at Your Doorstep</p>
    </div>
    <div class="scroll-indicator">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="m7 13 5 5 5-5"></path>
        <path d="m7 6 5 5 5-5"></path>
      </svg>
    </div>
  </div>

  <!-- Main Content Section -->
  <div class="main-section">
    <div class="welcome-container">
      <div class="welcome-card">
        <div class="crown-container">
          <svg xmlns="http://www.w3.org/2000/svg" class="crown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
          </svg>
        </div>
        
        <h2 class="welcome-title">Welcome to Royal Doby</h2>
        <p class="welcome-lead">Same day laundry pickup and delivery in <span class="highlight-text">Parit Raja</span> and <span class="highlight-text">Batu Pahat</span></p>
        
        <div class="service-info">
          <p>✨ Pickup before <span class="time-highlight">12:30 AM</span> for same-day delivery</p>
          <p>🚚 Or receive your fresh laundry the next day!</p>
        </div>

        <div class="button-container">
          <a href="{{ route('login') }}" class="btn-enhanced btn-login">
            <span>Login</span>
          </a>
          <a href="{{ route('register') }}" class="btn-enhanced btn-register">
            <span>Register</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-4">
            <div class="feature-card">
              <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
              </svg>
              <h3 class="feature-title">Premium Quality</h3>
              <p class="feature-description">Professional cleaning with premium detergents and fabric care</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-card">
              <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12,6 12,12 16,14"></polyline>
              </svg>
              <h3 class="feature-title">Fast Service</h3>
              <p class="feature-description">Same-day pickup and delivery for your convenience</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-card">
              <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9,22 9,12 15,12 15,22"></polyline>
              </svg>
              <h3 class="feature-title">Doorstep Service</h3>
              <p class="feature-description">Convenient pickup and delivery right at your doorstep</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Add smooth scrolling animation on page load
    document.addEventListener('DOMContentLoaded', function() {
      // Animate elements when they come into view
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);

      // Observe feature cards
      document.querySelectorAll('.feature-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
      });

      // Add click ripple effect to buttons
      document.querySelectorAll('.btn-enhanced').forEach(button => {
        button.addEventListener('click', function(e) {
          const ripple = document.createElement('span');
          const rect = this.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size / 2;
          const y = e.clientY - rect.top - size / 2;
          
          ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
          `;
          
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
      });

      // Add CSS for ripple animation
      const style = document.createElement('style');
      style.textContent = `
        @keyframes ripple {
          to {
            transform: scale(4);
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(style);
    });
  </script>
</body>
</html>