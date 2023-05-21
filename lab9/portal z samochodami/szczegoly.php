<?php
include 'Samochod.php';
session_save_path(".\session_save");
session_start();
$id = $_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT * FROM samochody WHERE id = '$id'";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $samochod = new Samochod($row["id"], $row["marka"], $row["model"], $row["cena"], $row["rok"], $row["opis"], $row["id_uzytkownik"]);
        echo "<table>";
        echo "<tr><td>ID: </td>";
        echo "<td>{$samochod->getId()}</td></tr>";
        echo "<tr><td>Marka: </td>";
        echo "<td>{$samochod->getMarka()}</td></tr>";
        echo "<tr><td>Model: </td>";
        echo "<td>{$samochod->getModel()}</td></tr>";
        echo "<tr><td>Rocznik: </td>";
        echo "<td>{$samochod->getRok()}</td></tr>";
        echo "<tr><td>Cena: </td>";
        echo "<td>{$samochod->getCena()}</td></tr>";
        echo "<tr><td>Opis: </td>";
        echo "<td>{$samochod->getOpis()}</td></tr>";
        echo "</table>";
    } else echo "<h2>Brak wyników!</h2>";
}
?>
<BR><a href="pierwsza_strona.php">Pierwsza strona
