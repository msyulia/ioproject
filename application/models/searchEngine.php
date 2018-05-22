<?php 
    /**
     * Klasa obsługująca funkcje wyszukujące
     */
    class searchEngine extends dbConnection{
        
        /**
         * Funkcja wysyłająca zapytanie do bazy danych o wprowadzonego pracodawcę, obsługuje wyjatek pustego pola
         * 
         * @param string $nameEmployer nazwa pracodawcy
         */
        public function search($nameEmployer){
            if(empty($nameEmployer)){
                echo '';
            }else{
                $searchEmployer = $this->sendquery("SELECT * FROM pracodawcy WHERE nazwa_firmy='$nameEmployer'");            
                return $searchEmployer;
                                    
            }
        }

        /**
         * Funkcja pobierająca oceny wprowadzonego pracodawcy
         * 
         * @param string $nameEmployer nazwa pracodawcy
         * 
         * @return var oceny pracodawcy
         */
        private function getRating($nameEmployer){
            $getRates = $this->sendquery("SELECT * FROM oceny WHERE Pracodawca='$nameEmployer'");
            $getCount = $this->sendquery("SELECT COUNT(*) FROM oceny WHERE Pracodawca='$nameEmployer'");
            if($getCount['COUNT(*)'] == 1){
                return array($getRates);
            }
            return $getRates;
        }
                
        /**
         * Funkcja pobierająca komantarze na temat wprowadzonego pracodawcy
         * 
         * @param string $nameEmployer nazwa pracodawcy
         * 
         * @return var komentarze na temat pracodawcy
         */
        private function getComments($nameEmployer){
            $getComments = $this->sendquery("SELECT Komentarz,Pracownik FROM oceny WHERE Pracodawca='$nameEmployer'");
            return $getComments;
        }
        
        /**
         * Funkcja pobierająca komantarze i oceny na temat wprowadzonego pracodawcy
         * 
         * @param string $variable szukany obiekt
         * 
         * @return var komentarze oraz oceny dotyczace obiektu lub wystawione przez obiekt
         */
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
        
        /**
         * Funkcja wyliczajaca średnią ocen wprowadzonego pracodawcy
         * 
         * @param string $nameEmployer nazwa pracodawcy
         * 
         * @return var średnią ocen pracodawcy
         */
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
        
        /**
         * Funkcja wyświetlająca komentarze pracodawcy
         * 
         * @param string $nameEmployer nazwa pracodawcy
         */
        public function formatComments($nameEmployer){
            $Comments = $this->getComments($nameEmployer);
            echo '<ul>';
            foreach($Comments as $comment){
                echo '<li>'.$comment['Komentarz'].' Wystawil: '.$comment['Pracownik'].'</li>';
            }
            echo '</ul>';

        }

        /**
         * Funkcja zwracająca informacje jakiego obiektu szukamy
         * 
         * @param string $id id obiektu
         * 
         * @return var jeżeli zwraca 0 to szukamy pracownika, jeśli 1 to pracodawcy
         */
        public function searchById($id){

                $getId =  $this->sendquery("SELECT nazwa_firmy FROM pracodawcy WHERE ID='$id'");   
                return $getId['nazwa_firmy'];

        }

        /**
         * Funkcja konwertujaca komentarze obiektu do JavaScript Object Notation
         * 
         * @param string $id id obiektu
         * @param string $string informacja czy jest to pracodawca czy pracownik
         */
        public function convertToJSON($id, $string){
            if($string == "employee"){
                $array = $this->getCommentsAndRatings($id);
            }
            if($string == "employer"){
            $array = $this->getCommentsAndRatings($this->searchById($id));
            }
            return $array;
        }

        /**
         * Funkcja wyświetlająca poszczególne oceny wprowadzonego pracodawcy
         * 
         * @param string $nameEmployer nazwa pracodawcy
         */
        public function formatEmployer($nameEmployer){
            $kat1 = $this->endMark($nameEmployer,'Kat1');
            $kat2 = $this->endMark($nameEmployer,'Kat2');
            $kat3 = $this->endMark($nameEmployer,'Kat3');
            $kat4 = $this->endMark($nameEmployer,'Kat4');
            $kat5 = $this->endMark($nameEmployer,'Kat5');

            echo '
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Wynagrodzenie
                    <span class="badge badge-primary badge-pill"><i class="fa fa-star prefix yellow-text"></i>'.$kat1.'</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Atmosfera
                    <span class="badge badge-primary badge-pill"><i class="fa fa-star prefix yellow-text"></i>'.$kat2.'</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Benefity
                    <span class="badge badge-primary badge-pill"><i class="fa fa-star prefix yellow-text"></i>'.$kat3.'</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Miejsce pracy
                    <span class="badge badge-primary badge-pill"><i class="fa fa-star prefix yellow-text"></i>'.$kat4.'</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Możliwości rozwoju
                    <span class="badge badge-primary badge-pill"><i class="fa fa-star prefix yellow-text"></i>'.$kat5.'</span>
                </li>
            </ul>';
           

        }

    }
?>