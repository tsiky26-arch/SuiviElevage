<?php 
namespace app\models;
use Flight;

class CrudAnimauxModel{
    private $db;

    public function __construct(){
        }

        public function modifierCategorie($idCategorie, $categorie, $poidsMin, $poidsMax, $prixVente, $nbjSManger, $pertePoidsj)
        {
            try {
                $this->db = Flight::db();
        
                $query = "UPDATE categories_animaux 
                          SET categorie = ?, poidsMin = ?, poidsMax = ?, prixVente = ?, nbjSManger = ?, pertePoidsj = ? 
                          WHERE idCategorie = ?";
                $stmt = $this->db->prepare($query);
        
                $stmt->bindValue(1, $categorie);
                $stmt->bindValue(2, $poidsMin);
                $stmt->bindValue(3, $poidsMax);
                $stmt->bindValue(4, $prixVente);
                $stmt->bindValue(5, $nbjSManger);
                $stmt->bindValue(6, $pertePoidsj);
                $stmt->bindValue(7, $idCategorie);
        
                $stmt->execute();
        
            } catch (\Exception $e) {
                echo "Une erreur s'est produite : " . $e->getMessage();
            }
        
            if ($this->db != null) {
                return true;
            } else {
                return false;
            }
        }
        
}
?>