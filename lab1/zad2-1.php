<?php
function arr ($indeks){
    $tab = [rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100)];
    return $tab[$indeks];
}
echo "podaj numer indeksu \n";
$indeks = readline();
echo(arr($indeks));
?>
