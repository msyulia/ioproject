<?php

/**
 * Klasa odpowiadająca za wystawianie ocen, komentarzy i ich zapis do bazy danych
 * 
 * @param var $pracodawca nazwa pracodawcy
 * @param var $pracownik nazwa pracownika
 * @param var $kat1 pierwsza kategoria
 * @param var $kat2 druga kategoria
 * @param var $kat3 trzecia kategoria
 * @param var $kat4 czwarta kategoria
 * @param var $kat5 piata kategoria
 * @param var $komentarz komentarz
 */
    class reviewsAndComments extends dbConnection{
       // public $id;
        public $pracodawca;
        public $pracownik;
        public $kat1;
        public $kat2;
        public $kat3;
        public $kat4;
        public $kat5;
        public $komentarz;
        
        /**
         * Konstruktor tworzący obiekty z podanych danych
         *  
         * @param var $pracodawca nazwa pracodawcy
         * @param var $pracownik nazwa pracownika
         * @param var $kat1 pierwsza kategoria
         * @param var $kat2 druga kategoria
         * @param var $kat3 trzecia kategoria
         * @param var $kat4 czwarta kategoria
         * @param var $kat5 piata kategoria
         * @param var $komentarz komentarz
         */
        public function __construct($pracodawca, $pracownik, $kat1, $kat2, $kat3, $kat4, $kat5, $komentarz) {
          //$this->id = $id;
          $this->pracodawca = $pracodawca;
          $this->pracownik = $pracownik;
          $this->kat1 = $kat1;
          $this->kat2 = $kat2;
          $this->kat3 = $kat3;
          $this->kat4 = $kat4;
          $this->kat5 = $kat5;
          $this->komentarz = $komentarz;
        }
        
        /**
         * Funkcja wyświetlająca informacje na temat pracownika, pracodawcy, wszystkich kategorii i komentarzy
         */
        public function pokazOcena(){
          //echo $this->id .'<br>';
          echo $this->pracodawca.'<br>';
          echo $this->pracownik.'<br>';
          echo 'Pierwsza kategoria: '. $this->kat1.'<br>';
          echo 'Druga kategoria: '.$this->kat2.'<br>';
          echo 'Trzecia kategoria: '.$this->kat3.'<br>';
          echo 'Czwarta kategoria: '.$this->kat4.'<br>';
          echo 'Czwarta kategoria: '.$this->kat5.'<br>';
          echo $this->komentarz.'<br>';
        }

        /**
         * Funkcja zapisująca informacje na temat pracownika, pracodawcy, wszystkich kategorii i komentarzy w bazie danych
         * Jest to również funkcja zmieniająca wcześniej zapisane informacje w bazie danych na temat pracownika, pracodawcy, wszystkich kategorii i komentarzy
         */
        public function zapisz($id){

          if(empty($this->pracodawca) || empty($this->pracownik) || 
            empty($this->kat1) || empty($this->kat2) ||
            empty($this->kat3) || empty($this->kat4) ||
            empty($this->kat5) || empty($this->komentarz) ||
            $this->kat1 > 5 || $this->kat2 > 5 ||
            $this->kat3 > 5 || $this->kat4 > 5 ||
            $this->kat5 > 5 || $this->kat1 < 0 ||
            $this->kat2 < 0 || $this->kat4 < 0 ||
            $this->kat5 < 0){
              header("Location: ../../views/oceny.php?error=errno5");
              exit();
          }else{
            $zapytanie = $this->connect()->prepare("INSERT oceny (Pracodawca, Pracownik, Kat1, Kat2, Kat3, Kat4,Kat5, Komentarz) VALUES (?,?,?,?,?,?,?,?)");
            $zapytanie->bind_param("ssiiiiis",$this->pracodawca,$this->pracownik,$this->kat1,$this->kat2,$this->kat3,$this->kat4,$this->kat5,$this->komentarz);
            $zapytanie->execute();
            $zapytanie->close();

            $zapytanie = $this->connect()->prepare("UPDATE historiazatrudnienia  SET czyWystawionaOcena=? WHERE PracodawcaID=?");
            $zapytanie->bind_param('ii',$el = 1,$id);
            $zapytanie->execute();
            $zapytanie->close();
          }
        }

    }
?>
