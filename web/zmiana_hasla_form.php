<?php
  require_once('funkcje_produktu_kz.php');
  session_start();
  tworz_naglowek_html("Zmiana hasła administratora");
  sprawdz_uzyt_admin();
 
  wyswietl_haslo_form();
 
  tworz_html_url("admin.php", "Powrót do menu administratora");

  tworz_stopke_html();
  
?>