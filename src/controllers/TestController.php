<?php
// controllers/testController.php

require_once __DIR__ . '/../Controller.php';

class TestController extends Controller {
    public function index() {
        $baseDir = __DIR__ . '/../';
        require $baseDir . '/../src/services/Database.php';
        $db = new Database();

        $result = $db->selectAll('schedules');

        var_dump($result);

        $this->render('test.html', ['horaires' => $result]);
    }
}
