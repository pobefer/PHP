<?php
class Tecnica{

    public $id;
    public $codigo;
    public $nombre;
    public $precio;
    public $compania;

    public function __construct($id,$codigo,$nombre,$precio,$compania)
    {
      $this->id = $id;
      $this->codigo = $codigo;
      $this->nombre = $nombre;
      $this->precio = $precio;
      $this->compania = $compania;
    }

}

?>