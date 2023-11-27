<?php
// Elérési út beállítása a controllerekhez
$controllerPath = 'app/controllers/';

// Könyvtár az útvonalakhoz és vezérlőkhöz
$routes = [
    '/qr_kod_app/' => 'home_controller.php',
    '/qr_kod_app/home' => 'home_controller.php',
    '/qr_kod_app/home?data=mar-be-vagy-jelentkezve' => 'home_controller.php',
    '/qr_kod_app/about' => 'about_controller.php',
    '/qr_kod_app/contact' => 'contact_controller.php',
    '/qr_kod_app/login' => 'login_controller.php',
    '/qr_kod_app/login?data=jelentkezzen-be-elobb' => 'login_controller.php',
    '/qr_kod_app/logout' => 'logout_controller.php',
    '/qr_kod_app/raktarkeszlet' => 'raktarkeszlet_controller.php',
    '/qr_kod_app/raktarkeszlet?data=sikeres' => 'raktarkeszlet_controller.php'
];
// Ellenőrizze, hogy létezik-e a kívánt útvonal
$requestURI = $_SERVER['REQUEST_URI'];

if (array_key_exists($requestURI, $routes)) {
    $controllerFile = $controllerPath . $routes[$requestURI];

    // Ellenőrizzük, hogy a fájl létezik-e
    if (file_exists($controllerFile)) {
        include $controllerFile;
    } else {
        echo "A megadott vezérlőfájl nem található.";
    }
} else {
    // Hibakezelés: 404 oldal
    http_response_code(404);
    echo '404 - Az oldal nem található';
}
?>
