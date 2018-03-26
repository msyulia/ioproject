<?PHP
require "../application.php";

header('Content-type: text/html; charset=utf-8'); 

class Register extends dbConnection {


    public static function sprawdzWBazie($imie,$nazwisko,$pesel){
        if(empty($imie) || empty($nazwisko) || empty($pesel)){
            return 0;
        }else{
            $dbRegister = dbConnection::sendquery("SELECT * FROM pracownicy WHERE Imie='$imie' AND Nazwisko='$nazwisko' AND PESEL='$pesel'");
            $check_result = mysqli_num_rows($dbRegister);
            if($check_result > 0){
                return 1;
            }
        }
        return 0;
    }

    public static function matchPasswords($password1,$password2){
        return $password1 == $password2 ? 1 : 0;
    }

    public static function createAccount($login, $password,$pesel){
        $cr_account = dbConnection::getConnection()->prepare("UPDATE pracownicy SET login=?,password=?,firstlogin=? WHERE PESEL=?");
        $cr_account->bind_param('ssis',$login,$password,$i = 0,$pesel);
        $cr_account->execute();
        $cr_account->close();

    }
    public static function checkLogin($login){
        $dbRegister = dbConnection::sendquery("SELECT * FROM pracownicy WHERE login='$login'");
        $check_result = mysqli_num_rows($dbRegister);
        if($check_result > 0){
            return 1;
        }
        return 0;
    }
    public static function checkFirstRegiser($pesel){
        $dbFirstLogin = dbConnection::sendquery("SELECT * FROM pracownicy WHERE PESEL='$pesel' AND firstlogin=0");
        $check_result = mysqli_num_rows($dbFirstLogin);
        if($check_result > 0){
            return 1;
        }
        return 0;
    }
}


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