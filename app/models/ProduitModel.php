<?php
    namespace app\models;

    use Flight;

    class ProduitModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getAllProduits(){
            $stmt=$this->db->query("SELECT * FROM bngrc_produit ORDER BY nom ASC");

            return $stmt->fetchAll();
        }

        public function getProduit($id){
            $stmt=$this->db->prepare("SELECT * FROM bngrc_produit WHERE id_produit=?");
            $stmt->execute([$id]);

            return $stmt->fetch();
        }
    }