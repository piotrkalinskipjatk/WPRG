<?php
echo "podaj pesel (11 cyfr) \n";
$pesel = readline();
$rr = substr($pesel, 0, 2);
$mm = substr($pesel, 2, 2);
$dd = substr($pesel, 4, 2);
echo $dd , "-" , $mm , "-" , $rr;
?>
