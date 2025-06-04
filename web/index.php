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
		<title>Pan zieleniak - internetowy warzywniak: świeże warzywa i owoce. Wrocław - Nowy Dwór!</title>
		<meta name="description" content="Serwis poświęcony firmie Panu Zieleniaku. Dowozimy świeże warzywa i owoce na terenie Wrocławia i okolic. Zapraszamy, a wręcz zachęcamy do zakupów!" />
		<meta name="keywords" content="warzywniak wrocław, warzywniak na dowóz, świeże warzywa i owoce na dowóz, warzywa dowóz wrocław, warzywa i owoce dowóz wrocław, warzywniak zakupy online, świeże warzywa i owoce zakupy online, warzywa i owoce online, warzywa online, owoce online" />

		<link rel="stylesheet" href="stylesheet/main.css" type="text/css">
		<link rel="stylesheet" href="stylesheet/css/fontello.css" type="text/css">
		<link rel="preload" href="stylesheet/font/lato-italic-webfont.woff" as="font" type="font/woff" crossorigin>
		<link rel="preload" href="stylesheet/font/lato-italic-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="apple-touch-icon" href="/favicon.ico">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

		<script type="text/javascript">
		$(document).ready(function() {
			$("#klik").click(function () {
				$('#pokaz').slideToggle('slow');
			});
		});
		</script>

		<script type="text/javascript"
			$(document).ready(function(){
 
				$('.categorydescriptioncontent p').each(function(i, el){
				    if ( i === 0) {
				    $('.showall').hide();   
				    } else {
				    $('.showall').show();
				     $(this).hide();
				    }
				 
				});
				 
				$(document).on("click", ".showall", function () {
				$('.categorydescriptioncontent p').show();
				$(this).remove();
				});
				 
				});
		</script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('.logowanie').addClass("hidden");
				$('.logowanie').click(function() {
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
						jQuery( "action close" )
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
					
	</head>
	
	<body>
		<div class="container-fluid">

			<div class="logo">
				<a href="index.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
			</div>
			
			<div class="categorydescriptioncontent">
				<button class="action close" aria-label="Left Align">
					<span class="material-icons" aria-hidden="true"><i class="material-icons icon-list-bullet"></i></span>
				</button>
				
				<ul class="button-menu"><br>
					<li><a href="index.php" class="action-trash">Strona główna</a></li><br>
					<li><a href="warzywa.php" class="action sZweryfikowany">Warzywa</a></li><br>
					<li><a href="owoce.php" class="action sDuplikat">Owoce</a></li><br>
					<li><a href="nabialibakalie.php" class="action sOdrzucony">Nabiał oraz bakalie</a></li><br>
					<li><a href="warunkizakupow.php" class="action sRezygnacja">Warunki zakupów</a></li><br>
					<li><a href="kontakt.php" class="action sRezygnacja">Kontakt</a></li><br>
					<li><a href="regulamin.php" class="action sRezygnacja">Regulamin</a></li><br>
				</ul>
			
			</div>

<?php
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
		echo "<div class='zakupy' style='font-size: 24px;'>
									<span class='green'>
										Witaj ".$_SESSION['imie']."!
									</span>
										<span class='red'>
											Ilość produktów w
										</span>
										<a href='pokaz_kosz.php'>
											<img style='width: 35px;' src='images/koszyk.png'></img>
											<span class='red'>= ".$_SESSION['produkty']."(".number_format($_SESSION['calkowita_wartosc'],2)." PLN)</span>
										</a>
										</div>";
									}
?>

			<div class="right">

				<span class="material-icons" aria-hidden="true"><i class="material-icons icon-search-1"></i></span>
					<form action="wyniki.php" method="post">
						
						<div class="input">
							<input type="text" name="wyrazenie" placeholder="Szukaj produktu...">
						</div>

					</form>
			
			</div>
			
			<div class="logowanie">
				
				<span id="klik" class="logowanie">Logowanie<i class="material-icons icon-user"></i></span>
				
				<div id="pokaz" class="small_box promo_box_big big_box_off promo_box_big_bottom_left promo_box_big_top_right promo_box_big_top_left promo_box_big_bottom_right">
					
					<form action="zaloguj.php" method="post">
								
						<div class="input_box">
							<input type="text" class="input" name="telefon" autocomplete="telefon" value="" placeholder="Nr tel podany przy rejestracji..." />
						</div>
						<div class="input_box">
							<input type="password" class="input" name="pass" autocomplete="current-password" value="" placeholder="Hasło" />
						</div>
						<div class="lefty">
							<input type="submit" name="logowanie" class="green_button" value="Zaloguj" style="border:0" />
						</div>
					
					</form>				
			
				<div class="marginl20 padd2">
					<a href="przypomnij.php">
						Zapomniałeś
						<br />
						hasła?
					</a>
				</div>

				<div class="cleaner"></div>
				
				<div class="padd2">
					Nie masz konta? 
					<br />
					<a href="rejestracja.php">
						Zarejestruj się!
					</a>
				</div>

			</div>

	</div>

<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

	<div class="cleaner"></div>

	<div class="obrazki">
		<a href="warzywa.php"><img class="warzywa" src="/images/warzywa.WebP" alt="warzywa"></img></a>
  <a href="owoce.php"><img class="owoce" src="./images/owoce.WebP" alt="owoce"></img></a>
  <div class="bakalie">
  	<a href="nabialibakalie.php"><img class="bakalie" src="/images/bakalie.WebP" alt="bakalie"></img></a>
		</div>
	</div>
	<div class="cleaner"></div>

<?php
  if(isset($_SESSION['uzyt_admin'])) {
    wyswietl_przycisk("admin.php", "menu-admin", "Menu Administratora");
  }
?>

	<div class="footer">
		<?php
			tworz_stopke_html();
		?>	
	</div>

  </div>
		
		<script src="/js/jquery-3.5.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

	</body>

	</html>
