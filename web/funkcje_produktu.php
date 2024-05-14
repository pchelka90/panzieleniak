<?php

  function oblicz_koszt_dostawy() {
    return 5.00;
  }

  function pobierz_kategorie() {
    $lacz = lacz_bd();
    $zapytanie = "SELECT idkat, nazwakat FROM kategorie";
    $wynik = @$lacz->query($zapytanie);
    if (!$wynik) {
        return false;
    }
    $ilosc_kat = @$wynik->num_rows;
    if ($ilosc_kat == 0) {
        return false;
    }
    $wynik = wynik_bd_do_tablicy($wynik);
    return $wynik;
  }

  function pobierz_nazwe_kategorii($idkat) {
    $idkat = intval($idkat);
    $lacz = lacz_bd();
    $zapytanie = "SELECT nazwakat FROM kategorie WHERE idkat = '".$lacz->real_escape_string($idkat)."'";
    $wynik = @$lacz->query($zapytanie);
    if (!$wynik) {
      return false;
    }
    $ilosc_kat = @$wynik->num_rows;
    if ($ilosc_kat == 0) {
        return false;
    }
    $rzad = $wynik->fetch_object();
    return $rzad->nazwakat;
  }


  function pobierz_produkty($idkat) {
    if ((!$idkat) || ($idkat=='')) {
      return false;
    }

    $lacz = lacz_bd();
    $zapytanie = "SELECT * FROM produkty WHERE idkat='".$idkat."'";
    $wynik = @$lacz->query($zapytanie);
    if (!$wynik) {
      return false;
    }
    $ilosc_produktow = @$wynik->num_rows;
    if ($ilosc_produktow == 0) {
        return false;
    }
    $wynik = wynik_bd_do_tablicy($wynik);
    return $wynik;
  }

  function pobierz_dane_produktu($isbn) {
    if ((!$isbn) || ($isbn=='')) {
      return false;
    }

    $lacz = lacz_bd();
    $zapytanie = "SELECT * FROM produkty WHERE isbn='".$isbn."'";
    $wynik = @$lacz->query($zapytanie);
    if (!$wynik) {
      return false;
    }
    $wynik = @$wynik->fetch_assoc();
    return $wynik;
  }

  function oblicz_wartosc($koszyk) {
    $wartosc = 0.0;
    if(is_array($koszyk)) {
      $lacz = lacz_bd();
      foreach($koszyk as $isbn => $ilosc) {
        $zapytanie = "SELECT cena FROM produkty WHERE isbn='".$lacz->real_escape_string($isbn)."'";
        $wynik = $lacz->query($zapytanie);
        if ($wynik) {
          $produkt = $wynik->fetch_object();
          $cena_produktu = $produkt->cena;
          $wartosc +=$cena_produktu*$ilosc;
        }
      }
    }
    return $wartosc;
  }

  function oblicz_produkty($koszyk) {
    $produkty = 0;
    if(is_array($koszyk)) {
        foreach($koszyk as $isbn => $ilosc) {
          $produkty += $ilosc;
        }
    }
    return $produkty;
  }

?>