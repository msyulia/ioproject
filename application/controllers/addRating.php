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
            htmlspecialchars($_POST['komentarz']));
            $el = $pracodawcaID->getPracodawcaID($_SESSION['pracodawca']);
            if($zmienna->checkEmptyFields()){
                $_SESSION['fillAllAreas'] = true;
                header("Location: ../../views/addRating.php");
               // $_SESSION['pracodawca']
                exit();
            }else{
                $zmienna->zapisz($el);       
                unset($_SESSION['pracodawca']);
                $_SESSION['addedReview'] = true;
                header("Location: ../../views/oceny.php");
            }


    }else{
        header("Location: ../../index.php?rate=error");
        exit();
    }

?>