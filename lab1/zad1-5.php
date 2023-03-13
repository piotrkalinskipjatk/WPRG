<?php
function pole_trojkata($a, $h){
    return $a*$h/2;
}
function pole_prostokata($a, $b){
    return $a*$b;
}
function pole_trapeza($a, $b, $h){
    return ($a+$b)*$h/2;
}
echo "Jakie pole obliczyc? \n 1-trojkat \n 2-prostokat \n 3-trapez \n";
$figura = readline();
switch($figura){
    case 1:
        echo "podaj dlugosc podstawy \n";
        $a = readline();
        echo "podaj wysokosc \n";
        $h = readline();
        echo pole_trojkata($a, $h);
        break;
    case 2:
        echo "podaj dlugosc pierwszego boku \n";
        $a = readline();
        echo "podaj dlugosc drugiego boku \n";
        $b = readline();
        echo pole_prostokata($a, $b);
        break;
    case 3:
        echo "podaj dlugosc pierwszej podstawy \n";
        $a = readline();
        echo "podaj dlugosc drugiej podstawy \n";
        $b = readline();
        echo "podaj wysokosc \n";
        $h = readline();
        echo pole_trapeza($a, $b, $h);
        break;
    default:
        echo "podano zly numer";
        break;
}
?>