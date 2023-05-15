<?php
session_save_path(".\session_save");
session_start();

function checkVar()
{
    return isset($_POST['login']) && isset($_POST['haslo']);
}

if (checkVar()) {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
}
?>
<FORM action="logowanie.php" method="post" >
    <fieldset><legend>Logowanie</legend>
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
    $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $querry = "SELECT uzytkownik.id, rola FROM uzytkownik JOIN rola ON id_rola = rola.id WHERE login = '$login' AND haslo = '$haslo'";
        $result = mysqli_query($db_connection, $querry);
        if (mysqli_affected_rows($db_connection) != 0) {
            $uzytkownik = mysqli_fetch_array($result);
            $_SESSION['id'] = $uzytkownik["id"];
            $_SESSION['rola'] = $uzytkownik["rola"];
            header("Location: pierwsza_strona.php");
        } else echo "Niepoprawny login lub haslo";
    }
} else echo "Podaj login i haslo";
?>
    <BR><BR><a href="stworz_konto.php">Stworz konto
    <BR><BR><a href="gosc.php">Kontynuuj jako gosc