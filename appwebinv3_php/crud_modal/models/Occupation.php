<?php
    class Occupation{
        private $dbh;
        private $idOccupation;
        private $nameOccupation;        
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
        public function __construct2($idOccupation,$nameOccupation){            
            $this->idOccupation = $idOccupation;
            $this->nameOccupation = $nameOccupation;
        }
        # Código de la ocupación
        public function setIdOccupation($idOccupation){
            $this->idOccupation = $idOccupation;
        }
        public function getIdOccupation(){
            return $this->idOccupation;
        }
        # Código de la Occupation
        public function setNameOccupation($nameOccupation){
            $this->nameOccupation = $nameOccupation;
        }
        public function getNameOccupation(){
            return $this->nameOccupation;
        }
        
/*  ---------------------------------------------------------------------------  */
/*  ---------------------------------- CRUD CIUDAD ---------------------------  */
/*  ---------------------------------------------------------------------------  */
        
        # Modelo para Consultar la Ocupación
        public function readOccupation(){
            try {
                $OccupationList = [];
                $sql = 'SELECT * FROM OCUPACION';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $Ocupation) {
                    $OccupationList[] = new Occupation(
                        $Ocupation['Id_ocupacion'],
                        $Ocupation['nombreOcupa']
                    );
                }
                return $OccupationList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }
?>