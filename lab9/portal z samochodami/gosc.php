<?php
include 'Uzytkownik.php';
session_save_path(".\session_save");
session_start();

$uzytkownik = new Uzytkownik(1, "gosc");
$_SESSION["uzytkownik"] = $uzytkownik;
header("Location: pierwsza_strona.php");
?>