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
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/fontello.css" type="text/css">
	
</head>
<body>

<div class="container-fluid">
       
	<div class="logo">
		<a href="panzieleniak.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
	</div>
<?php
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		echo "<div class='right'>

				<div class='zakupy'>

					<span class='hello'>
						Witaj ".$_SESSION['imie']."!<br />
					</span>
					<span class='red'>
							Ilość produktów w
					</span>
					<br />
						<a href='pokaz_kosz.php'>
							<div class='basket'>
								<img style='width: 30px;' src='img/koszyk.png'>
                                <span class='red'>= ".$_SESSION['produkty']."(".number_format($_SESSION['calkowita_wartosc'],2)." PLN)</span>
							</div>
						</a>
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
							<input type='password' class='input' name='pass' value='' placeholder='Hasło'>
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

		        <br /><br />
			<a href="pytajoprodukt.php">Zapytaj o produkt</a><br />
                        <br /><br />
			<a href="komentarze.php">Napisz opinię!</a><br />
                        <br /><br />
			<div class='info'>
				<p id='klik'>Pozostałe informacje</p>
				<div id='pokaz' class="pokaz">
					<a href="warunkizakupow.php">Warunki zakupów</a>
                                        <br /><br />
					<a href="regulamin.php">Regulamin</a>
                                        <br /><br />
					<a href="kontakt.php">Kontakt</a>
				</div>
			</div>

			<div class="in">
				<a href="https://www.instagram.com/pan_zieleniak/?hl=en" target="_blank" class="sociallink"><i class="icon-instagram"></i></a>
			</div>

	</div>

	<div class="kontener">
		
		<div class="promo_box_big promo_all_site_box_big big_box_off promo_box_big_bottom_left promo_box_big_bottom_right">
				
			<div class="multiclick" onclick="toggle('divContent1')">~~~~>Warzywa<~~~~</div>
				<div id="divContent1" class="divContent1">
					<a href="owoce.php">Owoce</a>
					<br />
					<a href="nabialibakalie.php">Nabiał oraz bakalie</a>
				</div>
						
					<div class="slider-wrap">

						<div class="slide-wrap">
								
								<div class="slider-slide-wrap shown">

									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=1">
												<img src="obrazki/1.jpg"></img>
											</a>
											<h5>Bakłażan 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">12,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=2">	
												<img src="obrazki/2.jpg"></img>
											</a>
											<h5>Bataty - słodkie ziemniaki 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">14,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=3">
												<img src="obrazki/3.jpg"></img>
											</a>
											<h5>Marchew 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										 <div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=4">		
												<img src="obrazki/4.jpg"></img>
											</a>
											<h5>Brokuły 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									 <div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=5">
												<img src="obrazki/5.jpg"></img>
											</a>
											<h5>Buraki czerwone 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										 <div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=6">
												<img src="obrazki/6.jpg"></img>
											</a>
											<h5>Buraki ćwikłowe - podłużne 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">

									<div class="ramkaproduktu">
										 <div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=7">
												<img src="obrazki/7.jpg"></img>
											</a>
											<h5>Cebula 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">30</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										 <div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=8">		
												<img src="obrazki/8.jpg"></img>
											</a>
											<h5>Cebula biała 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">7,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=49">
												<img src="obrazki/49.jpg"></img>
											</a>
											<h5>Włoszczyzna pęczek 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=10">		
												<img src="obrazki/10.jpg"></img>
											</a>
											<h5>Cukinia zielona 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">16,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=11">		
												<img src="obrazki/11.jpg"></img>
											</a>
											<h5>Cykoria 0,5kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=12">		
												<img src="obrazki/12.jpg"></img>
											</a>
											<h5>Cykoria czerwona 200g.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">7,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">

									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=13">
												<img src="obrazki/13.jpg"></img>
											</a>
											<br />
											<h5>Czosnek 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										 <div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=15">
												<img src="obrazki/15.jpg"></img>
											</a>
											<br />
											<h5>Dynia 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">4,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=16">
												<img src="obrazki/16.jpg"></img>
											</a>
											<br />
											<h5>Dynia Piżmowa - Butternut 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">13,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										 <div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=17">
												<img src="obrazki/17.jpg"></img>
											</a>
											<br />
											<h5>Fasolka zielona 500g.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">15,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=14">
												<img src="obrazki/14.jpg"></img>
											</a>
											<br />
											<h5>Groszek zielony 250g.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">12,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=18">
												<img src="obrazki/18.jpg"></img>
											</a>
											<br />
											<h5>Imbir - korzeń 100g.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">

									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=19">		
												<img src="obrazki/19.jpg"></img>
											</a>
											<br />
											<h5>Kalafior 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">8,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=20">
												<img src="obrazki/20.jpg"></img>
											</a>
											<br />
											<h5>Kalarepa 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=21">
												<img src="obrazki/21.jpg"></img>
											</a>
											<br />
											<h5>Kapusta biała 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=22">
												<img src="obrazki/22.jpg"></img>
											</a>
											<br />
											<h5>Kapusta biała kiszona 0,5kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">4,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=23">
												<img src="obrazki/23.jpg"></img>
											</a>
											<br />
											<h5>Kapusta czerwona 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=24">
												<img src="obrazki/24.jpg"></img>
											</a>
											<br />
											<h5>Kapusta czerwona kiszona 0,5kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">7,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">

									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=25">
												<img src="obrazki/25.jpg"></img>
											</a>
											<br />
											<h5>Kapusta pekińska ok. 800 - 1000g.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=26">
												<img src="obrazki/26.jpg"></img>
											</a>
											<br />
											<h5>Karczochy 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">17,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=27">
												<img src="obrazki/27.jpg"></img>
											</a>
											<br />
											<h5>Koper pęczek 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=28">
												<img src="obrazki/28.jpg"></img>
											</a>
											<br />
											<h5>Natka pietruszki 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">1,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=29">
												<img src="obrazki/29.jpg"></img>
											</a>
											<br />
											<h5>Ogórek szklarniowy 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">11,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=30">
												<img src="obrazki/30.jpg"></img>
											</a>
											<br />
											<h5>Papryka czerwona 0,5kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">8,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">																				
										
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=31">
												<img src="obrazki/31.jpg"></img>
											</a>
											<br />
											<h5>Papryka zielona 0,5 kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">8,<span style="font-size:0.8em">00</span> zł</div>
										 </div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=32">
												<img src="obrazki/32.jpg"></img>
											</a>
											<br />
											<h5>Papryka żółta 0,5 kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">8,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=33">
												<img src="obrazki/33.jpg"></img>
											</a>
											<br />
											<h5>Pieczarki 0,5kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=34">
												<img src="obrazki/34.jpg"></img>
											</a>
											<br />
											<h5>Pietruszka 0,5 kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=35">
												<img src="obrazki/35.jpg"></img>
											</a>
											<br />
											<h5>Pomidory 1kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">11,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=36">
												<img src="obrazki/36.jpg"></img>
											</a>
											<br />
											<h5>Por 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">

									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=37">
												<img src="obrazki/37.jpg"></img>
											</a>
											<br />
											<h5>Rzepa czarna 0,5 kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=38">
												<img src="obrazki/38.jpg"></img>
											</a>
											<br />
											<h5>Rzodkiew biała 1szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">4,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=39">
												<img src="obrazki/39.jpg"></img>
											</a>
											<br />
											<h5>Rzodkiewka pęczek 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">3,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=44">
												<img src="obrazki/44.jpg"></img>
											</a>
											<br />
											<h5>Sałata karbowana 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=42">
												<img src="obrazki/42.jpg"></img>
											</a>
											<br />
											<h5>Sałata lodowa 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">50</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=43">
												<img src="obrazki/43.jpg"></img>
											</a>
											<br />
											<h5>Sałata masłowa 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">60</span> zł</div>
										</div>
									</div>
								</div>
								<div class="slider-slide-wrap">

									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=45">
												<img src="obrazki/45.jpg"></img>
											</a>
											<br />
											<h5>Sałata rzymska 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=46">
												<img src="obrazki/46.jpg"></img>
											</a>
											<br />
											<h5>Seler 0,5 kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">00</span> zł</div>
										</div>
									</div>
									<div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=47">
												<img src="obrazki/47.jpg"></img>
											</a>
											<br />
											<h5>Szczypior dymka 1 szt.</h5>
													<div class="green_button" style="margin-left:auto;margin-right:auto">2,<span style="font-size:0.8em">50</span> zł</div>
												</div>
											</div>
											<div class="ramkaproduktu">
												<div class="zdjproduktu">
													<a href="pokaz_produkt.php?isbn=41">
														<img src="obrazki/41.jpg"></img>
													</a>
													<br/>
													<h5>Szparagi białe 500g.</h5>
													<div class="green_button" style="margin-left:auto;margin-right:auto">25,<span style="font-size:0.8em">00</span> zł</div>
												</div>
											</div>
											<div class="ramkaproduktu">
												<div class="zdjproduktu">
													<a href="pokaz_produkt.php?isbn=40">
														<img src="obrazki/40.jpg"></img>
													</a>
													<br />
													<h5>Szparagi zielone 500g.</h5>
													<div class="green_button" style="margin-left:auto;margin-right:auto">25,<span style="font-size:0.8em">00</span> zł</div>
												</div>
											</div>
											<div class="ramkaproduktu">
												<div class="zdjproduktu">
													<a href="pokaz_produkt.php?isbn=48">
														<img src="obrazki/48.jpg"></img>
													</a>
													<br />
													<h5>Topinambur 1 szt.</h5>
													<div class="green_button" style="margin-left:auto;margin-right:auto">20,<span style="font-size:0.8em">00</span> zł</div>
												</div>
											</div>
										</div>
										<div class="slider-slide-wrap">

											<div class="ramkaproduktu">
												<div class="zdjproduktu">
													<a href="pokaz_produkt.php?isbn=50">
														<img src="obrazki/50.jpg"></img>
													</a>
													<br />
													<h5>Ziemniaki 3kg.</h5>
														<div class="green_button" style="margin-left:auto;margin-right:auto">8,<span style="font-size:0.8em">00</span> zł</div>
												</div>
											</div>
										</div>

						</div>
					</div>
					<div id="slider-left" class="slider-nav"><i class="icon-left-open-1"></i></div>
					<div id="slider-right" class="slider-nav"><i class="icon-right-open-1"></i></div>
			</div>
					
	</div>
	<div class="cleaner"></div>

	<div class="footer">
				
		<div class="lefty">
			<a href="panzieleniak.php">panzieleniak.pl</a>
			<br />
				<a href="mailto:bartlomiejbronkowski90@gmail.com">kontakt@panzieleniak.pl</a>
			<br />
				+48 536 065 344
		</div>
		<div class="right">panzieleniak&copy;wszelkie prawa zastrzeżone
			<br />
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
				$(document).ready(function() {

			  var n = $(".slider-slide-wrap").length,
				width = 725,
				newwidth = width * n;

			  $('.slide-wrap').css({
				'width': newwidth
			  });

			  $(".slider-slide-wrap").each(function(i) {
				var thiswid = 725;
				$(this).css({
				  'left': thiswid * i
				});

			  });
			  /*on scroll move the indicator 'shown' class to the
			  most visible slide on viewport
			  */
			  $('.slider-wrap').scroll(function() {
				var scrollLeft = $(this).scrollLeft();
				$(".slider-slide-wrap").each(function(i) {
				  var posLeft = $(this).position().left
				  var w = $(this).width();

				  if (scrollLeft >= posLeft && scrollLeft < posLeft + w) {
					$(this).addClass('shown').siblings().removeClass('shown');
				  }
				});
			  });
			  /* on left button click scroll to the previous sibling of the current visible slide */
			  $('#slider-left').click(function() {
				var $prev = $('.slide-wrap .shown').prev();

				if ($prev.length) {
				  $('.slider-wrap').animate({
					scrollLeft: $prev.position().left
				  }, 'slow');
				}
			  });
			  /* on right button click scroll to the next sibling of the current visible slide */
			  $('#slider-right').click(function() {
				var $next = $('.slide-wrap .shown').next();

				if ($next.length) {
				  $('.slider-wrap').animate({
					scrollLeft: $next.position().left
				  }, 'slow');
				}
			  });
			});
		</script>

	<script type="text/javascript">
            function toggle(sDivId) {
                var oDiv = document.getElementById(sDivId);
                oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";
            }
        </script>
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>
</html>
