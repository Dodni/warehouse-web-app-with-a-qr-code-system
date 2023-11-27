<?php
// Könyvtár az útvonalakhoz és vezérlőkhöz
$routes = [
    '/qr_kod_app/' => 'home_controller.php',
    '/qr_kod_app/oldal' => 'oldal_controller.php',
    '/qr_kod_app/home' => 'home_controller.php',
    '/qr_kod_app/about' => 'about_controller.php',
    '/qr_kod_app/qr_kod' => 'qrkod_controller.php',
    '/qr_kod_app/contact' => 'contact_controller.php',
    '/qr_kod_app/login' => 'login_controller.php',
    '/qr_kod_app/logout' => 'logout_controller.php',
    '/qr_kod_app/raktarkeszlet' => 'raktarkeszlet_controller.php',
    '/qr_kod_app/egyke_termek' => 'egyketermek_controller.php',
    '/qr_kod_app/admin' => 'admin_controller.php',
    '/qr_kod_app/TermekInfoAPIController/getTermek/(\d+)' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPIController/getTermekek' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPIController/postTermek/(\d+)' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPIController/putTermek/(\d+)' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPIController/deleteTermek/(\d+)' => 'TermekInfoAPI_controller.php',
];
// Az aktuális kérés URL-je
$requestURI = $_SERVER['REQUEST_URI'];

foreach ($routes as $route => $controller) {
    if (preg_match('%^' . $route . '$%', $requestURI, $matches)) {
        $controllerFile = 'app/controllers/' . $controller;

        // Ha a fájl létezik és a kérés megfelel a mintának
        if (file_exists($controllerFile)) {
            include $controllerFile;
            exit();
        } else {
            echo "A megadott vezérlőfájl nem található.";
            exit();
        }
    }
}

// Ha nincs meghatározott route, kezeljük a hibát
http_response_code(404);
echo '404 - Az oldal nem található';

?>

