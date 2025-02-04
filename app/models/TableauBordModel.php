<?php 
namespace app\models;
use Flight;

class TableauBordModel {
    private $db;

    public function __construct() {}

    public function GetCapital($idU, $date = null) {
        try {
            $this->db = Flight::db();
            $idU = (String) $idU;

            $query = "SELECT capital FROM elevage_Utilisateurs WHERE idUtilisateur = ?";
            if ($date) {
                $query .= " AND date <= ? ORDER BY date DESC LIMIT 1";
            }

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $idU);
            if ($date) {
                $stmt->bindValue(2, $date);
            }

            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$data) {
                echo "Aucun capital trouvé pour cet utilisateur.";
                return null;
            }

            return $data['capital'];

        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return null;
        }
    }

    public function NombreTotalAnimauxElever($idU, $date = null) {
        try {
            $this->db = Flight::db();
            $statut = 'ELEVE';
            $idU = (String) $idU;

            $query = "SELECT COUNT(*) FROM elevage_AnimauxEleves WHERE idUtilisateur = ? AND statut = ?";
            if ($date) {
                $query .= " AND date <= ?";
            }

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $idU);
            $stmt->bindValue(2, $statut);
            if ($date) {
                $stmt->bindValue(3, $date);
            }

            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }

        if ($data) {
            return $data['COUNT(*)'];
        } else {
            echo "Aucun animal à afficher";
        }

        return 0;
    }

    public function getNombreAnimauxMorts($idU, $date = null) {
        try {
            $this->db = Flight::db();
            $etat = 'MORT';
            $idU = (String) $idU;

            $query = "SELECT COUNT(*) FROM elevage_AnimauxEleves WHERE idUtilisateur = ? AND etat = ?";
            if ($date) {
                $query .= " AND date <= ?";
            }

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $idU);
            $stmt->bindValue(2, $etat);
            if ($date) {
                $stmt->bindValue(3, $date);
            }

            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }

        if ($data) {
            return $data['COUNT(*)'];
        } else {
            echo "Aucun animal à afficher";
        }

        return 0;
    }

    public function getNombreAnimauxPretsAVendre($idU, $date = null) {
        try {
            $this->db = Flight::db();
            $idU = (String) $idU;

            $query = "SELECT COUNT(*) 
                      FROM elevage_AnimauxEleves a
                      JOIN elevage_Categories c ON a.idCategorie = c.idCategorie
                      WHERE a.idUtilisateur = ? 
                      AND a.poidsVariable >= c.poidsMin 
                      AND a.etat = 'VIVANT' 
                      AND a.statut = 'ELEVE'";
            if ($date) {
                $query .= " AND a.date <= ?";
            }

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $idU);
            if ($date) {
                $stmt->bindValue(2, $date);
            }

            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }

        if ($data) {
            return $data['COUNT(*)'];
        } else {
            echo "Aucun animal prêt à être vendu.";
        }

        return 0;
    }

    public function getNombreAlimentsDisponibles($idU, $date = null) {
        try {
            $this->db = Flight::db();
            $idU = (String) $idU;

            $query = "SELECT SUM(stock) 
                      FROM elevage_MesAliments 
                      WHERE idUtilisateur = ?";
            if ($date) {
                $query .= " AND date <= ?";
            }

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $idU);
            if ($date) {
                $stmt->bindValue(2, $date);
            }

            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }

        if ($data) {
            return $data['SUM(stock)'];
        } else {
            echo "Aucun aliment disponible.";
        }

        return 0;
    }
}
?>
