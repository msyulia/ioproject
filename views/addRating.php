<?php
    require "../application/application.php";
    Sessions::startSession();
    if(Sessions::isLogged()){

        ?>
        Wystawiasz ocenę dla <?php echo $_POST['pracodawca'];
        $_SESSION['pracodawca'] = $_POST['pracodawca'];
        ?>
        <form action="../application/controllers/addRating.php" method="POST">
            <input type="number" placeholder="ocena 1" name="kat1"><br/>
            <input type="number" placeholder="ocena 2" name="kat2"><br/>
            <input type="number" placeholder="ocena 3" name="kat3"><br/>
            <input type="number" placeholder="ocena 4" name="kat4"><br/>
            <input type="number" placeholder="ocena 5" name="kat5"><br/>
            <textarea name="komentarz" placeholder="Please enter your message"></textarea><br/>
            <button type="submit" name="submit">Dodaj</button>
        </form>
        <?php
    }else{
        echo 'Nie jesteś zalogowany!';
    }
?>

