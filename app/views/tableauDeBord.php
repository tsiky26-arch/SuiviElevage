<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Élevage</title>
    <link rel="stylesheet" href="assets/css/tableauDeBord.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="assets/js/tableauDeBord.js"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <h1>Gestion d'Élevage</h1>
            <nav>
                <ul>
                    <li><a href="#dashboard">Tableau de Bord</a></li>
                    <li><a href="#animaux">Animaux</a></li>
                    <li><a href="#stock">Stock</a></li>
                    <li><a href="#graphique">Statistiques</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="dashboard" class="container">
            <h2>📊 Tableau de Bord</h2>
            <div class="grid">
                <div class="card">
                    <h3>💰 Capital Actuel</h3>
                    <p id="capital">1500 €</p>
                </div>
                <div class="card">
                    <h3>🐄 Nombre Total d'Animaux</h3>
                    <p id="totalAnimaux">120</p>
                </div>
                <div class="card">
                    <h3>✅ Vivants / ☠️ Morts</h3>
                    <p id="etatAnimaux">110 / 10</p>
                </div>
                <div class="card">
                    <h3>💲 Prêts à Vendre</h3>
                    <p id="pretVente">15</p>
                </div>
                <div class="card alert" id="stockAlert">
                    <h3>🌽 Stock d’Aliments</h3>
                    <p id="stockAliments">50 kg</p>
                </div>
            </div>
        </section>

        <section id="animaux" class="container">
            <h2>🐾 Liste des Animaux</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Poids</th>
                        <th>Statut</th>
                        <th>Catégorie</th>
                        <th>Date d'achat</th>
                        <th>Prix estimé</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="poulet.jpg" alt="Poulet" class="animal-img"></td>
                        <td>Poulet 1</td>
                        <td>2.5 kg</td>
                        <td class="statut ready">🟡 Prêt à vendre</td>
                        <td>Poulet</td>
                        <td>01/01/2024</td>
                        <td>15€</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="stock" class="container">
            <h2>🍽️ Stock d'Aliments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Stock Restant</th>
                        <th>Consommation/jour</th>
                        <th>Prévision d'épuisement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maïs</td>
                        <td class="alert">5 kg</td>
                        <td>10 kg</td>
                        <td>⚠️ 0.5 jour</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="graphique" class="container">
            <h2>📈 Ventes & Achats</h2>
            <canvas id="venteChart"></canvas>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Gestion d'Élevage | Tous droits réservés</p>
    </footer>
</body>
</html>
