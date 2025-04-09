<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM Dental Lab</title>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>
  <style>/* Style du bouton Book Appointment */
.btn-book-appointment {
    display: inline-block;
    padding: 12px 25px;
    background-color: #007BFF; /* Bleu */
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    border-radius: 4px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s ease;
}

.btn-book-appointment:hover {
    background-color: #0056b3; /* Bleu plus foncé au survol */
}
</style>
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


<!-- @if(Auth::check() && Auth::user()->role == 'admin')
  <a href="{{ url('/admin/dashboard') }}" class="btn">Admin</a>
@endif -->


</div>
</nav>



  </div>
</div>

</header>

    <!-- Section pour afficher un message flash -->
    @if(session('success'))
        <script>
            // Afficher l'alerte avec le message de succès
            alert("{{ session('success') }}");

            // Après 10 secondes, rediriger vers la page d'accueil
            setTimeout(function() {
                window.location.href = "{{ route('home') }}"; // Redirection vers la page 'home'
            }); // 10000 millisecondes = 10 secondes
        </script>
    @endif

    
  <!-- Formulaire de réservation -->
  <section class="Booking" id="contact">
    <h1 class="heading">Réservez votre rendez-vous</h1>

    <form action="{{ route('book.appointment') }}" method="POST">
      @csrf

      <h3>Nom :</h3>
      <div class="inputBox">
        <input type="text" name="first_name" placeholder="Prénom" required>
        <input type="text" name="last_name" placeholder="Nom" required>
      </div>

      <h3>Email :</h3>
      <input type="email" name="email" placeholder="Votre email" class="box" required>

      <h3>Numéro :</h3>
      <input type="number" name="phone" placeholder="Votre numéro" class="box" required>

      <h3>Date du rendez-vous :</h3>
      <input type="date" name="appointment_date" class="box" required>

      <h3>Heure du rendez-vous :</h3>
      <input type="time" name="appointment_time" class="box" required>

      <input type="submit" value="Réserver maintenant" class="btn">
    </form>
  </section>

  <!-- Custom JS -->
  <script src="{{ asset('assets/js/script.js') }}" defer></script>
</body>

</html>
