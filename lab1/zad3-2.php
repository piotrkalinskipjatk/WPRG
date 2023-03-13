<?php
function kostka ($rzuty){
    $tab = [];
    for($i = 0; $i<$rzuty; $i++){
        array_push($tab,(rand(1,6)));
        echo $tab[$i], " ";
    }
}
echo "podaj ilosc rzutow kostka";
$rzuty = readline();
kostka($rzuty);
?>