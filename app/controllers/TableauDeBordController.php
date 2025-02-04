<?php
namespace app\controllers;

use Flight;

class TableauDeBordController {
    public function __construct() {

    }

    public function afficherFormulaire() {
        Flight::render('tableauDeBord');
    }
}
