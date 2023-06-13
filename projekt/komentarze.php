<?php
include 'naglowek.php';
include 'kontakt.php';

$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    if(isset($_GET["id_wpisu"])) $_SESSION["id_wpisu_kom"]= $_GET["id_wpisu"];
    $id_wpisu = $_SESSION["id_wpisu_kom"];
    $query = "SELECT komentarz.id, komentarz.data, uzytkownik.login, komentarz.tresc FROM komentarz JOIN wpis ON komentarz.id_wpis = wpis.id 
    JOIN uzytkownik ON komentarz.id_uzytkownik = uzytkownik.id WHERE komentarz.id_wpis = '$id_wpisu' ORDER BY data ASC";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["id_komentarza"] = $row["id"];
            echo "<fieldset>";
            echo "Autor: " . "{$row["login"]}<BR>";
            echo "Data: " . "{$row["data"]}<BR><BR>";
            echo "{$row["tresc"]}<BR>";
            if($_SESSION["rola"] == "admin" || $_SESSION['uzytkownik_id'] == $_SESSION['id_autora']) echo "<a href=edytuj_komentarz.php>Edytuj komentarz</a><BR>";
            if($_SESSION["rola"] == "admin") echo "<a href=usun_komentarz.php?id_kom={$row["id"]}>Usuń komentarz</a>";
            echo "</fieldset>";
        }
    } else {
        echo "<h2>Brak komentarzy!</h2>";
    }
    echo "<BR><a href=dodaj_komentarz.php>Komentuj";
    echo "<BR><a href=pierwsza_strona.php?id_wpisu=$id_wpisu>Powrót";
}
?>