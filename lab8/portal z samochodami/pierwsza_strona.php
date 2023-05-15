<?php
session_save_path(".\session_save");
session_start();
?>
<FORM action = "pierwsza_strona.php" method = "GET">
    <fieldset>
        <TABLE>
            <TR><TD><a href="strona_glowna.php">Strona Glowna</TD></TR>
            <TR><TD><a href="wszystkie_samochody.php">Wszystkie samochody</TD></TR>
            <TR><TD><a href="dodaj_samochod.php">Dodaj samochod</TD></TR>
            <?php if($_SESSION['rola'] != "gosc") echo '<TR><TD><a href="moje_samochody.php">Moje samochody</TD></TR>'; ?>
        </TABLE>
    </fieldset>
</FORM>

