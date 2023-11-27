<!-- user_model.php -->

<?php
class OldalModel {
    public static function getOldalList() {
        Database::connect();
        $users = [];
        $result = Database::$connection->query("select * from oldalak where oldal_menu = 'I' order by oldal_sorend asc");
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }
}
?>
