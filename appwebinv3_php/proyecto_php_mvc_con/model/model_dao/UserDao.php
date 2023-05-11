<?php 
	class UserDao{
		private $pdo;
		public function __construct(){
			try {
				$this->pdo = DataBase::conexion();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Iniciar Sesión
		public function loginStart($userDto){
			$sql = 'SELECT * FROM usuarios WHERE
				usuario_correo = :userEmailLog AND
				usuario_pass = sha1(:userPassLog)';
			$dbh = $this->pdo->prepare($sql);
			$dbh->bindValue('userEmailLog', $userDto->getEmailUser());
			$dbh->bindValue('userPassLog', $userDto->getPassUser());
			$dbh->execute();
			$userDb = $dbh->fetch();
			if ($userDb) {
				$userDto = new UserDto(
					$userDb['id_rol'],
					$userDb['id_usuario'],
					$userDb['usuario_doc_identidad'],
					$userDb['usuario_nombres'],
					$userDb['usuario_apellidos'],
					$userDb['usuario_correo'],
					$userDb['usuario_pass'],
					$userDb['usuario_estado']
				);
				return $userDto;
			} else {
				return false;
			}
		}

		# Registrar o Crear Usuario
		public function create($userDto){
			try {
				// Crear la Consulta
				$sql = 'INSERT INTO usuarios VALUES (
							:idRol,
							:idUser,
							:docIdUser,
							:nameUser,
							:lastNameUser,
							:emailUser,
							sha1(:passUser),
							:statusUser
						)';
				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);
				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('idRol',$userDto->getIdRol());			
				$dbh->bindValue('idUser',$userDto->getIdUser());		
				$dbh->bindValue('docIdUser',$userDto->getDocIdUser());
				$dbh->bindValue('nameUser',$userDto->getNameUser());
				$dbh->bindValue('lastNameUser',$userDto->getLastNameUser());
				$dbh->bindValue('emailUser',$userDto->getEmailUser());
				$dbh->bindValue('passUser',$userDto->getPassUser());
				$dbh->bindValue('statusUser',$userDto->getStatusUser());
				// Ejecutar la consulta
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		# Consultar o Listar Usuarios
		public function read(){
			try {
				$userList = [];
				$sql = 'SELECT * FROM usuarios';
				$dbh = $this->pdo->query($sql);
				foreach ($dbh->fetchAll() as $user) {
					$userList[] = new UserDto(
						$user['id_rol'],
						$user['id_usuario'],
						$user['usuario_doc_identidad'],
						$user['usuario_nombres'],
						$user['usuario_apellidos'],
						$user['usuario_correo'],
						$user['usuario_pass'],
						$user['usuario_estado']
					);					
				}
				return $userList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Capturar el Id y traer el registro
		public function getById($idUser){
			try {
				# Consulta
				$sql = "SELECT * FROM usuarios WHERE id_usuario=:id_usuario";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('id_usuario', $idUser);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$userDb = $dbh->fetch();
				# Crear el objedo del modelo
				$user = new UserDto(
					$userDb['id_rol'],
					$userDb['id_usuario'],
					$userDb['usuario_doc_identidad'],
					$userDb['usuario_nombres'],
					$userDb['usuario_apellidos'],
					$userDb['usuario_correo'],
					$userDb['usuario_pass'],
					$userDb['usuario_estado']
				);
				return $user;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		# Actualizar Usuario
		public function update($userDto){
			try {
				# Consulta
				$sql = 'UPDATE usuarios SET
							id_rol = :idRol,
							usuario_doc_identidad = :docIdUser,
							usuario_nombres = :nameUser,
							usuario_apellidos = :lastNameUser,
							usuario_correo = :emailUser,
							usuario_pass = sha1(:passUser),
							usuario_estado = :statusUser
						WHERE id_usuario = :idUser';
				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincula los datos
				$dbh->bindValue('idRol',$userDto->getIdRol());			
				$dbh->bindValue('idUser',$userDto->getIdUser());		
				$dbh->bindValue('docIdUser',$userDto->getDocIdUser());
				$dbh->bindValue('nameUser',$userDto->getNameUser());
				$dbh->bindValue('lastNameUser',$userDto->getLastNameUser());
				$dbh->bindValue('emailUser',$userDto->getEmailUser());
				$dbh->bindValue('passUser',$userDto->getPassUser());
				$dbh->bindValue('statusUser',$userDto->getStatusUser());				
				# Ejecuta la Consulta
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());				
			}							
		}

		# Eliminar Usuario
		public function delete($idUser){
			try {
				$sql = 'DELETE FROM usuarios WHERE id_usuario = :idUser';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('idUser', $idUser);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>