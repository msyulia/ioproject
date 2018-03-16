<?php
    //sesje, potem ktoś będzie pisał logowanie jako późniejszy Task
    //maja być przygotowanie pola pod PESEL , Imie, Nazwisko
    class Sessions
    {
        public $PESEL;
        public $Imie;
        public $Nazwisko;
    
        public function __construct()
        {
            session_start();
    
            //Zapobiega dopisywaniu do url PHPSESSID i tworzeniu własnej sesji
            if(!isset($_SESSION['init']))
            {
                session_regenerate_id();
                $_SESSION['init']=true;
                $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
            }

            //Zapobiega session hijacking
            if($_SESSION['ip']!=$_SERVER['REMOTE_ADDR'])
            {
                die('Session hijacking failure');
            }

            //Ustawienie zmiennych w sesji
            if(!isset($_SESSION['counter']))
            {
                $_SESSION['counter'] = 0;
            }
            if(!isset($_SESSION['PESEL'])) 
            {
                $_SESSION['PESEL']="";
            }
            if(!isset($_SESSION['Imie'])) 
            {
                $_SESSION['Imie']="";
            }
            if(!isset($_SESSION['Nazwisko'])) 
            {
                $_SESSION['Nazwisko']="";
            }
            $_SESSION['counter']++;
        }

        public function setPESEL($PESEL)
        {
            $this->$PESEL = $PESEL;
        }
        public function setImie($Imie)
        {
            $this->$Imie = $Imie;
        }
        public function setNazwisko($Nazwisko)
        {
            $this->$Nazwisko = $Nazwisko;
        }
    }
?>