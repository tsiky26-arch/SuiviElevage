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
    <section class="cards-grid">
            <?php foreach ($Animaux as $animal): ?>
                <div class="card">
                    <img src="<?= $animal['image'] ?>">
                    <div class="card-overlay">
                        <h2><?= $animal['nom'] ?></h2>
                        <p>Poids: <?= $animal['poidsInitiale'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
    </section>
</main>
<footer>
    <p>&copy; ETU003276  &   ETU003277   &    ETU003372</p>
</footer>

<script src="assets/js/script.js" defer></script>

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>

