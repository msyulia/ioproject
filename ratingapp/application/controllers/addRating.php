<?php
    require "../application.php";

    if(isset($_POST['submit'])){
        Sessions::startSession();
        $pracodawcaID = new accessAuthorization();
        $zmienna = new reviewsAndComments($_SESSION['pracodawca'],//tu jakoś getPracodawca nie wiem jak ale będzie :<
        Sessions::getImie(), 
        $_POST['kat1'],
        $_POST['kat2'],
        $_POST['kat3'],
        $_POST['kat4'],
        $_POST['kat5'],
        $_POST['komentarz']);
        $zmienna->pokazOcena();
        $zmienna->zapisz();
        $el = $pracodawcaID->getPracodawcaID($_SESSION['pracodawca']);
        $zmienna->modyfikujHistorie($el);

        unset($_SESSION['pracodawca']);
        header("Location: ../../index.php?rate=succes");
        exit();
    }else{
        header("Location: ../../index.php?rate=error");
        exit();
    }

?>