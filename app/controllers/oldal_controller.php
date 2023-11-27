<!-- menu_controller.php -->

<?php
include 'app/models/oldal_model.php';
include 'app/models/user_model.php';
class OldalController {
    public function showOldalPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/oldal_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }

        

    }

    public function showMenu($userJog, $menu) {
        // Menüpontok gyűjtése a felhasználói jogosultság alapján
        $menuItems = [];
        foreach ($menu as $menuItem) {
            if ($userJog == 3) {
                $menuItems[] = $menuItem; // Ha a felhasználó jogosultsága 3, minden menüpont hozzáadása
            } elseif ($userJog == 2 && $menuItem['oldal_jog'] <= 2) {
                $menuItems[] = $menuItem; // Ha a felhasználó jogosultsága 2, csak 2-es és 1-es jogú menüpontok hozzáadása
            } elseif ($userJog == 1 && $menuItem['oldal_jog'] == 1) {
                $menuItems[] = $menuItem; // Ha a felhasználó jogosultsága 1, csak az 1-es jogú menüpontok hozzáadása
            }
        }
    
        // Navigációs menü összeállítása
        $navMenu = '<nav><ul>';
        foreach ($menuItems as $item) {
            $navMenu .= '<li><a href="' . $item['oldal_url'] . '">' . $item['oldal_nev'] . '</a></li>';
        }
        $navMenu .= '</ul></nav>';
    
        return $navMenu;
    }

    public function getMenu() {
        session_start();
        #var_dump($_SESSION);
        $userModel = new UserModel(); // Példányosítsd az UserModelt
        $user = $userModel->getPassword($_SESSION['username']); // Az adatbázisból lekérjük a felhasználót
        
        #var_dump($user['0']['felhasznalo_jog']);
        
        // Példányosítjuk a HomeController osztályt
        $controller = new OldalController();
        
        // Meghívjuk a showHomePage() metódust a HomeController-ből
        #$controller->showOldalPage();
        
        $oldalModel = new OldalModel();
                
        #var_dump($oldalModel->getOldalList());
        
        $menu = $controller->showMenu($user['0']['felhasznalo_jog'],$oldalModel->getOldalList());
        //echo $menu;
        #var_dump($menu);
        return $menu;
    }
}


?>
