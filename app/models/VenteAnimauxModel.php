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
}



?>