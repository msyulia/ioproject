<?PHP
require "../application.php";
Sessions::startSession();


if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $pesel = $_POST['pesel'];
    $password1 = $_POST['pwd1'];
    $password2 = $_POST['pwd2'];
    $email = $_POST['email'];

    if(empty($login) || empty($imie) || empty($nazwisko) || empty($pesel) || empty($password1) || empty($password2) || empty($email)){
        $_SESSION['noRegisterData'] = true;
        header("Location: ../../views/login.php");
        die();
    }else{
        $register = new Register($imie,$nazwisko,$pesel);
        //if($register->sprawdzWBazie()){

            //sprawdz PESEL
            if(!$register->checkPESEL()){
                $_SESSION['isPESELOccupied'] = true;
                header("Location: ../../views/login.php");
                die();
            }else{
                if($register->checkFirstRegiser()){
                    $_SESSION['isAlreadyRegistered'] = true;
                    header("Location: ../../views/login.php");
                    die();
                }else{
                    if($register->checkLogin($login)){
                        $_SESSION['isLoginOccupied'] = true;
                        header("Location: ../../views/login.php");
                        die();
                    }else{
                        if($register->sprawdzWBazie()){
                            if($register->matchPasswords($password1,$password2)){

                                $register->createAccount($login,$password1,$email);
                                header("Location: ../../index.php?register=success");
                            }else{
                                $_SESSION['isPasswordsCorrect'] = true;
                                header("Location: ../../views/login.php");
                                die();
                            }
                        }else{
                            $_SESSION['badInputData'] = true;                        
                            header("Location: ../../views/login.php");
                            die();
                        }

                    }
                }
            }
            //






        // }else{
        //     $_SESSION['noRecordInDatabase'] = true;
        //     header("Location: ../../views/login.php");
        //     die();
        // } 
    }
}else{
   header("Location: ../../views/login.php");
}

?>