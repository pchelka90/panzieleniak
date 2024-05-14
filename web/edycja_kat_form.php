<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html('Edycja kategorii');
  if (sprawdz_uzyt_admin()) {
    if ($nazwakat = pobierz_nazwe_kategorii($_GET['idkat'])) {
      $idkat = $_GET['idkat'];
      $kat = compact('nazwakat', 'idkat');
      wyswietl_form_kategorii($kat);
    } else {
      echo "<p>Pobranie danych kategorii niemożliwe.</p>";
    }
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do przeglądania obszru administracyjnego.</p>";
  }

  tworz_stopke_html();

?>