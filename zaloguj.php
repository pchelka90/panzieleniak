<?php
	session_start();	
	
	if ((!isset($_POST['telefon'])) || (!isset($_POST['pass'])))
	{
		header('Location: index.php');
		exit();
	}
	
	require_once "connect.php";
	
	$polaczenie = @ new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$telefon = $_POST['telefon'];
		$haslo = $_POST['pass'];
		
		
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM klienci WHERE telefon='%s'",
		mysqli_real_escape_string($polaczenie,$telefon))))
		{
			$ile_numerow = $rezultat->num_rows;
			if ($ile_numerow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if (password_verify($haslo, $wiersz['pass']))
				{
					$_SESSION['zalogowany'] = true;
					$_SESSION['imie'] = $wiersz['imie'];
					$_SESSION['ulica'] = $wiersz['ulica'];
					$_SESSION['budynek'] = $wiersz['budynek'];
					$_SESSION['mieszkanie'] = $wiersz['mieszkanie'];
					$_SESSION['telefon'] = $wiersz['telefon'];
					$_SESSION['email'] = $wiersz['email'];
					
					unset($_SESSION['blad']);	
					$rezultat->free_result();
					header('Location: panzieleniak.php');
				}
				else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy nr telefonu lub hasło!</span>';
					header('Location: index.php');
				}
				
			} else {
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy nr telefonu lub hasło!</span>';
					header('Location: index.php');
				}
		}			
		
		$polaczenie->close();
	}
	
	$telefon = $_POST['telefon'];
	$haslo = $_POST['pass'];

	tworz_stopke_html();
?>
