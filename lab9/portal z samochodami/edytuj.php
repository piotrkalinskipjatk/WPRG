<?php
include 'Uzytkownik.php';
include 'Samochod.php';
session_save_path("./session_save");
session_start();
if(isset($_GET['id']))$_SESSION['id_samochodu'] = $_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $id_samochodu = $_SESSION['id_samochodu'];
    $query = "SELECT * FROM samochody WHERE id = '$id_samochodu'";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $samochod = new Samochod($row["id"], $row["marka"], $row["model"], $row["cena"], $row["rok"], $row["opis"], $row["id_uzytkownik"]);
        $marka = $samochod->getMarka();
        $model = $samochod->getModel();
        $rok = $samochod->getRok();
        $cena = $samochod->getCena();
        $opis = $samochod->getOpis();
    } else echo "<h2>Brak wyników!</h2>";
}

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
<FORM action="edytuj.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Marka:</TD>
                <TD><INPUT name="marka" value="<?php echo $marka ?>"</TD>
            </TR>
            <TR>
                <TD>Model:</TD>
                <TD><INPUT name="model" value="<?php echo $model ?>"></TD>
            </TR>
            <TR>
                <TD>Rocznik:</TD>
                <TD><INPUT name="rok" value="<?php echo $rok ?>"></TD>
            </TR>
            <TR>
                <TD>Cena:</TD>
                <TD><INPUT name="cena" value="<?php echo $cena ?>"></TD>
            </TR>
            <TR>
                <TD>Opis:</TD>
                <TD><INPUT name="opis" value="<?php echo $opis ?>"></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if (checkVar()) {
    if (checkNumeric()) {
        $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        } else {
            $id_uzytkownika = $_SESSION["uzytkownik"]->getId();
            $update = "UPDATE samochody SET marka = '$marka', model = '$model', cena = '$cena', rok = '$rok', opis = '$opis' WHERE id = '$id_samochodu'";
            $result = mysqli_query($db_connection, $update);
            if (mysqli_affected_rows($db_connection) != 0) {
                echo "Pojazd zedytowany pomyslnie";
            } else echo "Pojazd nie zostal edytowany";
        }
    } else echo "Brak lub niepoprawne dane";
} else echo "Brak lub niepoprawne dane";
?>
<BR><a href="moje_samochody.php">Moje samochody
