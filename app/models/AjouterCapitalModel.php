<?php 
namespace app\models;
use Flight;

class AjouterCapitalModel{
    private $db;

    public function __construct() {
        
    }
      public  function addCapital($idU,$montant){
        try {
            $this->db = Flight::db();

            $idU = (String) $idU;

            $query = "UPDATE elevage_Utilisateurs SET capital = capital + ? WHERE idUtilisateur = ?";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$montant);
            $stmt->bindValue(2,$idU);

            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
      } 
      public function updateCapitalHistorique($idU, $capital, $date = null) {
        try {
            $this->db = Flight::db();
            $idU = (String) $idU;
            $date = $date ?: date('Y-m-d');  // Si aucune date n'est spécifiée, la date du jour est utilisée
    
            // Vérification si une entrée existe déjà pour cet utilisateur et cette date
            $query = "SELECT id FROM historique_capital WHERE idUtilisateur = ? AND date = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $idU);
            $stmt->bindValue(2, $date);
            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            if ($data) {
                // Si une entrée existe, on met à jour le capital
                $updateQuery = "UPDATE historique_capital SET capital = ?, dateModification = ? WHERE id = ?";
                $updateStmt = $this->db->prepare($updateQuery);
                $updateStmt->bindValue(1, $capital);
                $updateStmt->bindValue(2, date('Y-m-d H:i:s'));  // Date et heure de la modification
                $updateStmt->bindValue(3, $data['id']);
                $updateStmt->execute();
                echo "Capital mis à jour dans l'historique.";
            } else {
                // Sinon, on insère une nouvelle entrée dans l'historique
                $insertQuery = "INSERT INTO historique_capital (idUtilisateur, capital, date, dateModification) VALUES (?, ?, ?, ?)";
                $insertStmt = $this->db->prepare($insertQuery);
                $insertStmt->bindValue(1, $idU);
                $insertStmt->bindValue(2, $capital);
                $insertStmt->bindValue(3, $date);
                $insertStmt->bindValue(4, date('Y-m-d H:i:s'));  // Date et heure de la modification
                $insertStmt->execute();
                echo "Capital ajouté à l'historique.";
            }
        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }
    
}



?>