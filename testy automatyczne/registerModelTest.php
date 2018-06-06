<?php
	require_once 'register.php';
	class RegisterTest extends PHPUnit_Framework_TestCase{
		//testy procesu rejestracji
		
		
		//test tworzenia konta, brak możliwości porównania rezultatu
		/*public function testcreateAccount(){
			$login = 'login';
			$password = 'haslo'; 
			$email = 'email@gmail.com';
			$obj = new Register($login, $password, $email);
			$obj -> createAccount($login, $password, $email);
			echo 'test';
			$this->assertEquals();
			
		}*/
		
		public function testmatchPasswords(){
			$password1 = 'haslo';
			$password2 = '123';
			$this->assertEquals(1,matchPasswords($password1,$password2));
			$this->assertEquals(0,matchPasswords($password1,$password2));
		}
		
		public function testcheckPESEL(){
			$pesel = '91071314764';
			$this->assertEquals(1,checkPESEL());
		}
		
		public function testcheckLogin(){
			$login = 'login';
			$this->assertEquals($dbRegister, checkLogin($login));			
		}
		
		public function testcheckFirstRegiser(){
			$pesel = '91071314764';
			$this->assertEquals($dbFirstLogin, checkFirstRegiser());
		}
		
	    public function testcheckEmail(){
			$email = 'janpierwszy@gmail.com';
			$this->assertEquals($dbEmail, checkEmail($email));
		}
		
		
	}


?>