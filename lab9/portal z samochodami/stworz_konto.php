<?php
session_save_path(".\session_save");
session_start();

function checkVar()
{
    return isset($_POST['login']) && isset($_POST['haslo']);
}
function checkLength()
{
    return strlen($_POST['login'])>=1 && strlen($_POST['login'])<=64 && strlen($_POST['haslo'])>=1 && strlen($_POST['haslo'])<=64;
}

if (checkVar()) {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
}
?>
<FORM action="stworz_konto.php" method="post" >
    <fieldset><legend>Nowe Konto</legend>
        <TABLE>
            <TR>
                <TD>login:</TD>
                <TD><INPUT name="login" ></TD>
            </TR>
            <TR>
                <TD>haslo:</TD>
                <TD><INPUT name="haslo" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if(checkVar()) {
    if (checkLength()) {
        $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        } else {
            $querry = "SELECT id FROM rola WHERE rola = 'zalogowany'";
            $result = mysqli_query($db_connection, $querry);
            $rola = mysqli_fetch_array($result);
            $rola = $rola["id"];
            $querry = "SELECT id FROM uzytkownik WHERE login = '$login'";
            $result = mysqli_query($db_connection, $querry);
            if (mysqli_affected_rows($db_connection) != 0) echo "Login zajety";
            else {
                $insert = "INSERT INTO uzytkownik VALUES ('','$login','$haslo','$rola')";
                $result = mysqli_query($db_connection, $insert);
                if (mysqli_affected_rows($db_connection) != 0) {
                    header("Location: logowanie.php");
                } else echo "Niepoprawny login lub haslo";
            }
        }
    } else echo "Niepoprawna dlugosc loginu lub hasla";
} else echo "Podaj login i haslo";
?>
<BR><BR><a href="logowanie.php">Powrot do logowania