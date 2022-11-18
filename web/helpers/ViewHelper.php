<?php

namespace web\helpers;

class ViewHelper extends AbstractHelper {

    public function render($view, $params = []) {
        extract($params);
        $viewInstance = require_once(realpath(dirname(__FILE__) . '/../../app/views/' . $view . '.phtml'));
        return $viewInstance;
    }

}