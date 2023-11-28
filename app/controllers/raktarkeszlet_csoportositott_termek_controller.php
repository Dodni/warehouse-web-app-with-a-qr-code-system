<!-- home_controller.php -->

<?php
include_once 'app/controllers/TermekInfoAPI_controller.php';
class RaktarkeszletCsoportositottTermekController {
    public function showThePage($data) {

        $viewPath = 'app/views/raktarkeszletcsoportositotttermek_view.php';
        session_start();
        $_SESSION["dataToSend"] = $data;
        #var_dump($_SESSION["dataToSend"]);
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }

    public function getSameEwcProducts($ewc) {
        $api = new TermekInfoAPIController();
        $TermekekData = $api->getTermekek();
        // Először tisztítsuk meg a stringet a felesleges karakterekről és a sortörésekről
        $TermekekData = str_replace("\n", "", $TermekekData);
        $TermekekData = str_replace("\r", "", $TermekekData);
        $TermekekData = trim($TermekekData);

        // Átalakítás JSON stringből PHP tömbbé
        $TermekekData = json_decode($TermekekData, true);
        #var_dump($TermekekData);
        $azonosEwcKodok = [];
        foreach ($TermekekData as $termek) {
            if ($termek['termek_ewc_kod'] === $ewc) {
                $azonosEwcKodok[] = $termek;
            }
        }
        
        return $azonosEwcKodok;
    }
    

}

#var_dump($_GET['ewc_kod']);
$controller = new RaktarkeszletCsoportositottTermekController();
$data = $controller->getSameEwcProducts($_GET['ewc_kod']);
#var_dump($data);
$controller->showThePage($data);
?>
