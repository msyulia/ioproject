<?PHP
require "../application.php";



if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $pesel = $_POST['pesel'];
    $password1 = $_POST['pwd1'];
    $password2 = $_POST['pwd2'];
    $email = $_POST['email'];
    if(empty($login) || empty($imie) || empty($nazwisko) || empty($pesel) || empty($password1) || empty($password2) || empty($email)){
        echo 'Uzupełnij wszystkie pola!';
    }else{
        $register = new Register($imie,$nazwisko,$pesel);
        if($register->sprawdzWBazie()){
            if($register->checkFirstRegiser()){
                echo 'Jesteś już zarejestrowany!';
                die();
            }
            if($register->checkLogin($login)){
                echo 'Login jest zajęty!';
                die();
            }
            if($register->matchPasswords($password1,$password2)){

                $register->createAccount($login,$password1,$email);
                header("Location: ../../index.php?register=success");
            }else{
                echo 'Hasła nie są zgodne!';
                die();
            }


        }else{
            echo 'Brak wpsiu w bazie danych!<br/>Sprawdź poprawnośc wprowadzonych danych';
            die();
        } 
    }
}else{
   header("Location: ../../views/login.php");
}

?>