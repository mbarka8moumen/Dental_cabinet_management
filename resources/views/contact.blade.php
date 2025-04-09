<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Lien vers ton fichier CSS (ajoute ou remplace le lien par celui de ton style) -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Lien vers la bibliothèque SweetAlert pour afficher les alertes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <style>/* Fichier: public/css/contact.css */

.contact {
    background-color: #f0f4f8;
    padding: 170px 0;
    font-family: Arial, sans-serif;
}

.contact h1.heading {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.contact .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.contact .box {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.contact .box:hover {
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
}

.contact .box h3 {
    font-size: 1.75rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: 500;
}

.contact .box p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.contact .box i {
    color: #4CAF50;
    margin-right: 10px;
}

.contact .share a {
    margin: 0 12px;
    font-size: 1.5rem;
    color: #333;
    text-decoration: none;
    transition: color 0.3s;
}

.contact .share a:hover {
    color: #4CAF50;
}

.contact .contact-form {
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.contact .contact-form form {
    display: flex;
    flex-direction: column;
}

.contact .contact-form input,
.contact .contact-form textarea {
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    width: 100%;
    transition: border-color 0.3s;
}

.contact .contact-form input:focus,
.contact .contact-form textarea:focus {
    border-color: #4CAF50;
    outline: none;
}

.contact .contact-form button {
    padding: 15px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

.contact .contact-form button:hover {
    background-color: #45a049;
}

.contact .contact-form textarea {
    min-height: 120px;
    resize: vertical;
}
/* Style du bouton Book Appointment */
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


@media (max-width: 768px) {
    .contact .box-container {
        grid-template-columns: 1fr;
    }
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



@guest
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@else
    <section class="contact" id="contact">
        <div class="container">
            <h1 class="heading">Contact Us</h1>

            @if(session('success'))
                <script>
                    Swal.fire({
                        title: "Message Sent!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 5000,
                        timerProgressBar: true
                    });
                </script>
            @endif

            <div class="box contact-form">
                <h3>Send Us a Message</h3>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name" required value="{{ old('name') }}">
                    <input type="email" name="email" placeholder="Your Email" required value="{{ old('email') }}">
                    <input type="tel" name="phone" placeholder="Your Phone Number" required value="{{ old('phone') }}">
                    <textarea name="message" rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                    <button type="submit" class="btn">Send</button>
                </form>
            </div>
        </div>
    </section>
@endguest

</body>
</html>
