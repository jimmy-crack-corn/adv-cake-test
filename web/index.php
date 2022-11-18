<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

use web\App;
$app = App::instance();
$app->run();

