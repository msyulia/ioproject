<?php 
    require_once 'reviewsAndComments.php';
    class reviewsAndCommentsTest extends PHPUnit_Framework_TestCase{
        // test sprawdzania pustych pól
        public function testCheckEmptyFields() {
            $reviewsAndComments = new reviewsAndComments;
            $reviewsAndComments->pracodawca = "ŻABKA";
            $reviewsAndComments->pracownik = "Nowak";
            $reviewsAndComments->kat1 = 1;
            $reviewsAndComments->kat2 = 2;
            $reviewsAndComments->kat3 = 3;
            $reviewsAndComments->kat4 = 4;
            $reviewsAndComments->kat5 = 6;
            $reviewsAndComments->komentarz = "";

            $param1 = $reviewsAndComments->checkEmptyFields();
            $this->assertEquals($param1, 1);
        }
    }
?>