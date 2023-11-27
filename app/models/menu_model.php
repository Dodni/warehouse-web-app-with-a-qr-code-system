<!-- menu_model.php -->

<?php
class MenuModel {
    public static function getMenu() {
        try {
            // Adatbázis-kapcsolat
            Database::connect();

            // Lekérdezés
            $data = [];
            $result = Database::$connection->query("SELECT * FROM oldalak");
            var_dump($result);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            } else {
                // Hiba az adatbáziskérésben
                throw new Exception("Hiba az adatbáziskérésben: " . Database::$connection->error);
            }

            return $data;
        } catch (Exception $e) {
            // Hibakezelés
            echo "Hiba történt: " . $e->getMessage();
            return [];
        }
    }
}
?>
