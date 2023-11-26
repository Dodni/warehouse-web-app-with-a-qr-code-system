<!-- login_controller.php -->

<?php
include 'app/models/user_model.php'; // Példányosítsd az User modelt

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
        // Példa: Ellenőrizzük az adatbázisból a felhasználói adatokat
        $userModel = new UserModel(); // Példányosítsd az UserModelt
        $user = $userModel->getUserByUsername($username); // Az adatbázisból lekérjük a felhasználót
        
        if ($user && password_verify($password, $user['password'])) {
            // Sikeres bejelentkezés
            echo 'Sikeres bejelentkezés!';

            // Ide jöhet a további logika, például átirányítás más oldalra
        } else {
            // Sikertelen bejelentkezés
            echo 'Hibás felhasználónév vagy jelszó!';
        }
    }
}

// Példányosítjuk a LoginController osztályt
$loginController = new LoginController();

// Ellenőrizzük, hogy POST kérés érkezett-e
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_SERVER["REQUEST_METHOD"]);
    // Ellenőrizzük, hogy a felhasználónév és jelszó mezők ki lettek-e töltve
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Authentikáció meghívása
        $loginController->authenticateUser($username, $password);
    } else {
        // Hibás adatok esetén
        echo 'Kérem, töltse ki mindkét mezőt!';
    }
} else {
    // Meghívjuk a showLoginPage() metódust a LoginController-ből
    $loginController->showLoginPage();
}
?>
