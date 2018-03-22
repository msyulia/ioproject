<?php 
    require "./application/application.php";
    Sessions::startSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <div>
            <!-- tu login -->
            <br/> Zwykłe logowanie
<<<<<<< HEAD
            <?php
            if(Sessions::isLogged()){
                echo Sessions::getLogin();
            ?>
                            <form action="./application/controllers/logout.php" method="POST">
                                <button class="btn-brown-bg" type="submit" name="submit"><a>Logout</a></button>
                            </form>
            <?php
            }else{
            ?>
                <form action="./application/controllers/login.php" method="POST">
                <input type="text" name="login" placeholder="login">
                <input type="password" name="password" placeholder="password">
                <button  type="submit" name="submit">Login</button>
                </form>
            <?php
            }
            ?>
            <!-- tu pierwsze logowanie -->
            <br>Pierwsze logowanie. np:
            <form action="./application/controllers/login.php" method="POST">
=======
            <form action="controllers/login.php" method="POST">
                <input type="text" name="login" placeholder="login">
                <input type="password" name="login" placeholder="password">
                <button>Login</button>
            </form>

            <!-- tu pierwsze logowanie -->
            <br>Pierwsze logowanie. np:
            <form action="controllers/login.php" method="POST">
>>>>>>> 25bf217b3f071ec711088162e8489a2c356d8900
                <input type="text" name="login" placeholder="Imię">
                <input type="text" name="nazwisko" placeholder="Nazwisko">
                <input type="text" name="pesel" placeholder="PESEL">
                <input type="password" name="PWD1" placeholder="Hasło">
                <input type="password" name="PWD2" placeholder="Powtórz hasło">
                <button>Rejestracja</button>
            </form>
<<<<<<< HEAD

        
        </div>
    </body>
</html>
=======
        </div>
    </body>
</html>

>>>>>>> 25bf217b3f071ec711088162e8489a2c356d8900
