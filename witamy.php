<?php
	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
	
	
	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_telefon'])) unset($_SESSION['fr_telefon']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_telefon'])) unset($_SESSION['fr_telefon']);
	if (isset($_SESSION['fr_haslo'])) unset($_SESSION['fr_haslo']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	if (isset($_SESSION['fr_bot'])) unset($_SESSION['fr_bot']);

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>PanZieleniak - internetowy warzywniak: świeże warzywa i owoce. Wrocław - Nowy Dwór!</title>
        <meta name="description" content="Serwis poświęcony firmie Panu Zieleniaku. Dowozimy świeże warzywa i owoce na terenie Wrocławia i okolic. Zapraszamy, a wręcz zachęcamy do zakupów!" />
		<meta name="keywords" content="warzywniak wrocław, warzywniak na dowóz, świeże warzywa i owoce na dowóz, warzywa dowóz wrocław, warzywa i owoce dowóz wrocław, warzywniak zakupy online, świeże warzywa i owoce zakupy online, warzywa i owoce online, warzywa online, owoce online" />
		
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
			<link rel="stylesheet" href="style.css" type="text/css">
			<link rel="stylesheet" href="css/fontello.css" type="text/css">
                        <link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
</head>
<body>

  <div class="container-fluid">
	
	<div class="logo" style="float: left">
		<a href="panzieleniak.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
	</div>
	
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
	
	<div class="kontener">
	
		<div class="hello">Witamy!</div>
						
		<div class="promo_box_big promo_all_site_box_big big_box_off lefty promo_box_big_top_left promo_box_big_bottom_left promo_box_big_top_right promo_box_big_bottom_right">
			
			<div style="padding:20px">
			
				<div style="padding:0">
				<br /><br />
			
					<div style="position:absolute;z-index:20;top:20px">
	
						Dziękujemy za rejestrację w naszym serwisie! Możesz już zalogować się na swoje konto!
						<br /><br />
							
						<a href="index.php">Zaloguj się na swoje konto!</a>
						<br /><br />
					
					</div>
				
				</div>
			
			</div>
						
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
					onEventShowMenu = function(event) {
					var menuId = event.data ? event.data.id : null;
					var elBtn = jQuery(this);
					var elMenu = menuId ? jQuery('.' + menuId) : elBtn.next('ul');
				 
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
