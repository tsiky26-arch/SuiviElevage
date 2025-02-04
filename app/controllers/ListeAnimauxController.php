<?php
namespace app\controllers;

use Flight;
use app\models\ListeAnimauxModel;
// session_start();

class ListeAnimauxController {
    public function __construct() {

    }

    public function listerAnimaux() {
        $listeAnimauxModel = new ListeAnimauxModel();

        $user = $_SESSION['user'];

        $animaux = $listeAnimauxModel->getAllAnimauxById($user['idUtilisateur']);

        // $user = $_SESSION['user'];
        $newInfoUser = $listeAnimauxModel->getUserById($user['idUtilisateur']);
        $ancienCapital = $newInfoUser['capital'];

        Flight::render('listeAnimaux', ['animaux' => $animaux, 'capital' => $ancienCapital]); 
        // echo var_dump($animaux);
    } 
}
