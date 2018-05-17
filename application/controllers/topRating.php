<?php

class TopEmployers extends Employers {

    public function getShowALL() {
        echo '<table>';
        echo '<tr>';
        echo '<th>Firma: </th>';
        echo '</tr>';

        $datas = $this->getALL();
        foreach($datas as $data) {
            echo '<tr>';
            echo '<td>'.$data['ID'].'</td>';
            echo '<td>'.$data['nazwa_firmy'].'</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    //obliczanie średniej ocen pracodawców i ich wyświetlenie
    public function calcAverage() {
      $ratings = $this->getRating();
      $employers = $this->getALL();

      $sum =0;
      $quantity=0;
      $average[] =0;

      for ($i=0; $i < count($employers) ; $i++) {
        $quantity=0;
        $sum =0;
        for ($j=0; $j <count($ratings) ; $j++) {
          if ($ratings[$j]['Pracodawca']==$employers[$i]['nazwa_firmy']) {
            $quantity +=4;
            $sum = $sum+$ratings[$j]['Kat1']+$ratings[$j]['Kat2']+$ratings[$j]['Kat3']+$ratings[$j]['Kat4'];
          }
          if ($quantity==0) {
            $average[$i]= ['id' => $employers[$i]['ID'],'firm' => $employers[$i]['nazwa_firmy'],'value'=> 0];
          } else $average[$i] =  ['id' => $employers[$i]['ID'], 'firm' => $employers[$i]['nazwa_firmy'],'value'=> $sum/$quantity];

        }
      }

      foreach ($average as $key => $line) {
        $value [$key] = $line['value'];
      }

      array_multisort($value,SORT_DESC,$average );

      echo '<table align="center" class="table table-hover">';
      echo '<thead>';
      echo '<th><p class="h5">Nazwa</p></th>';
      echo '<th><p class="h5">Średnia ocen</p></th>';
      echo '<th><p class="h5">Zobacz szczegóły</p></th>';

      echo '</thead>';

      foreach($average as $firm) {
          echo '<tbody>';

          echo '<td>'.$firm['firm'].'</td>';
          if ($firm['value']==0) {
            echo '<td>Brak ocen</td>';
          }else echo '<td>'.number_format($firm['value'],2).'</td>';
          echo '<td><a href="employer.php?id='.$firm['id'].'"><button type="button" class="btn btn-primary btn-md">Szczegóły</button></a></td>';

          echo '</tbody>';
      } 
      echo '</table>';      
}
    public function printEmployers(){
        $datas = $this->getEmployers();
    }
}
?>
