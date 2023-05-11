<?php
    class UserDto{
        private $codigoRol;
        private $codigoUser;
        private $nombresUser;
        private $apellidosUser;
        private $correoUser;
        public function __construct(){
            $a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
        }
        public function __construct5($codigoRol,$codigoUser,$nombresUser,$apellidosUser,$correoUser){
			$this->codigoRol = $codigoRol;
            $this->codigoUser = $codigoUser;
            $this->nombresUser = $nombresUser;
            $this->apellidosUser = $apellidosUser;
            $this->correoUser = $correoUser;
		}
        public function setCodigoRol($codigoRol){
            $this->codigoRol = $codigoRol;
        }
        public function getCodigoRol(){
            return $this->codigoRol;
        }
        public function setCodigoUser($codigoUser){
            $this->codigoUser = $codigoUser;
        }
        public function getCodigoUser(){
            return $this->codigoUser;
        }
        public function setNombresUser($nombresUser){
            $this->nombresUser = $nombresUser;
        }
        public function getNombresUser(){
            return $this->nombresUser;
        }
        public function setApellidosUser($apellidosUser){
            $this->apellidosUser = $apellidosUser;
        }
        public function getApellidosUser(){
            return $this->apellidosUser;
        }
        public function setCorreoUser($correoUser){
            $this->correoUser = $correoUser;
        }
        public function getCorreoUser(){
            return $this->correoUser;
        }
    }
?>