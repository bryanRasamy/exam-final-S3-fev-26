<?php
    namespace app\models;

    use Flight;

    class BesoinModel{
        private $db;
        private $id_ville;
        private $id_produit;
        private $quantite;


        public function __construct($db){
            $this->db = $db;
        }

        /*Setters*/
        public function setidville($ville){
            $this->id_ville=$ville;
        }

        public function setidproduit($produit){
            $this->id_produit=$produit;
        }

        public function setquantite($quantite){
            $this->quantite=$quantite;
        }


        public function insererBesoin(){
            $sql="INSERT INTO bngrc_besoin (id_ville,id_produit,quantite) VALUES (?,?,?)";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$this->id_ville,$this->id_produit,$this->quantite]);
        }
    }