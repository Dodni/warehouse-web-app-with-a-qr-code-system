<!-- menu_controller.php -->

<?php
require_once 'app/models/oldal_model.php';
require_once 'app/models/user_model.php';

class OldalController {
    public function showOldalPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/oldal_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }

        

    }

    public function showMenu($userJog, $menu) {
        // Menüpontok gyűjtése a felhasználói jogosultság alapján
        $menuItems = [];
        
        foreach ($menu as $menuItem) {
            if ($userJog == 3 && $menuItem['oldal_jog'] <= 3) {
                $menuItems[] = $menuItem; // Ha a felhasználó jogosultsága 3, minden menüpont hozzáadása
            } elseif ($userJog == 2 && $menuItem['oldal_jog'] <= 2) {
                $menuItems[] = $menuItem; // Ha a felhasználó jogosultsága 2, csak 2-es és 1-es jogú menüpontok hozzáadása
            } elseif ($menuItem['oldal_jog'] == 1) {
                $menuItems[] = $menuItem; // Ha a felhasználó jogosultsága 1, csak az 1-es jogú menüpontok hozzáadása
            }
        }
        
        // Ha be van jelentkezve a felhasználó, szűrd ki a "Bejelentkezés" menüpontot
        if ($_SESSION['loggedin'] == true) {
            $menuItems = array_filter($menuItems, function ($item) {
                return $item['oldal_url'] !== 'login';
            });
        }
        
        // Navigációs menü összeállítása
        $navMenu = '<nav class="nav-menu"><ul>';
        foreach ($menuItems as $item) {
            $navMenu .= '<li><a href="' . BASE_URL . $item['oldal_url'] . '">' . $item['oldal_nev'] . '</a></li>';
        }
        $navMenu .= '</ul></nav>';
    
        return $navMenu;
    }

    public function getMenu() {
        session_start();
        #var_dump($_SESSION);
        $userModel = new UserModel(); // Példányosítsd az UserModelt
        $user = $userModel->getPassword($_SESSION['username']); // Az adatbázisból lekérjük a felhasználót
        
        
        $controller = new OldalController();
        $oldalModel = new OldalModel();
        #var_dump($user['0']['felhasznalo_jog']);
        #var_dump($oldalModel->getOldalList());
        
        $menu = $controller->showMenu($user['0']['felhasznalo_jog'],$oldalModel->getOldalList());
        #echo $menu;
        #var_dump($menu);
        return $menu;
    }
}
#$controller = new OldalController();
#$controller->showOldalPage();
#$controller->getMenu();

?>
