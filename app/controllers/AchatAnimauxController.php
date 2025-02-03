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

        $animauxAAcheter = $achatAnimauxModel->getAllAnimauxAVendre();

        foreach ($animauxAAcheter as $key => $animalAAcheter) {
            $prixTotal[] = $this->calculerPrixTotalAnimal($animalAAcheter['poidsInitiale'], $animalAAcheter['prixVente']);
        }

        Flight::render('achatAnimaux', ['animauxAAcheter' => $animalAAcheter, 'prixTotal' => $prixTotal]);
        // echo var_dump($prixTotal); echo '                              ';
        // echo var_dump($animauxAAcheter);

    }


    public function calculerNouveauCapital() {

    }

    public function ajouterAnimalEleve() {

    }

}
