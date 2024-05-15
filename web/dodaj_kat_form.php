<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Dodawanie kategorii");
  if (sprawdz_uzyt_admin()) {
    wyswietl_form_kategorii();
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do oglądania strona administracyjnych.</p>";
  }

  tworz_stopke_html();

?>