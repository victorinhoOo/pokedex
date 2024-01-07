<?php

abstract class Model
{
    private $db;

    // Initialise la connexion à la base de données
    public function __construct(){
        $this->db = $this->getDB();
    }


    // Obtient une instance de la base de données (connexion)
    protected function getDB()
    {
        if ($this->db === null) {
            $dbHost = 'localhost';
            $dsn = 'grp-440_s3_progweb';
            $username = 'grp-440';
            $password = 'JNF2RxZFbI';
            
            try {
                $this->db = new PDO("mysql:host=$dbHost;dbname=$dsn", $username, $password);
            } catch (PDOException $e) {
                throw new Exception('Database connection error: ' . $e->getMessage());
            }
        }
        
        return $this->db;
    }

    // Exécute une requête SQL préparée avec des paramètres.
    protected function execRequest(string $sql, array $params = null) {
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("Erreur d'exécution de la requête : " . $e->getMessage());
        }
    }
}
