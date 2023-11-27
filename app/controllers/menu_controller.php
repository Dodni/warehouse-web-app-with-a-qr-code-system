<!-- home_controller.php -->

<?php
include 'app/models/test_model.php';
class MenuController {
    public function showMenu() {
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
$controller = new MenuController();
$controller->showMenu();
?>
