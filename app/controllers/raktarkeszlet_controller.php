<!-- raktarkeszlet_controller.php -->

<?php
include_once 'app/controllers/TermekInfoAPI_controller.php';
class RaktarkeszletController {
    public function showRaktarkeszletPage($csoportositottTermekekArray) {
        $dataSend = [
            'title' => 'Raktarkészlet',
            'sikeres'=> 'Sikeres',
            // ... egyéb változók
        ];
        $viewPath = 'app/views/raktarkeszlet_view.php';
        session_start();
        #var_dump($_SESSION);
        // Ellenőrizzük, hogy a 'data' paraméter be van-e állítva
        if ($_SESSION['loggedin'] == true) {

            if (file_exists($viewPath)) {
                // Betöltjük és megjelenítjük a nézetet
                include $viewPath;
            } else {
                echo "A megadott nézetfájl nem található.";
            }
        } else {
            // URL, amire szeretnéd küldeni az adatot
            $dataToSend = "jelentkezzen-be-elobb"; // Az adat, amit elküldesz
            $url = "/qr_kod_app/login?data=" . urlencode($dataToSend);

            // Átirányítás a megadott URL-re
            header("Location: $url");
            exit;
        }
        $_SESSION["datasend"] = $csoportositottTermekekArray;
        
    }

    public function getCsoportositottTermekekData()
    {
        $api = new TermekInfoAPIController();
        $TermekekData = $api->getTermekek();
        #most a TermekekData-t visszaalalkitjuk array-ba.
        // Először tisztítsuk meg a stringet a felesleges karakterekről és a sortörésekről
        $TermekekData = str_replace("\n", "", $TermekekData);
        $TermekekData = str_replace("\r", "", $TermekekData);
        $TermekekData = trim($TermekekData);

        // Átalakítás JSON stringből PHP tömbbé
        $TermekekData = json_decode($TermekekData, true);

        // SQL lekérdezés eredményének megfelelő array inicializálása
        $szurt_termekek = [];

        foreach ($TermekekData as $termek) {
            $termek_nev = $termek['termek_nev'];
            $termek_ewc_kod = $termek['termek_ewc_kod'];
            $termek_erkezesi_datum = $termek['termek_erkezesi_datum'];
            $termek_darabszam = intval($termek['termek_darabszam']);
            $termek_suly = intval($termek['termek_suly']);

            if (!isset($szurt_termekek[$termek_nev])) {
                $szurt_termekek[$termek_nev] = [
                    'termek_nev' => $termek_nev,
                    'termek_ewc_kod' => $termek_ewc_kod,
                    'max_termek_erkezesi_datum' => $termek_erkezesi_datum,
                    'sum_termek_darabszam' => $termek_darabszam,
                    'sum_termek_suly' => $termek_suly,
                ];
            } else {
                // Maximum dátum frissítése
                if ($termek_erkezesi_datum > $szurt_termekek[$termek_nev]['max_termek_erkezesi_datum']) {
                    $szurt_termekek[$termek_nev]['max_termek_erkezesi_datum'] = $termek_erkezesi_datum;
                }

                // Darabszám és súly összegzése
                $szurt_termekek[$termek_nev]['sum_termek_darabszam'] += $termek_darabszam;
                $szurt_termekek[$termek_nev]['sum_termek_suly'] += $termek_suly;
            }
        }

        // A szűrt array kiíratása
        //print_r(array_values($szurt_termekek));
        #var_dump($szurt_termekek);
        return $szurt_termekek;
    }
}

// Példányosítjuk a HomeController osztályt
$controller = new RaktarkeszletController();
$csoportositottTermekekArray = $controller->getCsoportositottTermekekData();
// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showRaktarkeszletPage($csoportositottTermekekArray);
?>
