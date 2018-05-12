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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../public/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../public/css/style.css" media="only screen and (min-width: 481px)" rel="stylesheet">
    <link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="../public/css/mobile-style.css" />
</head>
</head>
<body>
    
    <h1>Panel użytkownika</h1>
    <?php 
    $employee = new employee();
    // $employee->getEmployeeData();
    ?>

    <?php
    $employee->printEmployeeData();
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
            getComments('.json_encode($getComments->convertToJSON(3,"employee")).');
            </script>
            ';?>
</body>
</html>