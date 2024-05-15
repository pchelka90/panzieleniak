<?php

   function lacz_bd() {
      $wynik = mysqli_connect('localhost', 'postgres', 'Jebac997.', 'panzieleniak');
      if (!$wynik) {
         return false;
      }

      $wynik->set_charset("utf8");

      $wynik->autocommit(TRUE);
      return $wynik;
   }

   function wynik_bd_do_tablicy($wynik) {

      $tablica_wyn = array();

      for ($licznik=0; $rzad = $wynik->fetch_assoc(); $licznik++) {
      $tablica_wyn[$licznik] = $rzad;
      }

      return $tablica_wyn;
   }

?>
