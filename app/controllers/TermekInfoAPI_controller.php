<!-- TermekInfoAPIController.php -->

<?php
require_once 'app/models/termekInfoAPI_model.php'; // Modell betöltése
class TermekInfoAPIController {
    function getTermekek() {
        $model = new TermekInfoAPIModel(); // Modell példányosítása
        $termekList = $model->getTermekekModel(); // A modell getTermekekModel függvényének meghívása

        //var_dump($termekList);
        echo $termekList;
    }
    
    function getTermek($termekId) {
        // Itt van a getTermek logikája a kapott $termekId alapján
        echo "getTermek hívása a következő azonosítóval: $termekId";
    }
    
    function postTermek($termekId) {
        // Itt lehet a postTermek logikája
        echo "postTermek hívása a következő azonosítóval: $termekId";
    }
    
    function putTermek($termekId) {
        // Itt lehet a putTermek logikája
        echo "putTermek hívása a következő azonosítóval: $termekId";
    }
    
    function deleteTermek($termekId) {
        // Itt lehet a deleteTermek logikája
        echo "deleteTermek hívása a következő azonosítóval: $termekId";
    }
}

$requestUri = $_SERVER['REQUEST_URI'];
$controller = new TermekInfoAPIController();

if (preg_match('%/qr_kod_app/TermekInfoAPIController/getTermek/(\d+)%', $requestUri, $matches)) {
    $termekId = $matches[1];
    $controller->getTermek($termekId);
}
elseif (preg_match('%/qr_kod_app/TermekInfoAPIController/postTermek/(\d+)%', $requestUri, $matches)) {
    $termekId = $matches[1];
    $controller->postTermek($termekId);
} 
elseif (preg_match('%/qr_kod_app/TermekInfoAPIController/putTermek/(\d+)%', $requestUri, $matches)) {
    $termekId = $matches[1];
    $controller->putTermek($termekId);
} 
elseif (preg_match('%/qr_kod_app/TermekInfoAPIController/deleteTermek/(\d+)%', $requestUri, $matches)) {
    $termekId = $matches[1];
    $controller->deleteTermek($termekId);
}
elseif ($requestUri == '/qr_kod_app/TermekInfoAPIController/getTermekek') {
    $controller->getTermekek();
}
?>
