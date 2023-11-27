<?php
include_once 'system/config.php';
class Database {
    public static $connection;

    public static function connect() {
        self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            var_dump(DB_HOST);
            var_dump(DB_USER);
            var_dump(DB_PASSWORD);
            var_dump(DB_NAME);
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
    }
}

/*
Database::connect(); // Ez inicializálja az adatbáziskapcsolatot
$result = Database::$connection->query("SELECT * FROM felhasznalok");
 while ($row = $result->fetch_assoc()) {
    // Feldolgozod a sor adatait
    var_dump($row); // Kiírod a sor adatait
}
*/
?>