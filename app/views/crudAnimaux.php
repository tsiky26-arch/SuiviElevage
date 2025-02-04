<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Élevage d'Animaux</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/crudAnimaux.css">

</head>
<body>
    <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="#home" class="navbar-link" data-nav-link>Accueil</a></li>
            <li><a href="achatAliment" class="navbar-link"data-nav-link>Achat Aliment</a></li>
            <li><a href="achatAnimaux" class="navbar-link"data-nav-link>Achats</a></li>
            <li><a href="venteAnimaux" class="navbar-link"data-nav-link>Ventes</a></li>
        </ul>
        <a href="#" class="add-button" onclick="openModal('add')">
            <i class="fas fa-plus"></i> Ajouter
        </a>
    </nav>
    <div class="container">
        <h1>Gestion d'Élevage d'Animaux</h1>
        <table>
            <thead>
                <tr>
                    <th>Espèce</th>
                    <th>Poids Minimal Vente (kg)</th>
                    <th>Prix de Vente par kg (Ar)</th>
                    <th>Nb de Jours sans Manger</th>
                    <th>% Perte de Poids</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Poulet</td>
                    <td>1.5</td>
                    <td>8000</td>
                    <td>2</td>
                    <td>5%</td>
                    <td class="actions">
                        <button class="btn btn-modify" onclick="openModal('modify')">Modifier</button>
                        <form action="/supprimer" method="post">
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <!-- Ajoutez plus de lignes selon vos besoins -->
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Ajouter un Animal</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <form id="animalForm">
                    <label for="categorie">Catégorie</label>
                    <select id="categorie" name="categorie" required>
                        <option value="poulet">Poulet</option>
                        <option value="mouton">Mouton</option>
                        <option value="vache">Vache</option>
                        <!-- Ajoutez plus de catégories selon vos besoins -->
                    </select>
                    <label for="poidsMinimal">Poids Minimal Vente (kg)</label>
                    <input type="text" id="poidsMinimal" name="poidsMinimal" required>
                    <label for="prixVente">Prix de Vente par kg (Ar)</label>
                    <input type="text" id="prixVente" name="prixVente" required>
                    <label for="joursSansManger">Nb de Jours sans Manger</label>
                    <input type="number" id="joursSansManger" name="joursSansManger" required>
                    <label for="pertePoids">% Perte de Poids</label>
                    <input type="text" id="pertePoids" name="pertePoids" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" onclick="closeModal()">Annuler</button>
                <button type="button" class="btn btn-submit" onclick="submitForm()">Valider</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(action) {
            document.getElementById('modal').style.display = 'block';
            document.getElementById('modalTitle').innerText = action.charAt(0).toUpperCase() + action.slice(1) + " un Animal";
            // Vous pouvez ajouter des logiques spécifiques pour 'add' ou 'modify' ici
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function submitForm() {
            // Vous pouvez ajouter ici la logique pour soumettre le formulaire via AJAX
            const form = document.getElementById('animalForm');
            const formData = new FormData(form);

            fetch('/submit', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                closeModal();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
