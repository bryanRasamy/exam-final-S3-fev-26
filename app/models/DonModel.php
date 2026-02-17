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

        public function getBesoinsParPetiteQuantite() {
            $sql = "SELECT b.id_besoin, b.id_ville, b.id_produit, b.quantite, v.ville 
                    FROM bngrc_besoin b 
                    JOIN bngrc_ville v ON b.id_ville = v.id_ville 
                    ORDER BY b.quantite ASC";
            $stmt = $this->db->query($sql);
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

        public function getRecapMontants(){
            $sql = "SELECT 
                        v.ville,
                        r.region,
                        p.nom AS produit,
                        c.categorie,
                        p.prix_unitaire,
                        b.id_besoin,
                        b.quantite AS besoin_quantite,
                        (b.quantite * p.prix_unitaire) AS besoin_montant,
                        COALESCE(SUM(s.quantite_attribuee), 0) AS recu_quantite,
                        (COALESCE(SUM(s.quantite_attribuee), 0) * p.prix_unitaire) AS recu_montant,
                        ((b.quantite - COALESCE(SUM(s.quantite_attribuee), 0)) * p.prix_unitaire) AS reste_montant,
                        (b.quantite - COALESCE(SUM(s.quantite_attribuee), 0)) AS reste_quantite
                    FROM bngrc_besoin b
                    JOIN bngrc_ville v ON b.id_ville = v.id_ville
                    JOIN bngrc_region r ON v.id_region = r.id_region
                    JOIN bngrc_produit p ON b.id_produit = p.id_produit
                    JOIN bngrc_categorie c ON p.id_categorie = c.id_categorie
                    LEFT JOIN bngrc_simulation s ON s.id_besoin = b.id_besoin
                    GROUP BY b.id_besoin
                    ORDER BY r.region, v.ville, c.categorie, p.nom";
            return $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function getBesoinsRestantsParVille(){
            $sql = "SELECT 
                        b.id_besoin,
                        v.id_ville,
                        v.ville,
                        p.id_produit,
                        p.nom AS produit,
                        c.categorie,
                        p.prix_unitaire,
                        b.quantite AS besoin_total,
                        COALESCE(SUM(s.quantite_attribuee), 0) AS deja_recu,
                        (b.quantite - COALESCE(SUM(s.quantite_attribuee), 0)) AS reste,
                        COALESCE(achat.total_achete, 0) AS deja_achete
                    FROM bngrc_besoin b
                    JOIN bngrc_ville v ON b.id_ville = v.id_ville
                    JOIN bngrc_produit p ON b.id_produit = p.id_produit
                    JOIN bngrc_categorie c ON p.id_categorie = c.id_categorie
                    LEFT JOIN bngrc_simulation s ON s.id_besoin = b.id_besoin
                    LEFT JOIN (
                        SELECT id_besoin, SUM(quantite) AS total_achete 
                        FROM bngrc_achat 
                        GROUP BY id_besoin
                    ) achat ON achat.id_besoin = b.id_besoin
                    WHERE c.categorie != 'Argent'
                    GROUP BY b.id_besoin
                    HAVING reste > 0
                    ORDER BY v.ville, p.nom";
            return $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function getBesoinById($id_besoin){
            $sql = "SELECT b.*, p.nom AS produit, p.prix_unitaire, v.ville, c.categorie
                    FROM bngrc_besoin b
                    JOIN bngrc_produit p ON b.id_produit = p.id_produit
                    JOIN bngrc_ville v ON b.id_ville = v.id_ville
                    JOIN bngrc_categorie c ON p.id_categorie = c.id_categorie
                    WHERE b.id_besoin = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_besoin]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function getDonsNatureRestants($id_produit){
            // Total des dons pour ce produit
            $sql1 = "SELECT COALESCE(SUM(quantite), 0) AS total_don FROM bngrc_don WHERE id_produit = ?";
            $stmt1 = $this->db->prepare($sql1);
            $stmt1->execute([$id_produit]);
            $totalDon = $stmt1->fetch(\PDO::FETCH_ASSOC)['total_don'];

            // Total déjà distribué dans la simulation pour ce produit
            $sql2 = "SELECT COALESCE(SUM(s.quantite_attribuee), 0) AS total_distribue
                     FROM bngrc_simulation s 
                     JOIN bngrc_besoin b ON s.id_besoin = b.id_besoin 
                     WHERE b.id_produit = ?";
            $stmt2 = $this->db->prepare($sql2);
            $stmt2->execute([$id_produit]);
            $totalDistribue = $stmt2->fetch(\PDO::FETCH_ASSOC)['total_distribue'];

            return max(0, $totalDon - $totalDistribue);
        }

        public function getArgentDisponible(){
            // Total des dons en argent
            $sql1 = "SELECT COALESCE(SUM(d.quantite), 0) AS total_argent 
                     FROM bngrc_don d 
                     JOIN bngrc_produit p ON d.id_produit = p.id_produit 
                     WHERE p.id_categorie = 3";
            $totalArgent = $this->db->query($sql1)->fetch(\PDO::FETCH_ASSOC)['total_argent'];

            // Total déjà dépensé en achats
            $sql2 = "SELECT COALESCE(SUM(cout_total), 0) AS total_depense FROM bngrc_achat";
            try {
                $totalDepense = $this->db->query($sql2)->fetch(\PDO::FETCH_ASSOC)['total_depense'];
            } catch (\Exception $e) {
                $totalDepense = 0;
            }

            return $totalArgent - $totalDepense;
        }

        public function insererAchat($id_besoin, $quantite, $prix_unitaire, $frais_pourcent, $cout_total){
            $sql = "INSERT INTO bngrc_achat (id_besoin, quantite, prix_unitaire, frais_pourcent, cout_total, date_achat) 
                    VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_besoin, $quantite, $prix_unitaire, $frais_pourcent, $cout_total]);
        }
    }