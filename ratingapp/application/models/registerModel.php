<?php
header('Content-type: text/html; charset=utf-8'); 

class Register extends dbConnection {


    public static function sprawdzWBazie($imie,$nazwisko,$pesel){
        if(empty($imie) || empty($nazwisko) || empty($pesel)){
            return 0;
        }else{
            $dbRegister = dbConnection::sendquery("SELECT * FROM pracownicy WHERE Imie='$imie' AND Nazwisko='$nazwisko' AND PESEL='$pesel'");
            $check_result = $dbRegister->num_rows;
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
        $check_result = $dbRegister->num_rows;
        if($check_result > 0){
            return 1;
        }
        return 0;
    }
    public static function checkFirstRegiser($pesel){
        $dbFirstLogin = dbConnection::sendquery("SELECT * FROM pracownicy WHERE PESEL='$pesel' AND firstlogin=0");
        $check_result = $dbFirstLogin->num_rows;
        if($check_result > 0){
            return 1;
        }
        return 0;
    }
}

?>