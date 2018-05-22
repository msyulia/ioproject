<?php


///
/// Skrypt ładujący potrzebne pliki.
///


    //MODELS
    require 'models/dbConnection.php';
    // require 'models/employerComments.php';
    require 'models/sessions.php';
    require 'models/accessAuthorization.php';
    require 'models/reviewsAndComments.php';


    require 'models/searchEngine.php';
    require 'models/registerModel.php';

    require 'models/loginModel.php';

    require 'models/employers.php';

    require 'models/employeeModel.php';

    //CONTROLLERS
    // require 'controllers/comments.php';
    require 'controllers/topRating.php';
?>