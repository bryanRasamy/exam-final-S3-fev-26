CREATE OR REPLACE VIEW bngrc_v_besoin_categorie_ville AS
SELECT 
    v.id_ville, 
    c.id_categorie, 
    c.categorie as nom_categorie, 
    SUM(b.quantite) as total_besoin
FROM bngrc_ville v
CROSS JOIN bngrc_categorie c
LEFT JOIN bngrc_produit p ON p.id_categorie = c.id_categorie
LEFT JOIN bngrc_besoin b ON b.id_ville = v.id_ville AND b.id_produit = p.id_produit
GROUP BY v.id_ville, c.id_categorie;

CREATE OR REPLACE VIEW bngrc_v_recu_categorie_ville AS
SELECT 
    b.id_ville, 
    p.id_categorie, 
    SUM(s.quantite_attribuee) as total_recu
FROM bngrc_simulation s
JOIN bngrc_besoin b ON s.id_besoin = b.id_besoin
JOIN bngrc_produit p ON b.id_produit = p.id_produit
GROUP BY b.id_ville, p.id_categorie;

CREATE OR REPLACE VIEW bngrc_v_detail_besoins_produits AS
SELECT 
    b.id_ville,
    c.id_categorie,
    c.categorie as nom_categorie,
    p.id_produit,
    p.nom as nom_produit,
    b.quantite as besoin_produit,
    COALESCE(SUM(s.quantite_attribuee), 0) as recu_produit,
    (b.quantite - COALESCE(SUM(s.quantite_attribuee), 0)) as reste_produit
FROM bngrc_besoin b
JOIN bngrc_produit p ON b.id_produit = p.id_produit
JOIN bngrc_categorie c ON p.id_categorie = c.id_categorie
LEFT JOIN bngrc_simulation s ON s.id_besoin = b.id_besoin
GROUP BY b.id_ville, p.id_produit;