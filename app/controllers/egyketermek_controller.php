<!-- home_controller.php -->

<?php
class EgyketermekController {
    public function showEgykeTermekPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/egyketermek_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }

    

}

$controller = new EgyketermekController();

$controller->showEgykeTermekPage();
?>
