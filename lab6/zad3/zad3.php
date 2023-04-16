<?php
    $plik = fopen("licznik.txt","r");
    $licznik = fgets($plik);
    fclose($plik);
    if(!(isset($_COOKIE['licznik']))) {
        setcookie('licznik',$licznik);
        $licznik += 1;
    }
    echo $licznik;
    $plik = fopen("licznik.txt", "w");
    fputs($plik,$licznik);
    fclose($plik);
?>