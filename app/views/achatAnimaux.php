<?php
  @$animauxAAcheter;
  @$prixTotal;
?>
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
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body id="top">
  <!-- HEADER -->
  <header class="header">
    <nav class="navbar">
      <ul class="navbar-list">
        <li><a href="#home" class="navbar-link">Accueil</a></li>
        <li><a href="achatAliment" class="navbar-link">Achat Aliment</a></li>
        <li><a href="achatAnimaux" class="navbar-link">Achats</a></li>
        <li><a href="venteAnimaux" class="navbar-link">Ventes</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="cards-grid">
      <?php foreach ($animaux as $animal): ?>
        <div class="card">
          <img src="<?= $animal['image'] ?>" alt="Image de <?= $animal['nom'] ?>">
          <div class="card-overlay">
            <h2><?= $animal['nom'] ?></h2>
            <div class="card-details">
              <p class="details-item">Poids total: <?= $animal['image'] ?>kg</p>
              <p class="details-item">Prix total: <?= $animal['image'] ?>€</p>
            </div>
            <a href="" class="btn-acheter">Acheter</a>
          </div>
        </div>
      <?php endforeach; ?>
    </section>
  </main>

  <footer>
    <p>&copy; ETU003276  &amp; ETU003277   &amp;    ETU003372</p>
  </footer>

  <script src="assets/js/script.js" defer></script>
</body>
</html>
