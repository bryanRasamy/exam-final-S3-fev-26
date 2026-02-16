<?php

use app\controllers\GestionLivraisonController;
use app\controllers\BeneficeControllers;
use app\controllers\InfoController;
use app\controllers\ZoneLivraisonControllers;
use app\controllers\UserController;
use app\controllers\EchangeController;

use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {
	$gestioncontroller = new GestionLivraisonController($app);
	$router->get('/',function(){
		Flight::render('login');
	});

	$router->get('/modele',function(){
		Flight::render('utilisateur/Modele');
	});

	$router->get('/admin',function(){
		Flight::render('admin/modele');
	});

	$user = new UserController($app);
	$echange = new EchangeController($app);

	$router->get('/admin?page=statistique',[$user,'getnombreuser']);
	$router->get('/admin',[$echange,'getnombreechangeeffectuer']);

	$router->get('/gestion/livraison', [$gestioncontroller,'getinfopourinsertion']);
	$router->post('/gestion/livraison/inserer', [$gestioncontroller,'insertlivraison']);

	$benefice = new BeneficeControllers($app);
	$router->get('/benefice/jour', [$benefice, 'getBeneficeJour']);
	$router->get('/benefice/mois',[$benefice, 'getBeneficeMois']);
	$router->get('/benefice/annee',[$benefice, 'getBeneficeAnnee']);

	$router->get('/societe/info',function(){
		Flight::render('info');
	});

	$infocontroller = new InfoController($app);
	$router->get('/societe/info/livreurs',[$infocontroller,'getinfolivreurs']);
	$router->get('/societe/info/vehicules',[$infocontroller,'getinfovehicules']);
	$router->get('/societe/info/colis',[$infocontroller,'getinfocolis']);
	$router->get('/societe/info/livraisons',[$infocontroller,'getinfolivraisons']);
	
	$zonecontroller = new ZoneLivraisonControllers($app);
	$router->get('/zone/gestion', [$zonecontroller ,'getAllZones']);
	$router->get('/zone/supprimer/@id', [$zonecontroller, 'supprimerzone']);
	$router->get('/zone/ajouter/@id', [$zonecontroller, 'insererzone']);
});