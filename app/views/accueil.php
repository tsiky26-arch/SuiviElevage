<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FermePro - Gestion d'Élevage d'Animaux</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="assets/css/accueil.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!--
    - preload img
  -->
  <!-- <link rel="preload" as="image" href="assets/img/logo.png"> -->
  <link rel="preload" as="image" href="assets/img/farm.jpg">
  <link rel="preload" as="image" href="assets/img/farm1.jpg">
  <link rel="preload" as="image" href="assets/img/farm1.jp1g">

</head>

<body id="top">
  <!--
    - #HEADER
  -->

  <header class="header">

    <!-- <div class="alert">
      <div class="container">
        <p class="alert-text">Livraison gratuite sur toutes les commandes de plus de $50</p>
      </div>
    </div> -->

    <div class="header-top" data-header>
      <div class="container">

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </button>

        <div class="input-wrapper">
          <!-- <input type="search" name="search"  class="search-field" value="Capital"> -->
<!-- 
          <button class="search-submit" aria-label="search">
            <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
          </button> -->
        </div>

        <!-- <a href="#" class="logo">
          <img src="assets/img/logo.png" width="179" height="26" alt="FermePro">
        </a> -->

        <div class="header-actions">

          <!-- <button class="header-action-btn" aria-label="user" onclick="window.location.href='/'">
            <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
          </button> -->

          <button class="header-action-btn" aria-label="favourite item" onclick="window.location.href='ajoutCapital'"> <p>Ajouter Capital</p>
            <ion-icon name="wallet-outline" aria-hidden="true"></ion-icon>



        </div>

        <nav class="navbar">
          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link has-after">Accueil</a>
            </li>

            <li>
              <a href="achatAnimaux" class="navbar-link has-after">Acheter animal</a>
            </li>

            <li>
              <a href="achatAlimentation" class="navbar-link has-after">Acheter Alimentation</a>
            </li>

            <li>
            <a href="venteAnimaux" class="navbar-link has-after">Ventes</a>
            </li>

            <li>
            <a href="tableauDeBord" class="navbar-link has-after">Tableau de bord</a>
            </li>

            <li>
            <a href="deconnexion" class="navbar-link has-after">Deconnexion</a>
            </li>

            
            <li>
            <a href="crudAnimaux" class="navbar-link has-after">Type Animal</a>
            </li>

          </ul>
        </nav>

      </div>
    </div>

  </header>

  <!--
    - #MOBILE NAVBAR
  -->

  <div class="sidebar">
    <div class="mobile-navbar" data-navbar>

      <!-- <div class="wrapper">
        <a href="#" class="logo">
          <img src="assets/img/logo.png" width="179" height="26" alt="FermePro">
        </a>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>
      </div> -->

      <ul class="navbar-list">

        <li>
          <a href="#home" class="navbar-link" data-nav-link>Accueil</a>
        </li>

        <li>
          <a href="#collection" class="navbar-link" data-nav-link>Nos Animaux</a>
        </li>

        <li>
          <a href="#shop" class="navbar-link" data-nav-link>Boutique</a>
        </li>

        <li>
          <a href="#offer" class="navbar-link" data-nav-link>Offres</a>
        </li>

        <li>
          <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
        </li>

      </ul>

    </div>

    <div class="overlay" data-nav-toggler data-overlay></div>
  </div>

  <main>
    <article>

      <!--
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="hero" data-section>
        <div class="container">

          <ul class="has-scrollbar">

            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('assets/img/farm.jpg')">

                <div class="card-content">

                  <h1 class="h1 hero-title">
                    Découvrez la Beauté <br>
                    de l'Élevage
                  </h1>

                  <p class="hero-text">
                    Nos animaux sont élevés avec soin et amour, dans un environnement sain et naturel.
                  </p>

                  <p class="price">À partir de $7.99</p>

                  <a href="listeAnimaux" class="btn btn-primary">Voir liste de mes animaux</a>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('assets/img/farm1.jpg')">

                <div class="card-content">

                  <h1 class="h1 hero-title">
                    Découvrez la Beauté <br>
                    de l'Élevage
                  </h1>

                  <p class="hero-text">
                    Nos animaux sont élevés avec soin et amour, dans un environnement sain et naturel.
                  </p>

                  <p class="price">À partir de $7.99</p>

                  <a href="listeAnimaux" class="btn btn-primary">Acheter Maintenant</a>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('assets/img/farm2.jpg')">

                <div class="card-content">

                  <h1 class="h1 hero-title">
                    Découvrez la Beauté <br>
                    de l'Élevage
                  </h1>

                  <p class="hero-text">
                    Nos animaux sont élevés avec soin et amour, dans un environnement sain et naturel.
                  </p>

                  <p class="price">À partir de $7.99</p>

                  <a href="listeAnimaux" class="btn btn-primary">Acheter Maintenant</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

      <!--
        - #FOOTER
      -->

      <footer class="footer" data-section>
        <div class="container">

          <div class="footer-top">

            <ul class="footer-list">

              <li>
                <p class="footer-list-title">ETU003276</p>
              </li>

              <li>
                <p class="footer-list-text">
                  Trouvez une ferme près de chez vous. Voir <a href="#" class="link">Nos Fermes</a>
                </p>
              </li>

              <li>
                <p class="footer-list-text bold">+391 (0)35 2568 4593</p>
              </li>

              <li>
                <p class="footer-list-text">contact@fermepro.com</p>
              </li>

            </ul>

            <ul class="footer-list">

              <li>
                <p class="footer-list-title">ETU003277</p>
              </li>

              <li>
                <a href="#" class="footer-link">Nouveaux Produits</a>
              </li>

              <li>
                <a href="#" class="footer-link">Meilleures Ventes</a>
              </li>

              <li>
                <a href="#" class="footer-link">Offres Groupées</a>
              </li>

              <li>
                <a href="#" class="footer-link">Carte Cadeau en Ligne</a>
              </li>

            </ul>

            <ul class="footer-list">

              <li>
                <p class="footer-list-title">ETU003372</p>
              </li>

              <li>
                <a href="#" class="footer-link">Démarrer un Retour</a>
              </li>

              <li>
                <a href="#" class="footer-link">Contactez-Nous</a>
              </li>

              <li>
                <a href="#" class="footer-link">FAQ sur la Livraison</a>
              </li>

              <li>
                <a href="#" class="footer-link">Termes & Conditions</a>
              </li>

              <li>
                <a href="#" class="footer-link">Politique de Confidentialité</a>
              </li>

            </ul>

            <div class="footer-list">

              <p class="newsletter-title">Bons Emails.</p>

              <p class="newsletter-text">
                Entrez votre email ci-dessous pour être le premier informé des nouvelles collections et des lancements de produits.
              </p>

              <form action="" class="newsletter-form">
                <input type="email" name="email_address" placeholder="Entrez votre adresse email" required
                  class="email-field">

                <button type="submit" class="btn btn-primary">S'abonner</button>
              </form>

            </div>

          </div>

          <div class="footer-bottom">

            <div class="wrapper">
              <p class="copyright">
                &copy; 2023 FermePro
              </p>

              <ul class="social-list">

                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-twitter"></ion-icon>
                  </a>
                </li>

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
                    <ion-icon name="logo-youtube"></ion-icon>
                  </a>
                </li>

              </ul>
            </div>

            <!-- <a href="#" class="logo">
              <img src="assets/img/logo.png" width="179" height="26" loading="lazy" alt="FermePro">
            </a> -->

            <img src="assets/img/pay.png" width="313" height="28" alt="tous les modes de paiement disponibles" class="w-100">

          </div>

        </div>
      </footer>

      <!--
        - #BACK TO TOP
      -->

      <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
      </a>

      <!--
        - custom js link
      -->
      <script src="assets/js/script.js" defer></script>

      <!--
        - ionicon link
      -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
