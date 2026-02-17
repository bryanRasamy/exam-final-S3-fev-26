<?php
    namespace app\models;

    use Flight;

    class DonModel{
        private $db;
        private $donateur;
        private $id_produit;
        private $quantite;
        private $date_don;


        public function __construct($db){
            $this->db = $db;
        }

        /*Setters*/
        public function setdonateur($donateur){
            $this->donateur=$donateur;
        }

        public function setidproduit($produit){
            $this->id_produit=$produit;
        }

        public function setquantite($quantite){
            $this->quantite=$quantite;
        }

        public function setdate_don($date_don){
            $this->date_don=$date_don;
        }


        public function insererDon(){
            $sql="INSERT INTO bngrc_don (donateur,id_produit,quantite,date) VALUES (?,?,?,?)";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$this->donateur,$this->id_produit,$this->quantite,$this->date_don]);
        }

        public function getAllDons(){
            $stmt = $this->db->query("SELECT d.id_don, d.id_produit, d.donateur, d.quantite, d.date, p.nom AS produit_nom FROM bngrc_don d JOIN bngrc_produit p ON d.id_produit = p.id_produit ORDER BY d.date ASC, d.id_don ASC");
            return $stmt->fetchAll();
        }

        public function getAllBesoins(){
            $stmt = $this->db->query("SELECT b.id_besoin, b.id_ville, b.id_produit, b.quantite, v.ville FROM bngrc_besoin b JOIN bngrc_ville v ON b.id_ville = v.id_ville ORDER BY b.id_besoin ASC");
            return $stmt->fetchAll();
        }

        public function clearSimulation(){
            $this->db->exec("DELETE FROM bngrc_simulation");
        }

        public function insertSimulation($id_besoin, $id_don, $quantite_attribuee){
            $sql = "INSERT INTO bngrc_simulation (id_besoin, id_don, quantite_attribuee) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_besoin, $id_don, $quantite_attribuee]);
        }
    }