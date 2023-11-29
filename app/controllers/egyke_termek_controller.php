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
            $url = "/qr_kod_app/login";

            // Átirányítás a megadott URL-re
            header("Location: $url");
            exit;
        }
    }
}

$requestUri = $_SERVER['REQUEST_URI'];
if (preg_match('/\/qr_kod_app\/egyke_termek\/(\d+)$/', $requestUri)) {
    $matches = [];
    preg_match('/(\d+)$/', $requestUri, $matches);
    $szam = $matches[0]; //megkapjuk az id-t

    // GET request to TermekInfoAPI/getTermek
    $url = BASE_URL . "TermekInfoAPI/getTermek/" . $szam;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    
    curl_close($ch);

    // Távolítsuk el a felesleges szövegeket a JSON körül, hogy csak a tényleges JSON maradjon
    $json_start = strpos($response, '['); // Keresés a JSON kezdetének helye alapján
    $json_end = strrpos($response, ']'); // Keresés a JSON végének helye alapján

    $json_data = substr($response, $json_start, $json_end - $json_start + 1); // JSON rész kivágása

    $decoded_response = json_decode($json_data, true);

    session_start();
    $_SESSION['dataSenden'] = $decoded_response;
    $controller = new EgyketermekController();
    $controller->showEgykeTermekPage();
} else {
    $controller = new EgyketermekController();
    $controller->showEgykeTermekPage();
}
?>
