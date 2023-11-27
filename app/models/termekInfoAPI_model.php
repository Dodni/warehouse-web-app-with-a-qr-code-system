<?php 
class TermekInfoAPIModel {
    function getTermekekModel() {
        Database::connect();
        $termekList = [];
        $result = Database::$connection->query("SELECT * FROM termekek");

        while ($row = $result->fetch_assoc()) {
            $termekList[] = $row;
        }

        // JSON formátumra alakítás és visszaadás
        return json_encode($termekList);
    }
}
?>