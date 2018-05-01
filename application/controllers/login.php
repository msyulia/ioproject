<?php
require "../application.php";

$fLogin = $_POST['login'];
$fPwd =  $_POST['password'];

if(empty($fLogin) || empty($fPwd))
{
    echo 'Uzupełnij wszystkie pola';
}
else
{
    $obj = new Login($fLogin,$fPwd);
    $obj->login();
}
?>