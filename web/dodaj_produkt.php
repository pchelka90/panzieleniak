<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Dodawanie produktu");
  if (sprawdz_uzyt_admin()) {
    if (wypelniony($_POST)) {
      $isbn = $_POST['isbn'];
      $nazwa = $_POST['nazwa'];
      $idkat = $_POST['idkat'];
      $cena = $_POST['cena'];
      $opis = $_POST['opis'];

      if(dodaj_produkt($isbn, $nazwa, $idkat, $cena, $opis)) {
        echo "<p>Produkt <em>".htmlspecialchars($nazwa)."</em> został dodany do bazy danych.</p>";
      } else {
        echo "<p>Produkt <em>".htmlspecialchars($nazwa)."</em> nie mógł zostać dodany do bazy danych.</p>";
      }
    } else {
      echo "<p>Formularz nie został wypełniony. Proszę spróbować ponownie.</p>";
    }
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do przeglądania tej strony.</p>";
  }

  tworz_stopke_html();

?>