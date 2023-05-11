<?php

    class UserDto{
        
        /* ATRIBUTOS */        
        protected $codigoRol;
        protected $nombreRol;
        protected $codigoUser;
        protected $nombresUser;
        protected $apellidosUser;
        protected $correoUser;
        
        /* SOBRECARGA DE CONSTRUCTORES */
        
        // Constructor de Constructores
		public function __construct(){
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
		}
        // Constructor: Vacío
        public function __construct0(){}

        // Constructor: Sin Nombre Rol
        public function __construct5($codigoRol,$codigoUser,$nombresUser,$apellidosUser,$correoUser){
			$this->codigoRol = $codigoRol;
			$this->codigoUser = $codigoUser;
			$this->nombresUser = $nombresUser;
			$this->apellidosUser = $apellidosUser;
			$this->correoUser = $correoUser;			
		}

        // Constructor: Con Nombre Rol
        public function __construct6($codigoRol,$nombreRol,$codigoUser,$nombresUser,$apellidosUser,$correoUser){
			$this->codigoRol = $codigoRol;
			$this->nombreRol = $nombreRol;
			$this->codigoUser = $codigoUser;
			$this->nombresUser = $nombresUser;
			$this->apellidosUser = $apellidosUser;
			$this->correoUser = $correoUser;			
		}

        /* MÉTODOS DE ACCESO: SETTER Y GETTERS*/
        
        // Código Rol
        public function setCodigoRol($codigoRol){
            $this->codigoRol = $codigoRol;
        }
        public function getCodigoRol(){
            return $this->codigoRol;
        }

        // Nombre Rol
        public function setNombreRol($nombreRol){
            $this->nombreRol = $nombreRol;
        }
        public function getNombreRol(){
            return $this->nombreRol;
        }

        // Código Usuario
        public function setCodigoUser($codigoUser){
            $this->codigoUser = $codigoUser;
        }
        public function getCodigoUser(){
            return $this->codigoUser;
        }

        // Nombres Usuario
        public function setNombresUser($nombresUser){
            $this->nombresUser = $nombresUser;
        }
        public function getNombresUser(){
            return $this->nombresUser;
        }

        // Código Rol
        public function setApellidosUser($apellidosUser){
            $this->apellidosUser = $apellidosUser;
        }
        public function getApellidosUser(){
            return $this->apellidosUser;
        }

        // Código Rol
        public function setCorreoUser($correoUser){
            $this->correoUser = $correoUser;
        }
        public function getCorreoUser(){
            return $this->correoUser;
        }
    }

?>