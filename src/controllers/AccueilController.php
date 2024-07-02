<?php
// controllers/AccueilController.php

require_once __DIR__ . '/../Controller.php';

class AccueilController extends Controller {
    public function index() {
        $baseDir = __DIR__ . '/../';
        require $baseDir . '/../src/services/Database.php';
        $db = new Database();

        $schedules = $db->selectAll('schedules');
        $services  = $db->selectAll('service');

        $this->render('accueil.html', ['services' => $services, 'schedules' => $schedules]);
    }
}
