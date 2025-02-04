<?php

class AlimentationModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    // Récupérer tous les aliments disponibles
    public function getAllAliments()
    {
        $query = "SELECT * FROM elevage_Aliments";
        return $this->db->query($query)->fetchAll();
    }

    // Récupérer un aliment par son ID
    public function getAlimentById($idAlimentation)
    {
        $query = "SELECT * FROM elevage_Aliments WHERE idAlimentation = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$idAlimentation]);
        return $stmt->fetch();
    }

    // Ajouter un nouvel aliment
    public function addAliment($nom, $prix, $idCategorie, $dateExpiration = null)
    {
        $query = "INSERT INTO elevage_Aliments (nom, prix, idCategorie, date_expiration) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nom, $prix, $idCategorie, $dateExpiration]);
    }

    // Mettre à jour un aliment
    public function updateAliment($idAlimentation, $nom, $prix, $idCategorie, $dateExpiration)
    {
        $query = "UPDATE elevage_Aliments SET nom = ?, prix = ?, idCategorie = ?, date_expiration = ? WHERE idAlimentation = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nom, $prix, $idCategorie, $dateExpiration, $idAlimentation]);
    }

    // Supprimer un aliment
    public function deleteAliment($idAlimentation)
    {
        $query = "DELETE FROM elevage_Aliments WHERE idAlimentation = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$idAlimentation]);
    }

    // Acheter un aliment et l'ajouter au stock
    public function acheterAliment($idAlimentation, $idUtilisateur, $quantite, $montant)
    {
        $query = "INSERT INTO elevage_AchatAliments (idAlimentation, dateAchat, idUtilisateur, montant, quantite)
                  VALUES (?, NOW(), ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$idAlimentation, $idUtilisateur, $montant, $quantite])) {
            return $this->ajouterStockAliment($idAlimentation, $idUtilisateur, $quantite);
        }
        return false;
    }

    // Ajouter du stock d'un aliment
    public function ajouterStockAliment($idAlimentation, $idUtilisateur, $quantite)
    {
        $query = "INSERT INTO elevage_MesAliments (idAlimentation, stock, idUtilisateur) 
                  VALUES (?, ?, ?)
                  ON DUPLICATE KEY UPDATE stock = stock + VALUES(stock)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$idAlimentation, $quantite, $idUtilisateur]);
    }

    // Consommer un aliment pour nourrir les animaux
    public function consommerAliment($idAlimentation, $quantite, $idUtilisateur, $idCategorie)
    {
        $query = "UPDATE elevage_MesAliments 
                  SET stock = stock - ? 
                  WHERE idAlimentation = ? AND idUtilisateur = ? AND stock >= ?";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$quantite, $idAlimentation, $idUtilisateur, $quantite])) {
            return $this->ajouterHistoriqueAlimentation($idUtilisateur, $idCategorie, $idAlimentation, $quantite);
        }
        return false;
    }

    // Ajouter une entrée dans l'historique d'alimentation
    private function ajouterHistoriqueAlimentation($idUtilisateur, $idCategorie, $idAlimentation, $quantite)
    {
        $query = "INSERT INTO elevage_HistoriqueAlimentations (date, idUtilisateur, idCategorie, idAlimentation, quantite) 
                  VALUES (NOW(), ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$idUtilisateur, $idCategorie, $idAlimentation, $quantite]);
    }

    // Vérifier le stock d'un aliment
    public function verifierStock($idAlimentation, $idUtilisateur)
    {
        $query = "SELECT stock FROM elevage_MesAliments WHERE idAlimentation = ? AND idUtilisateur = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$idAlimentation, $idUtilisateur]);
        return $stmt->fetchColumn();
    }

    //  Gestion aléatoire de l'alimentation 
    
    public function distribuerAlimentsAutomatiquement($idUtilisateur)
    {
        // Récupérer les animaux du user
        $queryAnimaux = "SELECT a.idAnimaux, a.idCategorie, c.nbjSManger
                         FROM elevage_AnimauxEleves a
                         JOIN elevage_Categories c ON a.idCategorie = c.idCategorie
                         WHERE a.idUtilisateur = ? AND a.etat = 'VIVANT' AND a.statut = 'ELEVE'";
        $stmtAnimaux = $this->db->prepare($queryAnimaux);
        $stmtAnimaux->execute([$idUtilisateur]);
        $animaux = $stmtAnimaux->fetchAll();

        if (!$animaux) return false; // Aucun animal à nourrir

        foreach ($animaux as $animal) {
            $idCategorie = $animal['idCategorie'];
            $quantiteNecessaire = $animal['nbjSManger'];

            // Vérifier les stocks d'aliments pour cette catégorie
            $queryStock = "SELECT idAlimentation, stock 
                           FROM elevage_MesAliments 
                           WHERE idUtilisateur = ? AND stock > 0 
                           ORDER BY stock DESC";
            $stmtStock = $this->db->prepare($queryStock);
            $stmtStock->execute([$idUtilisateur]);
            $stocks = $stmtStock->fetchAll();

            foreach ($stocks as $stock) {
                if ($quantiteNecessaire <= 0) break;

                $idAlimentation = $stock['idAlimentation'];
                $disponible = $stock['stock'];
                $quantiteAUtiliser = min($disponible, $quantiteNecessaire);

                // Consommer l'aliment
                $this->consommerAliment($idAlimentation, $quantiteAUtiliser, $idUtilisateur, $idCategorie);

                // Réduire la quantité à distribuer
                $quantiteNecessaire -= $quantiteAUtiliser;
            }
        }

        return true;
    }
}
