<?php
namespace app\controllers;

use app\models\EchangeModel;

use Flight;
use flight\Engine;

class EchangeController {
    protected Engine $app;
    
    public function __construct($app) {
        $this->app = $app;
    }
    
    public function getnombreechangeeffectuer() {
        $echangeModel = new EchangeModel($this->app->db());
        $nbrechange = $echangeModel->getnbrechangeeffectuer();

        Flight::render('admin/modele',['nbrechange' => $nbrechange]);
    }
}