<?php
include 'naglowek.php';

$db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $id = $_SESSION['id_wpisu'];
    $query = "SELECT * FROM wpis WHERE id = '$id'";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $tytul = $row['tytul'];
        $tresc = $row['tresc'];
    } else echo "<h2>Brak wyników!</h2>";
}

function checkVar(){
    return isset($_POST['tresc']) && isset($_POST['tytul']) && strlen($_POST['tresc']) > 0 && strlen($_POST['tytul']) > 0;
}

if(checkVar()){
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];
}
?>
<FORM action="edytuj_wpis.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Tytuł:</TD>
                <TD><INPUT name="tytul" value="<?php echo $tytul ?>"</TD>
            </TR>
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

        $update = "UPDATE wpis SET tytul = '$tytul', tresc = '$tresc' WHERE id = '$id'";
        $result = mysqli_query($db_connection, $update);
        if (mysqli_affected_rows($db_connection) != 0) {
            echo "Wpis zedytowany pomyslnie";
        } else echo "Wpis nie zostal edytowany";
    }
} else echo "Brak lub niepoprawne dane";
?>
<BR><a href="pierwsza_strona.php">Powrót
