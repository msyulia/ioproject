<?php 
    require "../application/application.php";
    Sessions::startSession();

?>

        <?php
        if(Sessions::isLogged()){
            $wystawOcene = new accessAuthorization();
            $wystawOcene->wystawOcene(Sessions::getLogin());
        }else{
            header("Location: ../index.php");
        }   
?>