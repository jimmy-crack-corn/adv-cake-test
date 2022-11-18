<?php
namespace web\controllers;

use web\helpers\ViewHelper;

class AbstractController {

    private $viewHelper;

    public function __construct() {
        $this->viewHelper = ViewHelper::instance();
    }

    protected function getViewHelper() {
        return $this->viewHelper;
    }

}