<?php
header('Content-type: text/html; charset=utf-8'); 

/**
 * Klasa zawierająca funckje odpowiadające za rejestracje użytkownika
 * 
 * @param var $imie imie użytkownika
 * @param var $nazwisko nazwisko użytkownika
 * @param var $pesel pesel użytkownika
 */
class Register extends dbConnection {
    private $imie;
    private $naziwsko;
    private $pesel;

    /**
     * Konstruktor tworzący nowy obiekt z wprowadzonymi danymi
     */
    public function __construct($imie, $nazwisko, $pesel){
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->pesel = $pesel;
    }

    /**
     * Funkcja sprawdzająca czy każde pole ma wartość i czy w bazie danych nie istnieje juz taki użytkownik
     */
    public function sprawdzWBazie(){
        if(empty($this->imie) || empty($this->nazwisko) || empty($this->pesel)){
            return 0;
        }else{
            $dbRegister = $this->sendquery("SELECT * FROM pracownicy WHERE Imie='$this->imie' AND Nazwisko='$this->nazwisko' AND PESEL='$this->pesel'");
            return $dbRegister;
        }
       return 0;
    }

    /**
     * Funkcja sprawdzająca czy oba podane hasła są takie same
     * 
     * @param var $password1 pierwsze z wprowadzonych haseł
     * @param var $password2 drugie z wprowadzonych haseł
     * 
     * @return var wartość true jeśli hasła są takie same lub false w innym wypadku
     */
    public function matchPasswords($password1,$password2){
        return $password1 == $password2 ? 1 : 0;
    }

    /**
     * Funkcja rejestrująca nowego użytkownika w bazie danych
     * 
     * @param var $login login użytkownika
     * @param var $password hasło użytkownika
     */
    public function createAccount($login, $password,$email){
        $cr_account = $this->connect()->prepare("UPDATE pracownicy SET login=?,password=?,firstlogin=?,email=? WHERE PESEL=?");
        $cr_account->bind_param('ssiss',$login,password_hash($password, PASSWORD_DEFAULT),$i = 0,$email,$this->pesel);
        $cr_account->execute();
        $cr_account->close();

    }
        
    /**
     * Funkcja sprawdzająca czy w bazie danych występuje obiekt o podanym loginie
     * 
     * @param var $login login wysyłany do sprawdzenia w bazie danych
     * 
     * @return var wartość true jesli występuje taki login bazie danych, w innym wypadku wartość false
     */
    public function checkLogin($login){
        $dbRegister = $this->sendquery("SELECT * FROM pracownicy WHERE login='$login'");
        return $dbRegister;
    }
        
    /**
     * Funkcja zwracająca date pierwszego logowania
     * 
     * @return var $dbFirstLogin data pierwszego logowania
     */
    public function checkFirstRegiser(){
        $dbFirstLogin = $this->sendquery("SELECT * FROM pracownicy WHERE PESEL='$this->pesel' AND firstlogin=0");
        return $dbFirstLogin;
    }
    public function checkPESEL(){
        $dbCheckPesel = $this->sendquery("SELECT COUNT(*) FROM pracownicy WHERE PESEL='$this->pesel'");
       if($dbCheckPesel['COUNT(*)'] == 1){
           return 1;
       }
       else{
           return 0;
       }
    }

    /**
     * Funkcja sprawdzająca czy wystepuje podany email w bazie danych
     * 
     * @param var $email szukany email
     * 
     * @return var $dbEmail znaleziony mail lub informacja i jego braku
     */
    public function checkEmail($email){
        $dbEmail= $this->sendquery("SELECT * FROM pracownicy WHERE email='$email'");
        return $dbEmail;
    }
}

?>