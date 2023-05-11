<?php
    require_once "models/model_dto/RolDto.php";
    require_once "models/model_dto/UserDto.php";
    require_once "models/model_dao/RolDao.php";
    class Users{
        private $rolDao;
        public function __construct(){
            $this->rolDao = new RolDao;
        }        
        public function createRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $tRols = $this->rolDao->lastCodRol();                
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/1_users/rol_create.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                $rolDto = new RolDto(
                    $_POST['codigoRol'],
                    $_POST['nombreRol']
                );                
                $this->rolDao->rolCreate($rolDto);
                header('Location: ?c=Users&a=readRol');
            }
        }
        public function readRol(){
            $roles = $this->rolDao->rolRead();
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/1_users/rol_read.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        public function updateRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rol = $this->rolDao->getById($_GET['idRol']);
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/1_users/rol_update.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rolDto = new RolDto(
                    $_POST['codigoRol'],
                    $_POST['nombreRol']
                );
                print_r($rolDto);
                $this->rolDao->rolUpdate($rolDto);
                header("Location: ?c=Users&a=readRol");
            }
        }
        public function deleteRol(){
            $this->rolDao->rolDelete($_GET['idRol']);
			header('Location: ?c=Users&a=readRol');
        }
        public function createUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/1_users/user_create.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userDto = new UserDto(
                    $_POST['codigoRol'],
                    $_POST['codigoUser'],
                    $_POST['nombresUser'],
                    $_POST['apellidosUser'],
                    $_POST['correoUser']
                );
                print_r($userDto);
                // $this->rolDao->rolCreate($rolDto);
                // header('Location: ?c=Users&a=readRol');
            }
        }
    }
?>