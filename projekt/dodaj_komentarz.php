<?php
include 'naglowek.php';
function checkVar()
{
    return isset($_POST['tresc']) && strlen($_POST['tresc'])>0;
}

if(checkVar()){
    $tresc = $_POST['tresc'];
}
?>
<FORM action="dodaj_komentarz.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Podaj treść komentarza:</TD>
                <TD><INPUT type="text" name="tresc" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if(checkVar()){
    $db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $id_uzytkownik = $_SESSION["uzytkownik_id"];
        $data = date("Y-m-d");
        $id_wpisu = $_SESSION["id_wpisu_kom"];
        $insert = "INSERT INTO komentarz VALUES ('','$tresc','$data','$id_uzytkownik','$id_wpisu')";
        $result = mysqli_query($db_connection, $insert);
        include 'lataj_komentarze.php';
        if (mysqli_affected_rows($db_connection) != 0) {
            header("Location: komentarze.php");
        } else echo "Komentarz nie został dodany";
    }
} else echo "Brak lub niepoprawne dane";
?>
<BR><a href="komentarze.php?id_wpisu=$id_wpisu">Powrót
