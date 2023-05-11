<?php
    session_start();
    require_once "models/model_dto/CredentialDto.php";    
    require_once "models/model_dao/CredentialDao.php";

    class Login{        
        private $userDao;
        public function __construct(){            
            $this->userDao = new CredentialDao;
        }
        public function index(){
            // Cargar la Vista del Formulario
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/business/header.php";
                require_once "views/business/login.view.php";
                require_once "views/roles/business/footer.php";
            }
            // Capturar los Datos del Formulario
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Validar los Datos
                // Crear el Objeto
                $userDto = new CredentialDto(
                    $_POST['correo'], 
                    $_POST['pass']
                );                
                // print_r($userDto);
                // Comprobar en la base de datos
                $userDto = $this->userDao->login($userDto);                
                if ($userDto) {
                    // Validar si es un Administrador Activo
                    if ($userDto->getEstadoCredential() == 1) {                        
                        // Redireccionar al Dashboard
                        $userDto = serialize($userDto);
                        $_SESSION['userDto'] = $userDto;
                        header('Location: ?c=Dashboard');
                    } else {                        
                        header('Location: ?');
                    }
                } else {                    
                    header('Location: ?');
                }
            }
        }
    }
?>