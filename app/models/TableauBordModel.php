<?php 
namespace app\models;
use Flight;

class TableauBordModel{
    private $db;

    public function __construct() {
        
    }   

    public function GetCapital($idU){
       

    try {
        $this->db = Flight::db();
        $idU = (String) $idU;

        $query = "SELECT capital FROM elevage_Utilisateurs WHERE idUtilisateur = ?";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(1, $idU);
        $stmt->execute();

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$data) {
            echo "Aucun capital trouvé pour cet utilisateur.";
            return null;
        }

        return $data['capital'];
        
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
        return null;
    }
}
// fonction pour avoir le nombre total d'animaux à elever

    public function NombreTotalAnimauxElever($idU){
        try {
            $this->db = Flight::db();
            $statut = 'ELEVE';
    
            $idU = (String) $idU;
    
            $query = "SELECT COUNT(*) FROM elevage_AnimauxEleves WHERE idUtilisateur = ? AND statut = ?";
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1, $idU);
            $stmt->bindValue(2, $statut);
    
            $stmt->execute();
    
        } catch (\Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    
        if ($this->db != null) {
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            echo "Aucun animal à afficher";
        }
    
        return $data;
    }
    public function getNombreAnimauxMorts($idU)
{
    try {
        $this->db = Flight::db();
        $etat = 'MORT';

        $idU = (String) $idU;

        $query = "SELECT COUNT(*) FROM elevage_AnimauxEleves WHERE idUtilisateur = ? AND etat = ?";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(1, $idU);
        $stmt->bindValue(2, $etat);

        $stmt->execute();

    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }

    if ($this->db != null) {
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    } else {
        echo "Aucun animal à afficher";
    }

    return $data;
}
public function getNombreAnimauxPretsAVendre($idU)
{
    try {
        $this->db = Flight::db();

        $idU = (String) $idU;

        $query = "SELECT COUNT(*)
                  FROM elevage_AnimauxEleves a
                  JOIN elevage_Categories c ON a.idCategorie = c.idCategorie
                  WHERE a.idUtilisateur = ? 
                  AND a.poidsVariable >= c.poidsMin 
                  AND a.etat = 'VIVANT' 
                  AND a.statut = 'ELEVE'";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $idU);

        $stmt->execute();

    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }

    if ($this->db != null) {
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    } else {
        echo "Aucun animal prêt à être vendu.";
    }

    return $data;
}
public function getNombreAlimentsDisponibles($idU)
{
    try {
        $this->db = Flight::db();

        $idU = (String) $idU;

        $query = "SELECT SUM(stock) 
                  FROM elevage_MesAliments 
                  WHERE idUtilisateur = ?";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $idU);

        $stmt->execute();

    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }

    if ($this->db != null) {
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    } else {
        echo "Aucun aliment disponible.";
    }

    return $data;
}




    
}



?>