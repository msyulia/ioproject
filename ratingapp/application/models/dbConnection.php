<?php

    //połączenie z bazą danych
    class dbConnection{
        private static $dbHost = "localhost";
        private static $dbUser = "root";
        private static $dbPassword = "";
        private static $dbName = "aplikacja_pracodawcy";

        public static function connect(){

            $connection = mysqli_connect(self::$dbHost,self::$dbUser,self::$dbPassword, self::$dbName);

            if($connection == false){
                echo "Connection error <br />";
                exit;
            }
            $connection -> query("SET NAMES utf8");
            $connection -> query("SET CHARACTER_SET utf8_unicode_ci");

        }

        public static function disconnect(){

        }
    }

?>