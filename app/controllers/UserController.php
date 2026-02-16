<?php
namespace app\controllers;

use app\models\UserModel;

use Flight;
use flight\Engine;

class UserController {
    protected Engine $app;
    
    public function __construct($app) {
        $this->app = $app;
    }
    
    public function getnombreuser() {
        $UserModel = new UserModel($this->app->db());
        $nbruser = $UserModel->getnbruser();

        // Flight::render('admin/modele',['nbruser' => $nbruser]);
        Flight::redirect('/admin?page=statistique&nbruser='.$nbruser['nbr_user'],303);
    }
}