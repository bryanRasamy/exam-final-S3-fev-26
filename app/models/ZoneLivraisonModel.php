<?php
    namespace app\models;

    use Flight;

    class ZoneLivraisonModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllzone(){
            $stmt=$this->db->query("SELECT * FROM transport_zone_livraison ORDER BY nom_zone ASC");

            return $stmt->fetchAll();
        }

        public function getzone($id){
            $stmt=$this->db->prepare("SELECT * FROM transport_zone_livraison WHERE id_zone=?");
            $stmt->execute([$id]);

            return $stmt->fetch();
        }

        public function insererzone($nom, $pourcentage){
            $sql="INSERT INTO transport_zone_livraison (nom_zone, pourcentage) VALUES (?,?) ";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$nom, $pourcentage]);
        }

        public function supprimerzone($id_zone){
            $sql = "DELETE FROM transport_zone_livraison WHERE id_zone = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_zone]);
        }
    }