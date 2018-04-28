<?php
    require "../application/application.php";
   echo Sessions::startSession(); 
   echo Sessions::getSession('Imie');  

?>

