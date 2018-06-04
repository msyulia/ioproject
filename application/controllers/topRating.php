<?php
/** Klasa TopEmployers jako rozszerzenie klasy Employers zawiera metody
* służące do wyświetlania firm, a także do obliczania średniej oceny
* pracodawców i wyświetlania ich rankingu.
*/
class TopEmployers extends Employers {
	
	/** Funkcja getShowALL odczytuje dane o pracodawcach z bazy danych,
	* a następnie wyświetla w tabeli wszystkich 
	* pracodawców. W pierwszej kolumnie ID, w drugiej
	* nazwę firmy.
	*/
    public function getShowALL() {
        echo '<table>';
        echo '<tr>';
        echo '<th>Firma: </th>';
        echo '</tr>';
		/** Zmienna $datas przechowuje w tablicy rekordy z bazy zawierającej dane o pracodawcach. */
        $datas = $this->getALL();
        foreach($datas as $data) {
            echo '<tr>';
            echo '<td>'.$data['ID'].'</td>';
            echo '<td>'.$data['nazwa_firmy'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
	
    /** Funkcja calcAverage oblicza średnią ocenę pracodawcy na podstawie ocen z 
	* czterech kategorii. Jeśli dany pracodawca nie widnieje w bazie danych przechowującej
	* oceny pracodawców to średnia ocena wynosi 0 (wyświetlane jako "brak oceny"). Następnie
	* pracodawcy są sortowani względem średniej oceny (malejąco) i ostatecznie lista uporządkowanych
	* firm wyświetlana jest w formie tabeli. Obok każdego pracodawcy widnieje przycisk "szczegóły"
	* odsyłający do strony z informacjami na temat pracodawcy.
	*/
    public function calcAverage() {
	  /** Zmienna $ratings przechowuje w tablicy rekordy
	  * z bazy zawierającej dane o ocenach.
	  */
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
	  
	  /** Sortowanie tablicy $value zawierającej ocenę malejąco, pracodawcy w
	  * tablicy $average są ustawiani w kolejności odpowiadającej posortowanej
	  * tablicy $value.
	  */
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
	/** Funkcja wyświetlająca pracodawców. */
    public function printEmployers(){
        $datas = $this->getEmployers();
    }
}
?>