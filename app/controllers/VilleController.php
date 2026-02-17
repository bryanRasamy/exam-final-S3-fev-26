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

    public function detail($id_ville) {
        $id_ville = (int)$id_ville;

        if ($id_ville <= 0) {
            Flight::redirect('/ville');
            return;
        }

        $db = $this->app->db();
        $villeModel = new VilleModel($db);
        
        $infosVille = $villeModel->getVilleById($id_ville);
        
        if (!$infosVille) {
            Flight::halt(404, 'Ville introuvable');
            return;
        }

        $detailsRaw = $villeModel->getDetailsBesoinsVille($id_ville);
        
        $besoinsParCategorie = [];

        if ($detailsRaw) {
            foreach ($detailsRaw as $row) {
                $besoinsParCategorie[$row['nom_categorie']][] = $row;
            }
        }

        Flight::render('modele', [
            'currentPage' => 'ville', 
            'ville' => $infosVille,
            'categories' => $besoinsParCategorie
        ]);
    }
}
