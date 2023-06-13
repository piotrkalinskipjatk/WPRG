<?php

$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $id = $_SESSION['id_autora'];
    $querry = "SELECT login, email FROM uzytkownik WHERE id = '$id'";
    $result = mysqli_query($db_connection, $querry);
    if (mysqli_affected_rows($db_connection) != 0) {
        $row = mysqli_fetch_array($result);
        $login_autora = $row['login'];
        $email = $row['email'];
    }
}


echo'<fieldset>';
echo "Autor wpisu: " . $login_autora;
echo "<BR>". "E-mail: " . $email;
echo '</fieldset>';
echo "<BR><BR>";
?>