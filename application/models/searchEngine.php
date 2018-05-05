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
            return $getRates;
        }
        
        private function getComments($nameEmployer){
            $getComments = $this->sendquery("SELECT Komentarz,Pracownik FROM oceny WHERE Pracodawca='$nameEmployer'");
            return $getComments;
        }

        private function getCommentsAndRatings($variable){
            if(is_numeric($variable)){
                $getBoth = $this->sendquery("SELECT Komentarz,Pracownik,Kat1,Kat2,Kat3,Kat4,Kat5 FROM oceny WHERE Pracownik='$variable'");
            }else{
                $getBoth = $this->sendquery("SELECT Komentarz,Pracownik,Kat1,Kat2,Kat3,Kat4,Kat5 FROM oceny WHERE Pracodawca='$variable'");
            }
            return $getBoth;
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
            <table>
                <tr>
                    <th>
                        Kategoria 1
                    </th>
                    <th>
                        Kategoria 2
                    </th>
                    <th>
                        Kategoria 3
                    </th>
                    <th>
                        Kategoria 4
                    </th>
                    <th>
                        Kategoria 5
                    </th>
                </tr>
                <tr>
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