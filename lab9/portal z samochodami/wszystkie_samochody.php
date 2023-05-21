<?php
include 'Samochod.php';
session_save_path(".\session_save");
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT * FROM samochody ORDER BY rok DESC";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        echo "<table>";
        echo "<tr>";
        echo "<td>ID: </td>";
        echo "<td>Marka: </td>";
        echo "<td>Model: </td>";
        echo "<td>Rocznik: </td>";
        echo "<td>Cena: </td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            $samochod = new Samochod($row["id"], $row["marka"], $row["model"], $row["cena"], $row["rok"], $row["opis"], $row["id_uzytkownik"]);
            echo "<tr>";
            echo "<td><a href=szczegoly.php?id={$samochod->getId()}> {$samochod->getId()}</td>";
            echo "<td>{$samochod->getMarka()}</td>";
            echo "<td>{$samochod->getModel()}</td>";
            echo "<td>{$samochod->getRok()}</td>";
            echo "<td>{$samochod->getCena()}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else echo "<h2>Brak wyników!</h2>";
}
?>