<?php
 require_once('funkcje_produktu_kz.php');
 session_start();
 tworz_naglowek_html('Zmiana hasła');
 sprawdz_uzyt_admin();
 if (!wypelniony($_POST)) {
   echo "<p>Formularza nie wypełniono w całości.<br/>
         Spróbuj ponownie.</p>";
   tworz_html_url("admin.php", "Powrót do menu administratora");
   tworz_stopke_html();
   exit;
 } else {
    $nowe_haslo = $_POST['nowe_haslo'];
    $nowe_haslo2 = $_POST['nowe_haslo2'];
    $stare_haslo = $_POST['stare_haslo'];
    if ($nowe_haslo != $nowe_haslo2) {
       echo "<p>Hasła wprowadzone nie pasują do siebie. Brak zmian.</p>";
    } else if ((strlen($nowe_haslo)>16) || (strlen($nowe_haslo)<6)) {
       echo "<p>Nowe hasło musi mieć długość od 6 do 16 znaków. Proszę spróbować ponownie.</p>";
    } else {
        if (zmien_haslo($_SESSION['uzyt_admin'], $stare_haslo, $nowe_haslo)) {
           echo "<p>Hasło zmienione.</p>";
        } else {
           echo "<p>Hasło nie mogło zostać zmienione.</p>";
        }
    }


 }
  tworz_html_url('admin.php', 'Powrót do meunu administratora');
  tworz_stopke_html();
?>