<?php
    class DataBase{
        public static function connection(){
            $servername = "localhost";
            $database = "registro";
            $username = "root";
            $password = "";
			$pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
	}