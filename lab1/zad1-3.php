<?php
    function cenzura ($zdanie)
    {
        $tab = explode(" ", $zdanie);
        $slowa = ["zielony", "czerwony", "pomaranczowy"];
        foreach ($tab as $item) {
            if (in_array($item, $slowa)) {
                for ($i = 0; $i < strlen($item); $i++){
                    echo "*";
                }
            }
            else{
                echo $item;
            }
            echo " ";
        }
    }
        $zdanie = "zielony niebieski pomaranczowy zolty";
        echo(cenzura($zdanie));
        ?>
