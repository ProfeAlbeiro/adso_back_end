<?php
    class City{
        private $dbh;
        private $idCity;
        private $nameCity;        
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
        public function __construct2($idCity,$nameCity){            
            $this->idCity = $idCity;
            $this->nameCity = $nameCity;
        }
        # Código de la City
        public function setIdCity($idCity){
            $this->idCity = $idCity;
        }
        public function getIdCity(){
            return $this->idCity;
        }
        # Código de la City
        public function setNameCity($nameCity){
            $this->nameCity = $nameCity;
        }
        public function getNameCity(){
            return $this->nameCity;
        }
        
/*  ---------------------------------------------------------------------------  */
/*  ---------------------------------- CRUD CIUDAD ---------------------------  */
/*  ---------------------------------------------------------------------------  */
        
        # Modelo para Consultar la Ciudad
        public function readCity(){
            try {
                $cityList = [];
                $sql = 'SELECT * FROM CID';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $city) {
                    $cityList[] = new City(
                        $city['Id_cid'],
                        $city['nombre']
                    );
                }
                return $cityList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


    }
?>