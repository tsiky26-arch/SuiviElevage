<?php
namespace app\controllers;

use Flight;
use app\models\AlimentationModel;

class AlimentationController {
    // private $model;

    public function __construct() {
        // $this->model = new AlimentationModel();
    }

    // Afficher le formulaire d'alimentation
    public function afficherFormulaire() {
        try {
            // Récupérer les catégories d'animaux pour afficher dans le formulaire
            $categories = $this->getCategories();
            
            // Passer les données nécessaires à la vue (template)
            Flight::render('achatAlimentation', ['categories' => $categories]);
        } catch (Exception $e) {
            echo "Erreur lors de l'affichage du formulaire : " . $e->getMessage();
        }
    }

    // Soumettre le formulaire d'alimentation
    public function soumettreFormulaire() {
        try {
            $alimentationModel = new AlimentationModel();
            // Récupérer les données du formulaire
            $quantite = Flight::request()->data->quantite;
            $categorie = Flight::request()->data->categorie;
            $date = Flight::request()->data->date;

            // Gérer l'alimentation des animaux en fonction des données du formulaire
            $alimentationModel->nourrirAnimaux();

            // Afficher un message de confirmation
            Flight::flash('success', 'Les animaux ont été alimentés avec succès.');
            Flight::redirect('/alimentation/formulaire');
        } catch (Exception $e) {
            echo "Erreur lors de la soumission du formulaire : " . $e->getMessage();
        }
    }

    // Récupérer toutes les catégories d'animaux pour afficher dans le formulaire
    public function getCategories() {
        $alimentationModel = new AlimentationModel();

        $categories = $alimentationModel->getAllCategories();
        return $categories;
    }
}
