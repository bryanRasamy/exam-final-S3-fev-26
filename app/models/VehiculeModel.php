<?php
    namespace app\models;

    use Flight;

    class VehiculeModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllvehicule(){
            $stmt=$this->db->query("SELECT * FROM v_vehicule_non_occuper ORDER BY nom_vehicule ASC");

            return $stmt->fetchAll();
        }

        public function getAll(){
            $stmt=$this->db->query("SELECT * FROM transport_vehicule");

            return $stmt->fetchAll();
        }
    }