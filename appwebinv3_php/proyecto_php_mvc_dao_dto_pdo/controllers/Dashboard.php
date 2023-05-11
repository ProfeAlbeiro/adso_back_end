<?php
    session_start();
    class Dashboard{
        public function __construct(){}
        public function index(){
            if (isset($_SESSION['userDto'])) {
                require_once "views/roles/admin/header.php";
                require_once "views/roles/admin/admin_main.view.php";
                require_once "views/roles/admin/footer.php";
            } else {
                header('Location: ?');
            }                          
        }
        public function email(){
            if (isset($_SESSION['userDto'])) {
                require_once "views/roles/admin/header.php";
                require_once "views/modules/7_others/email.view.php";
                require_once "views/roles/admin/footer.php";    
            } else {
                header('Location: ?');
            }            
        }
        public function calendar(){
            if (isset($_SESSION['userDto'])) {
                require_once "views/roles/admin/header.php";
                require_once "views/modules/7_others/calendar.view.php";
                require_once "views/roles/admin/footer.php";                
            } else {
                header('Location: ?');
            }
        }
        public function activities(){
            if (isset($_SESSION['userDto'])) {
                require_once "views/roles/admin/header.php";
                require_once "views/modules/7_others/activities.view.php";
                require_once "views/roles/admin/footer.php";                
            } else {
                header('Location: ?');
            }
        }
    }
?>