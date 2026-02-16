<?php
namespace app\controllers;

use app\models\HistoLivraisonModel;


use Flight;
use flight\Engine;

class BeneficeControllers {
    protected Engine $app;
    
    public function __construct($app) {
        $this->app = $app;
    }
    
    public function getBeneficeJour() {
        $beneficeModel = new HistoLivraisonModel($this->app->db());
        $benefices = $beneficeModel->getBeneficeJour();

        Flight::render('BeneficePeriode', ['resultatjour' => $benefices]);
    }
    
    public function getBeneficeMois() {
        $beneficeModel = new HistoLivraisonModel($this->app->db());
        $benefices = $beneficeModel->getBeneficeMois();
      
        Flight::render('BeneficePeriode', ['resultatmois' => $benefices]);
    }
    
    public function getBeneficeAnnee() {
        $beneficeModel = new HistoLivraisonModel($this->app->db());
        $benefices = $beneficeModel->getBeneficeAnnee();
        Flight::render('BeneficePeriode', ['resultatannee' => $benefices]);
    }
    
    public function getDashboard() {
        $beneficeModel = new HistoLivraisonModel($this->app->db());
        $benefices_jour = $beneficeModel->getBeneficeJour(null, null);
        $benefices_mois = $beneficeModel->getBeneficeMois();
        $benefices_annee = $beneficeModel->getBeneficeAnnee();
        $annees_disponibles = $beneficeModel->getAnneesDisponibles();
        
        Flight::render('BeneficeDashboard', [
            'benefices_jour' => array_slice($benefices_jour, 0, 7),
            'benefices_mois' => array_slice($benefices_mois, 0, 12),
            'benefices_annee' => $benefices_annee,
            'annees_disponibles' => $annees_disponibles
        ]);
    }
}