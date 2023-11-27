<!-- raktarkeszlet_controller.php -->

<?php
class RaktarkeszletController {
    public function showRaktarkeszletPage() {
        $dataSend = [
            'title' => 'Raktarkészlet',
            'sikeres'=> 'Sikeres',
            // ... egyéb változók
        ];
        $viewPath = 'app/views/raktarkeszlet_view.php';
        session_start();
        var_dump($_SESSION);
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
            //header("Location: $url");
            exit;
        }
    }
}

// Példányosítjuk a HomeController osztályt
$controller = new RaktarkeszletController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showRaktarkeszletPage();
?>
