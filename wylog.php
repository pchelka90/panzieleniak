<?php
  require_once('funkcje_produktu_kz.php');
  session_start();
  $stary_uzyt = $HTTP_SESSION_VARS['uzyt_admin'];
  unset($HTTP_SESSION_VARS['uzyt_admin']);
  session_destroy();

  tworz_naglowek_html('Wylogowanie');

  if (!empty($stary_uzyt)) {
    echo "<p>Wylogowano.</p>";
    tworz_html_url("logowanie.php", "Logowanie");
  } else {
    echo "<p>Brak zalogowania, a więc nie wylogowano.</p>";
    tworz_html_url("logowanie.php", "logowanie");
  }

  tworz_stopke_html();
?>