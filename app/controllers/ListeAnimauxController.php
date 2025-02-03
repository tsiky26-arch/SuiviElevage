<?php
namespace app\controllers;

use Flight;
use app\models\ListeAnimauxModel;

class ListeAnimauxController {
    public function __construct() {

    }

    public function listerAnimaux() {
        $listeAnimauxModel = new ListeAnimauxModel();

        // $user = $_SESSION['user'];

        // $animaux = $listeAnimauxModel->getAllAnimauxById($user['idUtilisateur']);
        Flight::render('listeAnimaux', ['animaux' => $animaux]); 
    } 
}
