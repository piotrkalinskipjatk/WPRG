<?php
session_save_path(".\session_save");
session_start();
function checkVar()
{
    return isset($_POST['model']) && isset($_POST['marka']) && isset($_POST['rok']) && isset($_POST['cena']) && isset($_POST['opis']);
}
function checkNumeric()
{
    return is_numeric($_POST['rok']) && is_numeric($_POST['cena']) && $_POST['rok']>0 && $_POST['cena']>0;
}

if(checkVar()){
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rok = $_POST['rok'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
}
?>
<FORM action="dodaj_samochod.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Marka:</TD>
                <TD><INPUT name="marka" ></TD>
            </TR>
            <TR>
                <TD>Model:</TD>
                <TD><INPUT name="model" ></TD>
            </TR>
            <TR>
                <TD>Rocznik:</TD>
                <TD><INPUT name="rok" ></TD>
            </TR>
            <TR>
                <TD>Cena:</TD>
                <TD><INPUT name="cena" ></TD>
            </TR>
            <TR>
                <TD>Opis:</TD>
                <TD><INPUT name="opis" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if(checkVar()){
    if(checkNumeric()){
        $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        } else {
            $id_uzytkownika = $_SESSION['id'];
            $insert = "INSERT INTO samochody VALUES ('','$marka','$model','$cena','$rok','$opis','$id_uzytkownika')";
            $result = mysqli_query($db_connection, $insert);
            if (mysqli_affected_rows($db_connection) != 0) {
                echo "Pojazd dodany pomyslnie";
            } else echo "Pojazd nie zostal dodany";
        }
    } else echo "Brak lub niepoprawne dane";
} else echo "Brak lub niepoprawne dane";
?>
<BR><a href="pierwsza_strona.php">Pierwsza strona
