<?php 
namespace app\models;
use Flight ;

class ListeANimauxModels{
    private $db;

     public function __construct() {
        
    }

    public function getAllAnimauxById($idU)
    {
        try {
            $this->db = Flight::db();

            $query = "SELECT * FROM elevage_AnimauxEleves WHERE idUtilisateur = ?";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$idU);

            
            $stmt->execute();
            
        } catch (Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
        if($this->db != null) {

            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        }
        else {
            echo "Aucun animal a afficher";
        }

        return $data;
    }

}



?>