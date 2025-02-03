<?php
namespace app\controllers;

use Flight;
use app\models\InscriptionModel;

class InscriptionController {
    public function __construct() {

    }

    public function afficherFormulaireInscription() {
        Flight::render('inscription');
    }

    public function ajouterUtilisateur() {
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];

        $inscriptionModel = new InscriptionModel();
        $inscriptionModel->addUser($nom, $email, $mdp);
        Flight::redirect('/');
    }
}
