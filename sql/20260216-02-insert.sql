INSERT INTO bngrc_region (region) VALUES 
('Analamanga'),
('Atsinanana'),
('Vakinankaratra');

INSERT INTO bngrc_ville (id_region, ville) VALUES 
(1, 'Antananarivo'),
(1, 'Ambohidratrimo'),
(1, 'Ankazobe');

INSERT INTO bngrc_categorie (categorie) VALUES 
('Nature'),
('Materiaux'),
('Argent');


INSERT INTO bngrc_produit (id_categorie, nom, prix_unitaire) VALUES 
(1, 'Riz', 3000),
(1, 'Huile', 50000),
(2, 'Tole', 75000),
(2, 'Ciment', 40000);


INSERT INTO bngrc_besoin (id_ville, id_produit, quantite) VALUES
(1, 1, 1000),
(1, 2, 500),
(1, 3, 200),
(1, 4, 300),
(1, 1, 1500);


INSERT INTO bngrc_don (id_produit,donateur,date) VALUES
(1,'fanjakana', '2026-02-01'),
(2,'fanjakana' ,'2026-02-05'),
(3,'fanjakana' ,'2026-02-07'),
(4,'fanjakana', '2026-02-10'),
(1,'fanjakana', '2026-02-12');

