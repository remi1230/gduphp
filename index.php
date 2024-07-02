<?php
// index.php

require_once __DIR__ . '/src/controllers/AccueilController.php';
require_once __DIR__ . '/src/controllers/TestController.php';

$request = trim($_SERVER['REQUEST_URI'], '/');

if ($request == '') {
    $request = 'accueil';
}

switch ($request) {
    case 'accueil':
        $controller = new AccueilController();
        $controller->index();
        break;
    case 'test':
        $controller = new TestController();
        $controller->index();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/pages/404.php';
        break;
}
?>
