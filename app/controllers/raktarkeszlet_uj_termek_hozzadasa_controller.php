<!-- raktarkeszlet_controller.php -->

<?php
include_once 'app/controllers/TermekInfoAPI_controller.php';
class RaktarkeszletUjTermekHozzaadasaController {
    public function showRaktarkeszletUjTermekHozzaadasaPage() {
        $viewPath = 'app/views/raktarkeszlet_uj_termek_hozzaadasa_view.php';
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
            $url = "/qr_kod_app/login";

            // Átirányítás a megadott URL-re
            header("Location: $url");
            exit;
        }
    }

}

// Példányosítjuk a HomeController osztályt
$controller = new RaktarkeszletUjTermekHozzaadasaController();
$controller->showRaktarkeszletUjTermekHozzaadasaPage();
?>
