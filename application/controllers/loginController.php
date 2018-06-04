<?php
/**
 * \class Klasa odpowiedzialna za zmienne i funkcje logowania 
 */
class Login extends dbConnection
{
    private $username ="";
    private $pwd ="";
	/**
	* Funkcja zwracająca login użytkownika
	*/
    public function getLogin()
    {
        return $this->username;
    }
	/**
	* Funkcja zwracająca hasło użytkownika
	*/
    public function getPwd()
    {
        return $this->pwd;
    }
	/**
	* Funkcja ustawiająca login na konkretną nazwę użytkownika
	*/
    public function setLogin($_username)
    {
        $this->username = $_username;
    }
	/**
	* Funkcja ustawiająca hasło na konkretną nazwę użytkownika
	*/
    public function setPwd($_pwd)
    {
        $this->pwd = $_pwd;
    }
	/**
	* Funkcja ustawiająca login oraz hasło na konkretne wartości podane w argumentach funkcji
	*/
    public function __construct($_username,$_pwd)
    {
        $this->username = $_username;
        $this->pwd = $_pwd;
    }
	/**
	* Funkcja sprawdzająca czy dwa hasła są takie same
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
	* Funkcja logowania na stronę, jeśli użytkownik jest już zalogowany zwraca komunikat 
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
                        $this->redirect("../../index.php");    
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
    private function errorRedirect($errorstring = '')
    {
        header("Location: ../../views/login.php".$errorstring);
        exit();
    }
    
    private function redirect($path)
    {
        header("Location: ".$path);
        exit();
    }
}