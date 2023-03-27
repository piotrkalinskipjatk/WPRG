<?php
function checkVar()
{
    return isset($_POST['sciezka']) && isset($_POST['katalog']);
}
function checkSciezka($sciezka){
    return ($sciezka[strlen($sciezka)-1] == "/");
}
$sciezka = '';
$katalog = '';
$opcja = '';
if (checkVar())
{
    $sciezka = $_POST['sciezka'];
    $katalog = $_POST['katalog'];
    $opcja = $_POST['opcja'];
}
?>

<FORM action="zad3.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Podaj sciezke:</TD>
                <TD><INPUT name="sciezka" ></TD>
            </TR>
            <TR>
                <TD>Podaj nazwe katalogu:</TD>
                <TD><INPUT name="katalog" ></TD>
            </TR>
            <TR>
                <TD>Wybierz opcje:</TD>
                <TD><SELECT name="opcja">
                        <OPTION selected value="read">read</OPTION>
                        <OPTION value="delete">delete</OPTION>
                        <OPTION value="create">create</OPTION>
                    </SELECT></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>

<?php
if(checkVar()) {
    if(checkSciezka($sciezka)) {
        if ($opcja == "read") {
            if(file_exists($sciezka.$katalog)) {
                if (!($fd = opendir($sciezka . $katalog))) {
                    exit ("Nie moge otworzyc katalogu");
                }
                while (($file = readdir($fd)) !== false) {
                    if ($file != "." && $file != "..") {
                        echo "$file<BR>";
                    }
                }
                closedir($fd);
            }else echo "Katalog nie istnieje";
        }
        if ($opcja == "create") {
            if (file_exists($sciezka)) {
                mkdir($sciezka . $katalog);
                echo "Stworzono katalog";
            }else echo "Niepoprawna sciezka";
        }
        if ($opcja == "delete"){
            if (file_exists($sciezka.$katalog)) {
                $tab = scandir($sciezka . $katalog);
                if (count($tab) < 3) {
                    rmdir($sciezka . $katalog);
                    echo "Usunieto katalog";
                } else echo "Katalog nie jest pusty";
            }else echo "Katalog nie istnieje";
        }
    }else echo "Niepoprawna sciezka";
}else echo "Nie podano sciezki lub katalogu";
?>