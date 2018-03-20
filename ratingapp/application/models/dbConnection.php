<?php

    //połączenie z bazą danych
    class dbConnection{
        private $dbHost;
        private $dbUser;
        private $dbPassword;
        private $dbName;

        private $connection;    //Zmienna przechowująca dane do połączenia
        
        //Getter dla pola $connection
        protected function getConnection(){
            return $connection;
        }

        protected function connect(){
            $this->dbHost = "localhost";
            $this->dbUser = "root";
            $this->dbPassword = "";
            $this->dbName = "aplikacja_pracodawcy"; 
            $connection = mysqli_connect($this->dbHost, $this->dbUser,$this->dbPassword, $this->dbName);

            if($connection == false){
                echo "Connection error <br />";
                exit;
            }
            $connection -> query("SET NAMES utf8");
            $connection -> query("SET CHARACTER_SET utf8_unicode_ci");
            
            $this->$connection = $connection;
            return $connection;
        }


    }

?>