<?php

namespace web;

use web\helpers\WebHelper;
use controllers;

class App
{

    private static $app;
    private $webHelper;

    private function __construct() {
        $this->webHelper = WebHelper::instance();
    }

    public static function instance() {
        return (self::$app instanceof App) ? self::$app : self::$app = new App();
    }

    public function run() {
        $this->webHelper->parse($_SERVER['REQUEST_URI']);
        if ($this->webHelper->isUrlParsed()) {
            $controller = $this->webHelper->getRoute()->getController();
            $action     = $this->webHelper->getRoute()->getAction();
            if (empty($controller) || empty($action)) {
                $controller = 'MainController';
                $action     = 'indexAction';
            }
            $this->move($controller, $action);
        }
    }

    private function move($controller, $action, $params = []) {
        try {
            $path = __DIR__ . '/../app/controllers/' . $controller . '.php';
            require_once __DIR__ . '/../app/controllers/' . $controller . '.php';
            $controller = 'controllers\\' . $controller;
            $controllerClass = new $controller();
            if (method_exists($controllerClass, $action)) {
                $view = $controllerClass->$action($params);
                echo $view;
            }
        } catch (\Exception $e) {

        }

    }

}