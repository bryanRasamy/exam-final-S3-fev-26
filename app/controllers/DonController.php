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

	public function calculerDistribution(){
		$DonModel = new DonModel($this->app->db());
		$dons = $DonModel->getAllDons();
		$besoins = $DonModel->getAllBesoins();

		$besoinRestant = [];
		foreach ($besoins as $b) {
			$besoinRestant[$b['id_besoin']] = $b['quantite'];
		}

		$distributions = [];

		foreach ($dons as $don) {
			$resteDon = $don['quantite'];

			foreach ($besoins as $besoin) {
				if ($resteDon <= 0) break;
				if ($don['id_produit'] != $besoin['id_produit']) continue;
				if ($besoinRestant[$besoin['id_besoin']] <= 0) continue;

				$attribue = min($resteDon, $besoinRestant[$besoin['id_besoin']]);

				$distributions[] = [
					'id_besoin' => $besoin['id_besoin'],
					'id_don' => $don['id_don'],
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

	public function validerDistribution(){
		$DonModel = new DonModel($this->app->db());

		$distributions = $this->calculerDistribution();

		$DonModel->clearSimulation();
		foreach ($distributions as $d) {
			$DonModel->insertSimulation($d['id_besoin'], $d['id_don'], $d['quantite_attribuee']);
		}

		return $distributions;
	}

	public function getRecapData(){
		$DonModel = new DonModel($this->app->db());
		return $DonModel->getRecapMontants();
	}

	public function getBesoinsRestants(){
		$DonModel = new DonModel($this->app->db());
		return $DonModel->getBesoinsRestantsParVille();
	}

	public function effectuerAchat(){
		$id_besoin = Flight::request()->data->id_besoin;
		$quantite = Flight::request()->data->quantite;
		$frais_pourcent = Flight::request()->data->frais_pourcent;

		$DonModel = new DonModel($this->app->db());

		// Vérifier que le besoin existe et récupérer ses infos
		$besoin = $DonModel->getBesoinById($id_besoin);
		if (!$besoin) {
			return ['erreur' => 'Besoin introuvable.'];
		}

		// Vérifier qu'il n'y a plus de dons en nature disponibles pour ce produit
		$donsNatureRestants = $DonModel->getDonsNatureRestants($besoin['id_produit']);
		if ($donsNatureRestants > 0) {
			return ['erreur' => 'Il reste encore ' . $donsNatureRestants . ' unités de dons en nature pour ce produit. Utilisez d\'abord les dons en nature.'];
		}

		// Calculer le coût avec les frais
		$prix_unitaire = $besoin['prix_unitaire'];
		$cout_base = $quantite * $prix_unitaire;
		$frais = $cout_base * ($frais_pourcent / 100);
		$cout_total = $cout_base + $frais;

		// Vérifier que l'argent disponible est suffisant
		$argentDispo = $DonModel->getArgentDisponible();
		if ($cout_total > $argentDispo) {
			return ['erreur' => 'Argent insuffisant. Disponible: ' . number_format($argentDispo, 0, ',', ' ') . ' Ar, Nécessaire: ' . number_format($cout_total, 0, ',', ' ') . ' Ar'];
		}

		// Enregistrer l'achat
		$DonModel->insererAchat($id_besoin, $quantite, $prix_unitaire, $frais_pourcent, $cout_total);

		return ['succes' => true, 'cout_total' => $cout_total];
	}
}