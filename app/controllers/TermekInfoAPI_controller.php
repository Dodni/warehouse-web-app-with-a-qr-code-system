<!-- TermekInfoAPIController.php -->

<?php
require_once 'app/models/termekInfoAPI_model.php'; // Modell betöltése
class TermekInfoAPIController {
    function getTermekek() {
        $model = new TermekInfoAPIModel(); // Modell példányosítása
        $termekList = $model->getTermekekModel(); // A modell getTermekekModel függvényének meghívása

        #var_dump($termekList);
        //echo $termekList;
        return $termekList;
    }
    
    function getTermek($termekId) {
        $model = new TermekInfoAPIModel(); // Modell példányosítása
        $termekList = $model->getTermekModel($termekId); // A modell getTermekekModel függvényének meghívása

        //var_dump($termekList);
        echo $termekList;
        #return $termekList;
    }
    
    function postTermek($termekData) { 
        $model = new TermekInfoAPIModel(); // Modell példányosítása
        $termekList = $model->postTermekModel($termekData); // A modell getTermekekModel függvényének meghívása
        #var_dump($termekList);
        if ($termekList == true)
        {
            echo "Sikeres post a TermekInfoAPI-val.";
        } else {
            echo "Sikertelen post a TermekInfoAPI-val.";
        }
        #return $termekList;
    }


    function putTermek($termekData) {
        $model = new TermekInfoAPIModel(); // Modell példányosítása
        $termekData = [
            'termek_nev' => 'Palack',
            'termek_szarmazas' => 'asd Kft.',
            'termek_erkezesi_datum' => '2023.11.12',
            'termek_ewc_kod' => '22 22 11*',
            'termek_darabszam' => '55',
            'termek_suly' => '66',
            'termek_logisztikara_kuldve' => '0'
        ];
        
        #$termekList = $model->getTermekModel($termekId);
        
        #var_dump($termekList);
        $termekList2 = $model->putTermekModel($termekData); // A modell getTermekekModel függvényének meghívása
        $termekData = json_encode($termekData);
        
        #var_dump($termekList2);
        
        if ($termekList2 == true)
        {
            echo "Sikeres put.";
        } else {
            echo "Sikertelen post.";
        }
        #return $termekList;
    }
    
    function deleteTermek($termekId) {
        $model = new TermekInfoAPIModel(); // Modell példányosítása
        $result = $model->deleteTermekModel($termekId);
        
        if ($result == true) {
            echo "Sikeres törles.";
        } else {
            echo "Sikertelen törles.";
        }
        #return $result;
    }
}
$controller = new TermekInfoAPIController();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Az űrlapról érkező adatok elérése
    $termekData = $_POST;

    // Feldolgozás és sikeres válasz küldése
    if ($termekData) {
        echo "POST kérés fogadva! 
Küldött datok: ";
        var_dump($termekData); // Vagy print_r($termekData);
        $controller->postTermek($termekData);
    } else {
        echo "Sikertelen POST kérés!";
    }
}


//ez meg csak egy probalkozas
if (isset($_GET['id'])) {
    $termekId = $_GET['id'];
    $termekData = $controller->getTermek($termekId);
    
    // Assuming $termekData is an array of data
    header('Content-Type: application/json');
    echo json_encode($termekData);
}


$requestUri = $_SERVER['REQUEST_URI'];

    if (preg_match('%/qr_kod_app/TermekInfoAPI/getTermek/(\d+)%', $requestUri, $matches)) {
        $termekId = $matches[1];
        $controller->getTermek($termekId);
    }
    elseif (preg_match('%/qr_kod_app/TermekInfoAPI/postTermek/', $requestUri, $matches)) {
        $termekId = $matches[1];
        $controller->postTermek($termekId);
    } 
    elseif (preg_match('%/qr_kod_app/TermekInfoAPI/putTermek/(\d+)%', $requestUri, $matches)) {
        $termekId = $matches[1];
        $controller->putTermek($termekId);
    } 
    elseif (preg_match('%/qr_kod_app/TermekInfoAPI/deleteTermek/(\d+)%', $requestUri, $matches)) {
        $termekId = $matches[1];
        $controller->deleteTermek($termekId);
    }
    elseif ($requestUri == '/qr_kod_app/TermekInfoAPI/getTermekek') {
        $controller->getTermekek();
    }
?>