<?php

  require_once('funkcje_bazy.php');

  function loguj($nazwa_uz, $haslo) {

    $lacz = lacz_bd();
    if (!$lacz) {
      return 0;
    }
    $wynik = $lacz->query("SELECT * FROM admin WHERE nazwa_uz='".$nazwa_uz."' AND haslo=sha1('".$haslo."')");
    if (!$wynik) {
      return 0;
    }

    if ($wynik->num_rows>0) {
      return 1;
    } else {
      return 0;
    }
  }

  function sprawdz_uzyt_admin() {
    global $_SESSION;
    if (isset($_SESSION['uzyt_admin'])) {
      return true;
    } else {
      return false;
    }
  }

  function zmien_haslo($nazwa_uz, $stare_haslo, $nowe_haslo) {
    if (loguj($nazwa_uz, $stare_haslo)) {
      if (!($lacz = lacz_bd())) {
        return false;
      }
      $wynik = $lacz->query( "UPDATE admin SET haslo = sha1('".$nowe_haslo."') WHERE nazwa_uz = '".$nazwa_uz."'");
      if (!$wynik) {
        return false;
      } else {
        return true;
      }
    }
    else {
      return false;
    }
  }


?>