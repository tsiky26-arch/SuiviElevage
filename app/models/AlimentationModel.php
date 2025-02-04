<?php 
namespace app\models;
use Flight;

class AchatAlimentationModel{
    private $db;

    public function __construct() {
        
    }
      public  function getAllCategorie(){
        try {
            $this->db = Flight::db();
           
            $query = "SELECT * FROM elevage_Categories" ;
            
            $stmt = $this->db->prepare($query);
      
            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } 

      
    
      public function insertHistoriqueAlimentation($idAliment, $date, $idUtilisateur, $quantite, $idCategorie)
{
    try {
        $query = "INSERT INTO elevage_HistoriqueAlimentations (idAliment, date, idUtilisateur, quantite, idCategorie) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        
        // Liaison des paramètres avec bindValue
        $stmt->bindValue(1, $idAliment, PDO::PARAM_INT);  // ID de l'animal acheté
        $stmt->bindValue(2, $date, PDO::PARAM_STR);  // Date d'achat
        $stmt->bindValue(3, $idUtilisateur, PDO::PARAM_INT);  // ID de l'utilisateur
        $stmt->bindValue(4, $quantite, PDO::PARAM_DECIMAL);  // Montant de l'achat
        $stmt->bindValue(5, $idCategorie, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return "Historique d'achat inséré avec succès.";
        } else {
            return "Erreur lors de l'insertion de l'historique d'achat.";
        }
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}

public function updateStock($idAlimentation, $idUtilisateur, $quantite)
{
    $idU = (String) $idUtilisateur;


    try {
        // Requête pour mettre à jour le stock d'aliments
        $query = "UPDATE elevage_MesAliments
                  SET stock = stock - ? 
                  WHERE idAlimentation = ? AND idUtilisateur = ?";
        $stmt = $pdo->prepare($query);
        
        // Liaison des paramètres avec bindValue
        $stmt->bindValue(1, $quantite );  // Quantité à ajouter
        $stmt->bindValue(2, $idAlimentation );  // ID de l'aliment
        $stmt->bindValue(3, $idU);  // ID de l'utilisateur
        
        // Exécution de la requête
        if ($stmt->execute()) {
            return "Stock mis à jour avec succès.";
        } else {
            return "Erreur lors de la mise à jour du stock.";
        }
    } catch (\Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }


}


      
}



?>