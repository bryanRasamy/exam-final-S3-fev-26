CREATE TABLE bngrc_achat(
    id_achat INT PRIMARY KEY AUTO_INCREMENT,
    id_besoin INT,
    quantite INT,
    prix_unitaire NUMERIC(10,2),
    frais_pourcent NUMERIC(5,2),
    cout_total NUMERIC(15,2),
    date_achat DATE,
    FOREIGN KEY (id_besoin) REFERENCES bngrc_besoin(id_besoin)
);
