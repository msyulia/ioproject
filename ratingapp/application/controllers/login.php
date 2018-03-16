<?php

include "../dbConnection.php";//poop
require "../application.php";

if(!isset($_POST['submit']))
{
    redirect();
}
else
{
    //myślę że dbConnection powinno mieć statyczne pole connection żeby tego poniżej użyć
    $PESEL =mysqli_real_escape_string(dbConnection::$connection, $_POST['PESEL']);
    //$login =$_POST['login'];

    if(empty($PESEL))
    {
        redirect('?form=emptypesel');
    }
    else
    {
        //Walidacja tego co użytkownik wpisał
        if(!preg_match("/^[0-9]*$",$PESEL))  //login to pesel więc zawiera liczby od 0-9
        {
            redirect('?form=invalidpesel');
        }
        else
        {
            
        }
    }
}
////////
//example
//
///////
function redirect($errorstring = '')
{
    header("Location: ../../index.php".$errorstring);
    die(); 
}
?>

