<?php
session_save_path(".\session_save");
session_start();

function checkVar()
{
    return isset($_POST['stare_haslo']) && isset($_POST['nowe_haslo']);
}
function checkLength()
{
    return strlen($_POST['nowe_haslo'])>=1 && strlen($_POST['nowe_haslo'])<=64;
}

if (checkVar()) {
    $stare_haslo = $_POST['stare_haslo'];
    $nowe_haslo = $_POST['nowe_haslo'];
}
?>
<FORM action="zmien_haslo.php" method="post" >
    <fieldset><legend>Zmień hasło</legend>
        <TABLE>
            <TR>
                <TD>Stare hasło:</TD>
                <TD><INPUT name="stare_haslo" ></TD>
            </TR>
            <TR>
                <TD>Nowe hasło:</TD>
                <TD><INPUT name="nowe_haslo" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if(checkVar()) {
    if (checkLength()) {
        $db_connection = mysqli_connect("localhost", "root", "", "mojabaza2");
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        } else {
            $id = $_SESSION["uzytkownik_id"];
            $querry = "SELECT * FROM uzytkownik WHERE id = '$id' AND haslo = '$stare_haslo'";
            $result = mysqli_query($db_connection, $querry);
            if(mysqli_affected_rows($db_connection) == 0) echo "Niepoprawne stare haslo";
            else{
                $update = "UPDATE uzytkownik SET haslo = '$nowe_haslo' WHERE id = '$id'";
                $result = mysqli_query($db_connection, $update);
                if (mysqli_affected_rows($db_connection) != 0) {
                    header("Location: logowanie.php");
                } else echo "Zmiana hasla nie powiodla sie";
            }
        }
    } else echo "Niepoprawna dlugosc hasla";
} else echo "Podaj nowe haslo";
?>
<BR><BR><a href="logowanie.php">Powrot do logowania