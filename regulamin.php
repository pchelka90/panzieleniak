<?php
    session_start();
    include ('funkcje_produktu_kz.php');
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Pan Zieleniak - internetowy warzywniak: świeże warzywa i owoce. Wrocław - Nowy Dwór!</title>
        <meta name="description" content="Serwis poświęcony firmie Panu Zieleniaku. Dowozimy świeże warzywa i owoce na terenie Wrocławia i okolic. Zapraszamy, a wręcz zachęcamy do zakupów!" />
		<meta name="keywords" content="warzywniak wrocław, warzywniak na dowóz, świeże warzywa i owoce na dowóz, warzywa dowóz wrocław, warzywa i owoce dowóz wrocław, warzywniak zakupy online, świeże warzywa i owoce zakupy online, warzywa i owoce online, warzywa online, owoce online" />
			
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="css/fontello.css" type="text/css">
                <link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
</head>
<body>

  <div class="container-fluid">
	
	<div class="logo" style="float:left">
		<a href="panzieleniak.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
	</div>
<?php
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		echo "<div class='right'>

					<div class='kosz'>

						<span class='hello'>
							<p>Witaj ".$_SESSION['imie']."!</p>
						</span>
						<div class='ilosc_produktow'>
							<span class='red'>
								Ilość produktów = ".$_SESSION['produkty']."
							</span>
						</div>
						<div class='koszyk'>
							<a href='pokaz_kosz.php' class='basket'>
								Twój koszyk <img src='img/koszyk.png' alt='koszyczek zakupowy'/>
							</a>";
				  echo "</div>
						<div class='wartosc'>
							<span class='red'>
								Wartość = PLN ".number_format($_SESSION['calkowita_wartosc'],2)."
							</span>
						</div>
							<p><strong><a href='logout.php'>Wyloguj się</a></strong></p>

					</div>

			  </div>";
	}
?>
<?php
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		
		echo "&nbsp;";
		
	} else {
		echo "<div class='logowanie' style='float: right'>
	
				<p id='klik'>
					<span class='logowanie'>Logowanie<i class='icon-user'></i></span>
				</p>
				
				<div id='pokaz' class='small_box promo_box_big big_box_off lefty promo_box_big_bottom_left promo_box_big_top_right promo_box_big_top_left promo_box_big_bottom_right'>
										
					<form action='zaloguj.php' method='post'>
											
						<div class='input_box'>
							<input type='text' class='input' name='telefon' value='' placeholder='Nr tel podany przy rejestracji...' />
						</div>
						<div class='input_box'>
							<input type='password' class='input' name='haslo' value='' placeholder='Hasło'>
						</div>
						<div class='lefty'>
							<input type='submit' name='logowanie' class='green_button' value='Zaloguj' style='border:0'>
						</div>
									
					</form>

					<div class='marginl20 padd2'>
						<a href='przypomnij.php'>
							Zapomniałeś
							<br />
							hasła?
						</a>
					</div>

					<div class='cleaner'></div>
					
					<div class='padd2'>
						Nie masz konta? 
						<br />
						<a href='rejestracja.php'>
							Zarejestruj się!
						</a>
					</div>
					
				</div>

			</div>";
	}
?>
<?php
	if(isset($_SESSION['uzyt_admin'])) {
	   echo "&nbsp;";
	}
?>
<?php
	if(isset($_SESSION['uzyt_admin'])) {
		wyswietl_przycisk('wylog.php', 'wylogowanie', 'Wylogowanie');
	}
?>
<?php
	if(isset($_SESSION['uzyt_admin'])) {
		 echo "&nbsp;";
	}
?>
	<div class="panelboczny">

		<i class="icon-search-1"></i>
			
				<form action="wyniki.php" method="post">
					<div class="input_box szukaj">
						<input type="text" name="wyrazenie" placeholder="Szukaj produktu...">
					</div>
				</form>

			<br><br>
			<a href="pytajoprodukt.php">Zapytaj o produkt</a>
			<br><br><br>
			<a href="komentarze.php">Napisz opinię!</a>
			<br><br><br>

			<div class='info'>
				<p id='klik'>Pozostałe informacje</p>
				<div id='pokaz' class="pokaz">
					<a href="warunkizakupow.php">Warunki zakupów</a>
					<br /><br />
					<a href="regulamin.php">Regulamin</a>
					<br /><br />
					<a href="kontakt.php">Kontakt</a></span>
				</div>
			</div>

			<div class="in">
				<a href="https://www.instagram.com/pan_zieleniak/?hl=en" target="_blank" class="sociallink"><i class="icon-instagram"></i></a>
			</div>

	</div>

	<div class="kontener">
		
		<div class="promo_box_big promo_all_site_box_big big_box_off lefty promo_box_big_bottom_left promo_box_big_bottom_right">
				
			<div class="hello">Regulamin</div>
				
			<div>
				INFORMACJE OGÓLNE
			</div>
			<div>
				<span class="regulamin"> Sklep internetowy panzieleniak.pl, prowadzony jest przez Rafał&nbsp;Sadowski z siedzibą we&nbsp;54-440 Wrocławiu, ul. Budziszyńska 107,&nbsp;NIP&nbsp;1132655572 REGON&nbsp;380312311&nbsp;
				<br />
				1. Korzystanie ze sklepu internetowego oznacza akceptację regulaminu. Akceptacji regulaminu Klient dokonuje przed dokonaniem zakupu zaznaczając właściwe pole w formularzu rejestracyjnym.
				<br />
				II. DEFINICJE
				</span>
			</div>
			<div>
					
				<div>
					<span class="regulamin">Użytym w dalszej części regulaminu terminom nadano następujące znaczenie: 
						<br />
							1. Sprzedawca - Rafał Sadowski.
						<br />
							2. Umowa Sprzedaży - umowa zawarta przez sprzedawcę, a klientem sklepu internetowego za pośrednictwem strony internetowej panzieleniak.pl, w trybie określonym w niniejszym regulaminie. 
						<br />
							3.Klient-każda osoba fizyczna lub prawna, która posiada pełną zdolność do czynności prawnych w przypadku osób fizycznych lub osobowość prawną w przypadku osób prawnych, dokonała rejestracji i odwiedza stronę internetową w celu dokonania towarów w sklepie internetowym.
						<br />
							4. Dostawa-dostarczenie Klientowi przez panzieleniak.pl zamówionego towaru, stanowiące wykonanie świadczenia przez ------------------------ na podstawie umowy sprzedaży. Dostawa może być zrealizowana za pomocą transportu własnego lub przy wykorzystaniu usług firmy zewnętrznej.
						<br />
							5. Hasło-ustalony przez Klienta ciąg znaków ,wymagany wraz z Loginem do złożenia zamówienia w sklepie internetowym. 
						<br />
							6. Login-ustalone przez Klienta indywidualizujące go oznaczenie, wymagane wraz z hasłem do złożenia zamówienia w sklepie internetowym.
						<br />
							7. Obszar dostawy - Obszar dostawy obejmujący dzielnicę Wrocławia i umożliwiający dostawę towaru wysokiej jakości w określonym terminie.
						<br />
							III. WYMAGANIA SPRZĘTOWE 
						<br />
							W celu dokonania zakupów w sklepie internetowym, Klient powinien mieć do dyspozycji: 
						<br />
							1. Komputer lub urządzenie przenośne podłączone do sieci Internet. 
						<br />
							2. Łącze internetowe.
						<br />
							3. Przeglądarkę internetową zgodną z MS Internet Explorer 7.0 lub nowszą z uruchomioną obsługą Java Script. 
						<br />
							4.Aktywne konto poczty elektronicznej (e-mail). 
						<br />
							IV. ZAMÓWIENIE
						<br /> 
							1. Zamówienia można składać 24 godziny na całą dobę przez cały rok. 
						<br />
							2. Zamówienia są realizowane od poniedziałku do piątku w godz.8.00-19.00 i w soboty w godz.7.00-15.00. Zamówienia złożone do godz.22.00 jednego dnia dostarczane będą w dniu następnym w czasie realizacji dostaw w godzinach wcześniej ustalonych. e-zieleniak.pl zastrzega sobie prawo do zawieszenia zamówienia w dni świąteczne i ustawowo wolne od pracy. Każdorazowo informacja o zawieszeniu realizacji publikowana będzie na stronie sklepu. 
						<br />
							3. Do składania zamówień wymagane jest zarejestrowanie. Rejestracja ma na celu uzyskanie przez e-zieleniak.pl jako sprzedawcy niezbędnych danych do realizacji zamówienia. 
						<br />
							4. Klient ma prawo sprawdzenia w obecności pracownika dostarczającego zamówienie czy towar spełnia specyfikacje zamówienia. 
						<br />
							5. Zdjęcia przedstawiające warzywa i owoce są przykładowe i jako takie mogą odbiegać wyglądem od dostarczonych, jednakże dostarczony towar będzie pierwszej świeżości a każdorazowe stwierdzenie przy pracowniku niezgodności będzie podstawą do reklamacji. 
						<br />
							6. Złożenie zamówienia stanowi ofertę w rozumieniu Kodeksu Cywilnego, złożoną sprzedawcy za pośrednictwem panzieleniak.pl. Po złożeniu zamówienia panzieleniak.pl natychmiast przystępuje do realizacji zamówienia potwierdzając jego prawidłowość wiadomością wysłaną na e-mail podany podczas rejestracji lub kontaktem telefonicznym. Umowa sprzedaży zostaje zawarta z momentem złożenia oświadczenia o przyjęciu oferty w imieniu sprzedawcy przez panzieleniak.pl&nbsp;
					</span>
				</div>
				<div>
							7. Z powodu ograniczonej ilości towaru, aby zapewnić najwyższa świeżość zamówienia złożone po wyczerpaniu zapasów nie będą mogły być realizowane, o czym Klient zostanie poinformowany przez pracownika e-zieleniak.pl drogą mailową bądź telefoniczną. 
						<br />
							8. Zamówienia dla efektownego wyglądu i przez wzgląd na utrzymanie świeżości pakowane będą w kosze wiklinowe, torby papierowe ew. torby plastykowe.( kosze wiklinowe podlegają kaucji zwrotnej w wysokości 30zł ) 
						<br />
							9. Za koszt dostawy rozumie się opłatę wliczoną do rachunku wynikającą z dostawy towaru do Klienta zgodnie z cennikiem: <br>- zakupy do 60 zł ( nie wliczając zastawu za kosz wiklinowy) – 16 zł 
						<br />
							- zakupy do 120 zł ( nie wliczając zastawu za kosz wiklinowy) – 10 zł 
						<br />
							- zakupy powyżej 120 zł dostawa gratis. 
						<br />
							10.Oferta cenowa przeznaczona jest dla Klientów detalicznych, zakupy hurtowe i składanie zamówień wieloilościowych realizowane jest po wcześniejszym uzgodnieniu warunków współpracy. 
						<br />
							V. FORMY PŁATNOŚĆ
						<br />
							Klienci mogą korzystać z następujących form płatności: 
						<br />
							1. Płatność gotówką przy odbiorze towaru dla zamówień, których wartość zamówienia nie przekracza 1000zł 
						<br />
							2. Płatność przelewem na konto przy zamówieniu towarów, których wartość brutto przekracza 1000zł – ustalenia indywidualne
				</div>
				<div>
					VI. POLITYKA PRYWATNOŚCI
				</div>
				<div>
					<div>
						Zgodnie z art. 13 Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (Dz. U. UE L 119/1 z dnia 4 maja 2016 r.), zwanym dalej „RODO”, panzieleniak&nbsp;informuje, że:   
					</div>
					<div>
						1.Niniejsza Polityka Prywatności określa zasady przetwarzania i ochrony danych osobowych przekazanych przez Użytkowników w związku z korzystaniem przez nich usług oferowanych poprzez Serwis.
					</div>
					<div>
						2. Administratorem danych osobowych zawartych w serwisie jest 
					</div>
					<div>
						Panzieleniak Rafał Sadowski&nbsp; z siedzibą we Wrocławiu NIP 1132655572 REGON 380312311
					</div>
					<div>
						3. W trosce o bezpieczeństwo powierzonych nam danych opracowaliśmy wewnętrzne procedury i zalecenia, które mają zapobiec udostępnieniu danych osobom nieupoważnionym. Kontrolujemy ich wykonywanie i stale sprawdzamy ich zgodność z odpowiednimi aktami prawnymi - ustawą o ochronie danych osobowych, ustawą o świadczeniu usług drogą elektroniczną, a także wszelkiego rodzaju aktach wykonawczych i aktach prawa wspólnotowego.
					</div>
					<div>
						4. Dane Osobowe przetwarzane są na podstawie&nbsp;zgody wyrażanej przez Użytkownika oraz&nbsp;art. 6 ust. 1 lit a) RODO.
					</div>
					<div>
						5. Serwis realizuje funkcje pozyskiwania informacji o użytkownikach i ich zachowaniach w następujący sposób: 
					</div>
					<div>
						a)&nbsp;&nbsp;&nbsp;poprzez dobrowolnie wprowadzone w formularzu informacji tj.:<br />
						- imie i nazwisko
						<br />
						-adres zamieszkania
						<br />
						-adres e-mail
						<br />
						-nr telefonu
					</div>
					<div>
						b)&nbsp;&nbsp;&nbsp; poprzez gromadzenie plików “cookies” [patrz polityka plików “cookies”]. 
					</div>
					<div>
						6. Serwis zbiera informacje dobrowolnie podane przez użytkownika. 
					</div>
					<div>
						7. dane podane w formularzu są przetwarzane w celu wynikającym z funkcji konkretnego formularza np. w celu dokonania procesu obsługi kontaktu informacyjnego.
					</div>
					<div>
						8. Dane osobowe pozostawione w serwisie nie zostaną sprzedane ani udostępnione osobom trzecim, zgodnie z przepisami RODO.
					</div>
					<div>
						9. Do danych zawartych w formularzu przysługuje wgląd osobie fizycznej, która je tam umieściła. Osoba ta ma również praw do modyfikacji i zaprzestania przetwarzania swoich danych w dowolnym momencie.
					</div>
					<div>
						10. Zastrzegamy sobie prawo do zmiany w polityce ochrony prywatności serwisu, na które może wpłynąć rozwój technologii internetowej, ewentualne zmiany prawa w zakresie ochrony danych osobowych oraz rozwój naszego serwisu internetowego. O wszelkich zmianach będziemy informować w sposób widoczny i zrozumiały.
					</div>
					<div>
						11. W Serwisie mogą pojawiać się linki do innych stron internetowych. Takie strony internetowe działają niezależnie od Serwisu i nie są w żaden sposób nadzorowane przez serwis e-zieleniak.pl. Strony te mogą posiadać własne polityki dotyczące prywatności oraz regulaminy, z którymi zalecamy się zapoznać.
					</div>
					<div>
						W razie wątpliwości co któregokolwiek z zapisów niniejszej polityki prywatności jesteśmy do dyspozycji - nasze dane znaleźć można w zakładce - <a href="kontakt.php">Kontakt</a>.
					</div>
						<br />
				</div>  
			</div>
		
		</div>
					
	</div>
	<div class="cleaner"></div>

	<div class="footer">
				
		<div class="lefty">
			<a href="panzieleniak.php">panzieleniak.pl</a>
			<br />
				<a href="mailto:kontakt@panzieleniak.pl">kontakt@panzieleniak.pl</a>
			<br />
				+48 601 150 149
		</div>
		<div class="right">panzieleniak&copy;wszelkie prawa zastrzeżone
			<br />
				kreacja: <a href="https://bbronkowski.000webhostapp.com/" target="_blank">Bartłomiej Bronkowski - portfolio</a>
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
  	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>
</html>