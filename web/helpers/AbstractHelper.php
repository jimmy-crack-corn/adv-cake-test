<?php

namespace web\helpers;

class AbstractHelper
{
    protected static $instance = [];

    protected function __construct() {}

    public static function instance() {
        if (array_key_exists(static::class, static::$instance)) {
            return static::$instance[static::class];
        } else {
            $instance = new static();
            static::$instance[static::class] = $instance;
            return $instance;
        }
        //return (!is_null(static::$instance)) ? static::$instance : static::$instance = new static();
    }
}