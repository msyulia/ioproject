<?php 

    class searchEngine extends dbConnection{

        public function search($nameEmployer){
            if(empty($nameEmployer)){
                echo 'Nie podałeś nazwy pracodawcy!';
            }else{
                $searchEmployer = $this->sendquery("SELECT * FROM pracodawcy WHERE nazwa_firmy='$nameEmployer'");            
                return $searchEmployer;
                                    
            }
        }

        private function getRating($nameEmployer){
            $getRates = $this->sendquery("SELECT * FROM oceny WHERE Pracodawca='$nameEmployer'");
            $getCount = $this->sendquery("SELECT COUNT(*) FROM oceny WHERE Pracodawca='$nameEmployer'");
            if($getCount['COUNT(*)'] == 1){
                return array($getRates);
            }
            return $getRates;
        }
        
        private function getComments($nameEmployer){
            $getComments = $this->sendquery("SELECT Komentarz,Pracownik FROM oceny WHERE Pracodawca='$nameEmployer'");
            return $getComments;
        }

        private function getCommentsAndRatings($variable){
            if(is_numeric($variable)){
                $getBoth = $this->sendquery("SELECT Komentarz,Pracownik,Kat1,Kat2,Kat3,Kat4,Kat5 FROM oceny WHERE Pracownik='$variable'");
                $getCount = $this->sendquery("SELECT COUNT(*) FROM oceny WHERE Pracownik='$variable'");
                if($getCount['COUNT(*)'] == 1){
                    return array($getBoth);
                }
                return $getBoth;
            }else{
                $getBoth = $this->sendquery("SELECT Komentarz,Pracownik,Kat1,Kat2,Kat3,Kat4,Kat5 FROM oceny WHERE Pracodawca='$variable'");
                $getCount = $this->sendquery("SELECT COUNT(*) FROM oceny WHERE Pracodawca='$variable'");
                if($getCount['COUNT(*)'] == 1){
                    return array($getBoth);
                }
                return $getBoth;
            }


        }
        private function endMark($nameEmployer,$katString){
            $localStorage = $this->getRating($nameEmployer);
            $sum = 0;
            if(!empty($localStorage)){
                foreach($localStorage as $item){
                    $sum = $sum + $item[$katString];
                    
                }
                return number_format($sum/count($localStorage),2);
            }
            return "Brak ocen!";
        }
        public function formatComments($nameEmployer){
            $Comments = $this->getComments($nameEmployer);
            echo '<ul>';
            foreach($Comments as $comment){
                echo '<li>'.$comment['Komentarz'].' Wystawil: '.$comment['Pracownik'].'</li>';
            }
            echo '</ul>';

        }

        //jezeli zero szukam id pracownika
        //jezeli 1 szukam id pracodawcy
        public function searchById($id){

                $getId =  $this->sendquery("SELECT nazwa_firmy FROM pracodawcy WHERE ID='$id'");   
                return $getId['nazwa_firmy'];

        }

        public function convertToJSON($id, $string){
            if($string == "employee"){
                $array = $this->getCommentsAndRatings($id);
            }
            if($string == "employer"){
            $array = $this->getCommentsAndRatings($this->searchById($id));
            }
            return $array;
        }



        public function formatEmployer($nameEmployer){
            $kat1 = $this->endMark($nameEmployer,'Kat1');
            $kat2 = $this->endMark($nameEmployer,'Kat2');
            $kat3 = $this->endMark($nameEmployer,'Kat3');
            $kat4 = $this->endMark($nameEmployer,'Kat4');
            $kat5 = $this->endMark($nameEmployer,'Kat5');

            echo '
            <table align="center" style="width:60%" class="table table-hover">
                <tr class="text-center">
                    <th>
                        Wynagrodzenie
                    </th>
                    <th>
                        Atmosfera
                    </th>
                    <th>
                        Benefity
                    </th>
                    <th>
                        Miejsce pracy
                    </th>
                    <th>
                        Możliwośći rozwoju
                    </th>
                </tr>
                <tr class="text-center">
                    <td>'.$kat1.'</td>
                    <td>'.$kat2.'</td>
                    <td>'.$kat3.'</td>
                    <td>'.$kat4.'</td>
                    <td>'.$kat5.'</td>
                </tr>
            </table>
            ';
           

        }

    }
?>