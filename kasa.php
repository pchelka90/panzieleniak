<?php

  include('funkcje_produktu_kz.php');

  session_start();

  tworz_naglowek_html("Kasa");

  if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
  if(($_SESSION['koszyk']) && (array_count_values($_SESSION['koszyk']))) {
    wyswietl_koszyk($_SESSION['koszyk'], false, 0);
    wyswietl_form_kasy();
  } else {
    echo "<p>Koszyk jest pusty</p>";
  }
  } else {
	  echo "<p>Żeby zlożyć zamówienie<a href='index.php'>zaloguj się na swoje konto!</a>
		Jeśli nie posiadasz jeszcze u nas konta, <a href='rejestracja.php'>zarejestruj się!</a>";
  }

  wyswietl_przycisk_formularza("pokaz_kosz.php", "kontynuacja", "Kontynuacja zakupów");
  tworz_stopke_html();
  
?>