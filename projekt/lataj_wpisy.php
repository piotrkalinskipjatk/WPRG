<?php
include 'lataj_komentarze.php';

$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}else {
    $querry = "SELECT id FROM wpis ORDER BY id ASC";
    $result = mysqli_query($db_connection, $querry);

    $id = 1;
    while ($row = mysqli_fetch_array($result)) {
        $stary_id = $row['id'];
        $update = "UPDATE wpis SET id = '$id' WHERE id = '$stary_id'";
        $result_update = mysqli_query($db_connection, $update);
        $id += 1;
    }
}
?>