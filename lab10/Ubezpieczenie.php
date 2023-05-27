<?php

class Ubezpieczenie extends AutoZDodatkami
{
    public $procentowaWartosc, $lata;

    public function __construct($model, $cena, $alarm, $radio, $klimatyzacja, $procentowaWartosc, $lata)
    {
        parent::__construct($model, $cena, $alarm, $radio, $klimatyzacja);
        $this->procentowaWartosc = $procentowaWartosc;
        $this->lata = $lata;
    }

    public function ObliczCene()
    {
        return $this->procentowaWartosc * (parent::ObliczCene() * ((100-$this->lata)/100));
    }
}
?>