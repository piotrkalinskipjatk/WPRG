
<FORM action="zad1.php" method="post" >
    <fieldset>
        <TABLE>
            <legend>Formularz kontaktowy</legend>
            <TR>
                <TD>Imię i nazwisko:</TD>
                <TD><INPUT name="imie" placeholder="Twoje imie i nazwisko"></TD>
            </TR>
            <TR>
                <TD>Adres e-mail:</TD>
                <TD><INPUT name="email" placeholder="Twoj adres e-mail"></TD>
            </TR>
            <TR>
                <TD>Telefon kontaktowy:</TD>
                <TD><INPUT name="telefon" placeholder="Dowzolone znaki: cyfry i spacje"></TD>
            </TR>
            <TR>
                <TD>Wybierz temat</TD>
                <TD><SELECT name="temat"><OPTION value="opcja1">Wykonanie strony internetowej</OPTION><OPTION value="opcja2">inna opcja</OPTION></SELECT></TD>
            </TR>
            <TR>
                <TD>Tresc wiadomosci:</TD>
                <TD><TEXTAREA name = "wiadomosc" cols="20" rows="5" placeholder="Wpisz tutaj tresc swojej wiadomosci..."></TEXTAREA></TD>
            </TR>
            <TR>
                <TD>Preferowana forma kontaktu:</TD>
                <TR><TD><label><INPUT TYPE=CHECKBOX name="check1" value="E-mail">E-mail</TD></label></TR>
                <TR><TD><label><INPUT TYPE=CHECKBOX name="check2" value="Telefon">Telefon</TD></label></TR>
            </TR>
            <TR>
                <TD>Powiadasz juz strone www?</TD>
                <TR><TD><label><INPUT TYPE=RADIO name="radio" value="E-mail">E-mail</TD></label></TR>
                <TR><TD><label><INPUT TYPE=RADIO name="radio" value="Telefon">Telefon</TD></label></TR>
            </TR>
            <TR>
                <TD>Zalaczniki</TD>
                <TR><TD><input type="button" value="Wybierz plik"></TD></TR>
            </TR>
        </TABLE>
    </fieldset>
    <TR>
        <TD><INPUT type="submit" value="Wyślij formularz"></TD>
    </TR>
</FORM>

<?php
    $tab = [];
    $licznik = 0;
    if(isset($_POST['imie'])){
        $tab[] = $_POST['imie'];
        $licznik+=1;
    }
    if(isset($_POST['email'])){
        $tab[] = $_POST['email'];
        $licznik+=1;
    }
    if(isset($_POST['telefon'])){
        $tab[] = $_POST['telefon'];
        $licznik+=1;
    }
    if(isset($_POST['temat'])){
        $tab[] = $_POST['temat'];
        $licznik+=1;
    }
    if(isset($_POST['wiadomosc'])){
        $tab[] = $_POST['wiadomosc'];
        $licznik+=1;
    }
    if(isset($_POST['check1'])){
        $tab[] = $_POST['check1'];
        $licznik+=1;
    }
    if(isset($_POST['check2'])){
        $tab[] = $_POST['check2'];
        $licznik+=1;
    }
    if(isset($_POST['radio'])){
        $tab[] = $_POST['radio'];
        $licznik+=1;
    }
    for($i = 0; $i<$licznik; $i++){
        echo $tab[$i];
        echo "<BR>";
    }

    ?>