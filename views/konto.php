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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Strona główna</title>

</head>
</head>
<body>
    
    <h1>Panel użytkownika</h1>
    <?php 
    $employee = new employee();
    // $employee->getEmployeeData();
    ?>

    <?php
    echo Sessions::getID();
    $employee->printEmployeeData(Sessions::getID());
    ?>
    <div id="commentsContainer"></div>




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
            getComments('.json_encode($getComments->convertToJSON(16,"employee")).');
            </script>
            ';?>
</body>
</html>