<?php
header('Content-type: text/html; charset=utf-8'); 

class Register extends dbConnection {
    private $imie;
    private $naziwsko;
    private $pesel;

    public function __construct($imie, $nazwisko, $pesel){
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->pesel = $pesel;
    }

    public function sprawdzWBazie(){
        if(empty($this->imie) || empty($this->nazwisko) || empty($this->pesel)){
            return 0;
        }else{
            $dbRegister = $this->sendquery("SELECT * FROM pracownicy WHERE Imie='$this->imie' AND Nazwisko='$this->nazwisko' AND PESEL='$this->pesel'");
            return $dbRegister;
        }
       return 0;
    }

    public function matchPasswords($password1,$password2){
        return $password1 == $password2 ? 1 : 0;
    }

    public function createAccount($login, $password,$email){
        $cr_account = $this->connect()->prepare("UPDATE pracownicy SET login=?,password=?,firstlogin=?,email=? WHERE PESEL=?");
        $cr_account->bind_param('ssiss',$login,password_hash($password, PASSWORD_DEFAULT),$i = 0,$email,$this->pesel);
        $cr_account->execute();
        $cr_account->close();

    }
    public function checkLogin($login){
        $dbRegister = $this->sendquery("SELECT * FROM pracownicy WHERE login='$login'");
        return $dbRegister;
    }
    public function checkFirstRegiser(){
        $dbFirstLogin = $this->sendquery("SELECT * FROM pracownicy WHERE PESEL='$this->pesel' AND firstlogin=0");
        return $dbFirstLogin;
    }
}

?>