<?php

  function umiesc_zamowienie($szczegoly_zamowienia) {
    // wyciągnięcie szczegółów zamówienia jako zmiennych
    extract($szczegoly_zamowienia);


    // ustawienie adresu dostawy na taki sam jak adres klienta
    if((!$dos_telefon) && (!$dos_imie) && (!$dos_ulica) && (!$dos_budynek) && (!$dos_mieszkanie)) {
      $dos_telefon = $telefon;
      $dos_imie = $imie;
      $dos_ulica = $ulica;
      $dos_budynek = $budynek;
      $dos_mieszkanie = $mieszkanie;
    }

    $lacz = lacz_bd();

    // Zamówienie ma zostać zapisane w ramach transakcji
    // rozpoczynamy ją wyłączając tryb autocommit;
    $lacz->autocommit(FALSE);

    // wstawienie adresu klienta
    $zapytanie = "select idklienta from klienci where
                  telefon = '". $lacz->real_escape_string($telefon) . "' 
                  and imie = '". $lacz->real_escape_string($imie) . "'
                  and ulica = '". $lacz->real_escape_string($ulica) . "' 
                  and budynek = '". $lacz->real_escape_string($budynek) . "'
                  and mieszkanie = '". $lacz->real_escape_string($mieszkanie) . "'
                  and email = '". $lacz->real_escape_string($email) ."'";

    $wynik = $lacz->query($zapytanie);
    if($wynik->num_rows>0) {
      $klient = $wynik->fetch_object();
      $idklienta = $klient->idklienta;
    } else {
      $zapytanie = "insert into klienci values
                  ('', '" . $lacz->real_escape_string($telefon) ."','" .
                    $lacz->real_escape_string($imie) .
                    "','". $lacz->real_escape_string($ulica) ."','" .
                    $lacz->real_escape_string($budynek) .
                    "','". $lacz->real_escape_string($mieszkanie) ."','" .
                    $lacz->real_escape_string($email) ."')";

      $wynik = $lacz->query($zapytanie);
      if (!$wynik) {
        return false;
      }
    }
    $idklienta = $lacz->insert_id;

    $data = date("Y-m-d");
    $zapytanie = "insert into zamowienia values
              (NULL, '".$lacz->real_escape_string($idklienta)."', '".
                $lacz->real_escape_string($_SESSION['calkowita_wartosc'])."', '".
                $lacz->real_escape_string($data)."', '".
                $lacz->real_escape_string($dos_telefon)."','".
                $lacz->real_escape_string($dos_imie)."','".
                $lacz->real_escape_string($dos_ulica)."','".
                $lacz->real_escape_string($dos_budynek)."','".
                $lacz->real_escape_string($dos_mieszkanie)."')";
    $wynik = $lacz->query($zapytanie);
    if (!$wynik) {
      return false;
    }

    $zapytanie = "select idzamowienia from zamowienia where
                idklienta = '".$lacz->real_escape_string($idklienta)."' and
                wartosc > (".(float)$_SESSION['calkowita_wartosc']."-.001) and
                wartosc < (".(float)$_SESSION['calkowita_wartosc']."+.001) and
                data = '".$lacz->real_escape_string($data)."' and
                dos_telefon = '".$lacz->real_escape_string($dos_telefon)."' and
                dos_imie = '".$lacz->real_escape_string($dos_imie)."' and
                dos_ulica = '".$lacz->real_escape_string($dos_ulica)."' and
                dos_budynek = '".$lacz->real_escape_string($dos_budynek)."' and
                dos_mieszkanie = '".$lacz->real_escape_string($dos_mieszkanie)."'";
    $wynik = $lacz->query($zapytanie);
    if($wynik->num_rows>0) {
      $zamowienie = $wynik->fetch_object();
      $idzam = $zamowienie->idzamowienia;
    } else {
      return false;
    }


    // umieszczenie wszystkich produktów
    foreach($_SESSION['koszyk'] as $isbn => $ilosc) {
      $dane=pobierz_dane_produktu($isbn);
      $zapytanie = "delete from produkty_zamowienia where
                idzamowienia = '".$lacz->real_escape_string($idzam).
                "' and isbn =  '".$lacz->real_escape_string($isbn)."'";
      $wynik = $lacz->query($zapytanie);
      $zapytanie = "insert into produkty_zamowienia values
                ('".$lacz->real_escape_string($idzam)."', '".
                  $lacz->real_escape_string($isbn)."', ".
                  $lacz->real_escape_string($dane['cena']).", ".
                  $lacz->real_escape_string($ilosc) .")";
      $wynik = $lacz->query($zapytanie);
      if(!$wynik) {
        return false;
      }
    }

    // koniec transakcji
    $lacz->commit();
    $lacz->autocommit(TRUE);

    return $idzam;
  }


  // sprawdzenie prawidłowości danych karty kredytowej
  function przetworz_karte( $dane ) {
    return TRUE;
  }

?>