<?php 
namespace app\models;
use Flight;




      
class AlimentationModel {
    private $db;
    public function __construct() {
    }
    
    public function nourrirAnimaux() {
        try {
            $this->db = Flight::db();
            // Récupérer les animaux non vendus
            $query = "SELECT a.idAnimaux, a.poidsVariable, c.idCategorie, c.poidsMin, c.prixVente, c.pertePoidsj, c.nbjSManger,
                             c.poidsMax, ma.stock, ma.idAlimentation, al.nom AS nomAliment, al.prix
                      FROM elevage_AnimauxEleves a
                      JOIN elevage_Categories c ON a.idCategorie = c.idCategorie
                      LEFT JOIN elevage_MesAliments ma ON c.idCategorie = ma.idAlimentation
                      LEFT JOIN elevage_Aliments al ON ma.idAlimentation = al.idAlimentation
                      WHERE a.statut = 'ELEVE' AND a.etat = 'VIVANT'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $animaux = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            foreach ($animaux as $animal) {
                $quota = $this->getQuotaAlimentaire($animal['idCategorie']);
                if ($animal['stock'] >= $quota) {
                    // Mise à jour du poids de l'animal
                    $nouveauPoids = min($animal['poidsVariable'] + ($quota * $this->getGainAlimentaire($animal['idAlimentation'])), $animal['poidsMax']);
                    $this->updatePoidsAnimal($animal['idAnimaux'], $nouveauPoids);
                    
                    // Mise à jour du stock d'alimentation
                    $this->updateStockAliment($animal['idAlimentation'], $animal['stock'] - $quota);
                    
                    // Enregistrement de l'historique d'alimentation
                    $this->logAlimentation($animal['idAnimaux'], $quota, $animal['idAlimentation']);
                } else {
                    // Gérer la perte de poids si l'animal n'est pas nourri
                    $poidsPerdu = $animal['poidsVariable'] * ($animal['pertePoidsj'] / 100);
                    $nouveauPoids = max($animal['poidsVariable'] - $poidsPerdu, 0);
                    $this->updatePoidsAnimal($animal['idAnimaux'], $nouveauPoids);
                    
                    // Vérifier si l'animal meurt de faim
                    if ($nouveauPoids <= 0) {
                        $this->setAnimalMort($animal['idAnimaux']);
                    }
                }
            }
        } catch (Exception $e) {
            echo "Erreur lors de l'alimentation automatique : " . $e->getMessage();
        }
    }
    
    public function getQuotaAlimentaire($idCategorie) {
        try {
            //code...
            $this->db = Flight::db();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $query = "SELECT quota FROM elevage_Categories WHERE idCategorie = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$idCategorie);
        $stmt->execute();
        // $stmt->execute([$idCategorie]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['quota'] : 0;
        // return $result;
    }
    
    public function getGainAlimentaire($idAlimentation) {
        try {
            $this->db = Flight::db();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $query = "SELECT gain FROM elevage_Aliments WHERE idAlimentation = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$idAlimentation]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['gain'] : 0;
    }
    
    public function updatePoidsAnimal($idAnimaux, $poids) {
        try {
            $this->db = Flight::db();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $query = "UPDATE elevage_AnimauxEleves SET poidsVariable = ? WHERE idAnimaux = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$poids, $idAnimaux]);
    }
    
    public function updateStockAliment($idAlimentation, $nouveauStock) {
        try {
            $this->db = Flight::db();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $query = "UPDATE elevage_MesAliments SET stock = ? WHERE idAlimentation = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nouveauStock, $idAlimentation]);
    }
    
    public function setAnimalMort($idAnimaux) {
        try {
            $this->db = Flight::db();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $query = "UPDATE elevage_AnimauxEleves SET etat = 'MORT' WHERE idAnimaux = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$idAnimaux]);
    }
    
    public function logAlimentation($idAnimaux, $quantite, $idAliment) {
        try {
            $this->db = Flight::db();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $query = "INSERT INTO elevage_HistoriqueAlimentations (date, idAnimaux, quantite, idAliment) VALUES (NOW(), ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$idAnimaux, $quantite, $idAliment]);
    }

    public function getAllCategories() {
        try {
            $this->db = Flight::db();
           
            $query = "SELECT * FROM elevage_Categories" ;
            
            $stmt = $this->db->prepare($query);
      
            
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            return $data;
        } catch (\Exception $e) {
            echo "une erreur c'est produite" .$e->getMessage();
        }
    }
}




?>