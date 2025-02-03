<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FermePro - Gestion d'Élevage d'Animaux</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">

  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="assets/css/listeAnimaux.css">

  <!-- Google Font Link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Preload Images -->
  <link rel="preload" as="image" href="assets/img/farm.jpg">
  <link rel="preload" as="image" href="assets/img/farm1.jpg">
  <link rel="preload" as="image" href="assets/img/farm1.jp1g">
</head>

<body id="top">
  <!-- HEADER -->
  <header class="header">
    <div class="header-top" data-header>
      <div class="container">
        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </button>

        <div class="input-wrapper">
          <input type="search" name="search" class="search-field" value="Capital">
        </div>

        <div class="header-actions">
          <button class="header-action-btn" aria-label="favourite item" onclick="window.location.href='ajoutCapital'">
            <ion-icon name="wallet-outline" aria-hidden="true"></ion-icon>
            <span class="btn-badge">0</span>
          </button>

          <button class="header-action-btn" aria-label="cart item" onclick="window.location.href='/profil'">
            <data class="btn-text" value="0">$0.00</data>
            <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
            <span class="btn-badge">0</span>
          </button>
        </div>

        <nav class="navbar">
          <ul class="navbar-list">
            <li><a href="#home" class="navbar-link has-after">Accueil</a></li>
            <li><a href="achatAliment" class="navbar-link has-after">Achat Aliment</a></li>
            <li><a href="achatAnimaux" class="navbar-link has-after">Achats</a></li>
            <li><a href="venteAnimaux" class="navbar-link has-after">Ventes</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    <section class="hero">
      <h1>Bienvenue sur notre site professionnel</h1>
      <p>Découvrez nos services et nos solutions adaptées à vos besoins.</p>
    </section>
    <section class="cards-grid">
      <div class="card">
        <img src="assets/images/banner-1.jpg" alt="Service 1">
        <div class="card-overlay">
          <h2>Service 1</h2>
          <p>Poids: 100 kg</p>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/banner-2.jpg" alt="Service 2">
        <div class="card-overlay">
          <h2>Service 2</h2>
          <p>Poids: 150 kg</p>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/blog-1.jpg" alt="Service 3">
        <div class="card-overlay">
          <h2>Service 3</h2>
          <p>Poids: 200 kg</p>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/blog-2.jpg" alt="Service 4">
        <div class="card-overlay">
          <h2>Service 4</h2>
          <p>Poids: 250 kg</p>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/blog-2.jpg" alt="Service 5">
        <div class="card-overlay">
          <h2>Service 5</h2>
          <p>Poids: 300 kg</p>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/blog-2.jpg" alt="Service 6">
        <div class="card-overlay">
          <h2>Service 6</h2>
          <p>Poids: 350 kg</p>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer" data-section>
    <div class="container">
      <div class="footer-top">
        <ul class="footer-list">
          <li><p class="footer-list-title">ETU003276</p></li>
          <li><p class="footer-list-text">Trouvez une ferme près de chez vous. Voir <a href="#" class="link">Nos Fermes</a></p></li>
          <li><p class="footer-list-text bold">+391 (0)35 2568 4593</p></li>
          <li><p class="footer-list-text">contact@fermepro.com</p></li>
        </ul>
        <ul class="footer-list">
          <li><p class="footer-list-title">ETU003277</p></li>
          <li><a href="#" class="footer-link">Nouveaux Produits</a></li>
          <li><a href="#" class="footer-link">Meilleures Ventes</a></li>
          <li><a href="#" class="footer-link">Offres Groupées</a></li>
          <li><a href="#" class="footer-link">Carte Cadeau en Ligne</a></li>
        </ul>
        <ul class="footer-list">
          <li><p class="footer-list-title">ETU003372</p></li>
          <li><a href="#" class="footer-link">Démarrer un Retour</a></li>
          <li><a href="#" class="footer-link">Contactez-Nous</a></li>
          <li><a href="#" class="footer-link">FAQ sur la Livraison</a></li>
          <li><a href="#" class="footer-link">Termes & Conditions</a></li>
          <li><a href="#" class="footer-link">Politique de Confidentialité</a></li>
        </ul>
        <div class="footer-list">
          <p class="newsletter-title">Bons Emails.</p>
          <p class="newsletter-text">Entrez votre email ci-dessous pour être le premier informé des nouvelles collections et des lancements de produits.</p>
          <form action="" class="newsletter-form">
            <input type="email" name="email_address" placeholder="Entrez votre adresse email" required class="email-field">
            <button type="submit" class="btn btn-primary">S'abonner</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="wrapper">
          <p class="copyright">&copy; 2023 FermePro</p>
          <ul class="social-list">
            <li><a href="#" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="#" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="#" class="social-link"><ion-icon name="logo-youtube"></ion-icon></a></li>
          </ul>
        </div>
        <a href="#" class="logo">
          <img src="assets/img/logo.png" width="179" height="26" loading="lazy" alt="FermePro">
        </a>
        <img src="assets/img/pay.png" width="313" height="28" alt="tous les modes de paiement disponibles" class="w-100">
      </div>
    </div>
  </footer>

  <!-- BACK TO TOP -->
  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
  </a>

  <!-- Custom JS Link -->
  <script src="assets/js/script.js" defer></script>

  <!-- Ionicon Link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
