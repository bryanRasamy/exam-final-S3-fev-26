<?php
    namespace app\models;

    use Flight;

    class VilleModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllVilles(){
            $stmt=$this->db->query("SELECT * FROM bngrc_ville ORDER BY ville ASC");

            return $stmt->fetchAll();
        }

        public function getVille($id){
            $stmt=$this->db->prepare("SELECT * FROM bngrc_ville WHERE id_ville=?");
            $stmt->execute([$id]);

            return $stmt->fetch();
        }


        public function getAllVillesWithRegion() {
            $sql = "SELECT v.id_ville, v.ville, r.region 
                    FROM bngrc_ville v 
                    JOIN bngrc_region r ON v.id_region = r.id_region 
                    ORDER BY r.region ASC, v.ville ASC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        }

        public function getStatsGlobales() {
            $sql = "SELECT 
                        v.id_ville, v.ville, r.region, 
                        vb.nom_categorie,
                        COALESCE(vb.total_besoin, 0) as besoin,
                        COALESCE(vr.total_recu, 0) as recu,
                        (COALESCE(vb.total_besoin, 0) - COALESCE(vr.total_recu, 0)) as reste
                    FROM bngrc_ville v
                    JOIN bngrc_region r ON v.id_region = r.id_region
                    JOIN bngrc_v_besoin_categorie_ville vb ON v.id_ville = vb.id_ville
                    LEFT JOIN  bngrc_v_recu_categorie_ville vr ON vb.id_ville = vr.id_ville AND vb.id_categorie = vr.id_categorie
                    ORDER BY r.region, v.ville, vb.id_categorie";
                    
            return $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        }
}