<?php 
namespace app\models;
use Flight ;

class ListeAnimauxModel{
    private $db;

     public function __construct() {
        
    }

    public function getAllAnimauxById($idU)
    {
        try {
            $this->db = Flight::db();
            $statut= 'eleve';

            $idU = (String) $idU;

            $query = "SELECT * FROM elevage_AnimauxEleves WHERE idUtilisateur = ? AND statut = ?";
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$idU);
            $stmt->bindValue(2,$statut);

            
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