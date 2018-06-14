<?php
    require_once 'index.php';
    class pageAdress extends PHPUnit_Framework_TestCase{
        public function testPageAdress()
        {

            header("LOCATION: http://localhost/IO/ioproject/index.php");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/index.php');

            
            header("http://localhost/IO/ioproject/views/login.php");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/views/login.php');

            header("http://localhost/IO/ioproject/views/login.php");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/views/login.php');


            header("http://localhost/IO/ioproject/views/employer.php?id=1");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/views/employer.php?id=1');

            header("http://localhost/IO/ioproject/views/top100.php");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/views/top100.php');


            header("http://localhost/IO/ioproject/application/controllers/login.php");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/views/login.php');

            header("http://localhost/IO/ioproject/application/controllers/register.php");
            $currentURL = $this->parameters['browserUrl'];
            $this ->assertEquals($currentURL, 'http://localhost/IO/ioproject/views/login.php');



        }

        public function getBrowserUrl()
        {
            if (isset($this->parameters['browserUrl']))    
            {
                return $this->parameters['browserUrl'];
            }
            return '';
        }



    }

 