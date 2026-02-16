<?php

namespace app\controllers;

use app\models\ColisModel;
use app\models\LivraisonModel;
use app\models\LivreurModel;
use app\models\VehiculeModel;

use Flight;
use flight\Engine;

class InfoController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function getinfolivreurs() {
		$livreur=new LivreurModel($this->app->db());
		$Alllivreur=$livreur->getAll();

		Flight::render('infolivreur',['livreurs' => $Alllivreur]);
	}

	public function getinfovehicules() {
		$vehicule=new VehiculeModel($this->app->db());
		$Allvehicule=$vehicule->getAll();

		Flight::render('infovehicule',['vehicules' => $Allvehicule]);
	}

	public function getinfocolis() {
		$Colis=new ColisModel($this->app->db());
		$Allcolis=$Colis->getAllcolis();

		Flight::render('infocolis',['colis' => $Allcolis]);
	}

	public function getinfolivraisons() {
		$livraison=new LivraisonModel($this->app->db());
		$Alllivraisons=$livraison->getAll();

		Flight::render('infolivraison',['livraisons' => $Alllivraisons]);
	}

	
}