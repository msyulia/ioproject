<?php
    require "../application.php";
    
    Sessions::startSession();
    Sessions::stopSession();
    Sessions::startSession();
    $_SESSION['loginLogout'] = true;
    header("Location: ../../index.php");
    exit();

?>