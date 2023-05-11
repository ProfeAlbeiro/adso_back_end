<?php
    if (!isset($_REQUEST['c'])) {
        require_once "views/plantilla/header.view.php";
        require_once "views/plantilla/index.view.php";
        require_once "views/plantilla/footer.view.php";
    } else {
        $controller = $_REQUEST['c'];
        require_once "views/plantilla/header.view.php";
        require_once "views/ejercicios/" . $controller . ".php";
        require_once "views/plantilla/footer.view.php";
    }
?>