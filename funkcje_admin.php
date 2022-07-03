<?php

  function wyswietl_form_kategorii($kategoria = '') {
  $edycja = is_array($kategoria);

?>

  <form method="post"
      action="<?php echo $edycja?'edycja_kat.php':'dodaj_kat.php'; ?>">
  <table style="border:0">
  <tr>
    <td>Nazwa Kategorii:</td>
    <td><input type="text" name="nazwakat" size="40" maxlength="40"
          value="<?php echo $edycja?$kategoria['nazwakat']:''; ?>" /></td>
   </tr>
  <tr>
    <td <?php if (!$edycja) { echo "colspan=2";} ?> align="center">
      <?php
        if ($edycja) {
           echo "<input type=\"hidden\" name=\"idkat\"
                value=\"".$kategoria['idkat']."\" />";
        }
      ?>
      <input type="submit"
       value="<?php echo $edycja?'Uaktualnienie':'Dodanie'; ?> kategorii" /></form>
     </td>
     <?php
       if ($edycja) {
          echo "<td>
                <form method=\"post\" action=\"usun_kat.php\">
                <input type=\"hidden\" name=\"idkat\" value=\"".$kategoria['idkat']."\" />
                <input type=\"submit\" value=\"Usuń kategorię\" />
                </form></td>";
       }
     ?>
  </tr>
  </table>
<?php
}

  function wyswietl_form_produktu($produkt = '') {
  $edycja = is_array($produkt);

?>

  <form method="post"
        action="<?php echo $edycja?'edycja_produktu.php':'dodaj_produkt.php';?>">
  <table border="0">
  <tr>
    <td>ISBN:</td>
    <td><input type="text" name="isbn"
         value="<?php echo htmlspecialchars($edycja ? $produkt['isbn'] : ''); ?>" /></td>
  </tr>
  <tr>
    <td>Nazwa produktu:</td>
    <td><input type="text" name="nazwa"
         value="<?php echo htmlspecialchars($edycja ? $produkt['nazwa'] : ''); ?>" /></td>
  </tr>
   <tr>
      <td>Kategoria:</td>
      <td><select name="idkat">
      <?php
          $tablica_kat=pobierz_kategorie();
          foreach ($tablica_kat as $takat) {
               echo "<option value=\"". htmlspecialchars($takat['idkat'])."\"";
               if (($edycja) && ($takat['idkat'] == $produkt['idkat'])) {
                   echo " wybrano";
               }
               echo ">". htmlspecialchars($takat['nazwakat'])."</option>";
          }
          ?>
          </select>
        </td>
   </tr>
   <tr>
    <td>Cena:</td>
    <td><input type="text" name="cena"
               value="<?php echo htmlspecialchars($edycja ? $produkt['cena'] : ''); ?>" /></td>
   </tr>
   <tr>
     <td>Opis:</td>
     <td><textarea rows="3" cols="50"
          name="opis">
          <?php echo htmlspecialchars($edycja ? $produkt['opis'] : ''); 
          ?></textarea></td>
    </tr>
    <tr>
      <td <?php if (!$edycja) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edycja)
             echo "<input type=\"hidden\" name=\"staryisbn\"
                    value=\"". htmlspecialchars($produkt['isbn'])."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edycja?'Uaktualnienie':'Dodanie'; ?> produktu" />
        </form></td>
        <?php
           if ($edycja) {
             echo "<td>
                   <form method=\"post\" action=\"usun_produkt.php\">
                   <input type=\"hidden\" name=\"isbn\"
                    value=\"". htmlspecialchars($produkt['isbn']) ."\" />
                   <input type=\"submit\" value=\"Usuń produkt\" />
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>
<?php
}

function wyswietl_haslo_form() {
?>
   <br />
   <form action="zmiana_hasla.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Dotychczasowe hasło:</td>
       <td><input type="password" name="stare_haslo" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Nowe hasło:</td>
       <td><input type="haslo" name="nowe_haslo" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Powtórz nowe hasło:</td>
       <td><input type="password" name="nowe_haslo2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan="2" align="center"><input type="submit" value="Zmiana hasła">
   </td></tr>
   </table>
   <br />
<?php
};

function dodaj_kat($nazwakat) {
   $wynik = lacz_bd();
   $zapytanie = "SELECT * FROM kategorie WHERE nazwakat ='".$nazwakat."'";
   $query = mysqli_query($wynik, $zapytanie);
   if ((!$query) || (mysqli_num_rows($query)!=0)) {
     return false;
   }

   // dodanie nowej kategorii
   $zapytanie = "INSERT INTO kategorie VALUES (NULL, '".$nazwakat."')";
   $query = mysqli_query($wynik, $zapytanie);
   if (!$query) {
     return false;
   } else {
     return true;
   }
}

function dodaj_produkt($isbn, $nazwa, $idkat, $cena, $opis) {
// dodanie nowego produktu do bazy danych

   $wynik = lacz_bd();

   // sprawdzenie, czy produkt juz nie istnieje
   $zapytanie = "SELECT * FROM produkty WHERE isbn='".$isbn."'";
   $query = mysqli_query($wynik, $zapytanie);
   if ((!$query) || (mysqli_num_rows($query)!=0)) {
     return false;
   }

   // dodanie nowego produktu
   $zapytanie = "INSERT INTO produkty VALUES ('".$isbn."', '".$nazwa."', '".$idkat."', '".$cena."', '".$opis."')";
   $query = mysqli_query($wynik, $zapytanie);
   if (!$query) {
     return false;
   } else {
     return true;
   }
}

function uakt_kat($idkat, $nazwakat) {

   $wynik = lacz_bd();

   $zapytanie = "UPDATE kategorie SET nazwakat='".$nazwakat."' WHERE idkat='".$idkat."'";

             echo $zapytanie;
$query = mysqli_query($wynik, $zapytanie);
   if (!$query) {
     return false;
   } else {
     return true;
   }
}

function uakt_produkt($staryisbn, $isbn, $nazwa, $idkat, $cena, $opis) {

   $wynik = lacz_bd();

   $zapytanie = "UPDATE produkty SET isbn='".$isbn."', nazwa ='".$nazwa."', idkat = '".$idkat."', cena = '".$cena."', opis = '".$opis."' where isbn='".$staryisbn."'";

   $query = @mysqli_query($wynik, $zapytanie);
   if (!$query) {
     return false;
   } else {
     return true;
   }
}

function usun_kategorie($idkat) {

   $wynik= lacz_bd();
   $zapytanie = "SELECT * FROM produkty WHERE idkat='".$idkat."'";
   $query = @mysqli_query($wynik, $zapytanie);
   if ((!$query) || (@$query->num_rows > 0)) {
     return false;
   }

   $zapytanie = "DELETE FROM kategorie WHERE idkat='".$idkat."'";
   $query = @mysqli_query($wynik, $zapytanie);
   if (!$query) {
     return false;
   } else {
     return true;
   }
}


function usun_produkt($isbn) {

   $wynik = lacz_bd();

   $zapytanie = "DELETE FROM produkty WHERE isbn='".$isbn."'";
   $query= @mysqli_query($wynik, $zapytanie);
   if (!$query) {
     return false;
   } else {
     return true;
   }
}

?>