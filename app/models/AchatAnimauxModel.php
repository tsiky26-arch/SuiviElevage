<?php
namespace app\models;

use Flight;

class AchatAnimauxModel
{
    private $db;

    public function __construct() {
        
    }

      public  function getAllAnimauxAVendre(){
        try {
            $this->db = Flight::db();
           
            $query = "SELECT * FROM view_AnimauxAVendre" ;
            
            $stmt = $this->db->prepare($query);
      
            
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            return $data;
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
      } 

      public function getAnimalAVendreById($idAnimal) {
        try {
            $this->db = Flight::db();
            $idAnimal = (String) $idAnimal;
           
            $query = "SELECT * FROM view_AnimauxAVendre where idAnimaux = ?" ;
            
            $stmt = $this->db->prepare($query);
      
            $stmt->bindValue(1, $idAnimal, \PDO::PARAM_INT);
            
            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            return $data;
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
      }

      
      public function getUserById($id) {
        try {
          $this->db = Flight::db();

          $id = (String) $id;

          $query = "select * from elevage_Utilisateurs WHERE idUtilisateur = ?";
          
          $stmt = $this->db->prepare($query);
  
          $stmt->bindValue(1,$id);

          
          $stmt->execute();
          return $stmt->Fetch(\PDO::FETCH_ASSOC);
          
      } catch (\Exception $e) {
          echo "une erreur c'est produite" .$e->getMessage();
      }
      }

      public function updateCapital($montant, $idU)
      {
          try {
            $this->db = Flight::db();

            $montant = (String) $montant;
            $idU = (String) $idU;
            
              $query = "UPDATE elevage_Utilisateurs SET capital = ? WHERE idUtilisateur = ?";
              $stmt = $this->db->prepare($query);

              $idU = (String) $idU;
              
              // Utilisation de bindValue avec des "?"
              $stmt->bindValue(1, $montant, \PDO::PARAM_INT);
              $stmt->bindValue(2, $idU, \PDO::PARAM_INT);
              
              if ($stmt->execute()) {
                  return "Capital mis à jour avec succès.";
              } else {
                  return "Erreur lors de la mise à jour du capital.";
              }
          } catch (\Exception $e) {
              echo "Une erreur s'est produite : " . $e->getMessage();
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
    
      
      public function insertAnimauxElever($nomAnimal, $idCategorie, $poidsInitial, $poidsVariable, $idUtilisateur, $image,$statut, $etat)
      {
        $idUtilisateur = (String) $idUtilisateur;
        $idCategorie = (String) $idCategorie;

          try {
            $this->db = Flight::db();
              $query = "INSERT INTO elevage_AnimauxEleves (nom, idCategorie, poidsInitiale, poidsVariable, idUtilisateur,image,statut,etat) VALUES (?, ?, ?, ?, ?,?,?,?)";
              $stmt = $this->db->prepare($query);
              
              // Utilisation de bindValue avec des "?"
              $stmt->bindValue(1, $nomAnimal);   // Nom de l'animal
              $stmt->bindValue(2, $idCategorie);         // Type de l'animal
              $stmt->bindValue(3, $poidsInitial);          // Âge de l'animal
              $stmt->bindValue(4, $poidsVariable);          // Âge de l'animal
              $stmt->bindValue(5, $idUtilisateur); // ID de l'utilisateur
              $stmt->bindValue(6, $image); 
              $stmt->bindValue(7, $statut); 
              $stmt->bindValue(8, $etat); 
              if ($stmt->execute()) {
                  echo "Animal inséré avec succès.";
              } else {
                  echo "Erreur lors de l'insertion de l'animal.";
              }
          } catch (\Exception $e) {
              echo "Une erreur s'est produite : " . $e->getMessage();
          }
      }
      public function insertHistoriqueAchatAnimaux($idAnimaux, $dateAchat, $idUtilisateur, $montant)
{
    try {
        $this->db = Flight::db();

        $montant = (String) $montant;
        $idAnimaux = (String) $idAnimaux;
        $idUtilisateur = (String) $idUtilisateur;

        $query = "INSERT INTO elevage_HistoriqueAchats (idAnimaux, dateAchat, idUtilisateur, montant) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        
        // Liaison des paramètres avec bindValue
        $stmt->bindValue(1, $idAnimaux, \PDO::PARAM_INT);  // ID de l'animal acheté
        $stmt->bindValue(2, $dateAchat, \PDO::PARAM_STR);  // Date d'achat
        $stmt->bindValue(3, $idUtilisateur, \PDO::PARAM_INT);  // ID de l'utilisateur
        $stmt->bindValue(4, $montant);  // Montant de l'achat
        
        if ($stmt->execute()) {
            echo "Historique d'achat inséré avec succès.";
        } else {
            echo "Erreur lors de l'insertion de l'historique d'achat.";
        }
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}

      
}



?>
