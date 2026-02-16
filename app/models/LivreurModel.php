<?php
    namespace app\models;

    use Flight;

    class LivreurModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAlllivreur(){
            $stmt=$this->db->query("SELECT * FROM v_livreur_non_occuper ORDER BY nom_livreur ASC");

            return $stmt->fetchAll();
        }

        public function getAll(){
            $stmt=$this->db->query("SELECT * FROM transport_livreur ORDER BY nom_livreur ASC");

            return $stmt->fetchAll();
        }

        public function getlivreur($id){
            $stmt=$this->db->prepare("SELECT * FROM transport_livreur WHERE id_livreur=?");
            $stmt->execute([$id]);

            return $stmt->fetch();
        }
    }