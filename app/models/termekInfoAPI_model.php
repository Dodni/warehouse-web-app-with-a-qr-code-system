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

    function getTermekModel($termekId) {
        Database::connect();
        $termekList = [];
        $result = Database::$connection->query("SELECT * FROM termekek WHERE termek_id = $termekId");

        while ($row = $result->fetch_assoc()) {
            $termekList[] = $row;
        }

        // JSON formátumra alakítás és visszaadás
        return json_encode($termekList);
    }
    
    function postTermekModel($termekData) {
        Database::connect();
        $query = "INSERT INTO `termekek` (`termek_nev`, `termek_szarmazas`, `termek_erkezesi_datum`, `termek_ewc_kod`, `termek_darabszam`, `termek_suly`, `termek_logisztikara_kuldve`) VALUES (";

        foreach ($termekData as $value) {
            $query .= "'" . $value . "', ";
        }
        
        $query = rtrim($query, ', ') . ")";
        
        $result = Database::$connection->query($query);
        //var_dump($result);
        // JSON formátumra alakítás és visszaadás
        return json_encode($result);
    }
    
    function putTermekModel($termekData) {
        Database::connect();
        $termekId = 1; // Példa: azonosító, amihez tartozó rekordot frissítünk

        $query = "UPDATE `termekek` SET ";

        foreach ($termekData as $column => $value) {
            $query .= "`$column` = '$value', ";
        }
        
        $query = rtrim($query, ', ') . " WHERE `termek_id` = $termekId";
        #var_dump($query);
        $result = Database::$connection->query($query);

        #var_dump($result);
        return $result;
    }
    
    function deleteTermekModel($termekId) {
        Database::connect();
        $query = "DELETE FROM `termekek` WHERE `termek_id` = $termekId";
        $result = Database::$connection->query($query);

        var_dump($result);
        return $result;
    }
}
?>