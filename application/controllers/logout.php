<?php
    require "../application.php";
    
    Sessions::startSession();
    Sessions::stopSession();
    header("Location: ../../index.php");
    exit();

?>