<?php
session_save_path(".\session_save");
session_start();
function checkVar2()
{
    return isset($_POST['imie_osoby']) && isset($_POST['nazwisko_osoby']);
}
for($i = 0; $i < $_SESSION['ilosc_osob']; $i++){
    if(checkVar2()){
        $_SESSION['imie_osoby'][$i] = $_POST['imie_osoby'];
        $_SESSION['nazwisko_osoby'][$i] = $_POST['nazwisko_osoby'];
    }

    ?>
    <FORM action="zad1-2.php" method="post" >
        <fieldset>
            <TABLE>
                <TR>
                    <TD>Dane <?php echo $i+1 ?> osoby towarzyszacej:</TD>
                </TR>
                <TR>
                    <TD>Imie:</TD>
                    <TD><INPUT name="imie_osoby" ></TD>
                </TR>
                <TR>
                    <TD>Nazwisko:</TD>
                    <TD><INPUT name="nazwisko_osoby" ></TD>
                </TR>
            </TABLE>
        </fieldset>
    <?php
    }
?>
        <input type="submit" value="Wyslij">
    </FORM>
<?php
    if(checkVar2()){
        header('Location: zad1-3.php');
    }
?>
