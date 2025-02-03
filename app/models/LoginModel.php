<?php

namespace app\models;

use Flight;

class LoginModel { 
    private $db;

    public function __construct() {
        
    }

    public function getUser($email, $mdp) {
        try {
            $this->db = Flight::db();

            $query = "SELECT * FROM elevage_utilisateurs WHERE email = ? AND motDePasse = ?";
            
            $stmt = $this->db->prepare($query);
    
            $stmt->bindValue(1,$email);
            $stmt->bindValue(2,$mdp);

            
            $stmt->execute();
            
        } catch (\Exception $e) {
            echo "erreur de connexion " .$e->getMessage();
        }
        if($this->db != null) {

            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        }
        else {
            echo "erreur de connexion";
        }

        return $data;
    }
}
