<?php
    /**
     * Klasa obsługujaca sesje.
     * 
     * @param bool $_sessionStart parametr służący do sprawdzenia czy sesja jest aktywna
     */
    class Sessions
    {
        private static $_sessionStart = false;
        
        /**
         * Funkcja otwierająca sesję
        */
        public static function startSession(){
            if(self::$_sessionStart == false){
                session_start();
                self::$_sessionStart = true;
            }
        }
        
        /**
         * Funkcja zamykająca sesję
         */
        public static function stopSession(){
            if(self::$_sessionStart == true){
                session_destroy();
                self::$_sessionStart = false;
            }
        }
        
        /**
         * Funkcja nadająca imię sesji
         * 
         * @param string $imie imię sesji
         */
        public static function setImie($imie){
            $_SESSION['imie'] = $imie;
        }

        /**
         * Funkcja nadająca id sesji
         * 
         * @param string $ID id sesji
         */
        public static function setID($ID){
            $_SESSION['id'] = $ID;
        }
        
        /**
         * Funkcja nadająca nazwisko sesji
         * 
         * @param string $nazwisko nazwisko sesji
         */
        public static function setNazwisko($nazwisko){
            $_SESSION['nazwisko'] = $nazwisko;
        }

        /**
         * Funkcja nadająca login sesji
         * 
         * @param string $login login sesji
         */
        public static function setLogin($login){
            $_SESSION['login'] = $login;
        }

        /**
         * Funkcja zwracająca id sesji
         * 
         * @return string $_SESSION['id'] id sesji
         */
        public static function getID(){
            return $_SESSION['id'];
        }

        /**
         * Funkcja zwracająca imię sesji
         * 
         * @return string $_SESSION['imie'] imię sesji
         */
        public static function getImie(){
            return $_SESSION['imie'];
        }

        /**
         * Funkcja zwracająca nazwisko sesji
         * 
         * @return string $_SESSION['nazwisko'] imię sesji
         */
        public static function getNazwisko(){
            return $_SESSION['nazwisko'];
        }

        /**
         * Funkcja zwracająca login sesji
         * 
         * @return string $_SESSION['login'] imię sesji
         */
        public static function getLogin(){
            return $_SESSION['login'];
        }

        /**
         * Funkcja zwracająca informacje o zalogowwaniu do sesji
         * 
         * @return bool isset($_SESSION['login']) informacja o zalogowaniu
         */
        public static function isLogged(){
            return isset($_SESSION['login']);
        }

    }
?>