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
		<meta name="description" content="Serwis poświęcony firmie Panu Zieleniaku. Dowozimy świeże warzywa i owoce na terenie Wrocławia i okolic. Zapraszamy, a wręcz zachęcamy do zakupów!" />
		<meta name="keywords" content="warzywniak wrocław, warzywniak na dowóz, świeże warzywa i owoce na dowóz, warzywa dowóz wrocław, warzywa i owoce dowóz wrocław, warzywniak zakupy online, świeże warzywa i owoce zakupy online, warzywa i owoce online, warzywa online, owoce online" />
		
		<title>Pan Zieleniak - internetowy warzywniak: świeże warzywa i owoce. Wrocław - Nowy Dwór!</title>

		<link rel="stylesheet" href="stylesheet/main.css" type="text/css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="stylesheet/css/fontello.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	</head>

<body>

	<div class="container-fluid">
		<div class="logo" style="float:left">
			<a href="index.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
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
				
			<div class="multiclick" onclick="toggle('divContent1')">~~~~>Owoce<~~~~</div>
				<div id="divContent1" class="divContent1">
					<a href="warzywa.php">Warzywa</a>
					<br />
					<a href="nabialibakalie.php">Nabiał oraz bakalie</a>
				</div>
						
				<div class="slider-wrap">

					<div class="slide-wrap">
								
						<div class="slider-slide-wrap shown">
							
							<div class="ramkaproduktu">	
									<div class="zdjproduktu">
										<a href="pokaz_produkt.php?isbn=51">
											<img src="images/51.jpg"></img>
										</a>
										<br />
										<h5>Ananas cały 1 szt.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">15,<span style="font-size:0.8em">00</span> zł</div>
									</div>
							</div>
								<div class="ramkaproduktu">	
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=52">		
												<img src="images/52.jpg"></img>
											</a>
											<br />
											<h5>Arbuz cały 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">36,<span style="font-size:0.8em">00</span> zł
											</div>
										</div>
								</div>
								<div class="ramkaproduktu">	
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=53">		
												<img src="images/53.jpg"></img>
											</a>
											<br />
											<h5>Avokado zielone 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">7,<span style="font-size:0.8em">00</span> zł</div>
										</div>
								</div>
                    	        <div class="ramkaproduktu">	
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=54">		
												<img src="images/54.jpg"></img>
											</a>
											<br />
											<h5>Banany 1 kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">7,<span style="font-size:0.8em">60</span> zł</div>
										</div>
								</div>
                    	        <div class="ramkaproduktu">
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=55">		
												<img src="images/55.jpg"></img>
											</a>
											<br />
											<h5>Cytryny 0,5kg.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">00</span> zł</div>
										</div>
								</div>
                    	        <div class="ramkaproduktu">	
										<div class="zdjproduktu">
											<a href="pokaz_produkt.php?isbn=58">		
												<img src="images/58.jpg"></img>
											</a>
											<br />
											<h5>Granat cały 1 szt.</h5>
											<div class="green_button" style="margin-left:auto;margin-right:auto">9,<span style="font-size:0.8em">50</span> zł</div>
										</div>
								</div>
							
						</div>
						<div class="slider-slide-wrap">

                           <div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=56">		
										<img src="images/56.jpg"></img>
									</a>
									<br />
									<h5>Grejpfruty 1 kg.</h5>
									<div class="green_button" style="margin-left:auto;margin-right:auto">9,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
                           	<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=61">		
										<img src="images/61.jpg"></img>
									</a>
									<br />
									<h5>Gruszki 1kg.</h5>
									<div class="green_button" style="margin-left:auto;margin-right:auto">9,<span style="font-size:0.8em">90</span> zł</div>
								</div>
							</div>
                            <div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=63">		
										<img src="images/63.jpg"></img>
									</a>
									<br />
									<h5>Jabłka Champion 1kg.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
                        	<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=64">		
										<img src="images/64.jpg"></img>
									</a>
									<br />
									<h5>Jabłka Jonagored 1kg.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">6,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
                           	<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=65">		
										<img src="images/65.jpg"></img>
									</a>
									<br />
									<h5>Jabłka Ligole 1kg.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">5,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
							<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=62">		
										<img src="images/62.jpg"></img>
									</a>
									<br />
									<h5>Kiwi 1 szt.</h5>
									<div class="green_button" style="margin-left:auto;margin-right:auto">1,<span style="font-size:0.8em">60</span> zł</div>
								</div>
							</div>
						
						</div>
						<div class="slider-slide-wrap">
                               
							<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=59">		
										<img src="images/59.jpg"></img>
									</a>
									<br />
									<h5>Limonka 1 szt.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">2,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
                           	<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=68">		
										<img src="images/68.jpg"></img>
									</a>
									<br />
									<h5>Maliny opakowanie 250g.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">18,<span style="font-size:0.8em">00</span> zł</div>
								</div>
							</div>
                            <div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=60">		
										<img src="images/60.jpg"></img>
									</a>
									<br />
									<h5>Mandarynki 1kg.</h5>
									<div class="green_button" style="margin-left:auto;margin-right:auto">10,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
                            <div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=57">		
										<img src="images/57.jpg"></img>
									</a>
									<br />
									<h5>Pomarańcze 1kg.</h5>
										<div class="green_button" style="margin-left:auto;margin-right:auto">9,<span style="font-size:0.8em">50</span> zł</div>
								</div>
							</div>
                           	<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=66">		
										<img src="images/66.jpg"></img>
									</a>
									<br />
									<h5>Winogrona jasne</h5>
									<div class="green_button" style="margin-left:auto;margin-right:auto">15,<span style="font-size:0.8em">00</span> zł</div>
								</div>
							</div>
                           	<div class="ramkaproduktu">	
								<div class="zdjproduktu">
									<a href="pokaz_produkt.php?isbn=67">		
										<img src="images/67.jpg"></img>
									</a>
									<br />
									<h5>Winogrona różowe</h5>
									<div class="green_button" style="margin-left:auto;margin-right:auto">16,<span style="font-size:0.8em">50</span> zł</div>
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
				
		<?php
			tworz_stopke_html();
		?>
				
	</div>

  </div>
		
		<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#klik").click(function () { 
					$('#pokaz').slideToggle('slow');
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
						$(this).css({'left': thiswid * i});
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
            function toggle(sDivId) {
                var oDiv = document.getElementById(sDivId);
                oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";
            }
        </script>
  	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
	</body>

</html>
