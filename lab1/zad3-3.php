<?php
function tabliczka($wymiar){
    for($i = 1; $i<$wymiar+1; $i++){
        for($j = 1; $j<$wymiar+1; $j++){
            echo "\t", $i*$j;
        }
        echo "\n";
    }
}
echo "podaj wymiar tabliczki \n";
$wymair = readline();
tabliczka($wymair);
?>