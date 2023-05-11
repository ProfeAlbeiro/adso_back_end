<?php 
	class UserDto {
		// Atributos Privados (Uso de la Clase)
		private $idRol = 2;
		private $idUser = null;
		private $docIdUser = 0;
		private $nameUser;
		private $lastNameUser;
		private $emailUser;
		private $passUser = 0;
		private $statusUser = 0;		
		// Constructor
		public function __construct(){
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
		}
		public function __construct2($userEmailLog,$userPassLog){
			$this->emailUser = $userEmailLog;
			$this->passUser = $userPassLog;
		}
		public function __construct8($idRol,$idUser,$docIdUser,$nameUser,$lastNameUser,$emailUser,$passUser,$statusUser){
			$this->idRol = $idRol;
			$this->idUser = $idUser;
			$this->docIdUser = $docIdUser;
			$this->nameUser = $nameUser;
			$this->lastNameUser = $lastNameUser;
			$this->emailUser = $emailUser;
			$this->passUser = $passUser;
			$this->statusUser = $statusUser;
		}
		// Métodos SET y GET
		public function setIdRol($idRol){
			$this->idRol = $idRol;
		}
		public function getIdRol(){
			return $this->idRol;
		}
		public function setIdUser($idUser){
			$this->idUser = $idUser;
		}
		public function getIdUser(){
			return $this->idUser;
		}
		public function setDocIdUser($docIdUser){
			$this->docIdUser = $docIdUser;
		}
		public function getDocIdUser(){
			return $this->docIdUser;
		}
		public function setNameUser($nameUser){
			$this->nameUser = $nameUser;
		}
		public function getNameUser(){
			return $this->nameUser;
		}
		public function setLastNameUser($lastNameUser){
			$this->lastNameUser = $lastNameUser;
		}
		public function getLastNameUser(){
			return $this->lastNameUser;
		}
		public function setEmailUser($emailUser){
			$this->emailUser = $emailUser;
		}
		public function getEmailUser(){
			return $this->emailUser;
		}
		public function setPassUser($passUser){
			$this->passUser = $passUser;
		}
		public function getPassUser(){
			return $this->passUser;
		}
		public function setStatusUser($statusUser){
			$this->statusUser = boolval($statusUser);
		}
		public function getStatusUser(){
			return $this->statusUser;
		}
	}
?>