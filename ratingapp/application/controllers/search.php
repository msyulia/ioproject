<?php
    require "../application.php";

    $nameEmployer = $_GET['searchEmployer'];
    
    $search = new searchEngine();
    if($search->search($nameEmployer)){
        echo 'Dane pracodawcy: '.$nameEmployer;
        $search->formatEmployer($nameEmployer);
        echo 'Komentarze<br/>';
        $search->formatComments($nameEmployer);
    }
?>