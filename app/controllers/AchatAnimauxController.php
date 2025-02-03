<?php
namespace app\controllers;

use Flight;
use app\models\AchatAnimauxModel;

class AchatAnimauxController {
    public function __construct() {

    }

    public function calculerPrixTotalAnimal($poids, $prixParKg) {
        $prixTotalAnimal = $poids * $prixParKg;

        return $prixTotalAnimal;
    }
    
    public function listerAnimauxAAcheter() {
        $achatAnimauxModel = new AchatAnimauxModel();

        $animauxAAcheter = $achatAnimauxModel->getAllAnimauxAAcheter();

        foreach ($animauxAAcheter as $key => $animalAAcheter) {
            $animalAAcheter['prixTotal'] = $this->calculerPrixTotalAnimal($animalAAcheter['poidsInitial'], $animalAAcheter['prixVente']);
        }

        Flight::render('achatAnimaux', ['animauxAAcheter' => $animalAAcheter]);

    }


    public function calculerNouveauCapital() {

    }

    public function ajouterAnimalEleve() {

    }

}
