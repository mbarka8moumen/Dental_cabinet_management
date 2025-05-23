<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RM Dental Lab</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap"
    rel="stylesheet">
</head>

<body id="top">
@if(session('error'))
    <script type="text/javascript">
      alert("{{ session('error') }}");
    </script>
  @endif
@if(session('success'))
    <script type="text/javascript">
      alert("{{ session('success') }}");
    </script>
  @endif
  <style>
    .navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px; /* Réduit les espacements autour du contenu */
  height: 50px; /* Limite la hauteur de la barre */
  background-color: #f8f9fa; /* Tu peux ajuster la couleur de fond si besoin */
}

.navbar-list {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

.navbar-list li {
  margin-right: 15px; /* Réduit l'espacement entre les éléments */
}

.navbar-link {
  font-size: 14px; /* Réduit la taille des liens */
  text-decoration: none;
  color: #333;
}

.navbar-actions {
  display: flex;
  gap: 10px;
}

.navbar-actions .btn {
  font-size: 12px; /* Réduit la taille des boutons */
  padding: 5px 10px; /* Ajuste le padding des boutons */
}
.logo {
  font-size: 2.5rem;  /* Ajustez la taille de la police selon vos préférences */
  font-weight: bold;  /* Police en gras pour une meilleure visibilité */
  color:rgb(5, 20, 36);  /* Couleur du texte (bleu ici, vous pouvez changer la couleur selon vos besoins) */
  text-decoration: none;  /* Enlève le souligné par défaut du lien */
  letter-spacing: 1px;  /* Espacement des lettres pour un effet plus aéré */
}

.logo:hover {
  color: #0056b3;  /* Couleur au survol */
}



 
</style>

  <!-- 
    - #HEADER
  -->

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

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

    <div class="header-bottom" data-header>
      <div class="container">

        <a href="#" class="logo">RM Dental Lab .</a>
<nav class="navbar container" data-navbar>
  <ul class="navbar-list">
    <li><a href="#home" class="navbar-link" data-nav-link>Accueil</a></li>
    <li><a href="#service" class="navbar-link" data-nav-link>Services</a></li>
    <li><a href="#about" class="navbar-link" data-nav-link>À propos</a></li>
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





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">Bienvenue à RM Dental Lab</p>

            <h1 class="h1 hero-title">le meilleur service dentaire</h1>

            <p class="hero-text">
              nous nous engageons à vous offrir des soins dentaires d’exception dans un cadre agréable et rassurant.
               Notre équipe expérimentée vous propose des traitements personnalisés en utilisant les dernières technologies pour garantir des résultats optimaux. 
               Que ce soit pour un contrôle de routine, des soins esthétiques ou des traitements spécialisés,
               nous sommes là pour vous aider à préserver un sourire sain et éclatant.
            </p>

            <form action="{{ route('callback.store') }}" method="POST" class="hero-form">
              @csrf
              <input type="email" name="email" aria-label="Your Email" placeholder="Your Email Address..." required class="email-field">
              <button type="submit" class="btn">Get Call Back</button>
            </form>
          </div>

          <figure class="hero-banner">
            <img src="./assets/images/hero-banner.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service" id="service" aria-label="service">
        <div class="container">

          <p class="section-subtitle text-center">Notre Services</p>

          <h2 class="h2 section-title text-center">Ce que nous proposons</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-icon-1.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Extraction des dents</h3>

                  <p class="card-text">
                    L'extraction des dents enlève une dent endommagée ou gênante.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-icon-2.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Détartrage et nettoyage</h3>

                  <p class="card-text">
                    Le détartrage nettoie et protège les dents du tartre.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-icon-3.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Orthodontie : dento-faciale</h3>

                  <p class="card-text">
                    L’orthodontie dento-faciale aligne dents et mâchoires
                  </p>
                </div>

              </div>
            </li>

            <li class="service-banner">
              <figure>
                <img src="./assets/images/service-banner.png" width="409" height="467" loading="lazy"
                  alt="service banner" class="w-100">
              </figure>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-icon-4.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Hygiène bucco-dentaire</h3>

                  <p class="card-text">
                    L'hygiène bucco-dentaire préserve la santé des dents et des gencives.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-icon-5.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Pose de prothèses dentaires</h3>

                  <p class="card-text">
                    pose de prothèses dentaires restaure fonction et esthétique.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-icon-6.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Restauration des dents absentes ou cassées</h3>

                  <p class="card-text">
                    La restauration répare ou remplace les dents absentes ou cassées.
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./assets/images/about-banner.png" width="470" height="538" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

          <div class="about-content">

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





     <!-- 
        - #DOCTOR
      -->

      <section class="section doctor" aria-label="doctor">
        <div class="container">

          <p class="section-subtitle text-center">Notre médecin</p>

          <h2 class="h2 section-title text-center">Meilleur dentiste expert</h2>

          <ul class="has-scrollbar">

            <li class="scrollbar-item">
             

      <section class="section cta" aria-label="cta">
        <div class="container">

          <figure class="cta-banner">
            <img src="./assets/images/Best_Dr.jpg" width="1056" height="1076" loading="lazy" alt="cta banner"
              class="w-100">
              <!-- <img src="{{ asset('assets/images/Best_Dr.jpg') }}"  alt="Hero Image"> -->

          </figure>

          <div class="cta-content">

            <p class="section-subtitle">Prendre rendez-vous avec le laboratoire dentaire RM</p>

            <h2 class="h2 section-title">Nous sommes ouverts et accueillons les patients</h2>

            <a href="{{ route('book') }}" class="btn">Book appointment</a>

          </div>

        </div>
      </section>



    </article>
  </main>




  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">RM Dentist Labs.</a>

          <p class="footer-text">
            Bienvenue chez RM Dental Lab, où votre sourire est notre priorité. 
            Nous vous offrons des soins de qualité pour une santé bucco-dentaire optimale.
          </p>

          <div class="schedule">
            <div class="schedule-icon">
              <ion-icon name="time-outline"></ion-icon>
            </div>

            <span class="span">
              Lundi - Samedi:<br>
              9:00am - 10:00Pm
            </span>
          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Other Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Home</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">About Us</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Services</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Project</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Our Team</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Latest Blog</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Our Services</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Root Canal</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Alignment Teeth</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Cosmetic Teeth</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Oral Hygiene</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Live Advisory</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Cavity Inspection</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Us</p>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="item-text">
              Guelmim quartier AL Filaha,<br>
              Rue ...
            </address>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+212 607977747" class="footer-link">+212 607977747</a>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:RachidmoLab@gmail.com" class="footer-link">RachidmoLab@gmail.com</a>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 All Rights Reserved by codewithsadee.
        </p>

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>