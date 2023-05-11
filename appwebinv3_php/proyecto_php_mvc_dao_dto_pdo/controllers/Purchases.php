<?php
    session_start();
    class Purchases{
        public function __construct(){}
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            require_once "views/roles/admin/footer.php";
        }        
        // Crear Categoría
        public function createBuy(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Categorías
        public function readBuy(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Categoría
        public function updateBuy(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Categoría
        public function deleteBuy(){
            // Programar            
        }
    }
?>