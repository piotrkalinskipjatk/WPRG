<?php
$tab = [rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100)];
$max = 0;
for($i = 0; $i<5; $i++){
    if($tab[$i]>$max) $max = $tab[$i];
}
echo "\n petla for: ", $max;

$max = 0;
$i = 0;
while($i<5){
    if($tab[$i]>$max) $max = $tab[$i];
    $i++;
}
echo "\n petla while: ", $max;

$max = 0;
$i = 0;
do{
    if($tab[$i]>$max) $max = $tab[$i];
    $i++;
    } while ($i<5);
echo "\n petla do while: ", $max;

$max = 0;
foreach($tab as $i){
    if($i>$max) $max = $i;
}
echo "\n petla foreach: ", $max;
?>