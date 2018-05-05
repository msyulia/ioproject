<?php 

    require "../application/application.php";
    Sessions::startSession();

?>
<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Logowanie</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="../public/css/mdb.min.css" rel="stylesheet">
        <!-- Custom styles -->
        <link href="../public/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
            <a class="navbar-brand" href="../index.php"> <img src="../public/img/logo.png" class="logo-pracodawcy" alt="logo">&nbsp;&nbsp;&nbsp;Baza ocen pracodawców</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="top100.php">Top 100</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nas</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/.Navbar -->
        <div class="container">
            <div class="singinform">
            <?php 
            if(isset($_GET['form'])){
                if($_GET['form'] == "incorrect"){
                    echo '<div class="alert alert-danger">
                    <strong>Błędny login lub hasło!</strong>
                    </div>';
                }             
            }
            ?>
                <!-- Material form login -->
                <?php
                    if(Sessions::isLogged()){
                       // echo Sessions::getLogin();
                ?>
                <form action="../application/controllers/logout.php" method="POST">
                    <div class="text-center mt-4">
                       <button class="btn btn-default" type="submit" name="submit"><a>Logout</a></button>            
                    </div>
              
                </form>
                <?php
                }else{
                ?>
                <form action="../application/controllers/login.php" method="POST">
                    <p class="h4 text-center mb-4">Logowanie</p>

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="materialFormLoginNicknameEx" class="form-control" name="login">
                        <label for="materialFormLoginNicknameEx">Nazwa użytkownika</label>
                    </div>

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-key prefix grey-text"></i>
                        <input type="password" id="materialFormLoginPasswordEx" class="form-control" name="password">
                        <label for="materialFormLoginPasswordEx">Hasło</label>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-default" type="submit" name="submit">Zaloguj</button>
                    </div>
                </form>
                <?php
                }
                ?>
                <!-- Material form login -->
            </div>

            <br>
            <?php
                    if(!Sessions::isLogged()){
                       // echo Sessions::getLogin();
            ?>
            <!--Form-->
            <div class="singupform">
                <!-- Material form register -->
                <form id="formularz" action="../application/controllers/register.php" method="post" autocomplete="off" onsubmit="return Send()">
                    <p class="h4 text-center mb-4">Rejestracja</p>

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input name="login" type="text" id="materialFormRegisterNicknameEx" class="form-control">
                        <label for="materialFormRegisterNicknameEx">Nazwa użytkownika</label>
                        <p id="wrong-nickname" hidden>Nazwa użytkownika powinna składać się z 4 - 20 liter lub cyfr </p>
                    </div>

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user-circle prefix grey-text"></i>
                        <input name="imie" type="text" id="materialFormRegisterNameEx" class="form-control">
                        <label for="materialFormRegisterNameEx">Imię</label>
                    </div>

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user-circle prefix grey-text"></i>
                        <input name="nazwisko" type="text" id="materialFormRegisterSurNameEx" class="form-control">
                        <label for="materialFormRegisterSurNameEx">Nazwisko</label>
                    </div>

                    <!-- Material input pesel -->
                    <div class="md-form">
                        <i class="fa fa-id-card prefix grey-text"></i>
                        <input name="pesel" type="text" id="materialFormPeselEx" class="form-control">
                        <label for="materialFormPeselEx">Numer PESEL</label>
                    </div>

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" id="materialFormRegisterEmailEx" class="form-control">
                        <label for="materialFormRegisterEmailEx">E-mail</label>
                    </div>

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                        <input type="email" id="materialFormRegisterConfirmEmailEx" class="form-control">
                        <label for="materialFormRegisterConfirmEmailEx">Potwierdź e-mail</label>
                    </div>

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-key prefix grey-text"></i>
                        <input name="pwd1" type="password" id="materialFormRegisterPasswordEx" class="form-control">
                        <label for="materialFormRegisterPasswordEx">Hasło</label>
                        <p id="wrong-pswd" hidden>Hasło musi się składać przynajmniej z 8 liter lub cyfr</p>
                    </div>

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                        <input name="pwd2" type="password" id="materialFormRegisterConfirmPasswordEx" class="form-control">
                        <label for="materialFormRegisterConfirmPasswordEx">Potwierdź hasło</label>
                    </div>

                    <div class="text-center mt-4">
                    <button class="btn btn-default" type="submit" name="submit">Zarejestruj</button>
                    </div>
                </form>
                <?php 
                } 
                ?>
                <!-- Material form register -->
                <!--/.Form-->
            </div>
        </div>


        <!--Footer-->
    <footer class="page-footer font-small mdb-color lighten-3 pt-1 mt-1">

        <!--Footer Links-->
        <div class="container text-center text-md-left">
            <div class="row">

                <!--Dodać tu coś-->

            </div>
        </div>
        <!--/.Footer Links-->
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
        <!-- Custom JavaScript -->
        <script type="text/javascript" src="../public/js/validation.js"></script>
    </body>

</html>
