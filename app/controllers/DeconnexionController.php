<?php
namespace app\controllers;

use Flight;

class DeconnexionController {
    public function __construct() {
        session_destroy();
        session_unset();

        Flight::redirect('/');
    }
}
