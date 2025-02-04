<?php 
namespace app\models;
use Flight;

class VenteAnimauxModel{
    private $db;

    public function __construct() {
        
    }
      public  function getAllAnimauxElever($idU){
        try {
            $this->db = Flight::db();
            $idU = (String) $idU;
            $query = "SELECT * FROM elevage_AnimauxEleve WHERE idUtilisateur= ? ";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$idU);

            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
        if($this->db != null) {

          $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }
      else {
          echo "une erreur c'est produite";
      }

      return $data;
      } 

      public function insertAnimauxAVendre($idU, $idCategorie, $idanimaux,$poids, $prix ){
        try {
          $query = "INSERT INTO elevage_AnimauxQuiPeuxEtreVendu (idUtilisateur, idCategorie, idAnimaux, poids, prix) 
                    VALUES (?, ?, ?, ?)";
          $stmt = $pdo->prepare($query);
          
          // Liaison des paramètres avec bindValue
          $stmt->bindValue(1, $idU, PDO::PARAM_INT);  
          $stmt->bindValue(2, $idCategorie, PDO::PARAM_INT); 
          $stmt->bindValue(3, $idAnimaux, PDO::PARAM_INT);  
          $stmt->bindValue(4, $poids, PDO::PARAM_DECIMAL);
          $stmt->bindValue(1, $prix, PDO::PARAM_INT);
          
          if ($stmt->execute()) {
              return " inséré avec succès.";
          } else {
              return "Erreur lors de l'insertion ";
          }
      } catch (\Exception $e) {
          echo "Une erreur s'est produite : " . $e->getMessage();
      }

      }
}



?>