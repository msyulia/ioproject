<?php 
    require "application.php";
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
            Zalogowano!
            <?php 
                echo Sessions::getImie();
                echo Sessions::getNazwisko();
            ?>
        </div>
    </body>
</html>