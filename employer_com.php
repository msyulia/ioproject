<?php 
    require "../application/application.php";
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
        <img src="../public/img/logo.png" class="logo-pracodawcy" alt="logo">Baza ocen pracodawców</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline">
                        <div class="md-form mt-0">
                            <form action="../../application/controllers/search.php" method="GET">
                                <input name="searchEmployer" class="form-control mr-sm-2" type="text" placeholder="Wyszukaj pracodawców..." aria-label="Search">
                            </form>
                        </div>
                    </form>
                </li>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <?php
                        if(Sessions::isLogged()){
							
						///
						/// Sprawdza czy klient jest już zalogowany. Jeśli tak może sprawdzić swoje konto, wystawić oceny lub się wylogować.
						///		

                    ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?php  echo Sessions::getLogin();?> </a>
   
                    <!--Jeśli user jest zalogowany -->
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="konto.php">Moje konto</a>
                        <a class="dropdown-item" href="oceny.php">Wystaw oceny</a>
                        <a class="dropdown-item" href="../application/controllers/logout.php">Wyloguj</a>
                    </div>
                    <!-- else -->
                    <?php
                    }else{
						
					///
					/// Jeśli klient nie zalogowany przenosi go do strony logowania
					///
					
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
            </ul>
        </div>
    </nav>
    <!--/.Navbar -->

    <div class="container">
        <?php 
		
		///
		/// Wyszukiwanie pracodawcy
		///
		
            $temp = new searchEngine();
            if(isset($_GET['id'])){
            $empName = $temp->searchById($_GET['id']);
            $empDesc = $temp->search($empName);
            $idEmp = $_GET['id'];
            }
            if(isset($_GET['searchEmployer'])){
            $empName = $_GET['searchEmployer'];
            $empDesc = $temp->search($empName);
            $idEmp = $empDesc['ID'];
            }

            if (!empty($empName) && !empty($idEmp)) {
            echo 
            '<div class="card card-cascade" style="width: 50%; margin: 0 auto;">
                <div class="view overlay" style="margin: 0 auto;">
                    <img class="img-thumbnail" src="../public/img/no-user-image.png" alt="Profile picture">
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title"><strong>'.$empDesc['nazwa_firmy'].'</strong></h4>
                    <h5 class="blue-text pb-2"><strong>Profil</strong></h5>
                    <p class="card-text">'.$empDesc['opis'].'</p>
                </div>
            </div>';

            $temp->formatEmployer($empName);
			
			///
			/// Sprawdzanie komentarzy
			///
        ?>
        <h4 class="text-center">Komentarze</h4>
        <div id="commentsContainer">

        </div>
        <?php
    } else {
        echo 
		
		///
		/// Komunikaty o nie znalezieniu pracodawcy którego szukał klient.
		///
		
        '<div class="card card-cascade" style="width: 50%; margin: 0 auto;">
            <div class="card-body text-center">
                <h5 class="blue-text pb-2"><strong>Nie znaleziono pracodawcy</strong></h5>
                <p class="card-text">Być może twój pracodawca nie figuruje jeszcze w naszej bazie danych</p>
            </div>
        </div>';

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

        <script src="getComments.js"></script>
                
    <?php 
            $getComments = new searchEngine();
            echo '
            <script>         
            getComments('.json_encode($getComments->convertToJSON($idEmp,"employer")).');
            </script>
            ';
   
    ?>
</body>

</html>