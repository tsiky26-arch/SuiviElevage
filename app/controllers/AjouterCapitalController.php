<?php
namespace app\controllers;

use Flight;
use app\models\AjouterCapitalModel;
// session_start();

class AjouterCapitalController {
    public function __construct() {

    }

    public function afficherFormulaireAjoutCapital() {
        Flight::render('ajoutCapital');
    }

    public function ajouterCapital() {
        $ajouterCapitalModel = new AjouterCapitalModel();

        $user = $_SESSION['user'];

        $ajouterCapitalModel->addCapital($user['idUtilisateur'], $_GET['montant']);
        Flight::redirect('listeAnimaux');
    }

    public function handleRequest() {
        if(!isset($_GET['montant'])) {
            $this->afficherFormulaireAjoutCapital();
        } else {
            $this->ajouterCapital();
        }
    }
}
