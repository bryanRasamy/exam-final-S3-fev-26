<?php

namespace app\controllers;

use app\models\ProduitModel;

use Flight;
use flight\Engine;

class ProduitController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	
	public function getinfopourinsertion() {
		$Produit=new ProduitModel($this->app->db());
		$Allcategorie=$Produit->getAllCategories();

		$resultat=[
			['categorie' => $Allcategorie]
		];

		Flight::render('modele', ['currentPage' => 'produits', 'resultats' => $resultat]);
	}

	public function insertproduit(){
		$id_categorie=Flight::request()->data->id_categorie;
		$nom=Flight::request()->data->nom;
		$prix_unitaire=Flight::request()->data->prix_unitaire;

		$produitModel=new ProduitModel($this->app->db());
		$produitModel->setidcategorie($id_categorie);
		$produitModel->setnom($nom);
		$produitModel->setprixunitaire($prix_unitaire);

		$produitModel->insererProduit();

		Flight::redirect('/produits');
	}
}
