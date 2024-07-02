<?php
// src/Controller.php

require_once 'Template.php';

class Controller {
    protected $template;

    public function __construct() {
        $this->template = new Template(__DIR__ . '/../templates');
    }

    protected function render($template, $variables = []) {
        echo $this->template->render($template, $variables);
    }
}
