<?php
    require "../application.php";

    if(isset($_POST['submit'])){
        Sessions::startSession();
        $pracodawcaID = new accessAuthorization();
        $zmienna = new reviewsAndComments($_SESSION['pracodawca'],
        Sessions::getID(), 
        $_POST['kat1'],
        $_POST['kat2'],
        $_POST['kat3'],
        $_POST['kat4'],
        $_POST['kat5'],
        $_POST['komentarz']);
        $el = $pracodawcaID->getPracodawcaID($_SESSION['pracodawca']);
        $zmienna->zapisz($el);
        
        unset($_SESSION['pracodawca']);
        header("Location: ../../index.php?rate=succes");
        exit();
    }else{
        header("Location: ../../index.php?rate=error");
        exit();
    }

?>