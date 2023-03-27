<?php
function checkVar()
{
    return isset($_POST['liczba']);
}
function checkNumeric()
{
    if(is_numeric($_POST['liczba']))
        return $_POST['liczba']>=0;
    else return 0;
}
$liczba = '';

if (checkVar())
{
    $liczba = $_POST['liczba'];
}

function silnia($liczba){
    $silnia = 1;
    for($i = 1; $i<=$liczba; $i++){
        $silnia*=$i;
    }
    return $silnia;
}

function rek_silnia($liczba){
    if($liczba == 0) return 1;
    else return $liczba * rek_silnia($liczba-1);
}
function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec); }
?>

<FORM action="zad2.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Podaj liczbe:</TD>
                <TD><INPUT name="liczba" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>

<?php
if(checkVar()) {
    if (checkNumeric()) {
        $start = microtime(true);
        echo "Wynik funkcji nie rekurencyjnej: ",silnia($liczba), "<BR>";
        $stop = microtime(true);
        echo "Czas wykonania: ", $stop-$start, "<BR>";
        $start = microtime(true);
        echo "Wynik funkcji rekurencyjnej: ",rek_silnia($liczba), "<BR>";
        $stop = microtime(true);
        echo "Czas wykonania: ", $stop-$start, "<BR>";
    }else echo "Bledne dane!";
}else echo "Brak danych!";
?>