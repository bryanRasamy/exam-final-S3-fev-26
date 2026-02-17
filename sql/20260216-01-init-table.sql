CREATE DATABASE bngrc;

use bngrc;

CREATE TABLE bngrc_region(
	id_region INT PRIMARY KEY AUTO_INCREMENT,
	region VARCHAR(100)
);

CREATE TABLE bngrc_ville(
	id_ville INT PRIMARY KEY AUTO_INCREMENT,
	id_region INT,
	ville VARCHAR(100),
	FOREIGN KEY (id_region) REFERENCES bngrc_region(id_region)
);

CREATE TABLE bngrc_categorie(
	id_categorie INT PRIMARY KEY AUTO_INCREMENT,
	categorie VARCHAR(100)
);

CREATE TABLE bngrc_produit(
	id_produit INT PRIMARY KEY AUTO_INCREMENT,
	id_categorie INT,
	nom VARCHAR(100),
	prix_unitaire NUMERIC(10,2),
	FOREIGN KEY (id_categorie) REFERENCES bngrc_categorie(id_categorie)
);

CREATE TABLE bngrc_besoin(
	id_besoin INT PRIMARY KEY AUTO_INCREMENT,
	id_ville INT,
	id_produit INT,
	quantite INT,
	date DATE,
	FOREIGN KEY (id_ville) REFERENCES bngrc_ville(id_ville),
	FOREIGN KEY (id_produit) REFERENCES bngrc_produit(id_produit)
);

CREATE TABLE bngrc_don(
	id_don INT PRIMARY KEY AUTO_INCREMENT,
	id_produit INT,
	donateur VARCHAR(100),
	quantite INT,
	date DATE,
	FOREIGN KEY (id_produit) REFERENCES bngrc_produit(id_produit)
);


CREATE TABLE bngrc_simulation(
	id_distribution INT PRIMARY KEY AUTO_INCREMENT,
	id_besoin INT,
	id_don INT,
	quantite_attribuee INT,
	FOREIGN KEY (id_besoin) REFERENCES bngrc_besoin(id_besoin),
	FOREIGN KEY (id_don) REFERENCES bngrc_don(id_don)
);