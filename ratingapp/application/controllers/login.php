<?php
require "../application.php";

class Login extends dbConnection
{
    public $isLogged = false;

    public function login()
    {
        if(!isset($_POST['submit']))
        {
            errorRedirect();
        }
        else
        {
            $Login = $_POST['login'];
            $Pwd = $_POST['password'];
            if(empty($Login) && empty($Pwd))
            {
                errorRedirect('?form=empty');
            }
            else
            {
                if(empty($Login) || empty($Pwd))
                {
                    errorRedirect('?form=incomplete');
                }
                else
                {
                    $dbLogin = dbConnection::sendquery("SELECT * FROM pracownicy WHERE login='$Login'");
                    $resultCheck = mysqli_num_rows($dbLogin);
                    if($resultCheck > 0)
                    {
                        if($row = mysqli_fetch_assoc($dbLogin))
                        {
                            //czekin
                            //$pwd = password_hash($pwd, PASSWORD_DEFAULT);
                            if($Pwd == $row['password'])
                            {
                                //Poprawne hasło
                                Sessions::startSession(); 
                                Sessions::setLogin($Login);
                                $this->$isLogged = true;
                                redirect("../../index.php?success");    //Zmienić na odpowiednią stronę   
                            }
                            else
                            {
                                //Hasło niepoprawne 
                                errorRedirect('?form=incorrect');
                            }                   
                        }
                    }
                    else
                    {
                        errorRedirect('?form=userexists');
                    }
                }
            }
        }
    }

    private function errorRedirect($errorstring = '')
    {
        header("Location: ../../index.php".$errorstring);
        //Zniszcz obiekt typu Login, unset() ?
    }
    
    private function redirect($path)
    {
        header("Location: ".$path);
        //Zniszcz obiekt typu Login, unset() ?
    }
}

$login = new Login();
login.login();
?>