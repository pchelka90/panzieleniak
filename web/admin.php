<?php

require_once('/web/functions/funkcje_produktu_kz.php');
session_start();

	if (($_POST['nazwa_uz']) && ($_POST['haslo'])) {

    $nazwa_uz = $_POST['nazwa_uz'];
    $haslo = $_POST['haslo'];

    if (loguj($nazwa_uz, $haslo)) {
      $_SESSION['uzyt_admin'] = $nazwa_uz;
    } else {
      tworz_naglowek_html("Problem:");
      echo "<p>Zalogowanie niemożliwe.<br />Należy być zalogowanym, aby przeglądać tę stronę.</p>";
      tworz_html_url('logowanie.php', 'Logowanie');
      tworz_stopke_html();
      exit;
    }
}

tworz_naglowek_html('Administracja');
if (sprawdz_uzyt_admin()) {
  wyswietl_menu_admin();
} else {
  echo "<p>Brak autoryzacji do wejścia na obszar administracyjny.</p>";
}

tworz_stopke_html();

?>
