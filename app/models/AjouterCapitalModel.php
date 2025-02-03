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

            $query = "UPDATE elevage_Utilisateurs SET capital =  ? WHERE idUtilisateur = ?";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$montant);
            $stmt->bindValue(2,$idU);

            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
      } 
}



?>