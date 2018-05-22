<?php
    /**
     * Klasa obsługująca połączenie z bazą danych
     * 
     * @param var $dbHost informacje o hoście bazy danych
     * @param var $dbUser informacje o użytkowniku bazy danych
     * @param var $dbPassword informacje o haśle bazy danych
     * @param var $dbName informacje o nazwie bazy danych
     * @param var $connection zmienna zawierająca informacje czy istnieje prawidłowe połączenie z bazą danych
     */
    class dbConnection
    {
        private $dbHost;
        private $dbUser;
        private $dbPassword;
        private $dbName;
        
        protected static $connection;
            
        /**
         * Funkcja wysyłająca zapytanie do bazy danych o połączenie się z nią
         * 
         * @param $queryString informacje o zapytaniu
         */
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

        /**
         * Funkcja zwracająca informacje o numerze kolumny wprowadzonych danych
         * 
         * @return var kolumna wprowadzonych danych
         */
        protected static function getInfo($columnName)
        {
            return $_GET[$columnName];
        }

        /**
         * Funkcja wywołująca funkcję służącą do połaczenia z bazą danych
         * 
         * @return var informacja czy uzyskano połączenie z bazą danych
         */
        public static function getConnection(){
            $connect = new dbConnection();
            return $connect->connect();
        }

        /**
         * Funkcja uzyskująca połączenie z bazą danych
         * 
         * @return var zwraca informacje o połączeniu z bazą danych
         */
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
