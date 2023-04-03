<?php
function checkVar()
{
    return isset($_POST['adres']) && isset($_POST['opis']);
}
$adres= '';
$opis = '';
if (checkVar())
{
    $adres= $_POST['adres'];
    $opis = $_POST['opis'];
}
?>
<FORM action="zad3.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Podaj adres:</TD>
                <TD><INPUT name="adres" ></TD>
            </TR>
            <TR>
                <TD>Podaj opis:</TD>
                <TD><INPUT name="opis" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if(checkVar()){
    $plik = fopen("zad3.txt", "a");
    fputs($plik, "http://".$adres."/;".$opis."\n");
    fclose($plik);
}
?>
