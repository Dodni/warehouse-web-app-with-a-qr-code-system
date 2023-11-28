<header>
    <div class="menu-toggle">&#9776;</div>
    <?php
        require_once "app/controllers/oldal_controller.php";
        $controller = new OldalController();
        $menu = $controller->getMenu();
        #var_dump($menu);
        echo $menu;
    ?>
</header>