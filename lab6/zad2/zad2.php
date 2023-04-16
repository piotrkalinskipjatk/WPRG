<?php
function checkVar()
{
    return isset($_POST['imie']);
}
?>

<FORM action="zad2.php" method="post" >
    <fieldset>
        <TABLE>
            <TR>
                <TD>Imie:</TD>
                <TD><INPUT name="imie" ></TD>
            </TR>
        </TABLE>
    </fieldset>
    <input type="submit" value="Wyslij">
</FORM>
<?php
if(checkVar()){
    $imie = $_POST['imie'];
    if(isset($_COOKIE[$imie])){
        $licznik =  $_COOKIE[$imie];
        $licznik += 1;
    } else $licznik = 1;
    setcookie($imie,$licznik, time() + 60*60*24);
    echo $licznik;
}
?>