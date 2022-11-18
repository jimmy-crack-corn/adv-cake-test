<?php
namespace helpers;

class DbHelper
{

    private static DbHelper $dbHelper;

    private \PDO $dbConnector;

    private function __construct(){

        $this->dbConnector = new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME);
    }

    public static function connect() {
        return (self::$dbHelper instanceof DbHelper) ? self::$dbHelper : self::$dbHelper = new DbHelper();
    }

    public function getPreviousSum($key) {

    }

}