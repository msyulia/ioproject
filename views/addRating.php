<?php
    require "../application/application.php";
    Sessions::startSession();
    if(Sessions::isLogged()){
        if(isset($_POST['pracodawca'])){       
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
    <img src="../public/img/logo.png" class="logo-pracodawcy" alt="logo">
    Baza ocen pracodawców</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="top100.php">Top 100</a>
        </li>
        <li class="nav-item">
            <form class="form-inline" action="employer.php" method="GET"> 
                <div class="md-form mt-0">
                    <input name="searchEmployer" class="form-control mr-sm-2" type="text" placeholder="Wyszukaj pracodawców" aria-label="Search" style="padding-bottom: 0">
                </div>
            </form>
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
                <a class="dropdown-item" href="login.php">Zaloguj się</a>
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
    <span class="badge cyan">Wystawiasz ocenę dla 
    <?php echo $_POST['pracodawca'];
        $_SESSION['pracodawca'] = $_POST['pracodawca'];
    ?>
    </span>
        <form action="../application/controllers/addRating.php" method="POST" style="margin-bottom: 100px; font-size: 0.8rem;">
            <input type="number" placeholder="ocena 1" id="kat1" name="kat1" hidden>
            <input type="number" placeholder="ocena 2" id="kat2" name="kat2" hidden>
            <input type="number" placeholder="ocena 3" id="kat3" name="kat3" hidden>
            <input type="number" placeholder="ocena 4" id="kat4" name="kat4" hidden>
            <input type="number" placeholder="ocena 5" id="kat5" name="kat5" hidden>
        <div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="row-filter">
                <p class="card-text">Wynagrodzenia</p>
                <div class="ui star rating" data-id="kat1" data-rating="0" data-max-rating="5"></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row-filter">
                <p class="card-text">Atmosfera</p>
                <div class="ui star rating" data-id="kat2" data-rating="0" data-max-rating="5"></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row-filter">
                <p class="card-text">Benefity</p>
                <div class="ui star rating" data-id="kat3" data-rating="0" data-max-rating="5"></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row-filter">
                <p class="card-text">Miejsce pracy</p>
                <div class="ui star rating" data-id="kat4" data-rating="0" data-max-rating="5"></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row-filter">
                <p class="card-text">Możliwości rozwoju</p>
                <div class="ui star rating" data-id="kat5" data-rating="0" data-max-rating="5"></div>
            </div>
        </li>
        <li class="list-group-item">
            
            <div class="form-group shadow-textarea">
                <label for="exampleFormControlTextarea6" style="padding: 15px 0;">Twoja opinia</label>
                <textarea name="komentarz" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Napisz coś o swoim pracodawcy..."></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" 
            style="
                width: 100%;
                width: -moz-available;    
                width: -webkit-fill-available;
                width: fill-available;"
            >Dodaj</button>
            
        </li>
    </ul>
</div>
            
            
        </form>
        <?php
        }else{
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
?>
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
    <script src="../public/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script src="../public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script src="../public/js/mdb.min.js"></script>
    <!-- Semantic JavaScript -->
    <script src="../public/js/semantic.min.js"></script>
<!-- Gwiazdki -->
<script>
        $(function () {
            $(".ui.rating").rating("setting", "onRate", function (value) {
                var id = $(this).data("id");
                switch(id) 
                {
                    case "kat1":
                        $("#kat1").val(value);
                        break;
                    case "kat2":
                        $("#kat2").val(value);
                        break;
                    case "kat3":
                        $("#kat3").val(value);
                        break;
                    case "kat4":
                        $("#kat4").val(value);
                        break;
                    case "kat5":
                        $("#kat5").val(value);
                        break;
                }
                
            });
        });
</script>
</body>

</html>

