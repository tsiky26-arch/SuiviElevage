-- Inserer des utilisateurs
INSERT INTO elevage_Utilisateurs (nom, email, motDePasse, capital) VALUES
('Alice Dupont', 'alice@example.com', 'password123', 5000),
('Bob Martin', 'bob@example.com', 'securepass', 7000),
('Charlie Leclerc', 'charlie@example.com', 'mypassword', 10000);

-- Inserer des categories d'animaux
INSERT INTO elevage_Categories (categorie, nbjSManger, pertePoidsj, poidsMin, poidsMax, prixVente) VALUES
('Poulet', 2, 0, 1, 3, 5000),
('Canard', 3, 0, 2, 5, 10000),
('Porc', 5, 1, 10, 30, 20000);

-- Inserer des animaux eleves
INSERT INTO elevage_AnimauxEleves (idCategorie, idUtilisateur, nom, poidsVariable, poidsInitiale, statut, etat, image) VALUES
(1, 1, 'Poussin 1', 1.5, 1.5, 'ELEVE', 'VIVANT', 'assets/img/Volaille/Poules/images.jpeg'),
(1, 2, 'Poussin 2', 2.2, 2, 'ELEVE', 'VIVANT', 'assets/img/Volaille/Poules/telechargement.jpeg'),
(2, 1, 'Canard 1', 3.5, 3, 'VENDU', 'VIVANT', 'assets/img/Volaille/Canards/images.jpeg'),
(3, 3, 'Porc 1', 25, 20, 'ELEVE', 'VIVANT', 'assets/img/Mammifere/Cochon/images.jpeg');

-- Inserer des historiques de poids
INSERT INTO elevage_HistoriquePoids (date, idAnimaux, poidsAjouter, poidsNouveau) VALUES
('2025-02-01', 1, 0.5, 2),
('2025-02-02', 2, 0.2, 2.2),
('2025-02-03', 4, 3, 25);

-- Inserer des animaux à vendre
INSERT INTO elevage_AnimauxAchats (idCategorie, nom, poidsInitiale, image) VALUES
(1, 'Poussin 3', 1.2, 'assets/img/Volaille/Poules/images.jpeg'),
(2, 'Canard 2', 2.5, 'assets/img/Volaille/Canards/images.jpeg'),
(3, 'Porc 2', 12, 'assets/img/Mammifere/Cochon/images.jpeg');
(4, 'Dinde', 3, 'assets/img/Volaille/Dindes/images.jpeg');
(5, 'Mouton', 14, 'assets/img/Mammifere/Ovin/closeup-shot-sheep-with-blurred.jpg');
(6, 'Vache', 30, 'assets/img/Mammifere/Bovin/alpine-mountain-cow-france-spring.jpg');

-- Inserer des historiques d’achats d’animaux
INSERT INTO elevage_HistoriqueAchats (idAnimaux, dateAchat, idUtilisateur, montant) VALUES
(1, '2025-01-10', 1, 5000),
(2, '2025-01-12', 2, 10000),
(3, '2025-01-15', 3, 20000);

-- Inserer des aliments
INSERT INTO elevage_Aliments (prix, idCategorie, nom) VALUES
(500, 1, 'Graines de maïs'),
(700, 2, 'Granules pour canards'),
(1500, 3, 'Farine de maïs');

-- Inserer des achats d’aliments
INSERT INTO elevage_AchatAliments (idAlimentation, dateAchat, idUtilisateur, montant, quantite) VALUES
(1, '2025-01-20', 1, 5000, 10),
(2, '2025-01-21', 2, 7000, 5),
(3, '2025-01-22', 3, 15000, 10);

-- Inserer les stocks d’aliments des utilisateurs
INSERT INTO elevage_MesAliments (idAlimentation, stock, idUtilisateur) VALUES
(1, 8, 1),
(2, 4, 2),
(3, 9, 3);

-- Inserer des historiques d’alimentation des animaux
INSERT INTO elevage_HistoriqueAlimentations (date, idUtilisateur, idCategorie, quantite) VALUES
('2025-02-01', 1, 1, 1.5),
('2025-02-02', 2, 2, 2.0),
('2025-02-03', 3, 3, 5.0);
