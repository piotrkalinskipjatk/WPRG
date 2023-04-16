<?php
session_save_path(".\session_save");
session_start();
echo "PODSUMOWANIE: <BR><BR>";
echo "Imie klienta: ".$_SESSION['imie']."<BR>";
echo "Nazwisko klienta: ".$_SESSION['nazwisko']."<BR>";
echo "Nr karty klienta: ".$_SESSION['nr_karty']."<BR>";
echo "Ilosc osob towarzyszacych: ".$_SESSION['ilosc_osob']."<BR><BR>";
for($i = 0; $i<$_SESSION['ilosc_osob']; $i++){
    echo "Imie ".($i+1)." osoby towarzyszacej: ".$_SESSION['imie_osoby'][$i]."<BR>";
    echo "Nazwisko ".($i+1)." osoby towarzyszacej: ".$_SESSION['nazwisko_osoby'][$i]."<BR><BR>";
}

?>