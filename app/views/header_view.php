<header><p>Ez itt a header</p></header>
<?php
    include "app/controllers/oldal_controller.php";
    $controller = new OldalController();
    $menu = $controller->getMenu();
    echo $menu;
?>