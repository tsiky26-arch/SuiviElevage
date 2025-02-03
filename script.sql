CREATE DATABASE db_ETU003277;
USE db_ETU003277;

CREATE TABLE elevage_Utilisateurs(
    idUtilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(200),
    email VARCHAR(200),
    motDePasse VARCHAR(200),
    capital INT 
);

CREATE TABLE elevage_Categories(
    idCategorie INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(200),
    nbjSManger INT,
    pertePoidsj INT,
    poidsMin INT,
    poidsMax INT,
    prixVente INT
);

CREATE TABLE elevage_AnimauxEleves(
    idAnimaux INT AUTO_INCREMENT PRIMARY KEY,
    idCategorie INT,
    idUtilisateur INT,
    nom VARCHAR(200),
    poidsVariable DECIMAL(10,2),
    poidsInitiale DECIMAL(10,2),
    statut ENUM ('VENDU', 'ELEVE') NOT NULL,
    etat ENUM ('MORT', 'VIVANT'),
    image VARCHAR(200),
    FOREIGN KEY (idCategorie) REFERENCES elevage_Categories(idCategorie),
    FOREIGN KEY (idUtilisateur) REFERENCES elevage_Utilisateurs(idUtilisateur)
);

CREATE TABLE elevage_HistoriquePoids(
    idHistorique INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    idAnimaux INT,
    poidsAjouter DECIMAL(10,2),
    poidsNouveau DECIMAL(10,2),
    FOREIGN KEY (idAnimaux) REFERENCES elevage_AnimauxEleves(idAnimaux)
);

CREATE TABLE elevage_AnimauxAchats(
    idAnimaux INT AUTO_INCREMENT PRIMARY KEY,
    idCategorie INT,
    nom VARCHAR(200),
    poidsInitiale DECIMAL(10,2),
    image VARCHAR(200),
    FOREIGN KEY (idCategorie) REFERENCES elevage_Categories(idCategorie)
);

CREATE TABLE elevage_HistoriqueAchats(
    idHistorique INT AUTO_INCREMENT PRIMARY KEY,
    idAnimaux INT,
    dateAchat DATE,
    idUtilisateur INT,
    montant DECIMAL(10,2),
    FOREIGN KEY (idAnimaux) REFERENCES elevage_AnimauxAchats(idAnimaux),
    FOREIGN KEY (idUtilisateur) REFERENCES elevage_Utilisateurs(idUtilisateur)
);

CREATE TABLE elevage_Aliments(
    idAlimentation INT AUTO_INCREMENT PRIMARY KEY,
    prix INT,
    idCategorie INT,
    nom VARCHAR(200),
    FOREIGN KEY (idCategorie) REFERENCES elevage_Categories(idCategorie)
);

CREATE TABLE elevage_AchatAliments(
    idHistorique INT AUTO_INCREMENT PRIMARY KEY,
    idAlimentation INT,
    dateAchat DATE,
    idUtilisateur INT,
    montant INT,
    quantite DECIMAL(10,2),
    FOREIGN KEY (idUtilisateur) REFERENCES elevage_Utilisateurs(idUtilisateur),
    FOREIGN KEY (idAlimentation) REFERENCES elevage_Aliments(idAlimentation)
);

CREATE TABLE elevage_MesAliments(
    idMesAliment INT AUTO_INCREMENT PRIMARY KEY,
    idAlimentation INT,
    stock DECIMAL(10,2),
    idUtilisateur INT,
    FOREIGN KEY (idAlimentation) REFERENCES elevage_Aliments(idAlimentation),
    FOREIGN KEY (idUtilisateur) REFERENCES elevage_Utilisateurs(idUtilisateur)
);

CREATE TABLE elevage_HistoriqueAlimentations(
    idHistorique INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    idUtilisateur INT,
    idCategorie INT,
    quantite DECIMAL(10,2),
    FOREIGN KEY (idUtilisateur) REFERENCES elevage_Utilisateurs(idUtilisateur),
    FOREIGN KEY (idCategorie) REFERENCES elevage_Categories(idCategorie)
);
