<?php
session_save_path(".\session_save");
session_start();

$id = $_GET["id_wpisu"];
$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT sciezka_obrazka FROM wpis WHERE id = '$id' ";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        if (file_exists($row["sciezka_obrazka"])) unlink($row["sciezka_obrazka"]);
    }
    $delete = "DELETE FROM komentarz WHERE id_wpis = '$id'";
    $result = mysqli_query($db_connection, $delete);
    $delete = "DELETE FROM wpis WHERE id = '$id'";
    $result = mysqli_query($db_connection, $delete);

    include  'lataj_wpisy.php';

    header("Location: pierwsza_strona.php");
}
?>