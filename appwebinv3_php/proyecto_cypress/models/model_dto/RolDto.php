<?php
    class RolDto{
        
        // ATRIBUTOS: Encapsulados
        private $codigoRol;
        private $nombreRol;

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
        public function __construct2($codigoRol,$nombreRol){
			$this->codigoRol = $codigoRol;
			$this->nombreRol = $nombreRol;
		}

        # Métodos de Acceso a Datos: Setters y Getters

        # Código del Rol
        public function setCodigoRol($codigoRol){
			$this->codigoRol = $codigoRol;
		}
		public function getCodigoRol(){
			return $this->codigoRol;
		}
        # Nombre del Rol
        public function setNombreRol($nombreRol){
			$this->nombreRol = $nombreRol;
		}
		public function getNombreRol(){
			return $this->nombreRol;
		}
    }
?>