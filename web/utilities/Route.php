<?php

namespace web\utilities;

class Route
{
    public $controller;
    public $action;
    public $query;

    public function setController($controllerName) {
        $this->controller = (!empty($controllerName)) ? ucfirst($controllerName) . 'Controller' : null;
    }

    public function getController() {
        return $this->controller;
    }

    public function setAction($actionName) {
        $this->action = (!empty($actionName)) ? 'action' . ucfirst($actionName) : null;
    }

    public function getAction() {
        return $this->action;
    }

    public function addQueryParam($queryParamName, $queryParamValue) {
        $this->query[$queryParamName] = $queryParamValue;
    }

    public function getQuery() {
        return $this->query;
    }

    public function getQueryParam($queryParamName) {
        return (array_key_exists($queryParamName, $this->query)) ? $this->query[$queryParamName] : null;
    }

}