<?php

namespace app\controllers;

use app\models\VilleModel;
use app\models\ProduitModel;
use app\models\BesoinModel;

use Flight;
use flight\Engine;

class BesoinController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	
	public function getinfopourinsertion() {
		
		$Ville=new VilleModel($this->app->db());
		$Allville=$Ville->getAllVilles();

		$Produit=new ProduitModel($this->app->db());
		$Allproduit=$Produit->getAllProduits();

		$resultat=[
			['ville' => $Allville],
			['produit' => $Allproduit]
		];

		Flight::render('modele', ['currentPage' => 'besoins', 'resultats' => $resultat]);
	}

	public function insertbesoin(){
		$id_ville=Flight::request()->data->id_ville;
		$id_produit=Flight::request()->data->id_produit;
		$quantite=Flight::request()->data->quantite;

		$besoinModel=new BesoinModel($this->app->db());
		$besoinModel->setidville($id_ville);
		$besoinModel->setidproduit($id_produit);
		$besoinModel->setquantite($quantite);

		$besoinModel->insererBesoin();

		Flight::redirect('/besoin');
	}
}