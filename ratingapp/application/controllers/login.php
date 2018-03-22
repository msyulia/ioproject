<?php
require "../application.php";



if(!isset($_POST['submit']))
{

    errorRedirect();
}
else
{
    //$Login = dbConnection::postInfo('login');
    //$Pwd = dbConnection::postInfo('password');
    $Login = $_POST['login'];
    $Pwd = $_POST['password'];
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
<<<<<<< HEAD
            // $dbLogin = dbConnection::sendquery('select login from pracownicy where login='.$Login);
            $dbLogin = dbConnection::sendquery("SELECT * FROM pracownicy WHERE login='$Login'");
            $resultCheck = mysqli_num_rows($dbLogin);
            if($resultCheck > 0){
                if($row = mysqli_fetch_assoc($dbLogin)){
                //czekin
                 //Formularz dobrze wypełniony użytkownik chce się zalogować    
                //Sprawdź poprawność danych później jakaś walidacja loginu i hasła
                //$pwd = password_hash($pwd, PASSWORD_DEFAULT);

                if($Pwd == $row['password'])
                {
                    //Poprawne hasło
                   // $Imie = dbConnection::sendquery('select Imie from pracownicy where login='.$Login);
                   // $Nazwisko = dbConnection::sendquery('select Nazwisko from pracownicy where login='.$Login);
                   Sessions::startSession(); 
                   Sessions::setLogin($Login);
                    // Sessions::setImie($Imie);
                    // Sessions::setNazwisko($Nazwisko);
                    redirect("../../index.php?success");    //Zmienić na odpowiednią stronę   
=======
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
>>>>>>> 25bf217b3f071ec711088162e8489a2c356d8900
                }
                else
                {
                    //Hasło niepoprawne 
                    errorRedirect('?form=incorrect');
<<<<<<< HEAD
                }                   
                }
            }else{
                errorRedirect('?form=userexists');
=======
                }
>>>>>>> 25bf217b3f071ec711088162e8489a2c356d8900
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