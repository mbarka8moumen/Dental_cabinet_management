<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RM Dental Lab</title>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

  <!-- custom css link -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    .Formcontainer {
      margin: 100px auto;
      width: 400px;
      padding: 40px;
      background: white;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 14px;
      border: 2px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      outline: none;
      transition: border-color 0.3s ease-in-out;
    }

    input:focus {
      border-color: #007BFF;
    }

    button {
      width: 100%;
      padding: 14px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.3s;
    }

    button:hover {
      background-color: #0056b3;
    }

    .animation {
      margin-left: 59px;
    }
  </style>
</head>

<body id="top">

  <!-- HEADER -->
  <header class="header">
    <div class="header-top">
      <div class="container">
        <ul class="contact-list">
          <li class="contact-item">
            <ion-icon name="mail-outline"></ion-icon>
            <a href="mailto:info@example.com" class="contact-link">RachidmoLab@gmail.com</a>
          </li>
          <li class="contact-item">
            <ion-icon name="call-outline"></ion-icon>
            <a href="tel:+212567875432" class="contact-link">+212 607977747</a>
          </li>
        </ul>

        <ul class="social-list">
          <li><a href="#" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-youtube"></ion-icon></a></li>
        </ul>
      </div>
    </div>

    <div class="header-bottom" data-header>
      <div class="container">
        <a href="{{ route('home') }}" class="logo">RM Dental Lab</a>

        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">
            <li><a href="{{ route('home') }}" class="navbar-link">Home</a></li>
            <li><a href="{{ route('services') }}" class="navbar-link">Services</a></li>
            <li><a href="{{ route('about') }}" class="navbar-link">About Us</a></li>
            <li><a href="{{ route('register') }}" class="navbar-link">Register</a></li>
          </ul>
        </nav>

        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <ion-icon name="menu-sharp" aria-hidden="true" class="menu-icon"></ion-icon>
          <ion-icon name="close-sharp" aria-hidden="true" class="close-icon"></ion-icon>
        </button>
      </div>
    </div>
  </header>

  <!-- SIGN IN FORM ONLY -->
  <div class="Formcontainer">
    <div class="animation">
      <dotlottie-player 
        src="https://lottie.host/3c4729d2-cd70-49fa-b591-f1795ec45208/eSkY2OrMtg.lottie" 
        background="transparent" 
        speed="1" 
        style="width: 200px; height: 200px" 
        loop 
        autoplay>
      </dotlottie-player>
    </div>

    <h2>Sign In</h2>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="signin-email">Email</label>
        <input type="email" id="signin-email" name="email" required value="{{ old('email') }}">
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="signin-password">Password</label>
        <input type="password" id="signin-password" name="password" required>
        @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit">Sign In</button>
    </form>

    @if(session('error'))
      <p id="error-message" style="color: red;">{{ session('error') }}</p>
    @endif
  </div>


</body>

</html>
