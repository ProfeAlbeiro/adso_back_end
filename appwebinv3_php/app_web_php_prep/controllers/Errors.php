<?php
    class Errors{
        public function __construct(){}
        public function main(){
            require_once "views/roles/admin/header.view.php";
            echo "<h2>Error 404 - Página en Construcción</h2>";
            // require_once "views/roles/admin/admin.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
    }
?>