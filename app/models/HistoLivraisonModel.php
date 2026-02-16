<?php
    namespace app\models;

    use Flight;

    class HistoLivraisonModel{
        private $db;
        private $id_livraison;
        private $id_livreur;
        private $id_vehicule;
        private $montant_recette;
        private $salaire_livreur;


        public function __construct($db){
            $this->db = $db;
        }

        /*Setters*/
        public function setidlivraison($id_livraison){
            $this->id_livraison=$id_livraison;
        }

        public function setidlivreur($id_livreur){
            $this->id_livreur=$id_livreur;
        }

        public function setidvehicule($id_vehicule){
            $this->id_vehicule=$id_vehicule;
        }

        public function setmontantrecette($recette){
            $this->montant_recette=$recette;
        }

        public function setsalaire($salaire){
            $this->salaire_livreur=$salaire;
        }


        public function insererhistorique(){
            $sql="INSERT INTO transport_historique_livraison (id_livraison, id_livreur,id_vehicule, date_livraison , montant_recette, salaire_livreur) VALUES (?,?,?,NOW(),?,?) ";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$this->id_livraison,$this->id_livreur,$this->id_vehicule,$this->montant_recette,$this->salaire_livreur]);
        }

        public function getBeneficeJour() {
            $stmt=$this->db->query("SELECT date_livraison, total_recette, total_salaire, benefice FROM transport_view_benefice_jour ORDER BY date_livraison DESC");

            return $stmt->fetchAll();
        }
        
        public function getBeneficeMois() {
            $stmt=$this->db->query("SELECT annee, mois, total_recette, total_salaire, benefice FROM transport_view_benefice_mois  ORDER BY annee DESC, mois DESC");
            return $stmt->fetchAll();
        }
        
        public function getBeneficeAnnee() {       
            $stmt=$this->db->query("SELECT annee, total_recette, total_salaire, benefice FROM transport_view_benefice_annee ORDER BY annee ");
            return $stmt->fetchAll();
        }
        
        public function getAnneesDisponibles() {
            $sql = "SELECT DISTINCT annee FROM transport_view_benefice_annee ORDER BY annee DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        }
    }