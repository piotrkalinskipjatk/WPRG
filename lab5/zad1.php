<?php
$tab = [];
$plik = fopen("./zad1.txt", "r");
while(!feof($plik)) {
    $tab[] = fgets($plik);
}
fclose($plik);
$tab = array_reverse($tab);
$plik = fopen("./zad1.txt", "w");
for($i = 0; $i<count($tab); $i++){
    fputs($plik, $tab[$i]);
}
fclose($plik);
?>
