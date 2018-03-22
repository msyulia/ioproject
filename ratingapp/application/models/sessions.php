<?php
    /**
     * Klasa obsługujaca sesje.
     */
    class Sessions
    {
        private static $_sessionStart = false;
        
     
        public static function startSession(){
            if(self::$_sessionStart == false){
                session_start();
                self::$_sessionStart = true;
            }
        }
        public static function stopSession(){
            if(self::$_sessionStart == true){
                session_destroy();
                self::$_sessionStart = false;
            }
        }
        public static function setImie($imie){
            $_SESSION['imie'] = $imie;
        }
        public static function setNazwisko($nazwisko){
            $_SESSION['nazwisko'] = $nazwisko;
        }

        public static function setLogin($login){
            $_SESSION['login'] = $login;
        }

        public static function getImie(){
            return $_SESSION['imie'];
        }
        public static function getNazwisko(){
            return $_SESSION['nazwisko'];
        }

        public static function getLogin(){
            return $_SESSION['login'];
        }

        public static function isLogged(){
            return isset($_SESSION['login']);
        }

    }
?>