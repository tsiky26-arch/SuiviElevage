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
           
            $query = "SELECT * FROM view_AnimauxAVendredre" ;
            
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
      
      public function insertAnimauxElever($nomAnimal, $idCategorie, $poidsInitial, $idUtilisateur)
      {
          try {
              $query = "INSERT INTO animaux (nom, type, age, idUtilisateur) VALUES (?, ?, ?, ?)";
              $stmt = $pdo->prepare($query);
              
              // Utilisation de bindValue avec des "?"
              $stmt->bindValue(1, $nomAnimal, PDO::PARAM_STR);   // Nom de l'animal
              $stmt->bindValue(2, $type, PDO::PARAM_STR);         // Type de l'animal
              $stmt->bindValue(3, $age, PDO::PARAM_INT);          // Âge de l'animal
              $stmt->bindValue(4, $idUtilisateur, PDO::PARAM_INT); // ID de l'utilisateur
              
              if ($stmt->execute()) {
                  return "Animal inséré avec succès.";
              } else {
                  return "Erreur lors de l'insertion de l'animal.";
              }
          } catch (\Exception $e) {
              echo "Une erreur s'est produite : " . $e->getMessage();
          }
      }
      
      
}



?>