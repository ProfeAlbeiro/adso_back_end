<?php
    class UserDao{
        
        // ATRIBUTOS: Encapsulados
        private $pdo;

        // MÉTODOS:

        # Sobrecarga de Constructores: Conexión a la Base de Datos
        public function __construct(){
            try {
				$this->pdo = DataBase::connection();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
        }

        # Crear un Usuario
        public function createUserDao($userDto){
            try {
				// Crear la Consulta
				$sql = 'INSERT INTO USUARIOS VALUES (
							:codigoRol,
							:codigoUser,							
							:nombresUser,							
							:apellidosUser,							
							:correoUser,							
							sha1(:passUser),							
							:estadoUser							
						)';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('codigoRol', $userDto->getCodigoRol());			
				$dbh->bindValue('codigoUser', $userDto->getCodigoUser());
				$dbh->bindValue('nombresUser', $userDto->getNombresUser());
				$dbh->bindValue('apellidosUser', $userDto->getApellidosUser());
				$dbh->bindValue('correoUser', $userDto->getCorreoUser());
				$dbh->bindValue('passUser', $userDto->getPassUser());
				$dbh->bindValue('estadoUser', $userDto->getEstadoUser());

				// Ejecutar la consulta
				$dbh->execute();
                
			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }
		/*
		# Consultar Usuarios
		public function readRolDao(){
			try {
				$rolList = [];
				$sql = 'SELECT * FROM ROLES';
				$dbh = $this->pdo->query($sql);
				foreach ($dbh->fetchAll() as $rol) {
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

		# Obtener IdUser
		public function getById($idRol){
			try {
				# Consulta
				$sql = "SELECT * FROM ROLES WHERE codigo_rol=:idRol";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('idRol', $idRol);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$rolDb = $dbh->fetch();
				# Crear el objedo del modelo
				$rol = new RolDto(
					$rolDb['codigo_rol'],
					$rolDb['nombre_rol'],					
				);
				return $rol;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		# Actualizar un Usuario
        public function updateRolDao($rolDto){
            try {
				// Crear la Consulta
				$sql = 'UPDATE ROLES SET
							codigo_rol = :idRol,
							nombre_rol = :nombreRol
						WHERE codigo_rol = :idRol';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('idRol', $rolDto->getCodigoRol());			
				$dbh->bindValue('nombreRol', $rolDto->getNombreRol());

				// Ejecutar la consulta
				$dbh->execute();
                
			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }

		# Eliminar un Usuario
		public function deleteRolDao($idRol){
			try {
				$sql = 'DELETE FROM ROLES WHERE codigo_rol = :idRol';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('idRol', $idRol);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		*/

    }
?>