<?php
if(!$fd = fopen("./licznik.txt","r")) echo "nie dziala";
else {
        $licznik = fgets($fd);
}
$licznik += 1;
echo $licznik;
fclose($fd);
if(!$fd = fopen("./licznik.txt","w")) echo "nie dziala";
else {
        fputs($fd, $licznik);
}
fclose($fd);
?>