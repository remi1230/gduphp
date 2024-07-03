<?php
// controllers/CabinetController.php

require_once __DIR__ . '/../Controller.php';

class CabinetController extends Controller {
    public function index() {
        $baseDir = __DIR__ . '/../';
        require $baseDir . '/../src/services/Database.php';
        $db = new Database();

        $services  = $db->selectAll('service');

        $this->render('cabinet.html', ['services' => $services]);
    }
}
