<?php
namespace app\controllers;

use Flight;
use app\models\VenteAnimauxModel;

class VenteAnimauxController {
    public function __construct() {

    }

    public function listerAnimauxAVendre() {
        $venteAnimauxModel = new VenteAnimauxModel();
        $user = $_SESSION['user'];
        $animauxAVendre = $venteAnimauxModel->listeDispoAVendre($user['idUtilisateur']);
        Flight::render('venteAnimaux', ['animauxAVendre' => $animauxAVendre]);
    }

    public function handleRequest() {
        if(!isset($_GET['action'])) {
            $this->listerAnimauxAVendre();
        } else {
            $this->vendreAnimal();
        }
    }
}
