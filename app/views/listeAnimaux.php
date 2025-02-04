

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FermePro - Gestion d'Élevage d'Animaux</title>

  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">

  <link rel="stylesheet" href="assets/css/listeAnimaux.css">

  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body id="top">
  <header class="header">
    <nav class="navbar">
      <ul class="navbar-list">
        <li><a href="listeAnimaux" class="navbar-link">Liste de mes animaux</a></li>
        <li><a href="achatAliment" class="navbar-link">Achat Aliment</a></li>
        <li><a href="achatAnimaux" class="navbar-link">Achats</a></li>
        <li><a href="venteAnimaux" class="navbar-link">Ventes</a></li>
        <li><a href="ajoutCapital" class="navbar-link">Ajouter capital</a></li>
        <li class="navbar-link">Votre capital = <?= $capital ?>Ar</li>
        <li><a href="deconnexion" class="navbar-link">Deconnexion</a></li>

      </ul>
    </nav>
  </header>

  <main>
    <section class="cards-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; padding: 40px;">
      <?php if($animaux!=NULL) { ?>
        <?php foreach ($animaux as $animal): ?>
          <div class="card">
            <img src="<?= $animal['image'] ?>" alt="Image de <?= $animal['nom'] ?>">
            <div class="card-overlay">
              <h2><?= $animal['nom'] ?></h2>
              <p>Poids: <?php if($animal['poidsVariable'] != NULL ) {echo $animal['poidsVariable'];} else {echo $animal['poidsInitiale'];}  ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php } else { ?>
        <p>Vous n'avez pas encore d'animal</p>
      <?php } ?>
    </section>
  </main>

  <footer>
    <p>&copy; ETU003276  &amp; ETU003277   &amp;    ETU003372</p>
  </footer>

  <script src="assets/js/script.js" defer></script>
</body>
</html>

