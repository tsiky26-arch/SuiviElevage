<?php 
namespace app\models;
use Flight;

class AchatAnimauxModel{
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

      public function updateCapital($montant, $idU)
      {
          try {
              $query = "UPDATE elevage_Utilisateurs SET capital = capital + ? WHERE idUtilisateur = ?";
              $stmt = $pdo->prepare($query);

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
      
      public function insertAnimauxElever($nomAnimal, $idCategorie, $poidsInitial, $idUtilisateur, $image,$statut, $etat)
      {
        $idU = (String) $idUtilisateur;

          try {
              $query = "INSERT INTO elevage_AnimauxEleves (nom, idCategorie, poidsInitial, idUtilisateur,image,statut,etat) VALUES (?, ?, ?, ?,?,?,?)";
              $stmt = $pdo->prepare($query);
              
              // Utilisation de bindValue avec des "?"
              $stmt->bindValue(1, $nom);   // Nom de l'animal
              $stmt->bindValue(2, $idCategorie);         // Type de l'animal
              $stmt->bindValue(3, $poidsInitial);          // Âge de l'animal
              $stmt->bindValue(4, $idU); // ID de l'utilisateur
              $stmt->bindValue(5, $image); 
              $stmt->bindValue(6, $statut); 
              $stmt->bindValue(7, $etat); 
              if ($stmt->execute()) {
                  return "Animal inséré avec succès.";
              } else {
                  return "Erreur lors de l'insertion de l'animal.";
              }
          } catch (\Exception $e) {
              echo "Une erreur s'est produite : " . $e->getMessage();
          }
      }
      public function insertHistoriqueAchatAnimaux($idAnimaux, $dateAchat, $idUtilisateur, $montant)
{
    try {
        $query = "INSERT INTO elevage_HistoriqueAchats (idAnimaux, dateAchat, idUtilisateur, montant) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        
        // Liaison des paramètres avec bindValue
        $stmt->bindValue(1, $idAnimaux, \PDO::PARAM_INT);  // ID de l'animal acheté
        $stmt->bindValue(2, $dateAchat, \PDO::PARAM_STR);  // Date d'achat
        $stmt->bindValue(3, $idUtilisateur, \PDO::PARAM_INT);  // ID de l'utilisateur
        $stmt->bindValue(4, $montant, \PDO::PARAM_DECIMAL);  // Montant de l'achat
        
        if ($stmt->execute()) {
            return "Historique d'achat inséré avec succès.";
        } else {
            return "Erreur lors de l'insertion de l'historique d'achat.";
        }
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}

      
}



?>