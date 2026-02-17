<?php
    namespace app\models;

    use Flight;

    class ProduitModel{
        private $db;
        private $id_categorie;
        private $nom;
        private $prix_unitaire;
        
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

        public function getAllCategories(){
            $stmt=$this->db->query("SELECT * FROM bngrc_categorie ORDER BY categorie ASC");

            return $stmt->fetchAll();
        }

        public function setidcategorie($id_categorie){
            $this->id_categorie=$id_categorie;
        }

        public function setnom($nom){
            $this->nom=$nom;
        }

        public function setprixunitaire($prix_unitaire){
            $this->prix_unitaire=$prix_unitaire;
        }

        public function insererProduit(){
            $sql="INSERT INTO bngrc_produit (id_categorie,nom,prix_unitaire) VALUES (?,?,?)";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$this->id_categorie,$this->nom,$this->prix_unitaire]);
        }
    }