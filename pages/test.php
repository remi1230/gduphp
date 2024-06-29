<?php
// test.php

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Définir le chemin de base du projet
$baseDir = __DIR__ . '/../';

// Inclure le fichier Database.php
require $baseDir . 'src/services/Database.php';

// Créer une instance de la classe Database
$db = new Database();

// Utiliser la méthode selectAll pour obtenir tous les enregistrements d'une table
$result = $db->selectAll('schedules');

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] .
        " - dayOfWeek: " . $row["dayOfWeek"].
        " - openTime: " . $row["openTime"].
        " - closeTime: " . $row["closeTime"].
        " - order: " . $row["order"].
        "<br>";
    }
} else {
    echo "0 résultats";
}

// Fermer la connexion
$db->close();
?>
