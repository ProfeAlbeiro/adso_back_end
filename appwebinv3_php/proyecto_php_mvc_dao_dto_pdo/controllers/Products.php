<?php
    session_start();
    class Products{
        public function __construct(){}
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            require_once "views/roles/admin/footer.php";
        }        
        // Crear Categoría
        public function createCategory(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/2_products/category_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Categorías
        public function readCategory(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/2_products/category_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Categoría
        public function updateCategory(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/2_products/category_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Categoría
        public function deleteCategory(){
            // Programar            
        }        
        // Crear Producto
        public function createProduct(){
            // Programar
            require_once "views/roles/admin/header.php";
            require_once "views/modules/2_products/product_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Productos
        public function readProduct(){
            // Programar
            require_once "views/roles/admin/header.php";
            require_once "views/modules/2_products/product_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Producto
        public function updateProduct(){
            // Programar
            require_once "views/roles/admin/header.php";
            require_once "views/modules/2_products/prduct_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Producto
        public function deleteProduct(){
            // Programar            
        }
    }
?>