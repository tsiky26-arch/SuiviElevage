<?php 
namespace app\models;
use Flight;

class AjoutCapital{
    private $db;

    public function __construct() {
        
    }
      public  function addCapital($idU,$montant){
        try {
            $this->db = Flight::db();

            $query = "INSERT INTO elevage_Utilisateurs(capital) VALUES ? WHERE idUtilisateurs = ?";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$montant);
            $stmt->bindValue(2,$idU);

            
            $stmt->execute();
            
        } catch (Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
      } 
}



?>