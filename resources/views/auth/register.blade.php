<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription - RM Dental Lab</title>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

  <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
    }

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

    .error {
      color: red;
      font-size: 0.9rem;
      margin-top: 0.4rem;
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

    .switch-link {
      margin-top: 1rem;
      text-align: center;
    }

    .switch-link a {
      color: #007bff;
      text-decoration: none;
    }

    .switch-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<header class="header">

<div class="header-top">
  
</div>

<div class="header-bottom" data-header>
  <div class="container">

    <a href="#" class="logo">RM Dental Lab .</a>
<nav class="navbar container" data-navbar>
<ul class="navbar-list">
<li><a href="{{ url('/') }}" class="navbar-link" data-nav-link>Accueil</a></li>
<li><a href="{{ url('/services') }}" class="navbar-link" data-nav-link>Services</a></li>
<li><a href="{{ url('/about') }}" class="navbar-link" data-nav-link>À propos</a></li>
<li><a href="{{ url('/register') }}" class="navbar-link" data-nav-link>Register</a></li>

@if(Auth::check())
  <li><a href="{{ url('/contact') }}" class="navbar-link" data-nav-link>Contact</a></li>
@endif
</ul>

<div class="navbar-actions">
@if(Auth::check())
  <a href="{{ route('book') }}" class="btn">Book appointment</a>
@endif

@if(Auth::check() && Auth::user()->role == 'admin')
  <a href="{{ url('/admin/dashboard') }}" class="btn">Admin</a>
@endif

@if(Auth::check())
  <!-- Bouton de déconnexion -->
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn">Déconnexion</button>
  </form>
@endif
</div>
</nav>



  </div>
</div>

</header>









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

    <h2>Inscription</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group">
        <label for="name">Nom complet</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
        @error('password')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
      </div>

      <button type="submit">S'inscrire</button>
    </form>

    <div class="switch-link">
      <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
    </div>
  </div>

</body>
</html>
