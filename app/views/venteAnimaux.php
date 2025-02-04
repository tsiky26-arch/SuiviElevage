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
  <link rel="stylesheet" href="assets/css/venteAnimaux.css">

  <!-- Google Font Link -->
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .container {
            padding: 20px;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .products {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .product {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            width: 200px;
        }
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .product .price {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        .product .name {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        .product .reviews {
            font-size: 14px;
            color: #777;
        }
        .product .sell-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .shop-all {
            text-align: right;
            margin-top: 20px;
        }
        .shop-all a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
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
    <div class="container">
        <div class="products">
        <?php foreach ($animauxAVendre as $animal): ?>
            <div class="product">
                <form action="" method="post">
                    <img src="assets/images/banner-1.jpg" alt="Product 1">
                    <div class="price">Poids Actuel:<?= $animal['image'] ?></div>
                    <div class="name">Rendement Total:<?= $animal['image'] ?></div>
                    <div class="name">Rendement:<?= $animal['image'] ?></div>
                    <!-- <div class="reviews">★★★★★ 170 reviews</div> -->
                    <button class="sell-button">Vendre</button>
                </form>
            </div>
        </div>
      <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; ETU003276  &amp; ETU003277   &amp;    ETU003372</p>
    </footer>

  <script src="assets/js/script.js" defer></script>
</body>
</html>
