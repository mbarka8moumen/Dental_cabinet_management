<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
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

<section class="section service" id="service" aria-label="Services">
    <div class="container">
        <p class="section-subtitle text-center"></p><br><br>
        <h2 class="h2 section-title text-center">Ce que nous proposons</h2>

        <ul class="service-list">
            <!-- Service 1 -->
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <img src="{{ asset('assets/images/service-icon-1.png') }}" width="100" height="100" loading="lazy" alt="Extraction des dents" class="w-100">
                    </div>
                    <div>
                        <h3 class="h3 card-title">Extraction des dents</h3>
                        <p class="card-text">L'extraction des dents enlève une dent endommagée ou gênante.</p>
                    </div>
                </div>
            </li>

            <!-- Service 2 -->
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <img src="{{ asset('assets/images/service-icon-2.png') }}" width="100" height="100" loading="lazy" alt="Détartrage et nettoyage" class="w-100">
                    </div>
                    <div>
                        <h3 class="h3 card-title">Détartrage et nettoyage</h3>
                        <p class="card-text">Le détartrage nettoie et protège les dents du tartre.</p>
                    </div>
                </div>
            </li>

            <!-- Service 3 -->
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <img src="{{ asset('assets/images/service-icon-3.png') }}" width="100" height="100" loading="lazy" alt="Orthodontie : dento-faciale" class="w-100">
                    </div>
                    <div>
                        <h3 class="h3 card-title">Orthodontie : dento-faciale</h3>
                        <p class="card-text">L’orthodontie dento-faciale aligne dents et mâchoires.</p>
                    </div>
                </div>
            </li>

            <!-- Banner Service -->
            <li class="service-banner">
                <figure>
                    <img src="{{ asset('assets/images/service-banner.png') }}" width="409" height="467" loading="lazy" alt="Service banner" class="w-100">
                </figure>
            </li>

            <!-- Service 4 -->
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <img src="{{ asset('assets/images/service-icon-4.png') }}" width="100" height="100" loading="lazy" alt="Hygiène bucco-dentaire" class="w-100">
                    </div>
                    <div>
                        <h3 class="h3 card-title">Hygiène bucco-dentaire</h3>
                        <p class="card-text">L'hygiène bucco-dentaire préserve la santé des dents et des gencives.</p>
                    </div>
                </div>
            </li>

            <!-- Service 5 -->
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <img src="{{ asset('assets/images/service-icon-5.png') }}" width="100" height="100" loading="lazy" alt="Pose de prothèses dentaires" class="w-100">
                    </div>
                    <div>
                        <h3 class="h3 card-title">Pose de prothèses dentaires</h3>
                        <p class="card-text">Pose de prothèses dentaires restaure fonction et esthétique.</p>
                    </div>
                </div>
            </li>

            <!-- Service 6 -->
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <img src="{{ asset('assets/images/service-icon-6.png') }}" width="100" height="100" loading="lazy" alt="Restauration des dents absentes ou cassées" class="w-100">
                    </div>
                    <div>
                        <h3 class="h3 card-title">Restauration des dents absentes ou cassées</h3>
                        <p class="card-text">La restauration répare ou remplace les dents absentes ou cassées.</p>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</section>
</body>
</html>
