<?php

/**
 * Klasa obsługująca logowanie do sesji
 * 
 * @param $username login użytkownika
 * @param $pwd hasło użytkownika
 */
class Login extends dbConnection
{
    private $username ="";
    private $pwd ="";

    /**
     * Funkcja zwracająca login użytkownika
     * 
     * @return $username login użytkownika
     */
    public function getLogin()
    {
        return $this->username;
    }

    /**
     * Funkcja zwracająca hasło użytkownika
     * 
     * @return $pwd hasło użytkownika
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Funkcja ustawiająca login użytkownika
     * 
     * @param $username login użytkownika
     */
    public function setLogin($_username)
    {
        $this->username = $_username;
    }

    /**
     * Funkcja ustawiająca hasło użytkownika
     * 
     * @param $pwd hasło użytkownika
     */
    public function setPwd($_pwd)
    {
        $this->pwd = $_pwd;
    }
        
    /**
     * Konstruktor tworzący obiekt o podanych danych
     * 
     * @param $username login użytkownika
     * @param $pwd hasło użytkownika
     */
    public function __construct($_username,$_pwd)
    {
        $this->username = $_username;
        $this->pwd = $_pwd;
    }
        
    /**
     * Funkcja sprawdzająca hasło użytkownika
     * 
     * @param $pwd1 pierwsze hasło do porównania
     * @param $pwd2 drugie hasło do porównania
     * 
     * @return int Zwraca 1 jesli są takie same lub 0 w innym przypadku
     */
    public function matchPassword($pwd1,$pwd2)
    {
        
        if (password_verify($pwd1, $pwd2) == true) {
            return 1;
        } else {
            return 0;
        }
        die();
        // return $pwd1 == $pwd2 ? 1 : 0;
    }
        
    /**
     * Funkcja logująca użytkownika, w razie nieprawidłowych danych przekierowuje na odpowiednią stronę
     */
    public function login()
    {
        if(!Sessions::isLogged())
        {
            if(!isset($_POST['submit']))
            {
                $this->errorRedirect();
            }
            else
            {
                $usr = $this->username;
                $dbRes = $this->sendquery("SELECT * FROM pracownicy WHERE login='$usr'");
                if($dbRes != false)
                {  
                    
                    if($this->matchPassword($this->pwd,$dbRes['password']))
                    {
                        Sessions::startSession(); 
                        Sessions::setLogin($this->username);
                        Sessions::setImie($dbRes['Imie']);
                        Sessions::setNazwisko($dbRes['Nazwisko']);
                        Sessions::setID($dbRes['ID']);
                        $_SESSION['loginSuccess'] = true;
                        $this->redirect("../../index.php");    //Zmienić na odpowiednią stronę   
                    }
                    else
                    {
                        $this->errorRedirect('?form=incorrect');
                    }                   
                }   
                else
                {
                    $this->errorRedirect('?form=incorrect');
                }               
            }
        }
        else    
        {
            echo 'Użytkownik jest już zalogowany';
        }        
    }

    /**
     * Funkcja przekierowująca na strone błędnego logowania
     * 
     * @param string informacja o błędzie
     */
    private function errorRedirect($errorstring = '')
    {
        header("Location: ../../views/login.php".$errorstring);
        exit();
    }
    
    /**
     * Funkcja przekierowująca na strone po prawidłowym logowaniu
     * 
     * @param string informacja o błędzie
     */
    private function redirect($path)
    {
        header("Location: ".$path);
        exit();
    }
}
