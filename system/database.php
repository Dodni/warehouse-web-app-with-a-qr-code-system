<?php
class Database {
    public static $connection;

    public static function connect() {
        self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
    }
}

?>