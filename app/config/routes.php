<?php

use app\controllers\BesoinController;
use app\controllers\DonController;
use app\controllers\VilleController;

use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */


$router->group('', function(Router $router) use ($app) {
	$router->get('/',function(){
		Flight::render('modele');
	});

	$router->get('/modele',function(){
		Flight::render('modele');
	});

	$besoin = new BesoinController($app);
	$router->get('/besoin',[$besoin,'getinfopourinsertion']);

	$router->post('/besoin/insert',[$besoin,'insertbesoin']);

	$don = new DonController($app);
	$router->get('/dons',[$don,'getinfopourinsertion']);

	$router->post('/dons/insert',[$don,'insertdon']);

	$router->get('/distributions', function () use ($don){
		$distributions = $don->simulerDistribution();
		Flight::render('modele', ['distributions' => $distributions, 'currentPage' => 'distributions']);
	});

	$ville = new VilleController($app);
	$router->get('/ville',[$ville,'index']);
});