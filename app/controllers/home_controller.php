<!-- home_controller.php -->

<?php
include 'app/models/test_model.php';
class HomeController {
    public function showHomePage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/home_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
        
        $testModel = new TestModel();
        
        $testModel->connectToDatabase();
        
    }
}

// Példányosítjuk a HomeController osztályt
$controller = new HomeController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showHomePage();
?>
