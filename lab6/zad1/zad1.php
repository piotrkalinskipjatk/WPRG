<?php
    session_save_path(".\session_save");
    session_start();
    function checkVar()
    {
        return isset($_POST['nr_karty']) && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['ilosc_osob']);
    }
    function checkNumeric()
    {
        return is_numeric($_POST['ilosc_osob']);
    }
    if(checkVar()){
        $_SESSION['nr_karty'] = $_POST['nr_karty'];
        $_SESSION['imie'] = $_POST['imie'];
        $_SESSION['nazwisko'] = $_POST['nazwisko'];
        $_SESSION['ilosc_osob'] = $_POST['ilosc_osob'];
    }
?>
<FORM action="zad1.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Nr karty:</TD>
                <TD><INPUT name="nr_karty" ></TD>
            </TR>
            <TR>
                <TD>Imie:</TD>
                <TD><INPUT name="imie" ></TD>
            </TR>
            <TR>
                <TD>Nazwisko:</TD>
                <TD><INPUT name="nazwisko" ></TD>
            </TR>
            <TR>
                <TD>Ilosc osob:</TD>
                <TD><INPUT name="ilosc_osob" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
    if(checkVar()) {
        if(checkNumeric()) {
            if($_SESSION['ilosc_osob'] > 0){
                header('Location: zad1-2.php');
            }
            else header('Location: zad1-3.php');
        } else echo "Bledne lub brak danych!";
    } else echo "Bledne lub brak danych!";
?>
