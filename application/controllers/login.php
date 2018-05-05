<?php
require "../application.php";

if(isset($_POST['submit'])){
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
}else{
    header("Location: ../../views/login.php");
}
?>