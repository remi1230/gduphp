<?php
// index.php

// Récupère le chemin de la requête et supprime les barres obliques initiales et finales
$request = trim($_SERVER['REQUEST_URI'], '/');

// Si la requête est vide, utilise 'accueil' comme page par défaut
if ($request == '') {
    $request = 'accueil';
}

// Construit le chemin vers le fichier
$file = __DIR__ . '/pages/' . $request . '.php';

// Vérifie si le fichier existe
if (file_exists($file)) {
    require $file;
} else {
    // Si le fichier n'existe pas, renvoie une page 404
    http_response_code(404);
    require __DIR__ . '/pages/404.php';
}
?>
