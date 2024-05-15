<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Dodawanie produktu");
  if (sprawdz_uzyt_admin()) {
    wyswietl_form_produktu();
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do przeglądania obszaru administracyjnego.</p>";
  }

  tworz_stopke_html();

?>