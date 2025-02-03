<?php 
namespace app\models;
use Flight;

class AchatAlimentationModel{
    private $db;

    public function __construct() {
        
    }
      public  function getAllAlimentation(){
        try {
            $this->db = Flight::db();
           
            $query = "SELECT * FROM elevage_Aliments" ;
            
            $stmt = $this->db->prepare($query);
      
            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } 
      public  function getAllMesAliments(){
        try {
            $this->db = Flight::db();
           
            $query = "SELECT * FROM elevage_MesAliments" ;
            
            $stmt = $this->db->prepare($query);
      
            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } 
      public function updateCapital($montant, $idU)
      {
          try {
              $query = "UPDATE elevage_Utilisateurs SET capital = capital + ? WHERE idUtilisateur = ?";
              $stmt = $pdo->prepare($query);
              
              // Utilisation de bindValue avec des "?"
              $stmt->bindValue(1, $montant, PDO::PARAM_INT);
              $stmt->bindValue(2, $idU, PDO::PARAM_INT);
              
              if ($stmt->execute()) {
                  return "Capital mis à jour avec succès.";
              } else {
                  return "Erreur lors de la mise à jour du capital.";
              }
          } catch (\Exception $e) {
              echo "Une erreur s'est produite : " . $e->getMessage();
          }
      }
      
      public function insertMesAlimentations($nom, $stock,  $idUtilisateur,$idCategorie)
      {
        $idU = (String) $idUtilisateur;

          try {
              $query = "INSERT INTO elevage_MesAliments (nom, idCategorie, stock, idUtilisateur) VALUES (?, ?, ?, ?)";
              $stmt = $pdo->prepare($query);
              
              // Utilisation de bindValue avec des "?"
              $stmt->bindValue(1, $nom);   // Nom de l'animal
              $stmt->bindValue(2, $idCategorie);         // Type de l'animal
              $stmt->bindValue(3, $stock);          // Âge de l'animal
              $stmt->bindValue(4, $idU); // ID de l'utilisateur
              
              if ($stmt->execute()) {
                  return "Aliment inséré avec succès.";
              } else {
                  return "Erreur lors de l'insertion de l'animal.";
              }
          } catch (\Exception $e) {
              echo "Une erreur s'est produite : " . $e->getMessage();
          }
      }
      public function insertHistoriqueAchatAliments($idAliment, $dateAchat, $idUtilisateur, $montant)
{
    try {
        $query = "INSERT INTO elevage_AchatAliments (idAliment, dateAchat, idUtilisateur, montant) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        
        // Liaison des paramètres avec bindValue
        $stmt->bindValue(1, $idAnimaux, PDO::PARAM_INT);  // ID de l'animal acheté
        $stmt->bindValue(2, $dateAchat, PDO::PARAM_STR);  // Date d'achat
        $stmt->bindValue(3, $idUtilisateur, PDO::PARAM_INT);  // ID de l'utilisateur
        $stmt->bindValue(4, $montant, PDO::PARAM_DECIMAL);  // Montant de l'achat
        
        if ($stmt->execute()) {
            return "Historique d'achat inséré avec succès.";
        } else {
            return "Erreur lors de l'insertion de l'historique d'achat.";
        }
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}

public function updateStock($idAlimentation, $idUtilisateur, $quantite)
{
    $idU = (String) $idUtilisateur;


    try {
        // Requête pour mettre à jour le stock d'aliments
        $query = "UPDATE elevage_MesAliments 
                  SET stock = stock + ? 
                  WHERE idAlimentation = ? AND idUtilisateur = ?";
        $stmt = $pdo->prepare($query);
        
        // Liaison des paramètres avec bindValue
        $stmt->bindValue(1, $quantite );  // Quantité à ajouter
        $stmt->bindValue(2, $idAlimentation );  // ID de l'aliment
        $stmt->bindValue(3, $idU);  // ID de l'utilisateur
        
        // Exécution de la requête
        if ($stmt->execute()) {
            return "Stock mis à jour avec succès.";
        } else {
            return "Erreur lors de la mise à jour du stock.";
        }
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }


}


      
}



?>