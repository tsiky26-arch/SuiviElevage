<?php
namespace app\controllers;

use Flight;
use app\models\TableauBordModel;

class TableauBordController {

    public function __construct()
    {
        
    }

    public function afficherFormulaire(){
        Flight::render('tableauDeBord');
    }

    public function getDataByDate() {
        // Récupérer la date envoyée par la requête POST
        $date = $_GET['date'];
        $user = $_SESSION['user'];  // Utilisateur qui fait la demande (par exemple)
        $idUtilisateur = $user['idUtilisateur'];  // Utilisateur qui fait la demande (par exemple)

        // Créer une instance du modèle TableauBordModel
        $model = new TableauBordModel();

        // Obtenir les données basées sur l'utilisateur et la date
        $capital = $model->GetCapital($idUtilisateur, $date);
        $nombreAnimauxEleves = $model->NombreTotalAnimauxElever($idUtilisateur, $date);
        $nombreAnimauxMorts = $model->getNombreAnimauxMorts($idUtilisateur, $date);
        $nombreAnimauxPretsAVendre = $model->getNombreAnimauxPretsAVendre($idUtilisateur, $date);
        $nombreAlimentsDisponibles = $model->getNombreAlimentsDisponibles($idUtilisateur, $date);

        // Préparer une réponse avec ces données
        $response = [
            'capital' => $capital,
            'nombreAnimauxEleves' => $nombreAnimauxEleves,
            'nombreAnimauxMorts' => $nombreAnimauxMorts,
            'nombreAnimauxPretsAVendre' => $nombreAnimauxPretsAVendre,
            'nombreAlimentsDisponibles' => $nombreAlimentsDisponibles
        ];

        // Retourner les données sous forme de réponse JSON
        Flight::json($response);
    }
}

// Enregistrer la route
