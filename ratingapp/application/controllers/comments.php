<?php

class Rating extends employerRatings {

    public function getShowALL() {
        echo '<table>';
        echo '<tr>';
        echo '<th>Pracodawca</th>';
        echo '<th>Pracownik</th>';
        echo '<th>Ocena 1</th>';
        echo '<th>Ocena 2</th>';
        echo '<th>Ocena 3</th>';
        echo '<th>Ocena 4</th>';
        echo '<th>Ocena 5</th>';
        echo '<th>Komentarz</th>';
        echo '</tr>';

        $datas = $this->getALL();
        foreach($datas as $data) {
            echo '<tr>';
            echo '<td>'.$data['ID'].'</td>';
            echo '<td>'.$data['Pracodawca'].'</td>';
            echo '<td>'.$data['Kat1'].'</td>';
            echo '<td>'.$data['Kat2'].'</td>';
            echo '<td>'.$data['Kat3'].'</td>';
            echo '<td>'.$data['Kat4'].'</td>';
            echo '<td>'.$data['Kat5'].'</td>';
            echo '<td>'.$data['Komentarz'].'</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    public function printEmployers(){
        $datas = $this->getEmployers();
    }
}
?>