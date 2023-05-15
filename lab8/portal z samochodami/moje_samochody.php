<?php
session_save_path(".\session_save");
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    if($_SESSION['rola'] == "admin"){
        $query = "SELECT * FROM samochody";
    }
    else{
        $id_uzytkownika = $_SESSION['id'];
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
        if($_SESSION['rola'] == "admin") echo "<td>ID uzytkownika: </td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><a href=edytuj.php?id={$row["id"]}>Edytuj</td>";
            echo "<td>{$row["id"]}</td>";
            echo "<td>{$row["marka"]}</td>";
            echo "<td>{$row["model"]}</td>";
            echo "<td>{$row["rok"]}</td>";
            echo "<td>{$row["cena"]}</td>";
            echo "<td>{$row["opis"]}</td>";
            if($_SESSION['rola'] == "admin") echo "<td>{$row["id_uzytkownik"]}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else echo "<h2>Brak wyników!</h2>";
}
?>
<BR><BR><a href="pierwsza_strona.php">Powrot do pierwszej strony