<?php
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
        echo "<table>";
        echo "<tr><td>ID: </td>";
        echo "<td>{$row["id"]}</td></tr>";
        echo "<tr><td>Marka: </td>";
        echo "<td>{$row["marka"]}</td></tr>";
        echo "<tr><td>Model: </td>";
        echo "<td>{$row["model"]}</td></tr>";
        echo "<tr><td>Rocznik: </td>";
        echo "<td>{$row["rok"]}</td></tr>";
        echo "<tr><td>Cena: </td>";
        echo "<td>{$row["cena"]}</td></tr>";
        echo "<tr><td>Opis: </td>";
        echo "<td>{$row["opis"]}</td></tr>";
        echo "</table>";
    } else echo "<h2>Brak wyników!</h2>";
}
?>
<BR><a href="pierwsza_strona.php">Pierwsza strona
