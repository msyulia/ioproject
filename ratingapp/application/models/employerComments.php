<?php

  // wyciąganie komentarzy
  class employerRatings extends dbConnection{

    protected function getALL() {
      $sql = "SELECT * FROM oceny";
      $result = $this->connect()->query($sql);  
      $numRows = $result->num_rows;
      if($numRows>0) {
          while($row = $result->fetch_assoc()) {
              $data[] = $row;
          }       
          return $data;
      }
    }
  }
?>