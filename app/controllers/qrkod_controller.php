<!-- home_controller.php -->

<?php
class QrkodController {
    public function showQrkodPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/qrkod_view.php';
        
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
$controller = new QrkodController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showQrkodPage();
?>
