<?php
  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Usunięcie produktu");
  if (sprawdz_uzyt_admin())
  {
    if (isset($_POST['isbn'])) {
      $isbn = $_POST['isbn'];
      if(usun_produkt($isbn)) {
        echo "<p>Produkt ".$isbn." został usunięty.</p>";
      } else {
        echo "<p>Produkt ".$isbn." nie mógł zostać usunięty.</p>";
      }
    } else {
      echo "<p>Do usunięcia produktu potrzebny jest numer ISBN. Proszę spróbować ponownie.</p>";
    }
    tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
  }

  tworz_stopke_html();
  
?>