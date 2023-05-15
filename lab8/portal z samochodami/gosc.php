<?php
session_save_path(".\session_save");
session_start();
$_SESSION['id'] = 1;
$_SESSION['rola'] = "gosc";
header("Location: pierwsza_strona.php");
?>