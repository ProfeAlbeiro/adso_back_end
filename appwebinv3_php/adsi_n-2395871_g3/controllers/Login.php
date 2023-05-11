<?php 
	class Login{
		public function __construct(){}
		public function index(){			
			require_once 'views/roles/business/header.php';
			require_once 'views/business/login.view.php';
			require_once 'views/roles/business/footer.php';
		}
		public function register(){
			require_once 'views/roles/business/header.php';
			require_once 'views/business/register.view.php';
			require_once 'views/roles/business/footer.php';
		}
		public function forgot(){
			require_once 'views/roles/business/header.php';
			require_once 'views/business/forgot.view.php';
			require_once 'views/roles/business/footer.php';
		}
		public function routeSession(){			
			// header('Location: ?c=Dashboard');
		}
	}
?>