<!-- home_controller.php -->

<?php
class EgyketermekController {
    public function showEgykeTermekPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/egyke_termek_view.php';
        
        session_start();
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
    }

    

}

$controller = new EgyketermekController();

$controller->showEgykeTermekPage();
?>
