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
    }