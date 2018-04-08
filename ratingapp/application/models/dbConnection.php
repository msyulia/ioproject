
<?php
    //połączenie z bazą danych
    class dbConnection
    {
        private $dbHost;
        private $dbUser;
        private $dbPassword;
        private $dbName;
        
        protected function sendquery($queryString)
        {
            $dbConn = (new dbConnection())->connect();
            $queryRes = $dbConn->query($queryString);
            mysqli_close($dbConn);
            unset($dbConn);
            if($queryRes->num_rows > 0)
            {
                if($queryRes->num_rows == 1)
                {
                    return $row = $queryRes->fetch_assoc();
                }
                else
                {
                    while($row = $queryRes->fetch_assoc()) 
                    {
                        $data[] = $row;
                    }   
                    return $data;    
                }
            }
            return false;
        }
        protected static function getInfo($columnName)
        {
            return $_GET[$columnName];
        }
        protected static function postInfo($columnName)
        {
            return $_POST[$columnName];
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
     
            return $connection;
         }
    }
?>
