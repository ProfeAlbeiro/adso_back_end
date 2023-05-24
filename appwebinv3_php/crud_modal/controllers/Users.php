<?php
    require_once "models/User.php";
    require_once "models/City.php";
    require_once "models/Occupation.php";
    class Users{
        public function __construct(){}
        # Controlador para Consultar Usuarios
        public function main(){            
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {                
                $user = new User;
                $users = new User;
                $users = $users->readUsers();
                $cities = new City;
                $cities = $cities->readCity();
                $occupations = new Occupation;
                $occupations = $occupations->readOccupation();
                require_once "views/header.view.php";                
                require_once "views/index.view.php";
                require_once "views/footer.view.php";
            }
        }
        # Controlador para Crear Usuario
        public function createUser(){            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    null,
                    $_POST['userId'],
                    $_POST['userName'],
                    $_POST['userLastName'],
                    $_POST['userBirthDate'],
                    $_POST['userIdCity'],
                    $_POST['userIdOccupation'],
                    $_POST['userPhone']
                );
                $user->createUser();
                header("Location:?");
            }
        }
        # Controlador para Actualizar Usuario
        public function updateUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {                
                $users = new User;
                $users = $users->readUsers();
                $user = new User;
                $user = $user->getUserById($_GET['userCode']);
                $cities = new City;
                $cities = $cities->readCity();
                $occupations = new Occupation;
                $occupations = $occupations->readOccupation();
                require_once "views/header.view.php";
                require_once "views/index.view.php";
                require_once "views/footer.view.php";
                echo "<script>loadModalUpdate();</script>";               
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    $_POST['userCode'],
                    $_POST['userId'],
                    $_POST['userName'],
                    $_POST['userLastName'],
                    $_POST['userBirthDate'],
                    $_POST['userIdCity'],
                    $_POST['userIdOccupation'],
                    $_POST['userPhone']
                );
                $user->updateUser();                
                header("Location:?");
            }
        }
        # Controlador para Eliminar Usuario
        public function deleteUser(){
            $user = new User;
            $user->deleteUser($_GET['userCode']);
            header('Location: ?');
        }
    }
?>