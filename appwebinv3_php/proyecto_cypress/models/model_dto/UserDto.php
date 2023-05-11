<?php
    class UserDto{
        
        // ATRIBUTOS: Encapsulados
        private $codigoRol;
        private $codigoUser;
        private $nombresUser;
        private $apellidosUser;
        private $correoUser;
        private $passUser;
        private $estadoUser;

        // MÉTODOS:

        # Sobrecarga de Constructores
        public function __construct(){
            $a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
        }

        # Constructor que crea el objeto por defecto
        public function __construct7($codigoRol,$codigoUser,$nombresUser,$apellidosUser,$correoUser,$passUser,$estadoUser){
			$this->codigoRol = $codigoRol;
			$this->codigoUser = $codigoUser;
			$this->nombresUser = $nombresUser;
			$this->apellidosUser = $apellidosUser;
			$this->correoUser = $correoUser;
			$this->passUser = $passUser;
			$this->estadoUser = $estadoUser;
		}

        # Métodos de Acceso a Datos: Setters y Getters

        # Código del Rol
        public function setCodigoRol($codigoRol){
			$this->codigoRol = $codigoRol;
		}
		public function getCodigoRol(){
			return $this->codigoRol;
		}
        # Código Usuario
        public function setCodigoUser($codigoUser){
			$this->codigoUser = $codigoUser;
		}
		public function getCodigoUser(){
			return $this->codigoUser;
		}
        # Nombres Usuario
        public function setNombresUser($nombresUser){
			$this->nombresUser = $nombresUser;
		}
		public function getNombresUser(){
			return $this->nombresUser;
		}
        # Apellidos Usuario
        public function setApellidosUser($apellidosUser){
			$this->apellidosUser = $apellidosUser;
		}
		public function getApellidosUser(){
			return $this->apellidosUser;
		}
        # Correo Usuario
        public function setCorreoUser($correoUser){
			$this->correoUser = $correoUser;
		}
		public function getCorreoUser(){
			return $this->correoUser;
		}
        # Password Usuario
        public function setPassUser($passUser){
			$this->passUser = $passUser;
		}
		public function getPassUser(){
			return $this->passUser;
		}
        # Estado Usuario
        public function setEstadoUser($estadoUser){
			$this->estadoUser = $estadoUser;
		}
		public function getEstadoUser(){
			return $this->estadoUser;
		}
        
    }
?>