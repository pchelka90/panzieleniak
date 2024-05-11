<?php
        session_start();
        include ('funkcje_produktu_kz.php');
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
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
      
      <div class="logo">
		<a href="panzieleniak.php"><span class="pan">pan</span><span class="zieleniak">zieleniak.pl</span></a>
      </div>

	<div class="menu">
	
		<button class="action close">
			<i class="icon-list-bullet"></i>
		</button>

		<ul class="button-menu">
			<li><a href="panzieleniak.php" class="action-trash">Strona główna</a></li>
			<li><a href="warzywa.php" class="action sZweryfikowany">Warzywa</a></li>
			<li><a href="owoce.php" class="action sDuplikat">Owoce</a></li>
			<li><a href="nabialibakalie.php" class="action sOdrzucony">Nabiał oraz bakalie</a></li>
			<li><a href="warunkizakupow.php" class="action sRezygnacja">Warunki zakupów</a></li>
			<li><a href="kontakt.php" class="action sRezygnacja">Kontakt</a></li>
			<li><a href="regulamin.php" class="action sRezygnacja">Regulamin</a></li>
		</ul>
		
	</div>
<?php
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
	    if(!isset($_SESSION['produkty']))$_SESSION['produkty']=null;
	    if(!isset($_SESSION['calkowita_wartosc']))$_SESSION['calkowita_wartosc']=null;
		echo "<div class='zakupy'>
				<span class='green'>
					Witaj ".$_SESSION['imie']."!
				</span>
					<span class='red'>
						Ilość produktów w
					</span>
					<a href='pokaz_kosz.php'>
						<img style='width: 35px;' src='img/koszyk.png'>
                        <span class='red'>= ".$_SESSION['produkty']."(".number_format($_SESSION['calkowita_wartosc'],2)." PLN)</span>
					</a>
			  </div>";
	}
?>
<?php
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		echo '<div class="right">

				<i class="icon-search-1"></i>
		
				<form action="wyniki.php" method="post">
					<div class="input_box szukaj">
						<input type="text" name="wyrazenie" placeholder="Szukaj produktu...">
					</div>
				</form>
	
			</div>';
	}
	
?>
	<div class="cleaner"></div>
	
	<div class="obrazki">
            
            <a href="warzywa.php"><img class="warzywa" src="img/warzywa.WebP"></a>
            <a href="owoce.php"><img class="owoce" src="img/owoce.WebP"></a>
            <div class="bakalie">
                <a href="nabialibakalie.php"><img class="bakalie" src="img/bakalie.WebP"></a>
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
				kreacja: <a href="https://pchelka90.github.io/portfolio-website/" target="_blank">Bartłomiej Bronkowski - portfolio</a>
		</div>
				
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
  	
  	<script src="js/cookieinfo.js"></script>

</body>
</html>
