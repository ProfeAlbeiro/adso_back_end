<?php
    class Login{
        public function __construct(){}
        public function index(){
            // Método Get
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/business/header.php";
                require_once "views/business/login.view.php";
                require_once "views/roles/business/footer.php";
            }
            // Método Post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Capturar los datos
                // Validar los datos
                // Crear Objeto DTO
                // Pasar el Objeto DTO al método (CRUD) del Objeto DAO
                // Redireccionar a un controlador o una página web
                header("Location: ?c=Dashboard");
            }
        }
        public function register(){
            require_once "views/roles/business/header.php";
            require_once "views/business/register.view.php";
            require_once "views/roles/business/footer.php";
        }
        public function forgot(){
            require_once "views/roles/business/header.php";
            require_once "views/business/forgot.view.php";
            require_once "views/roles/business/footer.php";
        }
    }
?>