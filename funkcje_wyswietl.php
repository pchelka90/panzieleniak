<?php
    function tworz_naglowek_html($tytul = '') {
    // wyświetlenie nagłówka HTML
    // zadeklarowanie zmiennych sesji zastosowanych w funkcji
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
        if(!$_SESSION['produkty']) {
        $_SESSION['produkty'] = '0';
        }
    if(!$_SESSION['calkowita_wartosc']) {
        $_SESSION['calkowita_wartosc'] = '0.00';
        }
    }
    ?>

<?php
  if($tytul) {
    tworz_tytul_html($tytul);
  }
}

function tworz_stopke_html() {
  // wyświetlenie stopki HTML
?>
	<div class="cleaner"></div>

	<div id="footer">
	    <div style="float:left">
                <a href="panzieleniak.php">panzieleniak.pl</a><br />
		<a href="mailto:bartlomiejbronkowski90@gmail.com">kontakt@panzieleniak.pl</a><br />
		    +48 536 065 344
	    </div>
	    <div style="float:right">panzieleniak&copy;wszelkie prawa zastrzeżone<br />
	        kreacja: <a href="https://pchelka90.github.io/portfolio-website/" target="_blank">Bartłomiej Bronkowski - portfolio</a>
	    </div>
				
	</div>
    
  </div>

<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
				$("#klik").click(function () { 
				$('#pokaz').slideToggle('normal');
				});
				});
			</script>

			<script type="text/javascript">
				$(document).ready(function(){
					$('.logowanie, .info').addClass("hidden");

					$('.logowanie, .info').click(function() {
						var $this = $(this);

						if ($this.hasClass("hidden")) {
							$(this).removeClass("hidden").addClass("visible");

						} 
					});
				});
			</script>

				<script type="text/javascript">
						onEventShowMenu = function(event) {
						var menuId = event.data ? event.data.id : null;
						var elBtn = jQuery(this);
						var elMenu = menuId ? jQuery('#' + menuId) : elBtn.next('ul');
					 
						if (elMenu.is(':visible')) {
							elMenu.hide();
							return false;
						}
					 
						if(!elMenu.data('inited')){
							elMenu.css('min-width', elBtn.width())
							elMenu.data('inited', true);
						}
					 
						elMenu.show().position({
							my: "left top",  at: "left bottom", of: elBtn
						});
					 
						jQuery(document).one("click", function() {
							elMenu.hide();
						});
						return false;
					}
					 
					jQuery(function() {
						jQuery( ".action.close" )
						.button({
							icons: {
									primary: "ui-icon-power",
									secondary: "ui-icon-triangle-1-s"
							}
						})
						.click(onEventShowMenu)
						;
					});
				</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>
</html>
<?php
}

function tworz_tytul_html($naglowek) {
  // wyświetlenie nagłówka
?>
  <h2><?php echo $naglowek; ?></h2>
<?php
}

function tworz_html_url($url, $nazwa) {
  // wyświetlenie URL-a jako łącza i nowa linia
?>
  <a href="<?php echo $url; ?>"><?php echo $nazwa; ?></a><br />
<?php
}

function wyswietl_kategorie($tablica_kat) {
  if (!is_array($tablica_kat)) {
     echo "<p>Brak dostępnych kategorii</p>";
     return;
  }
  echo "<ul>";
  foreach ($tablica_kat as $rzad) {
    $url = "pokaz_kat.php?idkat=".urlencode($rzad['idkat']);
    $tytul = $rzad['nazwakat'];
    echo "<li>";
    tworz_html_url($url, $tytul);
    echo "</li>";
  }
  echo "</ul>";
  echo "<hr />";
}

function wyswietl_produkty($tablica_produktow) {
  //wyświetlenie wszystkich produktów z przekazanej tablicy
  if (!is_array($tablica_produktow)) {
     echo "<p>Brak aktualnie dostępnych produktów w tej kategorii</p>";
  } else {
    //stworzenie tabeli
    echo "<div class='container'>
		
				<div class='promo_box_big promo_all_site_box_big big_box_off lefty  promo_box_big_bottom_left  promo_box_big_bottom_right'>
				    
                    <div class='slider-wrap'>
						<div class='slide-wrap'>
						    <div class='slider-slide-wrap shown'>";

    //stworzenie wiersza tabeli dla każdego produktu
    foreach ($tablica_produktow as $rzad)
    {
      $url = "pokaz_produkt.php?isbn=".($rzad['isbn']);
      if (@file_exists("obrazki/".$rzad['isbn'].".jpg")) {
        $tytul = "<div style='width:167px;float:left;margin:7px;text-align:center;
				    border:1px solid #fff;padding:20px;
		            -webkit-border--radius: 5px;
			        -khtml-border-radius: 5px;
					-moz-border-radius: 5px;
	                border-radius: 5px'>
					    <div style='height:150px'>
							<img src=\"obrazki/".($rzad['isbn']).".jpg\"></img><br />
		                </div>
		         </div>";
        tworz_html_url($url, $tytul);
      } else {
        echo "&nbsp;";
      }
	  echo "<div id='slider-left' class='slider-nav'><i class='icon-left-open-1'></i></div>
			<div id='slider-right' class='slider-nav'><i class='icon-right-open-1'></i></div>";
      $tytul =  $rzad['idkat'].', nazwakat '.$rzad['nazwakat'];
      tworz_html_url($url, $tytul);
      echo "</div></div></div>";
    }
    echo "</div>";
  }
  echo "</div>";
}

function wyswietl_dane_produktu($produkt) {
  // wyświetlenie wszystkich danych konkretnego produktu
  if (is_array($produkt)) {
    echo "<div style='float:right'>";
    //wyświetlenie obrazka jeżeli istnieje
    if (@file_exists("obrazki/".($produkt['isbn']).".jpg")) {
      $wielkosc = GetImageSize("obrazki/".$produkt['isbn'].".jpg");
      if(($wielkosc[0] > 0) && ($wielkosc[1] > 0)) {
        echo "<img src=\"obrazki/".$produkt['isbn'].".jpg\" style=\"border: 1px solid black\"/></div>";
      }
    }
	echo "&nbsp;";
  } else {
    echo "Dane tego produktu nie mogą zostać wyświetlone w tym momencie.";
  }
  echo "&nbsp;";
}

function wyswietl_form_kasy() {
  // wyświetlenie formularza pobierającego adres
?>
  <br />
  <table border = "0" width = "100%" cellspacing = "0">
  <form action = "zakup.php" method = "post">
  <tr><th colspan = "2" bgcolor="#cccccc">Dane klienta:</th></tr>
  <tr>
    <td>Numer telefonu</td>
    <td><input class="formularz" type = "tel" name = "telefon" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" value = "<?php echo "".$_SESSION['telefon'].""  ?>" maxlength = "11" size = "40"/></td>
  </tr>
  <tr>
    <td>Imię</td>
    <td><input class="formularz" type = "text" name = "imie" value = "<?php echo "".$_SESSION['imie'].""  ?>" maxlength = "40" size = "40"/></td>
  </tr>
  <tr>
    <td>Nazwa ulicy</td>
    <td><input class="formularz" type = "text" name = "ulica" list="ulica" value = "<?php echo "".$_SESSION['ulica'].""  ?>" maxlength = "40" size = "40"/></td>
  </tr>
  <tr>
    <td>Numer budynku</td>
    <td><input class="formularz" type = "number" name = "budynek" min="1" value = "<?php echo "".$_SESSION['budynek'].""  ?>" maxlength = "3" size = "40"/></td>
  </tr>
  <tr>
    <td>Numer mieszkania</td>
    <td><input class="formularz" type = "number" name = "mieszkanie" min="1" max="100" value = "<?php echo "".$_SESSION['mieszkanie'].""  ?>" maxlength = "2" size = "40"/></td>
  </tr>
  <tr>
    <td>Adres e-mail</td>
    <td><input class="formularz" type = "text" name = "email" value = "<?php echo "".$_SESSION['email'].""  ?>" maxlength = "40" size = "40"/></td>
  </tr>
  <tr><th colspan = "2" bgcolor="#cccccc">Adres dostawy (proszę zostawić puste jeżeli taki sam jak powyższy)</th></tr>
  <tr>
    <td>Numer telefonu</td>
    <td><input class="formularz" type = "text" name = "dos_telefon" value = "" maxlength = "40" size = "40"/></td>
  </tr>
  <tr>
    <td>Imię</td>
    <td><input class="formularz" type = "text" name = "dos_imie" value = "" maxlength = "40" size = "40"/></td>
  </tr>
  <tr>
    <td>Nazwa ulicy</td>
    <td>
		<input class="formularz" type = "text" name = "dos_ulica" list="dos_ulica" value = "" maxlength = "40" size = "40"/>
			<datalist id="dos_ulica">
				<option value="Budziszyńska"></option>
				<option value="Chociebuska"></option>
				<option value="Grodecka"></option>
				<option value="Komorowska"></option>
				<option value="Krośnieńska"></option>				
				<option value="Nowodworska"></option>
				<option value="Rogowska"></option>
				<option value="Wojrowicka"></option>
				<option value="Zemska"></option>
			</datalist>
	</td>
  </tr>
  <tr>
    <td>Numer budynku</td>
    <td><input class="formularz" type = "text" name = "dos_budynek" min="1" value = "" maxlength = "3" size = "40"/></td>
  </tr>
  <tr>
    <td>Numer mieszkania</td>
    <td><input class="formularz" type = "text" name = "dos_mieszkanie" min="1" max="100" value = "" maxlength = "2" size = "40"/></td>
  </tr>
  <tr>
    <td colspan = "2" align = "center">
      <p><strong>Proszę nacisnąć przycisk "Zakup" w celu dokonania zakupu
         lub "Kontynuacja zakupów" w celu zmiany zamówienia</strong></p>
     <?php wyswietl_form_przycisk("zakup", "Zakupienie tych produktów"); ?>
    </td>
  </tr>
  </form>
  </table><hr />
<?php
}

function wyswietl_dostawe($dostawa) {
  // wyświetlenie kosztów dostawy i całkowitej wartości
?>
  <table border = "0" width = "100%" cellspacing = "0">
  <tr><td align = "left">Dostawa</td>
      <td align = "right"> <?php echo number_format($dostawa, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align = "left">Wartość razem z dostawą</th>
      <th bgcolor="#cccccc" align = "right">PLN <?php echo number_format($dostawa+$_SESSION['calkowita_wartosc'], 2); ?></th>
  </tr>
  </table><br />
<?php
}

function wyswietl_form_karty($imie) {
  // wyświetlenie formularza karty
?>
  <table border = "0" width = "100%" cellspacing = "0">
  <form action = "przetworz.php" method = "post">
  <tr><th colspan = "2" bgcolor="#cccccc">Szczegóły karty kredytowej</th></tr>
  <tr>
    <td>Typ</td>
    <td><select name = "typ_karty">
        <option value="VISA">VISA</option>
        <option value="MasterCard">MasterCard</option>
        <option value="American Express">American Express</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Numer</td>
    <td><input class="formularz" type = "text" name = "numer_karty" value = "" maxlength = "16" size = "40"/></td>
  </tr>
  <tr>
    <td>kod AMEX (jeżeli wymagany)</td>
    <td><input class="formularz" type = "text" name = "kod_amex" value = "" maxlength = "4" size = "4"/></td>
  </tr>
  <tr>
    <td>Data ważności</td>
    <td>Miesiąc
      <select name = "miesiac_karty">
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      </select>
      Rok
      <select name = "rok_karty">
      <?php
      for ($y = date("Y"); $y < date("Y") + 10; $y++) {
         echo "<option value=\"".$y."\">".$y."</option>";
       }
       ?>
      </select>
  </tr>
  <tr>
    <td>Imię i nazwisko na karcie</td>
    <td><input class="formularz" type = "text" name = "nazwa_karty" value = "<?php echo $imie; ?>" maxlength = "40" size = "40"></td>
  </tr>
  <tr>
    <td colspan = "2" align = "center">
      <p><strong>Proszę nacisnąć przycisk "Kupuj" w celu dokonania zakupu
         lub "Kontynuuj zakupy" w celu zmiany zamówienia</strong></p>
     <?php wyswietl_form_przycisk('zakup', 'Zakup tych produktów'); ?>
    </td>
  </tr>
  </table>
<?php
}



function wyswietl_koszyk($koszyk, $zmiana = true, $obrazki = 1) {
  // wyświetlenie zawartości koszyka
  // opcjonalnie pozwala na zmiany (true lub false)
  // opcjonalnie dołącza obrazki(1 — tak, 0 — nie)

  echo "<table border = \"0\" width = \"100%\" cellspacing = \"0\">
        <form action = \"pokaz_kosz.php\" method = \"post\">
        <tr><th colspan = \"". (1+$obrazki) ."\" bgcolor=\"#cccccc\">Produkt</th>
        <th bgcolor=\"#cccccc\">Cena</th>
        <th bgcolor=\"#cccccc\">Ilość</th>
        <th bgcolor=\"#cccccc\">Wartość</th>
        </tr>";

  // wyświetlanie każdego produktu jako wiersza tabeli
  foreach ($koszyk as $isbn => $ilosc) {
    $produkt = pobierz_dane_produktu($isbn);
    echo "<tr>";
    if($obrazki ==true) {
      echo "<td align = \"left\">";
      if (file_exists("obrazki/{$isbn}.jpg")) {
         $wielkosc = GetImageSize("obrazki/{$isbn}.jpg");
         if(($wielkosc[0] > 0) && ($wielkosc[1] > 0)) {
           echo "<img src=\"obrazki/".htmlspecialchars($isbn).".jpg\"
                 style=\"border:1px solid black\"
                 width = \"".($wielkosc[0]/3) ."\"
                 height = \"" .($wielkosc[1]/3) . "\"/>";
         }
      } else {
         echo "&nbsp;";
      }
      echo "</td>";
    }
    echo "<td align = \"left\">
          <a href = \"pokaz_produkt.php?isbn=".urlencode($isbn)."\">".htmlspecialchars($produkt['nazwa'])."</a></td>
          <td align = \"center\">PLN ".number_format($produkt['cena'], 2)."</td>
          <td align = \"center\">";
    // jeżeli zmiany są dozwolone, ilości znajdują się w polach tekstowych
    if ($zmiana == true) {
      echo "<input type=\"text\" name=\"".htmlspecialchars($isbn)."\" value=\"".htmlspecialchars($ilosc)."\" size=\"3\">";
    } else {
      echo $ilosc;
    }
    echo "</td><td align=\"center\">PLN ".number_format($produkt['cena']*$ilosc,2)."</td></tr>\n";
  }
  // wyświetl wiersz sumy
  echo "<tr>
          <th colspan= \"". (2+$obrazki) ." bgcolor=\"#cccccc\">&nbsp;</td>
          <th align= \"center\" bgcolor=\"#cccccc\">
              ".htmlspecialchars($_SESSION['produkty'])."
          </th>
          <th align= \"center\" bgcolor=\"#cccccc\">
              PLN ".number_format($_SESSION['calkowita_wartosc'], 2)."
          </th>
        </tr>";
  // wyświetl przycisk zapisujący zmiany
  if($zmiana == true) {
    echo "<tr>
            <td colspan=\"". (2+$obrazki) ."\">&nbsp;</td>
            <td align=\"center\">
              <input type=\"hidden\" name=\"zapisz\" value=\"true\" />
              <input type=\"image\" src=\"img/zapisz-zmiany.png\"
                     border=\"0\" alt=\"Zapisz zmiany\">
            </td>
            <td>&nbsp;</td>
        </tr>";
  }
  echo "</form></table>";
}

function wyswietl_form_log() {
  // wyświetlenie formularza logowania
?>
  <form method="post" action="admin.php">
  <table bgcolor="#cccccc">
   <tr>
     <td>Nazwa użytkownika:</td>
     <td><input type="text" name="nazwa_uz" /></td></tr>
   <tr>
     <td>Hasło:</td>
     <td><input type="password" name="haslo" /></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Logowanie" /></td></tr>
   <tr>
 </table></form>
<?php
}

function wyswietl_menu_admin() {
?>
<br />
<a href="index.php">Główna strona</a><br />
<a href="dodaj_kat_form.php">Dodanie nowej kategorii</a><br />
<a href="dodaj_produkt_form.php">Dodanie nowego produktu</a><br />
<a href="zmiana_hasla_form.php">Zmiana hasła administratora</a><br />
<?php

}

function wyswietl_przycisk($cel, $obrazek, $alt) {
  echo "<div align=\"center\"><a href=\"$cel\">
        <img src=\"img/$obrazek".".png\"
        alt=\"".$alt."\" border=\"0\" height = \"50\"
        width = \"150\"></a></div>";
}

function wyswietl_form_przycisk($obrazek, $alt) {
  echo "<div align=\"center\"><input type = \"image\"
        src=\"img/$obrazek".".png\"
        alt=\"".$alt."\" border=\"0\" height = \"50\"
        width = \"135\"/></div>";
}

function wyswietl_przycisk_formularza($cel, $obrazek, $alt) {
  echo "<div align=\"center\"><a href=\"$cel\">
        <img src=\"img/$obrazek".".png\"
        alt=\"".$alt."\" border=\"0\" height = \"50\"
        width = \"150\"></a></div>";
}

?>
