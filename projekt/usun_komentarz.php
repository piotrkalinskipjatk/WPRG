<?php
session_save_path(".\session_save");
session_start();

$id = $_GET["id_kom"];
$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $delete = "DELETE FROM komentarz WHERE id = '$id'";
    $result = mysqli_query($db_connection, $delete);

    include 'lataj_komentarze.php';

    header("Location: komentarze.php");
}
?>