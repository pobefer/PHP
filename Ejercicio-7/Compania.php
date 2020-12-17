<?php
class Compania{

    public $id;
    public $nombre;
    public $tecnicas;

    public function __construct($id,$nombre)
    {
      $this->id = $id;
      $this->nombre = $nombre;
    }

    public function addTecnicas($tecnicas){
        $this->tecnicas = $tecnicas;
    }

}

?>