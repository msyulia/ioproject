<?php 
    require "./application/application.php";


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
        <form action="../ratingapp/application/controllers/login.php" method="POST">
            <input type="text" name="PESEL" placeholder="PESEL">
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="pwd" placeholder="Password">
            <input type="submit" name="register" placeholder="Register">
        </form>
    </div>
</body>
</html>