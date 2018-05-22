<?php 
    require "../application/application.php";
    Sessions::startSession();
    if(!Sessions::isLogged()) {
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Konto użytkownika</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../public/css/mdb.min.css" rel="stylesheet">
    <!-- Semantic-UI-->
    <link href="../public/css/semantic.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../public/css/style.css" media="only screen and (min-width: 481px)" rel="stylesheet">
    <link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="../public/css/mobile-style.css" />
</head>
<body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">

        <a class="navbar-brand" href="../index.php">
            <img src="../public/img/logo.png" class="logo-pracodawcy" alt="logo">&nbsp;&nbsp;&nbsp;Baza ocen pracodawców</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="top100.php">Top 100</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <?php
                        if(Sessions::isLogged()){
                    ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i><?php  echo Sessions::getLogin();?> </a>
                        <!-- wstawka php sprawdza czy zalogowany -->
   
                    <!--Jeśli user jest zalogowany -->
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="konto.php">Moje konto</a>
                        <a class="dropdown-item" href="oceny.php">Wystaw oceny</a>
                        <a class="dropdown-item" href="../application/controllers/logout.php">Wyloguj</a>
                    </div>
                    <!-- else -->
                    <?php
                    }else{
                    ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> Profil </a>
                    <!--Jeśli user się nie zalogował -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="views/login.php">Zaloguj się</a>
                    </div>
                    <?php
                    }
                    ?>

                </li>
            </ul>
        </div>
    </nav>
    <!--/.Navbar -->
<div class="container">
    <h1 class="text-center">Panel użytkownika</h1>
    <?php 
    $employee = new employee();
    // $employee->getEmployeeData();
    ?>

    <?php
    $employee->printEmployeeData(Sessions::getID());
    ?>
    <div id="commentsContainer"></div>

</div>
    <!--Footer--> 
    <footer class="page-footer font-small mdb-color lighten-3"> 
                    
    <!--Copyright--> 
    <div class="footer-copyright py-3 text-center"> 
         © 2018 Copyright: 
        <a href="https://github.com/KowalikJakub/ioproject"> Inżynieria Oprogramowania - Projekt Oceny Pracodawców</a> 
    </div> 
    <!--/.Copyright--> 
    </footer> 
    <!--/.Footer--> 

        <!-- SCRIPTS -->
       
    <!-- JQuery -->
    <script type="text/javascript" src="../public/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../public/js/mdb.min.js"></script>
    
    <script type="text/javascript" src="getComments.js"></script>


            <?php
            $getComments = new searchEngine();
            echo '
            <script>         
            getComments('.json_encode($getComments->convertToJSON(Sessions::getID(),"employee")).');
            </script>
            ';?>
</body>
</html>