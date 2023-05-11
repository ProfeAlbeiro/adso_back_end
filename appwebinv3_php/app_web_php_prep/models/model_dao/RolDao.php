<?php
    class RolDao{
        private $dbh;
        public function __construct(){
            try {
				$this->dbh = DataBase::connection();
			} catch (Exception $e) {
				die($e->getMessage());
			}
        }        
        public function rolCreate($rolDto){
            try {
                $sql = "INSERT INTO ROLES VALUES (
                            :codigo_rol,
                            :nombre_rol
                       )";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('codigo_rol', $rolDto->getCodigoRol());
                $stmt->bindValue('nombre_rol', $rolDto->getNombreRol());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function rolRead(){
			try {				
				$rolList = [];
				$sql = 'SELECT * FROM ROLES';				
				$stmt = $this->dbh->query($sql);
				foreach ($stmt->fetchAll() as $rol) {
					$rolList[] = new RolDto(
						$rol['codigo_rol'],
						$rol['nombre_rol']						
					);
				}
				return $rolList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
        public function getById($idRol){
            try {				
				$sql = "SELECT * FROM ROLES WHERE codigo_rol=:idRol";
				$stmt = $this->dbh->prepare($sql);
				$stmt->bindValue('idRol', $idRol);
				$stmt->execute();
				$rolDb = $stmt->fetch();
				$rol = new RolDto(
					$rolDb['codigo_rol'],
					$rolDb['nombre_rol'],					
				);
				return $rol;
			} catch (Exception $e) {
				die($e->getMessage());
			}
        }
        public function rolUpdate($rolDto){
            try {				
				$sql = 'UPDATE ROLES SET
							codigo_rol = :idRol,
							nombre_rol = :nombreRol
						WHERE codigo_rol = :idRol';
				$stmt = $this->dbh->prepare($sql);
				$stmt->bindValue('idRol', $rolDto->getCodigoRol());			
				$stmt->bindValue('nombreRol', $rolDto->getNombreRol());
				$stmt->execute();
			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }
        public function rolDelete($idRol){
			try {
				$sql = 'DELETE FROM ROLES WHERE codigo_rol = :idRol';
				$stmt = $this->dbh->prepare($sql);
				$stmt->bindValue('idRol', $idRol);
				$stmt->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
        public function lastCodRol(){
            try {                
				$sql = "SELECT * FROM ROLES";
				$stmt = $this->dbh->query($sql);
				foreach ($stmt->fetchAll() as $rol) {
                    $lastRol = $rol['codigo_rol'];
				}
                if (isset($lastRol)) {
                    return $lastRol + 1;
                } else {
                    return 1;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>