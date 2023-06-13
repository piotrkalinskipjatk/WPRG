<?php
session_save_path(".\session_save");
session_start();
$_SESSION["uzytkownik_id"] = 1;
$_SESSION["rola"] = "gosc";
$_SESSION["login"] = "gosc";
header("Location: pierwsza_strona.php");
?>