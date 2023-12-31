<!-- login_controller.php -->

<?php
include 'app/models/user_model.php';

class LoginController {
    public function showLoginPage($returnResult) {
        $viewPath = 'app/views/login_view.php';
        $data = [
            'title' => 'Bejelentkezés',
            'message' => 'Üdvözöljük! Kérjük, jelentkezzen be.',
            'sikeres' => 'Sikeres bejelentkezés.',
            // ... egyéb változók
        ];

        if ($returnResult == false) {
            $data['sikertelen'] = 'Sikertelen bejelentkezes.';
            include $viewPath;
        }

        if (file_exists($viewPath) and $returnResult == true) {
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
    public function authenticateUser($username, $password) {
        // Példa: Ellenőrizzük az adatbázisból a felhasználói adatokat
        $userModel = new UserModel(); // Példányosítsd az UserModelt
        $pw = $userModel->getPassword($username); // Az adatbázisból lekérjük a felhasználót
        if ($password == $pw[0]['felhasznalo_jelszo'] AND $password != null) {
            // Sikeres bejelentkezés
            
            return true;

            // Ide jöhet a további logika, például átirányítás más oldalra
        } else {
            // Sikertelen bejelentkezés
            return false;
        }
    }
}

session_start();
#var_dump($_SESSION);
if ($_SESSION["loggedin"] == true) {
    $_SESSION["dataToSend"] = "mar-be-vagy-jelentkezve"; // Adat tárolása SESSION változóban
    header("Location: /qr_kod_app/home"); // Átirányítás a home oldalra
    exit;
}
else {
    $loginController = new LoginController();

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $loginController->authenticateUser($username, $password);
        #var_dump($result);
        if ($result == true) {
            // Adat elküldése a raktarkeszlet oldalra
            session_start();
            // Felhasználó azonosítása és munkamenet beállítása
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            $_SESSION["dataToSend"] = "sikeres"; // Adat tárolása SESSION változóban
            // URL, amire szeretnéd küldeni az adatot
            $url = "/qr_kod_app/raktarkeszlet";

            // Átirányítás a megadott URL-re
            header("Location: $url");
            exit;
        }
        else {
            $loginController->showLoginPage(false);
        }
    }    

    if ($_SERVER["REQUEST_METHOD"]== "GET") {$loginController->showLoginPage(true);}
}

?>
