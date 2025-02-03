<?php
namespace app\controllers;

use Flight;


class AccueilController {
    public function __construct() {

    }

    public function afficherAccueil() {
        Flight::render('accueil');
    }
}
