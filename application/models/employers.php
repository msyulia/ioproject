<?php

  // wyciąganie firm
  class Employers extends dbConnection{

    protected function getALL() {
      $sql = "SELECT * FROM pracodawcy";
      $result = $this->connect()->query($sql);
      $numRows = $result->num_rows;
      if($numRows>0) {
          while($row = $result->fetch_assoc()) {
              $data[] = $row;
          }
          return $data;
      }
    }

    protected function getRating() {
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
