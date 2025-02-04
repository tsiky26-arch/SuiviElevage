<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Alimentation des Animaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulaire d'Alimentation des Animaux</h1>

        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group mb-3">
                <label for="quantite">Quantité d'Aliment (en kg)</label>
                <input type="number" class="form-control" id="quantite" name="quantite" required>
            </div>

            <div class="form-group mb-3">
                <label for="categorie">Catégorie d'Animal</label>
                <select class="form-control" id="categorie" name="categorie" required>
                    <option value="">Sélectionnez une catégorie</option>
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?php echo $categorie['idCategorie']; ?>"><?php echo $categorie['categorie']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="date">Date d'Alimentation</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>

        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Retour à l'Accueil</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
