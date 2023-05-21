<?php

class Samochod
{
    public $id, $marka, $model, $cena, $rok, $opis, $id_uzytkownika;

    function __construct($id, $marka, $model, $cena, $rok, $opis, $id_uzytkownika){
        $this->id = $id;
        $this->marka = $marka;
        $this->model = $model;
        $this->cena = $cena;
        $this->rok = $rok;
        $this->opis = $opis;
        $this->id_uzytkownika = $id_uzytkownika;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMarka()
    {
        return $this->marka;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getCena()
    {
        return $this->cena;
    }

    public function getRok()
    {
        return $this->rok;
    }

    public function getOpis()
    {
        return $this->opis;
    }

    public function getIdUzytkownika()
    {
        return $this->id_uzytkownika;
    }
}
?>