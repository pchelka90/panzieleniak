<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Uaktualnienie produktu");
  if (sprawdz_uzyt_admin()) {
    if (wypelniony($_POST)) {
      $staryisbn = $_POST['staryisbn'];
      $isbn = $_POST['isbn'];
      $nazwa= $_POST['nazwa'];
      $idkat = $_POST['idkat'];
      $cena = $_POST['cena'];
      $opis = $_POST['opis'];

      if(uakt_produkt($staryisbn, $isbn, $nazwa, $idkat,
                        $cena, $opis)) {
        echo "<p>Produkt został uaktualniony.</p>";
      } else {
        echo "<p>Produkt nie mógł zostać uaktualniony.</p>";
      }
    } else {
      echo "<p>Formularz niewypełniony. Proszę spróbować ponownie.</p>";
    }
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
  }

  tworz_stopke_html();

?>