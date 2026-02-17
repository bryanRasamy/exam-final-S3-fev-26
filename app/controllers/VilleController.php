<?php
namespace app\controllers;

use app\models\VilleModel;
use Flight;
use flight\Engine;

class VilleController {
    protected Engine $app;

    public function __construct($app){
        $this->app = $app;
    }

    public function index() {
        $villeModel = new VilleModel($this->app->db());
        $listeVilles = $villeModel->getStatsGlobales();

        $villesGroupées = [];
        foreach ($listeVilles as $row) {
            $villesGroupées[$row['region']][$row['ville']]['id'] = $row['id_ville'];
            $villesGroupées[$row['region']][$row['ville']]['categories'][] = [
                'type'   => $row['nom_categorie'],
                'besoin' => $row['besoin'],
                'recu'   => $row['recu'],
                'reste'  => $row['reste']
            ];
        }

        Flight::render('modele', [
            'currentPage' => 'dashboard',
            'villesGroupées' => $villesGroupées
        ]);
    }
    }
