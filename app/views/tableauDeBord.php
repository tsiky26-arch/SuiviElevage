<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Élevage</title>
    <link rel="stylesheet" href="assets/css/tableauDeBord.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="assets/js/tableauDeBord.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <h1>Gestion d'Élevage</h1>
            <input type="date" id="dateInput" />
            <button id="showDataBtn">Afficher les données</button>
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

    <main id="mainContent" style="display: none;">
        <section id="dashboard" class="container">
            <h2>📊 Tableau de Bord</h2>
            <div class="grid">
                <div class="card"><h3>💰 Capital Actuel</h3><p id="capital">...</p></div>
                <div class="card"><h3>🐄 Nombre Total d'Animaux</h3><p id="totalAnimaux">...</p></div>
                <div class="card"><h3>✅ Vivants / ☠️ Morts</h3><p id="etatAnimaux">...</p></div>
                <div class="card"><h3>💲 Prêts à Vendre</h3><p id="pretVente">...</p></div>
                <div class="card alert" id="stockAlert"><h3>🌽 Stock d’Aliments</h3><p id="stockAliments">...</p></div>
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
                <tbody id="animalTableBody"></tbody>
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
                <tbody id="stockTableBody"></tbody>
            </table>
        </section>

        <section id="graphique" class="container">
            <h2>📈 Ventes & Achats</h2>
            <canvas id="venteChart"></canvas>
        </section>
    </main>

    <footer>
        <p>&copy; ETU003276 ETU003277 ETU003372</p>
    </footer>

    <script>
        $(document).ready(function () {
            $("#showDataBtn").click(function () {
                const selectedDate = $("#dateInput").val();
                if (!selectedDate) {
                    alert("Veuillez sélectionner une date.");
                    return;
                }
                $.ajax({
                    url: "/tableaubord/getData",
                    method: "POST",
                    data: { date: selectedDate },
                    success: function (response) {
                        $("#capital").text(response.capital || "Non disponible");
                        $("#totalAnimaux").text(response.totalAnimaux || "Non disponible");
                        $("#etatAnimaux").text(`${response.vivants} / ${response.morts}` || "Non disponible");
                        $("#pretVente").text(response.pretVente || "Non disponible");
                        $("#stockAliments").text(response.stockAliments || "Non disponible");
                        populateAnimalTable(response.animaux);
                        populateStockTable(response.stock);
                        $("#mainContent").show();
                    },
                    error: function () {
                        alert("Erreur lors de la récupération des données.");
                    }
                });
            });

            function populateAnimalTable(animaux) {
                let tbody = $("#animalTableBody");
                tbody.empty();
                animaux.forEach(animal => {
                    tbody.append(`
                        <tr>
                            <td><img src="${animal.image}" alt="${animal.nom}" class="animal-img"></td>
                            <td>${animal.nom}</td>
                            <td>${animal.poids} kg</td>
                            <td>${animal.statut}</td>
                            <td>${animal.categorie}</td>
                            <td>${animal.dateAchat}</td>
                            <td>${animal.prixEstime}€</td>
                        </tr>
                    `);
                });
            }

            function populateStockTable(stock) {
                let tbody = $("#stockTableBody");
                tbody.empty();
                stock.forEach(item => {
                    tbody.append(`
                        <tr>
                            <td>${item.type}</td>
                            <td class="alert">${item.stockRestant} kg</td>
                            <td>${item.consoParJour} kg</td>
                            <td>⚠️ ${item.previsionEpuisement} jours</td>
                        </tr>
                    `);
                });
            }
        });
    </script>
</body>
</html>
