<?php
// src/services/Database.php

class Database {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $port;
    private $conn;

    // Constructeur pour initialiser les paramètres de connexion
    public function __construct($servername = 'localhost', $username = 'root', $password = 'root', $dbname = 'gduphp', $port = 3305) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->port = $port;
        $this->connect();
    }

    // Méthode pour se connecter à la base de données
    private function connect() {
        // Créer la connexion
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);

        // Vérifier la connexion
        if ($this->conn->connect_error) {
            die("Échec de la connexion : " . $this->conn->connect_error);
        }
    }

    // Méthode pour exécuter une requête SQL
    public function query($sql) {
        $result = $this->conn->query($sql);

        if ($this->conn->error) {
            die("Erreur lors de l'exécution de la requête : " . $this->conn->error);
        }

        return $result;
    }

    // Méthode pour préparer et exécuter une requête SQL avec des paramètres
    public function prepare($sql, $params) {
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Erreur lors de la préparation de la requête : " . $this->conn->error);
        }

        if ($params) {
            $stmt->bind_param(...$params);
        }

        if (!$stmt->execute()) {
            die("Erreur lors de l'exécution de la requête : " . $stmt->error);
        }

        return $stmt->get_result();
    }

    // Méthode pour sélectionner tous les enregistrements d'une table
    public function selectAll($tableName) {
        $sql = "SELECT * FROM " . $this->conn->real_escape_string($tableName);
        return $this->query($sql);
    }

    // Méthode pour fermer la connexion
    public function close() {
        $this->conn->close();
    }
}
?>
