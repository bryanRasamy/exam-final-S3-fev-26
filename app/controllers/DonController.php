<?php

namespace app\controllers;

use app\models\ProduitModel;
use app\models\DonModel;

use Flight;
use flight\Engine;

class DonController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	
	public function getinfopourinsertion() {
		$Produit=new ProduitModel($this->app->db());
		$Allproduit=$Produit->getAllProduits();

		$resultat=[
			['produit' => $Allproduit]
		];

		Flight::render('modele', ['currentPage' => 'dons', 'resultats' => $resultat]);
	}

	public function insertdon(){
		$donateur=Flight::request()->data->donateur;
		$id_produit=Flight::request()->data->id_produit;
		$quantite=Flight::request()->data->quantite;
		$date_don=Flight::request()->data->date_don;

		$donModel=new DonModel($this->app->db());
		$donModel->setdonateur($donateur);
		$donModel->setidproduit($id_produit);
		$donModel->setquantite($quantite);
		$donModel->setdate_don($date_don);

		$donModel->insererDon();

		Flight::redirect('/dons');
	}

	public function simulerDistribution(){
		$DonModel = new DonModel($this->app->db());
		$dons = $DonModel->getAllDons();
		$besoins = $DonModel->getAllBesoins();

		$besoinRestant = [];
		foreach ($besoins as $b) {
			$besoinRestant[$b['id_besoin']] = $b['quantite'];
		}

		$distributions = [];

		$DonModel->clearSimulation();

		foreach ($dons as $don) {
			$resteDon = $don['quantite'];

			foreach ($besoins as $besoin) {
				if ($resteDon <= 0) break;

				if ($don['id_produit'] != $besoin['id_produit']) continue;
				if ($besoinRestant[$besoin['id_besoin']] <= 0) continue;

				$attribue = min($resteDon, $besoinRestant[$besoin['id_besoin']]);

				$DonModel->insertSimulation($besoin['id_besoin'], $don['id_don'], $attribue);

				$distributions[] = [
					'date' => $don['date'],
					'produit_nom' => $don['produit_nom'],
					'don_quantite' => $don['quantite'],
					'ville' => $besoin['ville'],
					'quantite_attribuee' => $attribue,
					'reste_besoin' => $besoinRestant[$besoin['id_besoin']] - $attribue
				];

				$besoinRestant[$besoin['id_besoin']] -= $attribue;
				$resteDon -= $attribue;
			}
		}

		return $distributions;
	}
}