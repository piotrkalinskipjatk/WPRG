<?php
include 'Samochod.php';
include 'Uzytkownik.php';
session_save_path(".\session_save");
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    if($_SESSION["uzytkownik"]->getRola() == "admin"){
        $query = "SELECT * FROM samochody";
    }
    else{
        $id_uzytkownika = $_SESSION["uzytkownik"]->getId();
        $query = "SELECT * FROM samochody WHERE id_uzytkownik = '$id_uzytkownika'";
    }
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        echo "<table>";
        echo "<tr>";
        echo "<td></td>";
        echo "<td>ID: </td>";
        echo "<td>Marka: </td>";
        echo "<td>Model: </td>";
        echo "<td>Rocznik: </td>";
        echo "<td>Cena: </td>";
        echo "<td>Opis: </td>";
        if($_SESSION["uzytkownik"]->getRola() == "admin") echo "<td>ID uzytkownika: </td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            $samochod = new Samochod($row["id"], $row["marka"], $row["model"], $row["cena"], $row["rok"], $row["opis"], $row["id_uzytkownik"]);
            echo "<tr>";
            echo "<td><a href=edytuj.php?id={$samochod->getId()}>Edytuj</td>";
            echo "<td>{$samochod->getId()}</td>";
            echo "<td>{$samochod->getMarka()}</td>";
            echo "<td>{$samochod->getModel()}</td>";
            echo "<td>{$samochod->getRok()}</td>";
            echo "<td>{$samochod->getCena()}</td>";
            echo "<td>{$samochod->getOpis()}</td>";
            if($_SESSION["uzytkownik"]->getRola() == "admin") echo "<td>{$samochod->getIdUzytkownika()}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else echo "<h2>Brak wyników!</h2>";
}
?>
<BR><BR><a href="pierwsza_strona.php">Powrot do pierwszej strony