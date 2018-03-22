<?php

require "../dbConnection.php";
require "../application.php";

if(!isset($_POST['submit']))
{
    errorRedirect();
}
else
{
    $Login = dbConnection::postInfo('login');
    $Pwd = dbConnection::postInfo('pwd');

    if(empty($Login) && empty($Pwd))
    {
        //Wszystkie pola puste
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
            $dbLogin = dbConnection::sendquery('select login from pracownicy where login='.$login);
            if(empty($dbLogin['login']))
            {
                //Użytkownika nie ma w bazie
                errorRedirect('?form=userexists');
            }
            else
            {
                //Formularz dobrze wypełniony użytkownik chce się zalogować    
                //Sprawdź poprawność danych później jakaś walidacja loginu i hasła
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                $queryres = dbConnection::sendquery('select password from pracownicy where login='.$Login);
                if($Pwd==$queryres['password'])
                {
                    //Poprawne hasło
                    $Imie = dbConnection::sendquery('select Imie from pracownicy where login='.$Login);
                    $Nazwisko = dbConnection::sendquery('select Nazwisko from pracownicy where login='.$Login);
                    Sessions::setLogin($Login);
                    Sessions::setImie($Imie);
                    Sessions::setNazwisko($Nazwisko);

                    redirect("../../index.php");    //Zmienić na odpowiednią stronę   
                }
                else
                {
                    //Hasło niepoprawne 
                    errorRedirect('?form=incorrect');
                }
            }
        }
    }
}
function redirect($path)
{
    header("Location: ".$path);
    die();
}
function errorRedirect($errorstring = '')
{
    header("Location: ../../index.php".$errorstring);
    die(); 
}
?>

