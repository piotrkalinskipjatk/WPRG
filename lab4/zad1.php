<?php
function checkVar()
{
    return isset($_GET['rok']) && isset($_GET['miesiac']) && isset($_GET['dzien']);
}
function checkNumeric()
{
    return is_numeric($_GET['rok']) && is_numeric($_GET['miesiac']) && is_numeric($_GET['dzien']);
}
$rok = '';
$miesiac = '';
$dzien = '';
if (checkVar())
{
    $rok = $_GET['rok'];
    $miesiac = $_GET['miesiac'];
    $dzien = $_GET['dzien'];
}
?>

<FORM action="zad1.php" method="get" >
    <fieldset>
        <LEGEND>Podaj date urodzenia</LEGEND>
        <TABLE>
            <TR>
                <TD>Rok:</TD>
                <TD><INPUT name="rok" ></TD>
            </TR>
            <TR>
                <TD>Miesiac:</TD>
                <TD><INPUT name="miesiac" ></TD>
            </TR>
            <TR>
                <TD>Dzien:</TD>
                <TD><INPUT name="dzien" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>

<?php
if(checkVar()) {
    if (checkNumeric()) {
        if(checkdate($miesiac, $dzien, $rok)) {
            $data = mktime(0, 0, 0, $miesiac, $dzien, $rok);
            $dzisiaj = time();
            echo "Urodziles sie w ", date("l", $data), "<BR>";
            $wiek = date("Y", $dzisiaj) - date("Y", $data);
            if (mktime(0, 0, 0, $miesiac, $dzien, date("Y", $dzisiaj)) > $dzisiaj) {
                $urodziny = mktime(0, 0, 0, $miesiac, $dzien, date("Y", $dzisiaj));
                $wiek -= 1;
            } else $urodziny = mktime(0, 0, 0, $miesiac, $dzien, date("Y", $dzisiaj) + 1);
            echo "Masz ", $wiek, " lat<BR>";
            echo "Kolejne urodziny masz za ", abs(ceil(($urodziny - $dzisiaj) / 86400)), "dni<BR>";
        }
        else echo "Niepoprawna data!";
    }
    else echo "Bledne dane!";
}
else echo "Brak danych!";
?>