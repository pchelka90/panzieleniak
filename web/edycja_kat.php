<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Uaktualnienie kategorii");
  if (sprawdz_uzyt_admin()) {
    if (wypelniony($_POST)) {
      if(uakt_kat($_POST['idkat'], $_POST['nazwakat'])) {
        echo "<p>Kategoria uaktualniona.</p>";
      } else {
        echo "<p>Kategoria nie mogła zostać uaktualniona.</p>";
      }
    } else {
      echo "<p>Formularz niewypełnony. Prosze spróbować ponownie.</p>";
    }
    tworz_html_url("admin.php", "Powrót do menu adminstratora");
  } else {
    echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
  }

  tworz_stopke_html();

?>