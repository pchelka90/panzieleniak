<?php

  function wypelniony($zmienne_form) {
    foreach ($zmienne_form as $klucz => $wartosc) {
      if ((!isset($klucz)) || ($wartosc == '')) {
          return false;
      }
    }
    return true;
  }

  function prawid_email($adres) {
    if (ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $adres)) {
      return true;
    } else {
      return false;
    }
  }

?>