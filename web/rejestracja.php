<?php
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location:index.php');
		exit();
	}

	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		$telefon = $_POST['telefon'];
		$imie = $_POST['imie'];
		$ulica = $_POST['ulica'];
		$budynek = $_POST['budynek'];
		$mieszkanie = $_POST['mieszkanie'];
		
		
		//Sprawdź poprawność adresu e-mail
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}
		
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}
		
		//Bot or not? Oto jest pytanie!
		$sekret = "6LdeYeMZAAAAAJoxHiSTda5jCasVjDbPdnKxONNE";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_telefon'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		if (isset($_POST['regulamin2'])) $_SESSION['fr_regulamin2'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy e-mail już istnieje?
				$rezultat = $polaczenie->query("SELECT idklienta FROM klienci WHERE telefon='$telefon'");
				
				if (!$rezultat) throw new Exception($polaczenie->mysql_error);
				
				$ile_takich_numerow = $rezultat->num_rows;
				if($ile_takich_numerow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_telefon']="Istnieje już konto przypisane do tego numeru telefonu!";
				}
				
				if ($wszystko_OK==true)
				{
					//Dodawanie klienta do bazy
					
					if ($polaczenie->query("INSERT INTO klienci VALUES (NULL, '$telefon', '$imie', '$ulica', '$budynek', '$mieszkanie', '$email', '$haslo_hash')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedgodości i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
	}

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

			<a href="pytajoprodukt.php">Zapytaj o produkt</a>
			<br /><br /><br />
			<a href="komentarze.php">Napisz opinię!</a>
			<br /><br /><br />

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
		
		<div class="promo_box_big promo_all_site_box_big big_box_off promo_box_big_bottom_left promo_box_big_bottom_right">
				
				<div class="hello">Rejestracja</div>
				
					Wypełnij poniższe pola aby założyć konto.
							
					<form method="post">
								
					<table class="klienci">
						
						<tr>
						  <td>Numer telefonu</td>
							<td>
						      <div class="input_box">
								<input type="tel" name="telefon" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" 
								value="<?php
										if (isset($_SESSION['fr_telefon']))
										{
										echo $_SESSION['fr_telefon'];
										unset($_SESSION['fr_telefon']);
										}
									  ?>" />
							  </div>
							</td>
						</tr>
						<?php
							if (isset($_SESSION['e_telefon']))
							{
								echo '<div class="error">'.$_SESSION['e_telefon'].'</div>';
								unset($_SESSION['e_telefon']);
							}
						?>
						<tr>
							<td>Imię</td>
							  <td>
								<div class="input_box">
								  <input type="text" class="input" name="imie" 
								  value="<?php
											if (isset($_SESSION['fr_imie']))
											{
												echo $_SESSION['fr_imie'];
												unset($_SESSION['fr_imie']);
											}
										 ?>" />
								</div>
							  </td>
						</tr>
						<?php
							if (isset($_SESSION['e_imie']))
							{
								echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
								unset($_SESSION['e_imie']);
							}
						?>
						<tr>
							<td>Nazwa ulicy</td>
							  <td>
								<div class="input_box">
								  <input type="text" class="input" name="ulica" list="ulica" 
								  value="<?php
											if (isset($_SESSION['fr_ulica']))
											{
												echo $_SESSION['fr_ulica'];
												unset($_SESSION['fr_ulica']);
											}
										?>" />
										<datalist id="ulica">
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
								</div>
							  </td>
						</tr>
						<tr>
							<td>Numer budynku</td>
							  <td>
								<div class="input_box">
								  <input type="number" class="input" name="budynek" min="1" 
								  value="<?php
											if (isset($_SESSION['fr_budynek']))
											{
												echo $_SESSION['fr_budynek'];
												unset($_SESSION['fr_budynek']);
											}
										 ?>" />
								</div>
							  </td>
						</tr>
						<tr>
							<td>Numer mieszkania</td>
							  <td>
								<div class="input_box">
								  <input type="number" class="input" name="mieszkanie" min="1" max="100" 
								  value="<?php
											if (isset($_SESSION['fr_mieszkanie']))
											{
												echo $_SESSION['fr_mieszkanie'];
												unset($_SESSION['fr_mieszkanie']);
											}
										 ?>" />
								</div>
							  </td>
						</tr>
						<tr>
							<td>Adres email</td>
			  				  <td>
								<div class="input_box">
								  <input type="text" class="input" name="email" 
								  value="<?php
											if (isset($_SESSION['fr_email']))
											{
												echo $_SESSION['fr_email'];
												unset($_SESSION['fr_email']);
											}
										 ?>" />
								</div>
							  </td>
						</tr>
					</tr>
					<?php
						if (isset($_SESSION['e_email']))
						{
							echo '<div class="error">'.$_SESSION['e_email'].'</div>';
							unset($_SESSION['e_email']);
						}
					?>
					<tr>
					  <tr>
						<td>Hasło</td>
				  		  <td>
							<div class="input_box">
							  <input type="password" class="input" name="haslo1" 
							  value="<?php
										if (isset($_SESSION['fr_haslo1']))
										{
											echo $_SESSION['fr_haslo1'];
											unset($_SESSION['fr_haslo1']);
										}
									 ?>" />
							</div>
						  </td>
					  </tr>
					<?php
						if (isset($_SESSION['e_haslo']))
						{
							echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
							unset($_SESSION['e_haslo']);
						}
					?>
						<tr>
						  <td>Powtórz hasło</td>
							<td>
							  <div class="input_box">
								<input type="password" class="input" name="haslo2" 
								value="<?php
										if (isset($_SESSION['fr_haslo2']))
										{
											echo $_SESSION['fr_haslo2'];
											unset($_SESSION['fr_haslo2']);
										}
									  ?>" />
							  </div>
							</td>
						</tr>
						<tr>
						  <td>Akceptuję <a href="regulamin.php">regulamin</a></td>
							<td>
							  <input type="checkbox" name="regulamin"
							  <?php
								if (isset($_SESSION['fr_regulamin']))
								{
									echo "checked";
									unset($_SESSION['fr_regulamin']);
								}
							  ?> />
							</td>
						</tr>
						<?php
							if (isset($_SESSION['e_regulamin']))
							{
								echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
								unset($_SESSION['e_regulamin']);
							}
						?>
						<tr>
						  <td colspan="2">
							<input type="checkbox" name="regulamin"
							<?php
								if (isset($_SESSION['fr_regulamin2']))
								{
									echo "checked";
									unset($_SESSION['fr_regulamin2']);
								}
							?> />
								Oświadczam dobrowolnie, że wyrażam zgodę na przetwarzanie i wykorzystanie moich danych osobowych zgodnie z ustawą z dnia 29.08.1997r. o Ochronie Danych Osobowych. Dysponuję prawem wglądu do swoich danych, poprawiania ich oraz usunięcia
						  </td>
						</tr>
						<?php
							if (isset($_SESSION['e_regulamin2']))
							{
								echo '<div class="error">'.$_SESSION['e_regulamin2'].'</div>';
								unset($_SESSION['e_regulamin2']);
							}
						?>
						</table>
						 <br />
						<div class="g-recaptcha" data-sitekey=""></div>
						<?php
							if (isset($_SESSION['e_bot']))
							{
								echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
								unset($_SESSION['e_bot']);
							}
						?>
						<br />
						<input type="submit" value="Zarejestruj!" class="green_button" style="border:0;margin-left:auto;margin-right:auto" />	

					</form>

		</div>
	<div class="cleaner"></div>

	<div class="footer">
		<?php
			tworz_stopke_html();
		?>
	</div>

  </div>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script type="text/javascript" src="./js/jquery-3.5.0.min.js"></script>
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
  	<script src="https://www.google.com/recaptcha/enterprise.js?render=6Lek7B0dAAAAANNCjEk30U5sMAmu_4HKTguLb4CT"></script>
	
</body>
</html>
