<?php 
include "loginModel.php";
//require 'sessions.php';
//Sessions::startSession();
    class LoginTest extends PHPUnit_Framework_TestCase{
        // test logowania
        public function testLogin() {
            $_POST['submit']='submit';
			$obj = new Login('jNowak','jnowak12345678');
			$obj->login();
			echo 'test';
			$this->assertEquals(1,$_SESSION['loginSuccess']);
			
			
			$obj2 = new Login('jNowak','niepoprawnehasło');
			$obj2->login();
			$this->assertEquals(0,$_SESSION['loginSuccess']);
        }
		
		public function testgetLogin()
		{
			$obj = new Login('jNowak','jnowak12345678');
			$this->assertEquals('jNowak',$obj->getLogin());
		}
		public function testgetPwd()
		{
			$obj = new Login('jNowak','jnowak12345678');
			$this->assertEquals('jnowak12345678',$obj->getPwd());
		}
		
		public function testsetLogin()
		{
			$obj = new Login('jNowak','jnowak12345678');
			$obj->setLogin('Jan');
			$this->assertEquals('Jan',$obj->getLogin());
		}
		
      	public function testsetPwd()
		{
			$obj = new Login('jNowak','jnowak12345678');
			$obj -> setPwd('haslo');
			$this->assertEquals('haslo',$obj->getPwd());
		}
		
		public function testmatchPassword()
		{
			$pwd1='haslo';
			$pwd2='123';
			$this->assertEquals(1,matchPassword($pwd1,$pwd1));
			$this->assertEquals(0,matchPassword($pwd1,$pwd2));
		}
    }
?>