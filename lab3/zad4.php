<?php
function checkVar(){
    return isset($_POST['pesel']);
}
function checkNumeric(){
    return is_numeric($_POST['pesel']);
}
$pesel = '';
if (checkVar()) {
    $pesel = $_POST['pesel'];
}
?>

<FORM action="zad4.php" method="post" >
    <fieldset>
        <BR>
        <legend>Podaj pesel</legend>
        Pesel:
        <INPUT name="pesel"><BR><BR>
        <INPUT type="submit" value="Przeslij">
    </fieldset>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (checkVar()) {
        if (checkNumeric()) {
            if(strlen($pesel)==11){
                $rr = substr($pesel, 0, 2);
                $mm = substr($pesel, 2, 2);
                $dd = substr($pesel, 4, 2);
                $plec = substr($pesel, 10, 1);
                echo "Plec: ";
                if($plec%2==0){
                    echo "Kobieta<BR>";
                }
                else echo "Mezczyzna<BR>";
                echo "Data urodzenia(dd-mm-rr): ", $dd , "-" , $mm , "-" , $rr;
            }
            else echo "Błędne dane!<BR>";
        } else {
            echo "Błędne dane!<BR>";
        }
    } else {
    echo "Brak danych!<BR>";
    }
}

?>