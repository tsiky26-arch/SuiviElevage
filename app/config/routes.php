<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\LoginController;
use app\controllers\AcceuilController;
use app\controllers\AccueilController;
use app\controllers\InscriptionController;
use app\controllers\AchatAnimauxController;
use app\controllers\ListeAnimauxController;
use app\controllers\AjouterCapitalController;
use app\controllers\VenteAnimauxController;
// use app\controllers\TableauDeBordController;
use app\controllers\TableauBordController;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/


// $router->get('/hello-world/@name', function($name) {
// 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
// });

$inscriptionController = new InscriptionController();
$loginController = new LoginController();
$accueilController = new AccueilController();
$ajouterCapitalController = new AjouterCapitalController();
$listeAnimauxController = new ListeAnimauxController();
$achatAnimauxController = new AchatAnimauxController();
$venteAnimauxController = new VenteAnimauxController();
$tableauDeBordController = new TableauBordController();

$router->get('/', [$inscriptionController, 'afficherFormulaireInscription']);
$router->post('/inscription', [$inscriptionController, 'ajouterUtilisateur']);

$router->post('/login', [$loginController, 'checkLogin']);

$router->get('/accueil', [$accueilController, 'afficherAccueil']);

$router->get('/ajoutCapital', [$ajouterCapitalController, 'handleRequest']);

$router->get('/listeAnimaux', [$listeAnimauxController, 'listerAnimaux']);

$router->get('/achatAnimaux', [$achatAnimauxController, 'handleRequest']);
// $router->get('/achatAnimaux?action=acheter', [$achatAnimauxController, 'ajouterAnimalEleve']);

$router->get('/venteAnimaux', [$venteAnimauxController, 'handleRequest']);

// $router->get('/tableauDeBord', [$tableauDeBordController, 'afficherFormulaire']);

$router->post('/tableauDeBord', [$tableauDeBordController, 'getDataByDate']);

// Flight::route('POST /get-data', [new TableauBordController(), 'getDataByDate']);







