<!-- home_controller.php -->

<?php
class LogoutController {
    public function showLogoutPage() {
        $_SESSION['loggedin'] = false;
        $viewPath = 'app/views/logout_view.php';
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
        
    }
}

$controller = new LogoutController();

$controller->showLogoutPage();
?>
