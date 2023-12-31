<?php
class Database {
    public static $connection;

    public static function connect() {
        self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
    }

    public static function query($sql) {
        self::connect(); // Csatlakozás az adatbázishoz
        $result = self::$connection->query($sql); // Lekérdezés végrehajtása

        if (!$result) {
            die("Query failed: " . self::$connection->error);
        }
        
        return $result;
    }
}
/*

$sql = "SELECT * FROM `oldalak`";
$result = Database::query($sql);

// Változóban tároljuk az eredményeket
$pages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pages[] = $row;
    }
} else {
    echo "Nincs eredmény.";
}

// Mostantól a $pages változó tartalmazza az oldalak adatait
//var_dump($pages);


 */

?>