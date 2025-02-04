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

        Flight::render('achatAnimaux', ['animauxAAcheter' => $animauxAAcheter, 'prixTotal' => $prixTotal]);
        // echo var_dump($prixTotal); echo '                              ';
        // echo var_dump($animauxAAcheter);

    }


    public function calculerNouveauCapital($ancienCapital, $prixAnimalAchete) {
        return $ancienCapital - $prixAnimalAchete;
    }

    public function ajouterAnimalEleve() {
        // echo 'verification en cours du prix et de la capital'; echo '                            ';
        
        $achatAnimauxModel = new AchatAnimauxModel();

        $animalAAcheter = $achatAnimauxModel->getAnimalAVendreById($_GET['idAnimalAAcheter']);
        $prixAnimalAchete = $this->calculerPrixTotalAnimal($animalAAcheter['poidsInitiale'], $animalAAcheter['prixVente']);
        $user = $_SESSION['user'];
        $newInfoUser = $achatAnimauxModel->getUserById($user['idUtilisateur']);
        $ancienCapital = $newInfoUser['capital'];

        // echo var_dump($newInfoUser);
        // echo var_dump($animalAAcheter);

        if($prixAnimalAchete > $ancienCapital) {
            echo 'Desole votre solde est insuffisant pour effectuer cet achat';
            // Flight::render('achatAnimaux', ['erreur' => 'Desole votre solde est insuffisant pour effectuer cet achat']);
            $this->listerAnimauxAAcheter();

        }
        else if($prixAnimalAchete < $ancienCapital) {
            echo 'solde est suffisant pour effectuer cet achat';
            $nouveauCapital = $this->calculerNouveauCapital($ancienCapital, $prixAnimalAchete);
            $achatAnimauxModel->updateCapital($nouveauCapital, $user['idUtilisateur']);
            $achatAnimauxModel->insertAnimauxElever($animalAAcheter['nomAnimal'], $animalAAcheter['idCategorie'], $animalAAcheter['poidsInitiale'], $user['idUtilisateur'], $animalAAcheter['image'],'ELEVE', 'VIVANT');
            $dateAchat = new \DateTime();
            $achatAnimauxModel->insertHistoriqueAchatAnimaux($animalAAcheter['idAnimaux'], $dateAchat->format('Y,m,d'), $user['idUtilisateur'], $prixAnimalAchete);
            // Flight::render('achatAnimaux', ['succes' => 'Votre achat a ete effectue avec succes']);
            $this->listerAnimauxAAcheter();
            
            // echo $nouveauCapital . "               ";
            // echo date('Y,m,d') . "               ";
        }

    }


    public function handleRequest() {
        if(!isset($_GET['action'])) {
            $this->listerAnimauxAAcheter();
        }
        else {
            $this->ajouterAnimalEleve();
        }
    }

}
