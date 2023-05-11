<?php

    require_once "models/model_dto/RolDto.php";
    require_once "models/model_dto/UserDto.php";
    require_once "models/model_dao/RolDao.php";
    require_once "models/model_dao/UserDao.php";

    class Users{
        // Atributo Encapsulado
        private $rolDao;
        private $userDao;

        public function __construct(){
            $this->rolDao = new RolDao;
            $this->userDao = new UserDao;
        }
        public function index(){            
            header("Location: ?c=Dashboard");
        }

        // Crear Rol
        public function createRol(){
            // Método Get
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.php";
                require_once "views/modules/1_users/rol_create.view.php";
                require_once "views/roles/admin/footer.php";
            }
            // Método Post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rolDto = new RolDto(
                    $_POST['rol_codigo'],
                    $_POST['rol_nombre']
                );
                $this->rolDao->createRolDao($rolDto);
                header("Location: ?c=Users&a=readRol");
            }
            
        }

        // Consultar Roles        
		public function readRol(){			
			$roles = $this->rolDao->readRolDao();
			require_once "views/roles/admin/header.php";            
            require_once "views/modules/1_users/rol_read.view.php";
            require_once "views/roles/admin/footer.php";
		}
        
        // Actualizar Rol
        public function updateRol(){
            // Método Get
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rol = $this->rolDao->getById($_GET['idRol']);
                require_once "views/roles/admin/header.php";                
                require_once "views/modules/1_users/rol_update.view.php";
                require_once "views/roles/admin/footer.php";
            }
            // Método Post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rolDto = new RolDto(
                    $_POST['rol_codigo'],
                    $_POST['rol_nombre']
                );
                $this->rolDao->updateRolDao($rolDto);
                header("Location: ?c=Users&a=readRol");
            }
            
        }

        // Eliminar Rol
        public function deleteRol(){
			$this->rolDao->deleteRolDao($_GET['idRol']);
			header('Location: ?c=Users&a=readRol');			
		}

        // Crear Usuario
        public function createUser(){
            // Método Get
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.php";
                require_once "views/modules/1_users/user_create.view.php";
                require_once "views/roles/admin/footer.php";
            }
            // Método Post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userDto = new UserDto(
                    $_POST['rol_codigo'],
                    $_POST['user_codigo'],
                    $_POST['user_nombres'],
                    $_POST['user_apellidos'],
                    $_POST['user_correo'],
                    $_POST['user_pass'],
                    $_POST['user_estado']
                );
                $this->userDao->createUserDao($userDto);
                header("Location: ?c=Users&a=readUser");
            }
            
        }
        
        // Consultar Usuarios        
		public function readUser(){			
			// $roles = $this->rolDao->readRolDao();
			require_once "views/roles/admin/header.php";            
            require_once "views/modules/1_users/user_read.view.php";
            require_once "views/roles/admin/footer.php";
		}
        /*
        // Actualizar Usuarios
        public function updateUser(){
            // Método Get
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rol = $this->rolDao->getById($_GET['idRol']);
                require_once "views/roles/admin/header.php";                
                require_once "views/modules/1_users/rol_update.view.php";
                require_once "views/roles/admin/footer.php";
            }
            // Método Post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rolDto = new RolDto(
                    $_POST['rol_codigo'],
                    $_POST['rol_nombre']
                );
                $this->rolDao->updateRolDao($rolDto);
                header("Location: ?c=Users&a=readRol");
            }
            
        }

        // Eliminar Usuarios
        public function deleteUser(){
			$this->rolDao->deleteRolDao($_GET['idRol']);
			header('Location: ?c=Users&a=readRol');			
		}
        */

    }
?>