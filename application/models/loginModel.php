<?php

class Login extends dbConnection
{
    private $username ="";
    private $pwd ="";

    public function getLogin()
    {
        return $this->username;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setLogin($_username)
    {
        $this->username = $_username;
    }

    public function setPwd($_pwd)
    {
        $this->pwd = $_pwd;
    }
    public function __construct($_username,$_pwd)
    {
        $this->username = $_username;
        $this->pwd = $_pwd;
    }
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
                        $this->redirect("../../index.php?login=success");    //Zmienić na odpowiednią stronę   
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
