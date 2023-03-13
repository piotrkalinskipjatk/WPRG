<?php
function czy_pierwsza($liczba){
    $licznik = 0;
    for($i = 2; $i<round(pow($liczba, 0.5),0)+1; $i++){
        $licznik +=1;
        if($liczba%$i == 0) {
            echo "liczba iteracji petli: ", $licznik, "\n";
            echo "liczba nie jest pierwsza";
            return false;
        }
    }
    echo "liczba iteracji petli: ", $licznik, "\n";
    echo "liczba jest pierwsza";
    return true;
}
echo "podaj liczbe";
$liczba = readline();
czy_pierwsza($liczba);
?>