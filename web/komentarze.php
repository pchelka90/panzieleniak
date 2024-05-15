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
  
		<title>PanZieleniak - internetowy warzywniak: świeże warzywa i owoce. Wrocław - Nowy Dwór!</title>
		<meta name="description" content="Serwis poświęcony firmie Panu Zieleniaku. Dowozimy świeże warzywa i owoce na terenie Wrocławia i okolic. Zapraszamy, a wręcz zachęcamy do zakupów!" />
		<meta name="keywords" content="warzywniak wrocław, warzywniak na dowóz, świeże warzywa i owoce na dowóz, warzywa dowóz wrocław, warzywa i owoce dowóz wrocław, warzywniak zakupy online, świeże warzywa i owoce zakupy online, warzywa i owoce online, warzywa online, owoce online" />
	  
		<link rel="stylesheet" href="stylesheet/main.css" type="text/css" />
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="stylesheet/css/fontello.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
</head>
<body>

  <div class="container-fluid">
 
	<div class="logo" style="float: left">
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
		
			<div class="hello">Wasze komentarze</div>
			
			<form method="POST" id="comment_form">
					<div class="input_box">
						<input type="text" name="comment_name" id="comment_name" class="moj_input form-control" placeholder="Wprowadź imię" />
					</div>
					<div class="input_box">
						<textarea name="comment_content" id="comment_content" class="moj_input form-control" placeholder="Wpisz swój komentarz" rows="5" style="width:750px"></textarea>
					</div>
					<br /><br />
					<br /><br />
						<input type="hidden" name="comment_id" id="comment_id" value="0" />
						<input type="submit" name="submit" id="submit" class="green_button" value="Zatwierdź" style="border:0;margin-left:auto;margin-right:auto" />
			</form>
			<span id="comment_message"></span>
			<br />
			<div id="display_comment"></div>
		   
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
			<script>
				$(document).ready(function(){
					$('#comment_form').on('submit', function(event){
						event.preventDefault();
						var form_data = $(this).serialize();
						$.ajax({
							url:"dodaj_komentarz.php",
							method:"POST",
							data:form_data,
							dataType:"JSON",
							success:function(data)
							{
								if(data.error != '')
								{
									$('#comment_form')[0].reset();
									$('#comment_message').html(data.error);
									$('#comment_id').val('0');
									load_comment();
								}
							}
						})
					});

					load_comment();

 function load_comment() {
  $.ajax( {
   url:"fetch_comment.php",
   method:"POST",
   success:function(data) {
    $('#display_comment').html(data);
			}
		})
	}

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
	});
	</script>
	
	</body>

</html>
