<?php

   function lacz_bd() {
      $wynik = mysqli_connect('localhost', 'id17896983_pchelka_panzieleniak', 'Callisto123.', 'id17896983_panzieleniak');
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
