<?php
include 'naglowek.php';

$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT MAX(id) FROM wpis";
    $result = mysqli_query($db_connection, $query);
    $ostatnie_id = mysqli_fetch_array($result);
    if(isset($_GET['id_wpisu'])){
        $id_wpisu = $_GET['id_wpisu'];
        $query = "SELECT wpis.id_uzytkownik, wpis.id, tytul, tresc, login, data, sciezka_obrazka FROM wpis JOIN uzytkownik ON id_uzytkownik = uzytkownik.id WHERE wpis.id = '$id_wpisu' ORDER BY data DESC ";
    } else{
        $query = "SELECT wpis.id_uzytkownik, wpis.id, tytul, tresc, login, data, sciezka_obrazka FROM wpis JOIN uzytkownik ON id_uzytkownik = uzytkownik.id ORDER BY data DESC ";
    }

    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
       $row = mysqli_fetch_array($result);
       $_SESSION["id_wpisu"] = $row["id"];
       $_SESSION['id_autora'] = $row["id_uzytkownik"];
       echo "<fieldset>";
       echo "<h1>{$row["tytul"]}</h1><BR>";
       echo "{$row["tresc"]}<BR><BR>";
       if (!empty($row["sciezka_obrazka"])) echo '<img src="' . $row["sciezka_obrazka"] . '" alt="Obrazek" /><br>';
       echo "Autor: "."{$row["login"]}<BR>";
       echo "Data: "."{$row["data"]}<BR>";
       echo "<a href=komentarze.php?id_wpisu={$row["id"]}>Zobacz komentarze";
       if($_SESSION["rola"] == "admin" || $row['id_uzytkownik'] == $_SESSION['uzytkownik_id']) echo "<BR><a href=edytuj_wpis.php>Edytuj wpis</a>";
       if($_SESSION["rola"] == "admin") echo "<BR><a href=usun_wpis.php?id_wpisu={$row["id"]}>Usuń wpis</a>";
       echo "</fieldset>";
       if($row["id"] != $ostatnie_id["MAX(id)"]){
           $kolejne_id = $row["id"] + 1;
           echo "<a href=pierwsza_strona.php?id_wpisu=$kolejne_id>Następny wpis";
       }
       if($row["id"] != 1) {
           $poprzednie_id = $row["id"] - 1;
           echo "<BR><a href=pierwsza_strona.php?id_wpisu=$poprzednie_id>Poprzedni wpis";
       }
       if($_SESSION['rola'] != "gosc") echo "<BR><BR><a href=dodaj_wpis.php>Dodaj wpis";
    } else echo "<h2>Brak wyników!</h2>";
}
?>