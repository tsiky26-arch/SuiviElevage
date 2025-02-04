<?php
namespace app\controllers;

use Flight;
use app\models\VenteAnimauxModel;

class VenteAnimauxController {
    public function __construct() {

    }

    public function calculerPrixTotalAnimal($poids, $prixParKg) {
        $prixTotalAnimal = $poids * $prixParKg;

        return $prixTotalAnimal;
    }

    public function calculerNouveauCapital($ancienCapital, $prixAnimalAchete) {
        return $ancienCapital - $prixAnimalAchete;
    }

    public function listerAnimauxAVendre() {
        $venteAnimauxModel = new VenteAnimauxModel();
        $user = $_SESSION['user'];
        $animaux = $venteAnimauxModel->getAllAnimauxElever($user['idUtilisateur']);

        foreach ($animaux as $key => $animal) {
            # code...
            if($animal['poidsVariable'] > $animal['poidsMin']) {
                $prixTotal[] = calculerPrixTotalAnimal($animal['poidsVariable'], $animal['prixVente']);
                $venteAnimauxModel->insertAnimauxAVendre($user['idUtilisateur'], $animal['idCategorie'], $animal['idanimaux'],$animal['poidsVariable'], $animal['prixVente']);
            }
        }

        $animauxQuiPeuventEtreVendu = $venteAnimauxModel->getAllAnimauxQuiPeuxEtreVendu($user['idUtilisateur']);

        if($animauxQuiPeuventEtreVendu == NULL) {
            Flight::render('venteAnimaux', ['message' => 'Vous n avez pas encore d animal pouvant etre vendu']);
        }
        else {
            Flight::render('venteAnimaux', ['animauxQuiPeuventEtreVendu' => $animauxQuiPeuventEtreVendu, 'prixTotal' => @$prixTotal]);
        }


    }

    public function handleRequest() {
        if(!isset($_GET['action'])) {
            $this->listerAnimauxAVendre();
        } else {
            $this->vendreAnimal();
        }
    }
}
