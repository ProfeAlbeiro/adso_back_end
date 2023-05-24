<?php
    class User{
        private $dbh;
        private $userCode;
        private $userId;
        private $userName;
        private $userLastName;
        private $userBirthDate;
        private $userIdCity;
        private $userIdOccupation;
        private $userPhone;
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
        public function __construct8($userCode,$userId,$userName,$userLastName,
        $userBirthDate,$userIdCity,$userIdOccupation,$userPhone){            
            $this->userCode = $userCode;
            $this->userId = $userId;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userBirthDate = $userBirthDate;
            $this->userIdCity = $userIdCity;
            $this->userIdOccupation = $userIdOccupation;
            $this->userPhone = $userPhone;
        }              
        # Código del Usuario
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        }
        public function getUserCode(){
            return $this->userCode;
        }
        # Código del Usuario
        public function setUserId($userId){
            $this->userId = $userId;
        }
        public function getUserId(){
            return $this->userId;
        }
        # Código del Usuario
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function getUserName(){
            return $this->userName;
        }
        # Código del Usuario
        public function setUserLastName($userLastName){
            $this->userLastName = $userLastName;
        }
        public function getUserLastName(){
            return $this->userLastName;
        }
        # Código del Usuario
        public function setUserBirthDate($userBirthDate){
            $this->userBirthDate = $userBirthDate;
        }
        public function getUserBirthDate(){
            return $this->userBirthDate;
        }
        # Código del Usuario
        public function setUserIdCity($userIdCity){
            $this->userIdCity = $userIdCity;
        }
        public function getUserIdCity(){
            return $this->userIdCity;
        }
        # Código del Usuario
        public function setUserIdOccupation($userIdOccupation){
            $this->userIdOccupation = $userIdOccupation;
        }
        public function getUserIdOccupation(){
            return $this->userIdOccupation;
        }
        public function setUserPhone($userPhone){
            $this->userPhone = $userPhone;
        }
        public function getUserPhone(){
            return $this->userPhone;
        }
        
/*  ---------------------------------------------------------------------------  */
/*  ---------------------------------- CRUD USUARIO ---------------------------  */
/*  ---------------------------------------------------------------------------  */
        
        # Modelo para Crear Usuario
        public function createUser(){
            try {                
                $sql = 'INSERT INTO USUARIO VALUES (
                    :userCode,
                    :userId,
                    :userName,
                    :userLastName,
                    :userBirthDate,
                    :userIdCity,
                    :userIdOccupation,
                    :userPhone
                )';                
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userId', $this->getUserId());                
                $stmt->bindValue('userName', $this->getUserName());                
                $stmt->bindValue('userLastName', $this->getUserLastName());                
                $stmt->bindValue('userBirthDate', $this->getUserBirthDate());                
                $stmt->bindValue('userIdCity', $this->getUserIdCity());                
                $stmt->bindValue('userIdOccupation', $this->getUserIdOccupation());                
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # Modelo para Consultar Usuarios
        public function readUsers(){
            try {
                $userList = [];
                $sql = 'SELECT * FROM CID 
                        INNER JOIN USUARIO
                        ON  cid.Id_cid = usuario.Idciudad
                        INNER JOIN OCUPACION
                        ON usuario.Idocupacion = ocupacion.Id_ocupacion';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userList[] = new User(
                        $user['IdUsuario'],
                        $user['cedula'],
                        $user['nombres'],
                        $user['apellido'],
                        $user['fechaNacimiento'],
                        $user['nombre'],
                        $user['nombreOcupa'],
                        $user['telefono']
                    );
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }        
        # Modelo para Obtener el código del Usuario
        public function getUserById($userCode){
            try {
                $sql = "SELECT * FROM USUARIO WHERE IdUsuario=:userCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new User(
                    $userDb['IdUsuario'],
                    $userDb['cedula'],
                    $userDb['nombres'],
                    $userDb['apellido'],
                    $userDb['fechaNacimiento'],
                    $userDb['Idciudad'],
                    $userDb['Idocupacion'],
                    $userDb['telefono']
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # Modelo para Actualizar Usuario
        public function updateUser(){
            try {                
                $sql = 'UPDATE USUARIO SET
                            IdUsuario = :userCode,
                            cedula = :userId,
                            nombres = :userName,
                            apellido = :userLastName,
                            fechaNacimiento = :userBirthDate,
                            Idciudad = :userIdcity,
                            Idocupacion = :userIdOccupation,
                            telefono = :userPhone
                        WHERE IdUsuario = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastName', $this->getUserLastName());
                $stmt->bindValue('userBirthDate', $this->getUserBirthDate());
                $stmt->bindValue('userIdcity', $this->getUserIdCity());
                $stmt->bindValue('userIdOccupation', $this->getUserIdOccupation());
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }        
        # Modelo para Eliminar Usuario
        public function deleteUser($userCode){
            try {
                $sql = 'DELETE FROM USUARIO WHERE IdUsuario = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
    }
?>
