<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>
<?php
    function checkVar()
    {
        return isset($_POST['liczba1']) && isset($_POST['liczba2']);
    }
    function checkVar2()
    {
        return isset($_POST['liczba3']);
    }
    function checkNumeric()
    {
        return is_numeric($_POST['liczba1']) && is_numeric($_POST['liczba2']);
    }
    function checkNumeric2()
    {
        return is_numeric($_POST['liczba3']);
    }
    $liczba1 = '';
    $liczba2 = '';
    $liczba3 = '';
    if (checkVar())
    {
        $liczba1 = $_POST['liczba1'];
        $liczba2 = $_POST['liczba2'];
    }
    if (checkVar2())
    {
        $liczba3 = $_POST['liczba3'];
    }
?>

<FORM name="prosty" action="zad2.php" method="POST">
    <fieldset>
        <legend>Kalkulator prosty</legend>
        <INPUT name="liczba1" value='<?php echo $liczba1?>'>
        <SELECT name="operacja1">
            <OPTION value="dodawanie">dodawanie</OPTION>
            <OPTION value="odejmowanie">odejmowanie</OPTION>
            <OPTION value="mnozenie">mnozenie</OPTION>
            <OPTION value="dzielenie">dzielenie</OPTION>
        </SELECT>
        <INPUT name="liczba2" value='<?php echo $liczba2?>'>
        <BR><BR>
        <INPUT type="submit" value="Oblicz">
    </fieldset>
</FORM>



<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (checkVar()) {
        if (checkNumeric()) {
            echo "W kalkulatorze prostym podano liczby {$_POST['liczba1']} oraz {$_POST['liczba2']}.<BR>";
            echo "Wynik działaia:<BR>";
            if($_POST['operacja1'] == "dodawanie"){
                echo "{$_POST['liczba1']} + {$_POST['liczba2']} = ";
                echo $_POST['liczba1'] + $_POST['liczba2'];
                echo "<BR>";
            }
            elseif($_POST['operacja1'] == "odejmowanie"){
                echo "{$_POST['liczba1']} - {$_POST['liczba2']} = ";
                echo $_POST['liczba1'] - $_POST['liczba2'];
                echo "<BR>";
            }
            elseif($_POST['operacja1'] == "mnozenie"){
                echo "{$_POST['liczba1']} * {$_POST['liczba2']} = ";
                echo $_POST['liczba1'] * $_POST['liczba2'];
                echo "<BR>";
            }
            elseif($_POST['operacja1'] == "dzielenie"){
                echo "{$_POST['liczba1']} / {$_POST['liczba2']} = ";
                echo $_POST['liczba1'] / $_POST['liczba2'];
                echo "<BR>";
            }
        } else {
            echo "Błędne dane! Jedna lub obie liczby są niepoprawne!<BR>";
        }
    } else {
        echo "Brak danych! Jedna lub obie liczby nie zostały podane!<BR>";
    }
}

?>
<FORM name="zaawansowany" action="zad2.php" method="POST">
    <fieldset>
        <legend>Kalkulator zaawansowany</legend>
        <INPUT name="liczba3" value='<?php echo $liczba3?>'>
        <SELECT name="operacja2">
            <OPTION value="cos">cos</OPTION>
            <OPTION value="sin">sin</OPTION>
            <OPTION value="tg">tg</OPTION>
            <OPTION value="Binarne na dziesietne">Binarne na dziesietne</OPTION>
            <OPTION value="Dziesietne na binarne">Dziesietne na binarne</OPTION>
            <OPTION value="Dziesietne na szesnastkowe">Dziesietne na szesnastkowe</OPTION>
            <OPTION value="Szesnastkowe na dziesietne">Szesnastkowe na dziesietne</OPTION>
            <OPTION value="Stopnie na radiany">Stopnie na radiany</OPTION>
            <OPTION value="Radiany na stopnie">Radiany na stopnie</OPTION>
        </SELECT>
        <BR><BR>
        <INPUT type="submit" value="Oblicz">
    </fieldset>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (checkVar2()) {
        if (checkNumeric2()) {
            echo "W kalkulatorze zaawansowanym podano liczbe {$_POST['liczba3']}.<BR>";
            echo "Wynik działaia:<BR>";
            if ($_POST['operacja2'] == "cos") {
                echo "cos({$_POST['liczba3']}) = ";
                echo cos($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "sin") {
                echo "sin({$_POST['liczba3']}) = ";
                echo sin($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "tg") {
                echo "tg({$_POST['liczba3']}) = ";
                echo tan($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "Binarne na dziesietne") {
                echo "binarne: {$_POST['liczba3']}<BR>";
                echo "dziesietne: ", bindec($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "Dziesietne na binarne") {
                echo "dziesietne: {$_POST['liczba3']}<BR>";
                echo "binarne: ", decbin($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "Dziesietne na szesnastkowe") {
                echo "dziesietne: {$_POST['liczba3']}<BR>";
                echo "szesnastkowe: ", dechex($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "Stopnie na radiany") {
                echo "stopnie: {$_POST['liczba3']}<BR>";
                echo "radiany: ", deg2rad($_POST['liczba3']);
                echo "<BR>";
            } elseif ($_POST['operacja2'] == "Radiany na stopnie") {
                echo "radiany: {$_POST['liczba3']}<BR>";
                echo "stopnie: ", rad2deg($_POST['liczba3']);
                echo "<BR>";
            }
        }
        elseif ($_POST['operacja2'] == "Szesnastkowe na dziesietne") {
            echo "W kalkulatorze zaawansowanym podano liczbe {$_POST['liczba3']}.<BR>";
            echo "Wynik działaia:<BR>";
            echo "szesnastkowe: {$_POST['liczba3']}<BR>";
            echo "dziesietne: ", hexdec($_POST['liczba3']);
            echo "<BR>";
        }
        else echo "Błędne dane! Liczba jest niepoprawna!<BR>";
    } else echo "Brak danych! Liczba nie została podana!<BR>";
}

?>

</body>
</html>