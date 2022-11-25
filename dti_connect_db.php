<?php
    class Database{
        private $conn;
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'thailand_db';

        public function getConnection(){
            try{
                $this->conn = null;
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}" , $this->username , $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->conn;
        }
    }
?>