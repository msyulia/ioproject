<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="public/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="public/css/style.css" rel="stylesheet">
    <!-- Semantic-UI-->
    <link rel="stylesheet" href="public/semantic-ui/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="public/semantic-ui/semantic.min.js"></script>   
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
      echo '<th><h5 style="padding-left:200px">Nazwa</h5></th>';
      echo '<th><h5>Średnia ocen</h5></th>';
      echo '<th></th>';
      echo '</thead>';

      foreach($average as $firm) {
          echo '<tbody>';
          echo '<td style="padding-left:200px">'.$firm['firm'].'</td>';
          if ($firm['value']==0) {
            echo '<td>Brak ocen</td>';
          }else echo '<td>'.number_format($firm['value'],2).'</td>';
          echo '<td><a href="employer.php?id='.$firm['id'].'"><button type="button" style="margin-right:-70px" class="btn btn-primary btn-md">Szczegóły</button></a></td>';
          echo '</tbody>';
      } 
      echo '</table>';      
}
    public function printEmployers(){
        $datas = $this->getEmployers();
    }
}
?>
 <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="public/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="public/js/mdb.min.js"></script>
