<?php

    /**
     * Klasa odpowiadająca za przetwarzanie ocen i komentarzy pracownika
     */
class employee extends dbConnection{

    /**
     * Funkcja służaca do pobierania komentarzy z bazy danych
     * 
     * @param var $id id pracownika
     * 
     * @return var $getEmployeeData pobrane informacje na temat pracownika
     */ 
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

    /**
     * Funkcja służaca do wyswietlania informacji na temat pracownika
     * 
     * @param var $id id pracownika
     */ 
    public function printEmployeeData($id){
        $getEmployeeData = $this->getEmployeeData($id);
        $userData = reset($getEmployeeData);
        echo 
        '
        <span class="badge cyan"
            style="display: table;
            margin: 0 auto;"
        >
            Twoje dane
        </span>
        <div class="card" 
        style="
            width: 70%;
            text-align: center;
            margin: 0 auto;
        ">
        <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <div class="row-filter">
            <p class="h6">Imię</p>
            <p>'.$userData['Imie'].'</p>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row-filter">
            <p class="h6">Nazwisko</p>
            <p>'.$userData['Nazwisko'].'</p>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row-filter">
            <p class="h6">PESEL</p>
            <p>'.$userData['PESEL'].'</p>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row-filter">
            <p class="h6">Login</p>
            <p>'.$userData['login'].'</p>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row-filter">
            <p class="h6">Adres e-mail</p>
            <p>'.$userData['email'].'</p>
        </div>
    </li>';
        
        echo '
    </ul>
    </div>'; 
        echo '
        <br>
        <span class="badge cyan"
            style="display: table;
            margin: 0 auto;"
        >
            Historia zatrudnienia
        </span>
        <div class="card" 
        style="
            text-align: center;
            margin: 0 auto;
        ">
        <table style="margin: 20px 0; width: 100%;">
        <thead>
        <th><p class="h6">Nazwa firmy</p></th>
        <th><p class="h6">Czas rozpoczęcia</p></th>
        <th><p class="h6">Czas zakończenia</p></th></thead><tbody>';
        foreach($getEmployeeData as $data) {
            echo '<td><a href="../views/employer.php?id='.$data['PracodawcaID'].'"><button type="button" class="btn btn-primary btn-md">'
            .$data['nazwa_firmy'].'</button></a></td><td>'
            .$data['dataZatrudniena']."</td><td>"
            .$data['dataZwolnienia'].'</td></tbody>';
        }
        echo '
        </table>
        </div>
        <h3 class="text-center">Wystawione przez Ciebie komentarze</h3>';
    }
}
?>