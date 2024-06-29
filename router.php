<?php
// router.php

// Récupère le chemin de la requête
$request = $_SERVER['REQUEST_URI'];

// Si le fichier demandé existe, l'exécute directement
if (file_exists(__DIR__ . $request) && $request !== '/') {
    return false;
}

// Sinon, inclut le fichier index.php
require __DIR__ . '/index.php';
?>
