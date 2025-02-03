<?php

namespace app\models; 
use Flight;

class InscriptionModel { 
    private $db;

    public function __construct() {
    }

    public function addUser($nom,$email, $mdp) {
        try {
            $this->db = Flight::db();


            $query = "INSERT INTO elevage_Utilisateurs (nom, email, motDePasse) VALUES (?, ?, ?)";            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$nom);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$mdp);

            
            $stmt->execute();
            
            // echo $stmt->rowCount();
        } catch (Exception $e) {
            //throw $th;
            echo "Une erreur c'est produite" .$e->getMessage();
        }
     

        
    }
}
