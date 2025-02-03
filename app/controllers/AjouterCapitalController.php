<?php
namespace app\controllers;

use Flight;
use app\models\AjouterCapitalModel;

class AjouterCapitalController {
    public function __construct() {

    }

    public function afficherFormulaireAjoutCapital() {
        Flight::render('ajouterCapital');
    }

    public function ajouterCapital() {
        $ajouterCapitalModel = new AjouterCapitalModel();

        $user = $_SESSION['user'];

        $ajouterCapitalModel->addCapital($user['idUtilisateur'], $_GET['montant']);
        Flight::redirect('listeAnimaux');
    }
}
