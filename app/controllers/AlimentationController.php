<?php
namespace app\controllers;

use Flight;
use app\models\AlimentationModel;

class AlimentationController {
    private $model;

    public function __construct() {
        $this->model = new AlimentationModel();
    }

    // Afficher le formulaire d'alimentation
    public function afficherFormulaire() {
        try {
            // Récupérer les catégories d'animaux pour afficher dans le formulaire
            $categories = $this->getCategories();
            
            // Passer les données nécessaires à la vue (template)
            Flight::render('alimentation/formulaire', ['categories' => $categories]);
        } catch (Exception $e) {
            echo "Erreur lors de l'affichage du formulaire : " . $e->getMessage();
        }
    }

    // Soumettre le formulaire d'alimentation
    public function soumettreFormulaire() {
        try {
            // Récupérer les données du formulaire
            $quantite = Flight::request()->data->quantite;
            $categorie = Flight::request()->data->categorie;
            $date = Flight::request()->data->date;

            // Gérer l'alimentation des animaux en fonction des données du formulaire
            $this->model->nourrirAnimaux();

            // Afficher un message de confirmation
            Flight::flash('success', 'Les animaux ont été alimentés avec succès.');
            Flight::redirect('/alimentation/formulaire');
        } catch (Exception $e) {
            echo "Erreur lors de la soumission du formulaire : " . $e->getMessage();
        }
    }

    // Récupérer toutes les catégories d'animaux pour afficher dans le formulaire
    private function getCategories() {
        $query = "SELECT idCategorie, nom FROM elevage_Categories";
        $stmt = Flight::db()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
