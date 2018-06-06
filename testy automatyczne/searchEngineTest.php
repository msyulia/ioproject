<?php 
    require_once 'searchEngine.php';
    class searchEngineTest extends PHPUnit_Framework_TestCase{
        // test wyszukiwania po nazwie
        public function testSearch() {
            $searchEngine = new searchEngine;
            
            $param1 = $searchEngine->search("Żabka");
            $this->assertEquals($param1['nazwa_firmy'], "ŻABKA");
            $param2 = $searchEngine->search("Zabka");
            $this->assertEquals($param2['nazwa_firmy'], "ŻABKA");
            $param3 = $searchEngine->search("zabka");
            $this->assertEquals($param3['nazwa_firmy'], "ŻABKA");
            $param4 = $searchEngine->search("myjNIA");
            $this->assertEquals($param4['nazwa_firmy'], "MYJNIA");
            $param5 = $searchEngine->search("STACJA PALIW");
            $this->assertEquals($param5['nazwa_firmy'], "STACJA PALIW");
            $param6 = $searchEngine->search("piekarnia");
            $this->assertEquals($param6['nazwa_firmy'], "PIEKARNIA");
        }

        //test wyszukiwania po id
        public function testSearchById() {
            $searchEngine = new SearchEngine;

            $param1 = $searchEngine->searchById(1);
            $this->assertEquals($param1, "ŻABKA");
            $param1 = $searchEngine->searchById(2);
            $this->assertEquals($param1, "MYJNIA");
            $param1 = $searchEngine->searchById(3);
            $this->assertEquals($param1, "STACJA PALIW");
            $param1 = $searchEngine->searchById(4);
            $this->assertEquals($param1, "PIEKARNIA");
        }
    }
?>