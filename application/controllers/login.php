<?php
require "../application.php";
Sessions::startSession();

if(isset($_POST['submit'])){
    $fLogin = $_POST['login'];
    $fPwd =  $_POST['password'];
    
    if(empty($fLogin) || empty($fPwd))
    {
        $_SESSION['noLoginData'] = true;
        header("Location: ../../views/login.php");
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