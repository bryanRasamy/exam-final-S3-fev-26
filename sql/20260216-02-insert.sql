-- Insert new regions
INSERT INTO bngrc_region (region) VALUES 
('Vatovavy-Fitovinany'),
('Atsimo-Atsinanana'),
('Diana'),
('Menabe'),
('Atsinanana');

-- Insert new cities
INSERT INTO bngrc_ville (id_region, ville) VALUES 
(5, 'Toamasina'),   
(1, 'Mananjary'),   
(2, 'Farafangana'), 
(3, 'Nosy Be'),     
(4, 'Morondava');  

-- Insert categories
INSERT INTO bngrc_categorie (categorie) VALUES 
('Nature'),
('Materiel'),
('Argent');

-- Insert new products
INSERT INTO bngrc_produit (id_categorie, nom, prix_unitaire) VALUES 
(1, 'Riz (kg)', 3000),
(1, 'Eau (L)', 1000),
(2, 'Tôle', 25000),
(2, 'Bâche', 15000),
(3, 'Argent', 1),
(1, 'Huile (L)', 6000),
(2, 'Clous (kg)', 8000),
(2, 'Bois', 10000),
(1, 'Haricots', 4000),
(2, 'groupe', 6750000);


-- Insert new besoins
INSERT INTO bngrc_besoin (id_ville, id_produit, quantite, date) VALUES
(1, 4, 200, '2026-02-15'),       
(4, 3, 40, '2026-02-15'),        
(2, 5, 6000000, '2026-02-15'),   
(1, 2, 1500, '2026-02-15'),      
(4, 1, 300, '2026-02-15'),       
(2, 3, 80, '2026-02-15'),        
(4, 5, 4000000, '2026-02-15'),   
(3, 4, 150, '2026-02-16'),       
(2, 1, 500, '2026-02-15'),       
(3, 5, 8000000, '2026-02-16'),   
(5, 1, 700, '2026-02-16'),       
(1, 5, 12000000, '2026-02-16'),  
(5, 5, 10000000, '2026-02-16'),  
(3, 2, 1000, '2026-02-15'),      
(5, 4, 180, '2026-02-15'),       
(1, 10, 3, '2026-02-15'),        
(1, 1, 800, '2026-02-16'),       
(4, 9, 200, '2026-02-16'),       
(2, 7, 60, '2026-02-16'),        
(5, 2, 1200, '2026-02-15'),      
(3, 1, 600, '2026-02-16'),       
(5, 8, 150, '2026-02-15'),       
(1, 3, 120, '2026-02-16'),       
(4, 7, 30, '2026-02-16'),        
(2, 6, 120, '2026-02-16'),       
(3, 8, 100, '2026-02-15');       

-- Insert new dons
INSERT INTO bngrc_don (id_produit, donateur, quantite, date) VALUES
(5, 'Anonyme', 5000000, '2026-02-16'),    
(5, 'Anonyme', 3000000, '2026-02-16'),    
(5, 'Anonyme', 4000000, '2026-02-17'),    
(5, 'Anonyme', 1500000, '2026-02-17'),    
(5, 'Anonyme', 6000000, '2026-02-17'),    
(1, 'Anonyme', 400, '2026-02-16'),        
(2, 'Anonyme', 600, '2026-02-16'),        
(3, 'Anonyme', 50, '2026-02-17'),        
(4, 'Anonyme', 70, '2026-02-17'),         
(9, 'Anonyme', 100, '2026-02-17'),        
(1, 'Anonyme', 2000, '2026-02-18'),       
(3, 'Anonyme', 300, '2026-02-18'),        
(2, 'Anonyme', 5000, '2026-02-18'),       
(5, 'Anonyme', 20000000, '2026-02-19'),   
(4, 'Anonyme', 500, '2026-02-19'),        
(9, 'Anonyme', 88, '2026-02-17');         