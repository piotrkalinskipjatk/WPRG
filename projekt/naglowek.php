<?php
session_save_path(".\session_save");
session_start();
echo'<fieldset>';
echo "Zalogowano jako: " . $_SESSION["login"];
if($_SESSION["rola"] != "gosc"){
    echo '<BR><a href="zmien_haslo.php">Zmień hasło</a>';
}
echo '<BR><a href="logowanie.php">Powrót do logowania</a>';
echo '</fieldset>';
echo "<BR><BR>";
?>