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
                <link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
</head>
<body>

  <div class="container-fluid">

	<div class="logo" style="float:left">
		<a href="panzieleniak.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
	</div>
	
	<div class="infodostawa">
		DOSTAWA TYLKO NOWY DWÓR
		<br />
		ZAMÓW TELEFONICZNIE
		<br />
		<span class="green">+48 601 150 149</span>
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

				<br />

			<a href="pytajoprodukt.php">Zapytaj o produkt</a>
			<br /><br />
			<a href="komentarze.php">Napisz opinię!</a>
			<br /><br />

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
	    
	    <div class='promo_box_big promo_all_site_box_big big_box_off lefty promo_box_big_bottom_left promo_box_big_bottom_right'>
						
			<div class='slider-wrap'>

				<div class='slide-wrap'>
								
					<div class='slider-slide-wrap shown'>
<?php
  $idkat = $_GET['idkat'];
  $nazwakat = pobierz_nazwe_kategorii($idkat);
  tworz_naglowek_html($nazwakat);
  $tablica_produktow = pobierz_produkty($idkat);

  wyswietl_produkty($tablica_produktow);
  if(isset($_SESSION['uzyt_admin']))
  {
    wyswietl_przycisk("indeks.php", "kontynuacja", "Kontynuacja zakupów");
    wyswietl_przycisk("admin.php", "menu-admin", "Menu Administratora");
    wyswietl_przycisk("edycja_kat_form.php?idkat=".urlencode($idkat),
     "edycja-kategorii", "Edycja kategorii");
  } else {
    wyswietl_przycisk("indeks.php", "kontynuacja", "Kontynuacja zakupów");
  }
?>
		    </div>
						
    	</div>
					
		</div>
		<div id='slider-left' class='slider-nav'><i class='icon-left-open-1'></i></div>
	   	<div id='slider-right' class='slider-nav'><i class='icon-right-open-1'></i></div>
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
			kreacja: <a href="panzieleniak.php">Bartłomiej Bronkowski - portfolio</a>
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
				$(document).ready(function() {

			  var n = $(".slider-slide-wrap").length,
				width = 680,
				newwidth = width * n;

			  $('.slide-wrap').css({
				'width': newwidth
			  });

			  $(".slider-slide-wrap").each(function(i) {
				var thiswid = 680;
				$(this).css({
				  'left': thiswid * i
				});

			  });
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
			  $('#slider-left').click(function() {
				var $prev = $('.slide-wrap .shown').prev();

				if ($prev.length) {
				  $('.slider-wrap').animate({
					scrollLeft: $prev.position().left
				  }, 'slow');
				}
			  });
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
	<script src="https://skrypt-cookies.pl/id/c7ecfa2edf59250c.js"></script>

</body>
</html>