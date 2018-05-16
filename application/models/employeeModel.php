<?php


class employee extends dbConnection{


    protected function getEmployeeData($id){
      
        $getEmployeeData = $this->sendquery("
        SELECT  PracodawcaID, nazwa_firmy, Imie, Nazwisko, 
                PESEL, login, email, dataZatrudniena, dataZwolnienia
        FROM historiazatrudnienia 
        INNER JOIN pracownicy ON historiazatrudnienia.PracownikID = pracownicy.ID 
        INNER JOIN pracodawcy ON historiazatrudnienia.PracodawcaID = pracodawcy.ID 
        WHERE historiazatrudnienia.PracownikID = $id 
        ");
        
        return $getEmployeeData;

        
    }

    public function printEmployeeData($id){
        $getEmployeeData = $this->getEmployeeData($id);
        echo '<br/><h3>Twoje dane</h3><br/>';
        foreach($getEmployeeData as $data){
            echo $data['Imie'].'<br/>';
            echo $data['Nazwisko'].'<br/>';
            echo $data['PESEL'].'<br/>';
            echo $data['login'].'<br/>';   
            echo $data['email'].'<br/>'; 
            break;    
        }
        echo '<br/><h3>Historia zatrudnienia</h3><br/>';
        foreach($getEmployeeData as $data){
            echo $data['dataZatrudniena']." ".$data['dataZwolnienia'].'<a href="../views/employer.php?id='.$data['PracodawcaID'].'">'.$data['nazwa_firmy'].'</a><br/>';
        }

        echo '<br/><h3>Wystawione przez ciebie oceny</h3><br/>';
        
    }

}
?>