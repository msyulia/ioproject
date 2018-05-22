<?php
    //autoryzacja przed nie autoryzowanym dostępem do podstron przez osób/użytkowników 
    //autoryzacja przed nie autoryzowanym dostępem do podstron przez osób/użytkowników 
    class accessAuthorization extends dbConnection{
	
        // protected function Authorization(){
        
        // public function Authorization(){
        //     Sessions::startSession();
        // $login=Sessions::getLogin();
        //czy był zatrudniony w danej firmie sprawdzenie
        // $imie zamienić na $login potem
        public function getPracownikID($login) {
            $pobierz_pracownik_id = "SELECT id FROM pracownicy WHERE login='$login'";
            $result = $this->connect()->query($pobierz_pracownik_id);  
            $numRows = $result->num_rows;
            if($numRows>0) {
                $row = $result->fetch_assoc();
                    return $row['id'];          
            }
            else{
                return false;
            }          
        }
       
        public function getPracodawcaName($id_pracodawcy){
            $pobierz_pracownik_id = "SELECT nazwa_firmy FROM pracodawcy WHERE ID='$id_pracodawcy'";
            $result = $this->connect()->query($pobierz_pracownik_id);  
            $numRows = $result->num_rows;
            if($numRows>0) {
                $row = $result->fetch_assoc();
                    return $row['nazwa_firmy'];          
            }
            else{
                return false;
            }   
        }
        public function getPracodawcaID($nazwa_firmy){
            $pobierz_id_firmy = "SELECT ID FROM pracodawcy WHERE nazwa_firmy='$nazwa_firmy'";
            $result = $this->connect()->query($pobierz_id_firmy);  
            $numRows = $result->num_rows;
            if($numRows>0) {
                $row = $result->fetch_assoc();
                     return $row['ID'];          
            }
            else{
                return false;
            } 
        }
        public function wystawOcene($login){
            $pobierz_id_pracownika = $this->getPracownikID($login);
            $pobierz_pracodawcow = "SELECT * FROM historiazatrudnienia WHERE pracownikID='$pobierz_id_pracownika' AND czyWystawionaOcena='0'";
            $result = $this->connect()->query($pobierz_pracodawcow);  
            $numRows = $result->num_rows;
            if($numRows>0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }       
              
            
                foreach($data as $item) {
                    $empName = $this->getPracodawcaName($item['PracodawcaID']); 
                    $description = $this->sendquery("SELECT opis FROM pracodawcy WHERE nazwa_firmy='$empName'");
                    $value = new searchEngine();
                    echo 
            '<div class="card card-cascade" style="width: 50%; margin: 0 auto;">
                <div class="card-body text-center">
                    <h4 class="card-title"><strong>'.$empName.'</strong></h4>
                    <h5 class="blue-text pb-2"><strong>Profil</strong></h5>
                    <p class="card-text">'.$description['opis'].'</p>
                </div>
            </div>';
                    $value->formatEmployer($empName);
                    ?>
                    <form action="addRating.php" method="POST">
                        
                        <button type="submit" name="pracodawca" class="btn btn-primary" 
            style="margin: 0 auto; display: table;"
            value="<?php echo $this->getPracodawcaName($item['PracodawcaID']); ?>">Wystaw ocenę</button>
                    </form>
                    <?php
                    echo '<br/>';
                }
            }else{
                echo '<div class="card success-color text-center z-depth-2" style="margin-top: -20px;">
                <div class="card-body">
                    <p class="white-text mb-0">Nie ma żadnych ocen do wystawienia!</p>
                </div>
            </div>';
            }
        }
    }
?>