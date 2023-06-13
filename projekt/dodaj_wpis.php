<?php
include 'naglowek.php';

function checkVar()
{
    return isset($_POST['tytul']) && isset($_POST['tresc']) && strlen($_POST['tytul']) > 0 && strlen($_POST['tresc']) > 0;
}

if (checkVar()) {
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];
    $sciezka_obrazka = '';
    if (isset($_FILES['obrazek']) && $_FILES['obrazek']['error'] === UPLOAD_ERR_OK) {
        $nazwa_pliku = $_FILES['obrazek']['name'];
        $lokalizacja_pliku = $_FILES['obrazek']['tmp_name'];
        $sciezka_obrazka = 'obrazy/' . $nazwa_pliku;
        move_uploaded_file($lokalizacja_pliku, $sciezka_obrazka);
    }
}
?>

<FORM action="dodaj_wpis.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <TABLE>
            <TR>
                <TD>Podaj tytuł:</TD>
                <TD><INPUT name="tytul"></TD>
            </TR>
            <TR>
                <TD>Podaj treść wpisu:</TD>
                <TD><INPUT type="text" name="tresc"></TD>
            </TR>
            <TR>
                <TD>Wybierz obrazek:</TD>
                <TD><INPUT type="file" name="obrazek"></TD>
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
        $insert = "INSERT INTO wpis (tytul, tresc, data, id_uzytkownik, sciezka_obrazka) 
                       VALUES ('$tytul', '$tresc', '$data', '$id_uzytkownik', '$sciezka_obrazka')";
        $result = mysqli_query($db_connection, $insert);
        include 'lataj_wpisy.php';
        if (mysqli_affected_rows($db_connection) != 0) {
            echo "Wpis dodany pomyślnie";
            header("Location: pierwsza_strona.php");
        } else echo "Wpis nie został dodany";
    }
} else echo "Brak lub niepoprawne dane";
?>