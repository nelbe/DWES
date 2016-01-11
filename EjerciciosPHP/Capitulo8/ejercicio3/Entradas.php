<?php

class Entradas {
    
    private $nombre;
    private $entradasDisponibles;
    
    public function __construct($nombre, $num) {
      $this->nombre = $nombre;  
      $this->entradasDisponibles = $num;
    }

    function getEntradasDisponibles() {
        return $this->entradasDisponibles;
    }
     
    function setEntradasDisponibles($entradasDisponibles) {
        $this->entradasDisponibles = $entradasDisponibles;
    }
    
    public function venta($entradasComprar) {
        if ( $this->entradasDisponibles - $entradasComprar < 0){
            echo "<br><b>No se disponen de tantas entradas a la venta </b><br>";
        }else{
            $this->entradasDisponibles = $this->entradasDisponibles - $entradasComprar;
        }
    }
    
    public function __toString() {
      return "<br><b>" . $this->nombre ."</b><br>
      Entradas disponibles: $this->entradasDisponibles<br><br>";
    }

}
