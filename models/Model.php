<?php

abstract class Model
{
    private $db;

    protected function getDB()
    {
        if ($this->db === null) {
            $dsn = 'mysql:host=https://phpmyadmin.iq.iut21.u-bourgogne.fr/;dbname=Pokemon';
            $username = 'grp-440';
            $password = 'JNF2RxZFbI';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            
            try {
                $this->db = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                throw new Exception('Database connection error: ' . $e->getMessage());
            }
        }
        
        return $this->db;
    }

    protected function execRequest($sql, $params = null)
    {
        $stmt = $this->getDB()->prepare($sql);

        if ($params) {
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }
        
        if (!$stmt->execute()) {
            return false;
        }
        
        return $stmt;
    }
}
