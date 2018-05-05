<?php 
    require "../application/application.php";
    Sessions::startSession();

?>

<h1>Top 100 pracodawców </h1>
<?php

    $pracodawcy = new TopEmployers();
    $pracodawcy->  calcAverage();
?>