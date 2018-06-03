<?php
    require "../application/application.php";
    Sessions::startSession();

    $emp = new searchEngine();


    echo ' 
    <script>
        console.log('.$emp->getDataChart("stacja paliw").');
    </script>
    '
?>

