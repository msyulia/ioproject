<?PHP
require "../application.php";




$login = $_POST['login'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$pesel = $_POST['pesel'];
$password1 = $_POST['pwd1'];
$password2 = $_POST['pwd2'];

if(empty($login) || empty($imie) || empty($nazwisko) || empty($pesel) || empty($password1) || empty($password2)){
    echo 'Uzupełnij wszystkie pola!';
}else{
    if(Register::sprawdzWBazie($imie,$nazwisko,$pesel)){
        if(Register::checkFirstRegiser($pesel)){
            echo 'Jesteś już zarejestrowany!';
            die();
        }
        if(Register::checkLogin($login)){
            echo 'Login jest zajęty!';
            die();
        }
        if(Register::matchPasswords($password1,$password2)){

            Register::createAccount($login,$password1,$pesel);
            header("Location: ../../index.php?sucess");
        }else{
            echo 'Hasła nie są zgodne!';
            die();
        }


    }else{
        echo 'Brak wpsiu w bazie danych!<br/>Sprawdź poprawnośc wprowadzonych danych';
        die();
    } 
}
?>