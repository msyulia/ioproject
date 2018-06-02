<?php 
    require "./application/application.php";
    Sessions::startSession();
?>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Strona główna</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="public/css/mdb.min.css" rel="stylesheet">
    <!-- Semantic-UI-->
    <link href="public/css/semantic.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="public/css/style.css" media="only screen and (min-width: 481px)" rel="stylesheet">
    <link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="public/css/mobile-style.css" />
</head>

<body>

    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">

        <a class="navbar-brand" href="index.php">
            <img src="public/img/logo.png" class="logo-pracodawcy" alt="logo">
            Baza ocen pracodawców</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="views/top100.php">Top 100</a>
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
                        <a class="dropdown-item" href="views/konto.php">Moje konto</a>
                        <a class="dropdown-item" href="views/oceny.php">Wystaw oceny</a>
                        <a class="dropdown-item" href="./application/controllers/logout.php">Wyloguj</a>
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


    <div class="container">
        <img src="public/img/logo-p.png" class="p-logo" alt="Portal do oceny pracodawców">
        <?php
            if(isset( $_SESSION['noEmployerFound']) &&  $_SESSION['noEmployerFound'] == true) {
                unset($_SESSION['noEmployerFound']);
                echo '<div class="card card-cascade" id="noFound-card" style="width: 50%; margin: 0 auto;">
                <div class="card-body text-center">
                    <h5 class="red-text pb-2"><strong>Nie znaleziono pracodawcy spełniającego podane kryteria</strong></h5>
                    <button type="button" class="close" aria-label="Close" 
                        style="position: absolute; right: 0; top: 0; margin: 5px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="card-text">Być może twój pracodawca nie figuruje jeszcze w naszej bazie danych</p>
                </div>
                </div>';

            }

        ?>
        <div class="search-container">
            <!-- tutaj modal albo coś ale ostylować to -->
            <!-- modale x jakis dodać żeby dało się zamknąć to albo żeby znikało-->
            <!-- najlepiej jak by wpadł jakiś skrypt javascript -->
            <!--  -->
            <?php 
            if(isset($_SESSION['loginSuccess'])) {
                echo '<div class="alert alert-success">
                <strong>Pomyślnie zalogowano!</strong>
              </div>';
                unset($_SESSION['loginSuccess']);
            }else if(isset($_SESSION['loginLogout'])) {
                echo '<div class="alert alert-success">
                <strong>Wylogowano!</strong>
              </div>';
                unset($_SESSION['loginLogout']);
            }
            ?>
      
            <div class="md-form mt-0">

                <form action="./views/employer.php" method="GET">
                    <input name="searchEmployer" class="form-control mr-sm-2" type="text" placeholder="Wyszukaj pracodawców..." aria-label="Search">
                    <div id="toSend"></div>
                    <button class="ui primary button" id="searchButton">Szukaj</button>
                    <div class="ui toggle checkbox">
                        <input type="checkbox" id="checkedFiltry" name="public">
                        <label class="grey-text">Pokaż filtry</label>
                    </div>
                 </form>
            </div>
            <div class="search-filtry" style="margin-bottom: 100px">
                <div class="card">
                    <div class="card-body">
                        <div class="row-filter">
                            <p class="card-text">Wynagrodzenia</p>
                            <div class="ui star rating" data-id="wynagrodzenia-rating" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Atmosfera</p>
                            <div class="ui star rating" data-id="atmosfera-rating" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Benefity</p>
                            <div class="ui star rating" data-id="benefity-rating" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Miejsce pracy</p>
                            <div class="ui star rating" data-id="miejsce-rating" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Możliwości rozwoju</p>
                            <div class="ui star rating" data-id="mozliwosci-rating" data-rating="3" data-max-rating="5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <script src="public/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script src="public/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="public/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script src="public/js/mdb.min.js"></script>
        <!-- Semantic JavaScript -->
        <script src="public/js/semantic.min.js"></script>
        <!-- Gwiazdki -->
        <script>
            $("#searchButton").click(function(){
                if( $("#checkedFiltry").is(':checked')){
                    var nameOfPossibleRates = ["salaryRate", "atmosphereRate", "benefitsRate", "workplaceRate", "possibilitiesRate"];
                    var rates = $('.ui.star.rating').rating('get rating'); 
                    for (var i = 0; i < rates.length; i++) { 
                        document.getElementById("toSend").innerHTML+="<input type='hidden' name='" + nameOfPossibleRates[i] +"' value='" + rates[i] + "'/>"
                    }
                }
            });

            $(".close").click(function(){
                $("#noFound-card").fadeToggle( "fast");
            });

            $(function () {
                $(".search-filtry").toggle();
                $("#checkedFiltry").prop( "checked", false );
                $("#checkedFiltry").click(function () { $(".search-filtry").toggle(this.checked) });
    
                $(".ui.rating").rating("setting", "onRate", function (value) {
                    var txt = $(this).data("id") + " wartość: " + value;
                    console.log(txt);
                });
            });
    </script>
    <!-- SCRIPTS -->
</body>

</html>