<?php

use app\controllers\BesoinController;
use app\controllers\DonController;
use app\controllers\ProduitController;
use app\controllers\VilleController;
use app\models\DonModel;

use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */


$router->group('', function(Router $router) use ($app) {
	$ville = new VilleController($app);

	$router->get('/',[$ville,'index']);

	$router->get('/modele',function(){
		Flight::render('modele');
	});

	$besoin = new BesoinController($app);
	$router->get('/besoin',[$besoin,'getinfopourinsertion']);

	$router->post('/besoin/insert',[$besoin,'insertbesoin']);

	$produit = new ProduitController($app);
	$router->get('/produits',[$produit,'getinfopourinsertion']);

	$router->post('/produits/insert',[$produit,'insertproduit']);

	$don = new DonController($app);
	$router->get('/dons',[$don,'getinfopourinsertion']);

	$router->post('/dons/insert',[$don,'insertdon']);

	$router->get('/distributions', function () use ($don){
		$distributions = $don->calculerDistribution();
		Flight::render('modele', ['distributions' => $distributions, 'currentPage' => 'distributions']);
	});

	$router->post('/distributions/valider', function () use ($don){
		$don->validerDistribution();
		Flight::redirect('/distributions');
	});

	$router->get('/recapitulation', function (){
		Flight::render('modele', ['currentPage' => 'recapitulation']);
	});

	$router->get('/api/recapitulation', function () use ($don){
		$data = $don->getRecapData();
		Flight::json($data);
	});

	
	$router->get('/achats', function () use ($don, $app){
		$besoinsRestants = $don->getBesoinsRestants();
		$donModel = new DonModel($app->db());
		$argentDispo = $donModel->getArgentDisponible();
		Flight::render('modele', [
			'currentPage' => 'achats',
			'besoinsRestants' => $besoinsRestants,
			'argentDispo' => $argentDispo
		]);
	});

	$router->post('/api/achat', function () use ($don){
		$result = $don->effectuerAchat();
		Flight::json($result);
	});

	$router->get('/api/argent-disponible', function () use ($app){
		$donModel = new DonModel($app->db());
		$argentDispo = $donModel->getArgentDisponible();
		Flight::json(['argentDispo' => $argentDispo]);
	});

	
	$router->get('/ville',[$ville,'index']);

	$villedetail = new VilleController($app);
    $router->get('/ville/detail/@id_ville', [$villedetail, 'detail']);

	$router->get('/clear', function () use ($app) {
		$donModel = new DonModel($app->db());
		$donModel->clearSimulation();
		Flight::redirect('/distributions');
	});
});