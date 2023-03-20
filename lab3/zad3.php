<?php
function checkVar(){
    return isset($_POST['rok']);
}
function checkNumeric(){
    return is_numeric($_POST['rok']);
}
$rok = '';
if (checkVar()) {
    $rok = $_POST['rok'];
}
?>

<FORM action="zad3.php" method="post" >
    <fieldset>
        OBLICZANIE DATY WIELKANOCY<BR><BR>
        Podaj rok:
        <INPUT name="rok">
        <INPUT type="submit" value="Oblicz">
    </fieldset>
</FORM>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (checkVar()) {
        if (checkNumeric()) {
           if($rok>=1 && $rok<=1582){
               $x = 15;
               $y = 6;
           }
            elseif($rok>=1583 && $rok<=1699){
                $x = 22;
                $y = 2;
            }
            elseif($rok>=1700 && $rok<=1799){
                $x = 23;
                $y = 3;
            }
            elseif($rok>=1800 && $rok<=1899){
                $x = 23;
                $y = 4;
            }
            elseif($rok>=1900 && $rok<=2099){
                $x = 24;
                $y = 5;
            }
            elseif($rok>=2100 && $rok<=2199){
                $x = 24;
                $y = 6;
            }
           else {
               echo "Niepoprawny rok<BR>";
               return 0;
           }
           $a = $rok%19;
           $b = $rok%4;
           $c = $rok%7;
           $d = (19*$a+$x)%30;
           $f = (2*$b+4*$c+6*$d+$y)%7;
           if($f==6 && $d==29) echo "Wielkanoc jest 26 kwietnia";
           elseif($f==6 && $d==28 && (11*$x+11)%30<19) echo "Wielkanoc jest 18 kwietnia";
           elseif(($d+$f)<10) echo "Wielkanoc jest ", 22+$d+$f, " marca";
           elseif(($d+$f)>9) echo "Wielkanoc jest ", $d+$f-9, " kwietnia";

        } else echo "Niepoprawny rok<BR>";
    } else echo "Niepoprawny rok<BR>";
}

?>

