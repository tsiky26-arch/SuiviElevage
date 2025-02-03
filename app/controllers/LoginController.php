<?php
namespace app\controllers;

use Flight;
// use app\models\LoginModel;
session_start();

class LoginController {
    public function __construct() {

    }

    public function checkLogin() {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $loginModel = new LoginModel();
        $user = $loginModel->getUser($email, $mdp);

        if($user == NULL) {
            Flight::render('/', ['erreur' => 'Veuillez verifier les informations saisies']);
        } else {
            $_SESSION['user'] = $user;
            Flight::redirect('accueil');
        }
    }
}
