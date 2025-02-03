<?php 
namespace app\models;
use Flight;

class ListeAnimauxDispoVendreModel{
    private $db;

    public function __construct() {
        
    }
      public  function listeDispoAVendre($idU){
        try {
            $this->db = Flight::db();
            $statut = 'vendu';
            $query = "SELECT * FROM elevage_AnimauxEleve WHERE idUtilisateur= ? AND statut = ? ";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$idU);
            $stmt->bindValue(2,$statut);

            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
      } 
}



?>