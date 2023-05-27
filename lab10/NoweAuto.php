<?php

class NoweAuto
{
    public $model, $cena, $kursEuroPLN;

    public function __construct($model, $cena){
        $this->cena = $cena;
        $this->model = $model;
        $this->kursEuroPLN = 4.53;
    }

    public function ObliczCene(){
        return $this->cena * $this->kursEuroPLN;
    }
}
?>