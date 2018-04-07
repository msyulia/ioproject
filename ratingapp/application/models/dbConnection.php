<?php
    //połączenie z bazą danych
    class dbConnection
    {
        private $dbHost;
        private $dbUser;
        private $dbPassword;
        private $dbName;
        
        protected static $connection;

        protected function sendquery($queryString)
        {
            $connect = new dbConnection();
            $queryRes = $connect->connect()->query($queryString);
            if($queryRes->num_rows > 0)
            {

                while($row = $queryRes->fetch_assoc()) {
                    $data[] = $row;
                }       
                return $data;
            }
            return false;
        }


        public static function getConnection(){
            $connect = new dbConnection();
            return $connect->connect();
        }


        protected function connect(){
            $this->dbHost = "localhost";
            $this->dbUser = "root";
            $this->dbPassword = "";
            $this->dbName = "aplikacja_pracodawcy"; 
            // $this->dbHost = "ntmichal.nazwa.pl:3306";
            // $this->dbUser = "ntmichal_aplikacjapracodawcy";
            // $this->dbPassword = "Io123456789!";
            // $this->dbName = "ntmichal_aplikacjapracodawcy"; 
            
            //object oriented 
            $connection = new mysqli($this->dbHost, $this->dbUser,$this->dbPassword, $this->dbName);
            if($connection == false){
                echo "Connection error <br />";
                exit;
            }
            $connection->query("SET NAMES utf8");
            $connection->query("SET CHARACTER_SET utf8_unicode_ci");
     
            self::$connection = $connection;
            return $connection;
        }
        

    }
?>
