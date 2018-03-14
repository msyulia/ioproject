<?php
    require 'models/dbConnection.php';
    require 'models/employerComments.php';
    require 'models/employerRating.php';
    require 'models/sessions.php';
    require 'models/accessAuthorization.php';
    require 'models/reviewsAndComments.php';
    require 'models/gettIngRecord.php';


    //połaczenie z bazą danych działa dla localhost
    $connection = dbConnection::connect();
?>