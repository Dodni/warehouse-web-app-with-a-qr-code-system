<!-- login_controller.php -->

<?php
class LoginController {
    public function showLoginPage() {
        $viewPath = 'app/views/login_view.php';

        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }

    public function authenticateUser($username, $password) {
        // Ide írd meg a felhasználó azonosításához szükséges logikát
        // Például: adatbáziskapcsolat, felhasználónév és jelszó ellenőrzése

        // Ha a felhasználó sikeresen bejelentkezett, tedd valamilyen további tevékenységre
        // Például: átirányítás más oldalra vagy a belépési adatok kezelése
    }
}

// Példányosítjuk a LoginController osztályt
$loginController = new LoginController();

// Meghívjuk a showLoginPage() metódust a LoginController-ből
$loginController->showLoginPage();
?>
