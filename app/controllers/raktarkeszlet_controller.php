<!-- raktarkeszlet_controller.php -->

<?php
class RaktarkeszletController {
    public function showRaktarkeszletPage() {
        $dataSend = [
            'title' => 'Raktarkészlet',
            // ... egyéb változók
        ];
        $viewPath = 'app/views/raktarkeszlet_view.php';
        session_start();
        // Ellenőrizzük, hogy a 'data' paraméter be van-e állítva
        if (isset($_GET['data']) == 'sikeres' and $_SESSION['loggedin'] == true) {
            $receivedData = $_GET['data'];

            $data = htmlspecialchars($receivedData); // Védelem XSS támadás ellen

            if (file_exists($viewPath) and $data == "sikeres") {
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

// Példányosítjuk a HomeController osztályt
$controller = new RaktarkeszletController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showRaktarkeszletPage();
?>
