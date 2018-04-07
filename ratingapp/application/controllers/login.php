<?php
require "../application.php";

class Login extends dbConnection
{
    private $username ="";
    private $pwd ="";

    public function getLogin()
    {
        return $username;
    }

    public function getPwd()
    {
        return $pwd;
    }

    public function setLogin($_username)
    {
        $username = $_username;
    }

    public function setPwd($_pwd)
    {
        $pwd = $_pwd;
    }
    public function __construct($_username,$_pwd)
    {
        $this->$username = $_username;
        $this->$pwd = $_pwd;
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
                // $Login = $_POST['login'];
                // $Pwd = $_POST['password'];
                if(isset($username) && isset($pwd))
                {
                    $this->errorRedirect('?form=empty');
                }
                else
                {
                    if(isset($username) || isset($pwd))
                    {
                        $this->errorRedirect('?form=incomplete');
                    }
                    else
                    {
                        $dbLogin = dbConnection::sendquery("SELECT * FROM pracownicy WHERE login='$username'");
                        $resultCheck = mysqli_num_rows($dbLogin);
                        if($resultCheck > 0)
                        {
                            if($row = mysqli_fetch_assoc($dbLogin))
                            {
                                //czekin
                                //$pwd = password_hash($pwd, PASSWORD_DEFAULT);
                                if($pwd == $row['password'])
                                {
                                    //Poprawne hasło
                                    Sessions::startSession(); 
                                    Sessions::setLogin($this->$username);
                                    $this->redirect("../../index.php?success");    //Zmienić na odpowiednią stronę   
                                }
                                else
                                {
                                    //Hasło niepoprawne 
                                    $this->errorRedirect('?form=incorrect');
                                }                   
                            }
                        }
                        else
                        {
                            $this->errorRedirect('?form=userexists');
                        }
                    }
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
        header("Location: ../../index.php".$errorstring);
        exit();
    }
    
    private function redirect($path)
    {
        header("Location: ".$path);
        exit();
    }
}

$obj = new Login($_POST['login'], $_POST['password']);
$obj->login();
?>