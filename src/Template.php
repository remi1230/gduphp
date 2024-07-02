<?php
// src/Template.php

class Template {
    private $templateDir;
    private $cacheDir;
    private $blocks = [];
    private $currentBlock;

    public function __construct($templateDir, $cacheDir = null) {
        $this->templateDir = rtrim($templateDir, '/') . '/';
        $this->cacheDir = $cacheDir ? rtrim($cacheDir, '/') . '/' : null;
    }

    public function render($template, $variables = []) {
        $templateFile = $this->templateDir . $template;

        if (!file_exists($templateFile)) {
            throw new Exception("Template file not found: $templateFile");
        }

        ob_start();
        extract($variables);
        include $templateFile;
        $content = ob_get_clean();

        if ($this->blocks) {
            foreach ($this->blocks as $block => $value) {
                $content = str_replace("{{ $block }}", $value, $content);
            }
        }

        return $content;
    }

    public function extend($template) {
        $content = $this->render($template, []);
        echo $content;
    }

    public function section($name) {
        $this->currentBlock = $name;
        ob_start();
    }

    public function endSection() {
        $content = ob_get_clean();
        $this->blocks[$this->currentBlock] = $content;
    }
}