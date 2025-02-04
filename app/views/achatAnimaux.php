<?php
  @$animauxAAcheter;
  @$prixTotal;
  @$erreur;
  @$succes;
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
        <li><a href="listeAnimaux" class="navbar-link">Liste de mes animaux</a></li>
        <li><a href="achatAliment" class="navbar-link">Achat Aliment</a></li>
        <li><a href="achatAnimaux" class="navbar-link">Achats</a></li>
        <li><a href="venteAnimaux" class="navbar-link">Ventes</a></li>
        <li><a href="ajoutCapital" class="navbar-link">Ajouter capital</a></li>
        <li class="navbar-link">Votre capital = <?= @$capital ?>Ar</li>
        <li><a href="deconnexion" class="navbar-link">Deconnexion</a></li>

      </ul>
    </nav>
  </header>

  <main>
    <section class="cards-grid">
      <p style = "color:red"><?= @$erreur ?></p>
      <p style = "color:red"><?= @$succes ?></p>
      <?php for ($i = 0; $i<count($animauxAAcheter); $i++) { ?>
        <div class="card">
          <img src="<?= $animauxAAcheter[$i]['image'] ?>" alt="Image de <?= $animauxAAcheter[$i]['nomAnimal'] ?>">
          <div class="card-overlay">
            <h4><?= $animauxAAcheter[$i]['nomAnimal'] ?></h4>
            <!-- <h2><?= $prixTotal[$i] ?></h2> -->
            <div class="card-details">
              <p class="details-item">Poids total: <?php if($animauxAAcheter[$i]['poidsVariable'] != NULL) {echo $animauxAAcheter[$i]['poidsVariable'];} else {echo $animauxAAcheter[$i]['poidsInitiale'];}  ?>kg</p>
              <p class="details-item">Prix total: <?= $prixTotal[$i] ?>€</p>
            </div>
            <a href="?action=acheter&idAnimalAAcheter=<?= $animauxAAcheter[$i]['idAnimaux'] ?>" class="btn-acheter">Acheter</a>
          </div>
        </div>
      <?php } ?>
    </section>
  </main>

  <footer>
    <p>&copy; ETU003276  &amp; ETU003277   &amp;    ETU003372</p>
  </footer>

  <script src="assets/js/script.js" defer></script>
</body>
</html>
