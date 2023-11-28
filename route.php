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
    'qr_kod_app/login?data=jelentkezzen-be-elobb'=> 'login_controller.php',
    '/qr_kod_app/logout' => 'logout_controller.php',
    '/qr_kod_app/raktarkeszlet' => 'raktarkeszlet_controller.php',
    '/qr_kod_app/raktarkeszlet_csoportositott_termek' => 'raktarkeszlet_controller.php',
    '/qr_kod_app/egyke_termek' => 'egyketermek_controller.php',
    '/qr_kod_app/admin' => 'admin_controller.php',
    '/qr_kod_app/TermekInfoAPI/getTermek/(\d+)' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPI/getTermekek' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPI/postTermek/(\d+)' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPI/putTermek/(\d+)' => 'TermekInfoAPI_controller.php',
    '/qr_kod_app/TermekInfoAPI/deleteTermek/(\d+)' => 'TermekInfoAPI_controller.php',
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
include 'app/views/error_view.php';

?>

