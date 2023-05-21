<?php

class Uzytkownik
{
    public $id, $rola;

    function __construct($id, $rola){
        $this->id = $id;
        $this->rola = $rola;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRola()
    {
        return $this->rola;
    }
}
?>