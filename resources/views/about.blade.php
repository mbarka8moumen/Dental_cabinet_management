<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Google Font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
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

<!-- @if(Auth::check() && Auth::user()->role == 'admin')
  <a href="{{ url('/admin/dashboard') }}" class="btn">Admin</a>
@endif -->
</div>
</nav>



  </div>
</div>

</header>



<section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./assets/images/about-banner.png" width="470" height="538" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

          <div class="about-content">
              <br>
            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">Nous prenons soin de votre santé dentaire</h2>

            <p class="section-text section-text-1">
              Chez RM Dental Lab, votre sourire est notre priorité. Nous fournissons des soins dentaires personnalisés de haute qualité, 
              personnalisés de haute qualité dans un cadre moderne et confortable. 
              Notre équipe expérimentée utilise une technologie de pointe pour garantir des traitements efficaces et sans stress.
               Qu'il s'agisse d'un contrôle de routine ou de soins spécialisés, nous sommes là pour vous aider à obtenir un sourire sain et radieux,
                sourire sain et radieux.

              Book your appointment today!
            </p>

            <!-- <a href="#" class="btn">Read more</a> -->

          </div>

        </div>
      </section>


</body>
</html>
