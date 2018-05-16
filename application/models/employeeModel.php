<?php


class employee extends dbConnection{


    protected function getEmployeeData($id){
      
        $getEmployeeData = $this->sendquery("
        SELECT  PracodawcaID, nazwa_firmy, Imie, Nazwisko, 
                PESEL, login, email, dataZatrudniena, dataZwolnienia
        FROM historiazatrudnienia 
        INNER JOIN pracownicy ON historiazatrudnienia.PracownikID = pracownicy.ID 
        INNER JOIN pracodawcy ON historiazatrudnienia.PracodawcaID = pracodawcy.ID 
        WHERE historiazatrudnienia.PracownikID = 3 
        ");

        return $getEmployeeData;

        
    }

    public function printEmployeeData($id = 3){
        $getEmployeeData = $this->getEmployeeData($id);
        echo '<table align="center" style="width:90%"class="table table-hover"><thead>
        <th style="padding-left:50px">Imie</th>
        <th style="padding-left:50px">Nazwisko</th>
        <th style="padding-left:50px">PESEL</th>
        <th style="padding-left:50px">Login</th>
        <th style="padding-left:50px">Adres e-mail</th>
        </thead><h3>Twoje dane</h3><tbody><td style="padding-left:50px">';        
        foreach($getEmployeeData as $data){
            echo $data['Imie'].'<br/></td><td style="padding-left:50px">';
            echo $data['Nazwisko'].'<br/></td><td style="padding-left:50px">';
            echo $data['PESEL'].'<br/></td><td style="padding-left:50px">';
            echo $data['login'].'<br/></td><td style="padding-left:50px">';   
            echo $data['email'].'<br/></td></tbody></table>'; 
            break;    
        }
        echo '<h3>Historia zatrudnienia</h3><table align="center" style="width:50%" class="table table-hover"><thead>
        <th>Nazwa firmy</th>
        <th>Czas rozpoczęcia</th>
        <th>Czas zakończenia</th></thead><tbody>';
        foreach($getEmployeeData as $data){
            echo '<td><a href="../views/employer.php?id='.$data['PracodawcaID'].'"><button type="button" class="btn btn-primary btn-md">'
            .$data['nazwa_firmy'].'</button></a></td><td>'
            .$data['dataZatrudniena']."</td><td>"
            .$data['dataZwolnienia'].'</td></tbody>';
        }

        echo '</table><h3>Wystawione przez ciebie oceny</h3>';
        
    }

}
?>