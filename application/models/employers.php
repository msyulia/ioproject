<?php

    /**
     * Klasa odpowiadająca za przetwarzanie ocen i komentarzy o pracodawcach
     */
  class Employers extends dbConnection{

    /**
     * Funkcja służaca do pobierania komentarzy z bazy danych
     * 
     * @return var $data pobrane komentarze
     */ 
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

    /**
     * Funkcja służaca do pobierania ocen z bazy danych
     * 
     * @return var $data pobrane oceny
     */ 
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
