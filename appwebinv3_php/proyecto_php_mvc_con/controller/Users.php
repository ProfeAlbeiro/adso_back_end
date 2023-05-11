<?php session_start();
	require_once 'model/model_dto/UserDto.php';
	require_once 'model/model_dao/UserDao.php';
	class Users {
		private $userDao;
		private $module;
		public function __construct(){
			$this->userDao = new UserDao;
			$this->module = $_SESSION['module'];
		}
		public function index(){
			if (isset($_SESSION['userDto'])) {
				require_once 'view/roles/'.$this->module.'/header.php';
				require_once 'view/modules/1_users/user.create.view.php';
				require_once 'view/roles/'.$this->module.'/footer.php';
			} else {
				header('Location: ?');	
			}
		}		
		// Crear Usuario
		public function create(){
			$userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 4)) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
					require_once 'view/roles/'.$this->module.'/header.php';
					require_once 'view/modules/1_users/user.create.view.php';
					require_once 'view/roles/'.$this->module.'/footer.php';
				} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$userDto = new UserDto;
					$userDto->setIdRol($_POST['idRol']);				
					$userDto->setdocIdUser($_POST['docIdUser']);
					$userDto->setNameUser($_POST['nameUser']);
					$userDto->setLastNameUser($_POST['lastNameUser']);
					$userDto->setEmailUser($_POST['emailUser']);
					$userDto->setPassUser($_POST['passUser']);
					$userDto->setStatusUser($_POST['statusUser']);
					$this->userDao->create($userDto);
					header('Location: ?c=Users&a=read');				
				}
			} else {
				header('Location: ?');
			}
		}
		// Consultar Usuarios
		public function read(){
			$userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 4)) {
				$users = $this->userDao->read();
				require_once 'view/roles/'.$this->module.'/header.php';
				require_once 'view/modules/1_users/user.read.view.php';
				require_once 'view/roles/'.$this->module.'/footer.php';
			} else {
				header('Location: ?');
			}
		}
		// Actualizar Usuarios
		public function update(){
			$userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 4)) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
					$user = $this->userDao->getById($_GET['idUser']);
					$perfil = ['admin', 'user', 'customer', 'seller'];
					$estado = ['inactivo', 'activo'];
					require_once 'view/roles/'.$this->module.'/header.php';
					require_once 'view/modules/1_users/user.update.view.php';
					require_once 'view/roles/'.$this->module.'/footer.php';				
				} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$userDto = new UserDto;
					$userDto->setIdRol($_POST['idRol']);				
					$userDto->setIdUser($_POST['idUser']);				
					$userDto->setdocIdUser($_POST['docIdUser']);
					$userDto->setNameUser($_POST['nameUser']);
					$userDto->setLastNameUser($_POST['lastNameUser']);
					$userDto->setEmailUser($_POST['emailUser']);
					$userDto->setPassUser($_POST['passUser']);
					$userDto->setStatusUser($_POST['statusUser']);
					$this->userDao->update($userDto);
					header('Location: ?c=Users&a=read');
				}
			} else {
				header('Location: ?');
			}
		}
		// Eliminar
		public function delete(){
			$userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && $userDto->getIdRol() == 1) {
				$this->userDao->delete($_GET['idUser']);
				header('Location: ?c=Users&a=read');
			} else {
				header('Location: ?c=Users&a=read');
			}
		}		
	}
?>