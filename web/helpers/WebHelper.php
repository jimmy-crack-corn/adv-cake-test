<?php

namespace web\helpers;

use web\utilities\Route;

class WebHelper extends AbstractHelper {

    private static Route $routeInstance;
    private $isUrlParsed = false;

    public static function instance()
    {
        self::$routeInstance = new Route();
        return parent::instance();
    }

    public function parse($url) {
        $url = parse_url($url);
        $path = null;
        if (!empty($url['path'])) {
            $path = $url['path'];
            $pathArray = explode("/", $path);
            (!empty($pathArray[1]))
                ? self::$routeInstance->setController($pathArray[1])
                : self::$routeInstance->setController(null);
            (!empty($pathArray[2]))
                ? self::$routeInstance->setAction($pathArray[2])
                : self::$routeInstance->setAction(null);
        }
        $this->isUrlParsed = true;
    }

    public function isUrlParsed() {
        return $this->isUrlParsed;
    }

    public function getRoute() {
        return self::$routeInstance;
    }

}