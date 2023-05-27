<?php

class AutoZDodatkami extends NoweAuto
{
    public $alarm, $radio, $klimatyzacja;

    public function __construct($model, $cena, $alarm, $radio, $klimatyzacja)
    {
        parent::__construct($model, $cena);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function ObliczCene()
    {
        return parent::ObliczCene() + $this->alarm + $this->radio + $this->klimatyzacja;
    }
}
?>