<?php
namespace app\controllers;

use app\models\AlimentationModel;
use Flight;

class AlimentationController {
    private $model;

    public function __construct() {
        $this->model = new AlimentationModel();
    }

    // Page pour nourrir les animaux et afficher un message
    public function nourrirAnimaux() {
        try {
            $this->model->nourrirAnimaux();
            Flight::render('alimentation/nourrir', ['message' => "L'alimentation automatique a été effectuée avec succès."]);
        } catch (\Exception $e) {
            Flight::render('alimentation/nourrir', ['error' => "Une erreur s'est produite : " . $e->getMessage()]);
        }
    }

    // Afficher le quota alimentaire d'une catégorie
    public function getQuotaAlimentaire($idCategorie) {
        try {
            $quota = $this->model->getQuotaAlimentaire($idCategorie);
            Flight::render('alimentation/quota', ['idCategorie' => $idCategorie, 'quota' => $quota]);
        } catch (\Exception $e) {
            Flight::render('alimentation/quota', ['error' => "Erreur lors de la récupération du quota."]);
        }
    }

    // Afficher le gain alimentaire d'un aliment
    public function getGainAlimentaire($idAlimentation) {
        try {
            $gain = $this->model->getGainAlimentaire($idAlimentation);
            Flight::render('alimentation/gain', ['idAlimentation' => $idAlimentation, 'gain' => $gain]);
        } catch (\Exception $e) {
            Flight::render('alimentation/gain', ['error' => "Erreur lors de la récupération du gain alimentaire."]);
        }
    }

    // Mettre à jour le poids d'un animal
    public function updatePoidsAnimal() {
        $idAnimaux = Flight::request()->data->idAnimaux;
        $poids = Flight::request()->data->poids;
        
        try {
            $this->model->updatePoidsAnimal($idAnimaux, $poids);
            Flight::render('alimentation/updatePoids', ['message' => "Poids de l'animal mis à jour avec succès."]);
        } catch (\Exception $e) {
            Flight::render('alimentation/updatePoids', ['error' => "Erreur lors de la mise à jour du poids."]);
        }
    }

    // Mettre à jour le stock d'un aliment
    public function updateStockAliment() {
        $idAlimentation = Flight::request()->data->idAlimentation;
        $nouveauStock = Flight::request()->data->nouveauStock;

        try {
            $this->model->updateStockAliment($idAlimentation, $nouveauStock);
            Flight::render('alimentation/updateStock', ['message' => "Stock mis à jour avec succès."]);
        } catch (\Exception $e) {
            Flight::render('alimentation/updateStock', ['error' => "Erreur lors de la mise à jour du stock."]);
        }
    }

    // Marquer un animal comme mort
    public function setAnimalMort() {
        $idAnimaux = Flight::request()->data->idAnimaux;

        try {
            $this->model->setAnimalMort($idAnimaux);
            Flight::render('alimentation/mort', ['message' => "L'animal a été marqué comme mort."]);
        } catch (\Exception $e) {
            Flight::render('alimentation/mort', ['error' => "Erreur lors du changement d'état de l'animal."]);
        }
    }

    // Enregistrer une alimentation dans l'historique
    public function logAlimentation() {
        $idAnimaux = Flight::request()->data->idAnimaux;
        $quantite = Flight::request()->data->quantite;
        $idAliment = Flight::request()->data->idAliment;

        try {
            $this->model->logAlimentation($idAnimaux, $quantite, $idAliment);
            Flight::render('alimentation/log', ['message' => "Historique d'alimentation enregistré avec succès."]);
        } catch (\Exception $e) {
            Flight::render('alimentation/log', ['error' => "Erreur lors de l'enregistrement de l'alimentation."]);
        }
    }
}
