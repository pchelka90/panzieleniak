<?php

  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Dodawanie kategorii");
  if (sprawdz_uzyt_admin()) {
    if (wypelniony($_POST)) {
      $nazwakat = $_POST['nazwakat'];
      if(dodaj_kat($nazwakat)) {
        echo "<p>Kategoria \"".$nazwakat."\" została dodana do bazy danych.</p>";
      } else {
        echo "<p>Kategoria \"".$nazwakat."\" nie mogła zostać dodana do bazy danych.</p>";
      }
    } else {
      echo "Formularz niewypełniony. Proszę spróbować ponownie.";
    }
    tworz_html_url('admin.php', 'Powrót do menu administratora');
  } else {
    echo "<p>Brak autoryzacji do przeglądania tej strony.</p>";
  }

  tworz_stopke_html();

?>