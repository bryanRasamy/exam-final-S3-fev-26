<?php
namespace app\controllers;

use app\models\ZoneLivraisonModel;

use Flight;
use flight\Engine;

class ZoneLivraisonControllers {
    protected Engine $app;
    
    public function __construct($app) {
        $this->app = $app;
    }
    
    public function getAllZones() {
        $ZonesModel = new ZoneLivraisonModel($this->app->db());
        $allzone = $ZonesModel->getAllzone();

        Flight::render('zonelivraison', ['allzones' => $allzone]);
    }

    public function supprimerzone($id) {
        $id_zone = $id;
        $ZonesModel = new ZoneLivraisonModel($this->app->db());
        $ZonesModel->supprimerzone($id_zone);
        $allzone = $ZonesModel->getAllzone();
        Flight::render('zonelivraison', ['allzones' => $allzone]);
    }
    
    
    
}