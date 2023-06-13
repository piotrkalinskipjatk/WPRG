<?php
include 'naglowek.php';

$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $id = $_SESSION["id_komentarza"];
    $query = "SELECT * FROM komentarz WHERE id = '$id'";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $tresc = $row['tresc'];
    } else echo "<h2>Brak wyników!</h2>";
}

function checkVar(){
    return isset($_POST['tresc']) && strlen($_POST['tresc']) > 0 ;
}

if(checkVar()){
    $tresc = $_POST['tresc'];
}
?>
<FORM action="edytuj_komentarz.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Treść:</TD>
                <TD><INPUT name="tresc" value="<?php echo $tresc ?>"></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if (checkVar()) {
    $db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {

        $update = "UPDATE komentarz SET tresc = '$tresc' WHERE id = '$id'";
        $result = mysqli_query($db_connection, $update);
        if (mysqli_affected_rows($db_connection) != 0) {
            echo "Komwntarz zedytowany pomyslnie";
        } else echo "Komentarz nie zostal edytowany";
    }
} else echo "Brak lub niepoprawne dane";
?>
<BR><a href="komentarze.php">Powrót
