<?php

namespace controllers;

use helpers\RevertStringHelper;
use web\controllers\AbstractController;

class MainController extends AbstractController {

    public function actionIndex() {
        $postParams = $_POST;
        $viewParams = [];
        if (!empty($postParams['revert_string'])) {
            $revertString = htmlspecialchars($postParams['revert_string']);
            $revertStringHelper = RevertStringHelper::instance();
            $revertedString = $revertStringHelper->revert($revertString);
            $viewParams['revertedString'] = $revertedString;
        }
        return $this->getViewHelper()->render('main', $viewParams);
    }

    public function actionRevert() {
        echo 'test';
    }

}