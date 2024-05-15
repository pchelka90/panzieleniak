<?php
  session_start();
  include ('funkcje_produktu_kz.php');

  tworz_naglowek_html("Kasa");
  $telefon = $_POST['telefon'];
  $imie = $_POST['imie'];
  $ulica = $_POST['ulica'];
  $budynek = $_POST['budynek'];
  $mieszkanie = $_POST['mieszkanie'];
  $email = $_POST['email'];

	  if(($_SESSION['koszyk']) && ($telefon) && ($imie) && ($ulica) && ($budynek) && ($mieszkanie) && ($email))
    {
      if( umiesc_zamowienie($_POST) != false )
      {
        wyswietl_koszyk($_SESSION['koszyk'], false, 0);

        wyswietl_dostawe(oblicz_koszt_dostawy());

        wyswietl_form_karty($imie);

        wyswietl_przycisk_formularza("pokaz_kosz.php", "kontynuacja", "Kontynuacja zakupów");
      } else 
      {
         echo "<p>Nie wypełniono wszystkich pól, proszę spróbować ponownie.</p>";
        wyswietl_przycisk_formularza('kasa.php', 'powrot', 'Powrót');
      }
    } else 
    {
      echo "<p>Nie wypełniono wszystkich pól, proszę spróbować ponownie.</p><hr />";
      wyswietl_przycisk_formularza('kasa.php', 'powrot', 'Powrót');
    }

  tworz_stopke_html();
  
?>