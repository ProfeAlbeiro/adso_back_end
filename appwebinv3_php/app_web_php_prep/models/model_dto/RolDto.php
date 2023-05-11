<?php
    class RolDto{
        private $codigoRol;
        private $nombreRol;
        public function __construct(){
            $a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
        }
        public function __construct2($codigoRol,$nombreRol){
			$this->codigoRol = $codigoRol;
			$this->nombreRol = $nombreRol;
		}        
        public function setCodigoRol($codigoRol){
            $this->codigoRol = $codigoRol;
        }
        public function getCodigoRol(){
            return $this->codigoRol;
        }
        public function setNombreRol($nombreRol){
            $this->nombreRol = $nombreRol;
        }
        public function getNombreRol(){
            return $this->nombreRol;
        }
    }
?>