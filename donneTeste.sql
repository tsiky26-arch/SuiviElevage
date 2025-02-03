INSERT INTO elevage_Utilisateurs (nom, email, motDePasse, capital) VALUES
('Alice Rabe', 'alice@example.com', '$2y$10$ABCDEFG...', 50000),
('Jean Dupont', 'jean@example.com', '$2y$10$HIJKLMN...', 70000),
('Sophie Ranaivo', 'sophie@example.com', '$2y$10$OPQRSTU...', 65000),
('David Rakoto', 'david@example.com', '$2y$10$VWXYZAB...', 80000),
('Nadia Rajoelina', 'nadia@example.com', '$2y$10$CDEFGHI...', 90000);
INSERT INTO elevage_Categories (categorie, nbjSManger, pertePoidsj, poidsMin, poidsMax, prixVente) VALUES
('Poulet', 2, 0, 1, 3, 15000),
('Canard', 3, 0, 2, 5, 25000),
('Lapin', 2, 0, 1, 4, 20000),
('Porc', 4, 0, 20, 80, 120000),
('Vache', 5, 0, 150, 400, 500000);
INSERT INTO elevage_AnimauxEleves (idCategorie, nom, poidsVariable, poidsInitiale, statut, etat, image) VALUES
(1, 'Poulet 1', 2.0, 1.5, 'ELEVE', 'VIVANT', 'poulet1.jpg'),
(2, 'Canard 1', 3.5, 2.8, 'ELEVE', 'VIVANT', 'canard1.jpg'),
(3, 'Lapin 1', 2.2, 1.8, 'ELEVE', 'VIVANT', 'lapin1.jpg'),
(4, 'Porc 1', 50, 45, 'ELEVE', 'VIVANT', 'porc1.jpg'),
(5, 'Vache 1', 200, 180, 'ELEVE', 'VIVANT', 'vache1.jpg');
INSERT INTO elevage_HistoriquePoids (date, idAnimaux, poidsAjouter, poidsNouveau) VALUES
('2025-01-10', 1, 0.5, 2.0),
('2025-01-15', 2, 0.7, 3.5),
('2025-01-18', 3, 0.4, 2.2),
('2025-01-20', 4, 5, 50),
('2025-01-22', 5, 20, 200);
INSERT INTO elevage_AnimauxAchats (idCategorie, nom, poidsInitiale, image) VALUES
(1, 'Poulet 2', 1.2, 'poulet2.jpg'),
(2, 'Canard 2', 2.5, 'canard2.jpg'),
(3, 'Lapin 2', 1.7, 'lapin2.jpg'),
(4, 'Porc 2', 40, 'porc2.jpg'),
(5, 'Vache 2', 170, 'vache2.jpg');
INSERT INTO elevage_HistoriqueAchats (idAnimaux, dateAchat, idUtilisateur, montant) VALUES
(1, '2025-01-05', 1, 14000),
(2, '2025-01-07', 2, 24000),
(3, '2025-01-08', 3, 19000),
(4, '2025-01-09', 4, 115000),
(5, '2025-01-10', 5, 490000);
INSERT INTO elevage_Aliments (prix, idCategorie, nom) VALUES
(5000, 1, 'Maïs'),
(8000, 2, 'Graines de canard'),
(7000, 3, 'Carottes'),
(10000, 4, 'Son de blé'),
(15000, 5, 'Foin');
INSERT INTO elevage_AchatAliments (idAlimentation, dateAchat, idUtilisateur, montant, quantite) VALUES
(1, '2025-01-02', 1, 50000, 10),
(2, '2025-01-04', 2, 80000, 10),
(3, '2025-01-06', 3, 70000, 10),
(4, '2025-01-08', 4, 100000, 10),
(5, '2025-01-10', 5, 150000, 10);
INSERT INTO elevage_MesAliments (idAliment, stock, idUtilisateur) VALUES
(1, 5, 1),
(2, 7, 2),
(3, 6, 3),
(4, 9, 4),
(5, 12, 5);
INSERT INTO elevage_HistoriqueAlimentations (date, idUtilisateur, idCategorie, quantite) VALUES
('2025-01-11', 1, 1, 2.5),
('2025-01-12', 2, 2, 3.5),
('2025-01-13', 3, 3, 1.8),
('2025-01-14', 4, 4, 6.0),
('2025-01-15', 5, 5, 12.0);
