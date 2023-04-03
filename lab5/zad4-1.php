<?php
$tab = [];
$plik = fopen("zad4.txt", "r");
while(!feof($plik)){
    $tab[] = fgets($plik);
}
fclose($plik);
if(in_array($_SERVER['REMOTE_ADDR'], $tab)) include 'zad4-2.php';
else include 'zad4-3.php';
?>