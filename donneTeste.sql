-- Insérer des utilisateurs
INSERT INTO elevage_Utilisateurs (nom, email, motDePasse, capital) VALUES
('Alice Dupont', 'alice@example.com', 'password123', 5000),
('Bob Martin', 'bob@example.com', 'securepass', 7000),
('Charlie Leclerc', 'charlie@example.com', 'mypassword', 10000);

-- Insérer des catégories d'animaux
INSERT INTO elevage_Categories (categorie, nbjSManger, pertePoidsj, poidsMin, poidsMax, prixVente) VALUES
('Poulet', 2, 0, 1, 3, 5000),
('Canard', 3, 0, 2, 5, 10000),
('Porc', 5, 1, 10, 30, 20000);

-- Insérer des animaux élevés
INSERT INTO elevage_AnimauxEleves (idCategorie, idUtilisateur, nom, poidsVariable, poidsInitiale, statut, etat, image) VALUES
(1, 1, 'Poussin 1', 1.5, 1.5, 'ELEVE', 'VIVANT', 'assets/img/Volaille/Poules/images.jpeg'),
(1, 2, 'Poussin 2', 2.2, 2, 'ELEVE', 'VIVANT', 'assets/img/Volaille/Poules/téléchargement.jpeg'),
(2, 1, 'Canard 1', 3.5, 3, 'VENDU', 'VIVANT', 'assets/img/Volaille/Canards/images.jpeg'),
(3, 3, 'Porc 1', 25, 20, 'ELEVE', 'VIVANT', 'assets/img/Mammifere/Cochon/images.jpeg');

-- Insérer des historiques de poids
INSERT INTO elevage_HistoriquePoids (date, idAnimaux, poidsAjouter, poidsNouveau) VALUES
('2025-02-01', 1, 0.5, 2),
('2025-02-02', 2, 0.2, 2.2),
('2025-02-03', 4, 3, 25);

-- Insérer des animaux à vendre
INSERT INTO elevage_AnimauxAchats (idCategorie, nom, poidsInitiale, poidsVariable, image) VALUES
(1, 'Poussin 3', 1.2, 1.2, 'assets/img/Volaille/Poules/téléchargement (2).jpeg'),
(2, 'Canard 2', 2.5, 2.5, 'assets/img/Volaille/Canards/téléchargement (1).jpeg'),
(3, 'Porc 2', 12, 12, 'assets/img/Mammifere/Cochon/porc2.jpg');

-- Insérer des historiques d’achats d’animaux
INSERT INTO elevage_HistoriqueAchats (idAnimaux, dateAchat, idUtilisateur, montant) VALUES
(1, '2025-01-10', 1, 5000),
(2, '2025-01-12', 2, 10000),
(3, '2025-01-15', 3, 20000);

-- Insérer des aliments
INSERT INTO elevage_Aliments (prix, idCategorie, nom, date_expiration) VALUES
(500, 1, 'Graines de maïs', '2025-06-01'),
(700, 2, 'Granulés pour canards', '2025-07-01'),
(1500, 3, 'Farine de maïs', '2025-08-01');

-- Insérer des achats d’aliments
INSERT INTO elevage_AchatAliments (idAlimentation, dateAchat, idUtilisateur, montant, quantite, statut) VALUES
(1, '2025-01-20', 1, 5000, 10, 'VALIDE'),
(2, '2025-01-21', 2, 7000, 5, 'VALIDE'),
(3, '2025-01-22', 3, 15000, 10, 'VALIDE');

-- Insérer les stocks d’aliments des utilisateurs
INSERT INTO elevage_MesAliments (idAlimentation, stock, idUtilisateur, stock_initial, quantite_restante) VALUES
(1, 8, 1, 10, 8),
(2, 4, 2, 5, 4),
(3, 9, 3, 10, 9);

-- Insérer des historiques d’alimentation des animaux
INSERT INTO elevage_HistoriqueAlimentations (date, idUtilisateur, idCategorie, quantite, idAlimentation) VALUES
('2025-02-01', 1, 1, 1.5, 1),
('2025-02-02', 2, 2, 2.0, 2),
('2025-02-03', 3, 3, 5.0, 3);
