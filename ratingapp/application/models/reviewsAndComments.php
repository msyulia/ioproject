<?php
//wystawiwanie ocen i komentarza => zapis do bazy danych
//+ sprawdzenie czy user moze wystaić ocenę
    class reviewsAndComments extends dbConnection{
        //Właściwości
        public $id;
        public $pracodawca;
        public $pracownik;
        public $kat1;
        public $kat2;
        public $kat3;
        public $kat4;
        public $komentarz;
        // Konstruktor
        public function __construct($pracodawca, $pracownik, $kat1, $kat2, $kat3, $kat4, $komentarz) {  //Błąd $$pracodawca w parametrach konstruktora
          $this->id = $id;
          $this->pracodawca = $pracodawca;
          $this->pracownik = $pracownik;
          $this->kat1 = $kat1;
          $this->kat2 = $kat2;
          $this->kat3 = $kat3;
          $this->kat4 = $kat4;
          $this->komentarz = $komentarz;
        }
        // Metody

        public function pokazOcena(){   // podejrzenie wartości obiektu (do testów)
          echo $this->id .'<br>';
          echo $this->pracodawca.'<br>';
          echo $this->pracownik.'<br>';
          echo 'Pierwsza kategoria: '. $this->kat1.'<br>';
          echo 'Druga kategoria: '.$this->kat2.'<br>';
          echo 'Trzecia kategoria: '.$this->kat3.'<br>';
          echo 'Czwarta kategoria: '.$this->kat4.'<br>';
          echo $this->komentarz.'<br>';
        }

        public function zapisz(){   // zapisanie w bazie danych
          $zapytanie = dbConnection::getConnection()->prepare("INSERT oceny (Pracodawca, Pracownik, Kat1, Kat2, Kat3, Kat4, Komentarz) VALUES (?,?,?,?,?,?,?)");  //
          $zapytanie->bind_param("sssiiis",$pracodawca,$pracownik,$kat1,$kat2,$kat3,$kat4,$komentarz);
          $zapytanie->execute();
          $zapytanie->close();
        }
    }

?>
