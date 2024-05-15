<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Edycja danych produktu");
  if (sprawdz_uzyt_admin()) {
    if ($produkt = pobierz_dane_produktu($_GET['isbn'])) {
      wyswietl_form_produktu($produkt);
    } else {
      echo "<p>Odczytanie danych produktu niemożliwe.</p>";
    }
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do oglądania obszaru administracyjnego.</p>";
  }

  tworz_stopke_html();

?>