<!-- home_controller.php -->

<?php
class AdminController {
    public function showAdminPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/admin_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }

    

}

// Példányosítjuk a HomeController osztályt
$controller = new AdminController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showAdminPage();
?>
