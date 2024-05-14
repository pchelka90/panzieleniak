<?php
  require_once('funkcje_produktu_kz.php');
  session_start();

  tworz_naglowek_html("Usuwanie kategorii");
  if (sprawdz_uzyt_admin()) {
    if (isset($_POST['idkat'])) {
      if(usun_kategorie($_POST['idkat'])) {
      $idkat = $_POST['idkat'];
        echo "<p>Kategoria ".$idkat." została usunięta.</p>";
      } else {
        echo "<p>Kategoria nie mogła zostać usunięta.<br />
              Przypusczalnie nie jest pusta.</p>";
      } 
    } else {
        echo "<p>Nie wybrano żadnej kategorii. Proszę spróbować ponownie.</p>";
      }
      tworz_html_url("admin.php", "Powrót do menu administratora");
  } else {
    echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
  }

  tworz_stopke_html();
  
?>