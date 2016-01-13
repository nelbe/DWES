<?php

class Entradas {
    
    private $nombre;
    private $entradasDisponibles;
    private $precioEntrada;
    private $precioPagar;
    
    public function __construct($nombre, $num, $pr) {
      $this->nombre = $nombre;  
      $this->entradasDisponibles = $num;
      $this->precioEntrada = $pr;
    }

    function getEntradasDisponibles() {
        return $this->entradasDisponibles;
    }
     
    function setEntradasDisponibles($entradasDisponibles) {
        $this->entradasDisponibles = $entradasDisponibles;
    }

    //Código añadido
    function getPrecioEntrada() {
        return $this->precioEntrada;
    }

    function setPrecioEntrada($precioEntrada) {
        $this->precioEntrada = $precioEntrada;
    }
    
    function getPrecioPagar() {
        return $this->precioPagar;
    }
    
    function setPrecioPagar($precioPagar) {
        $this->precioPagar = $precioPagar;
    }
  
    public function precio($entradasComprar){
        $this->precioPagar = $this->precioEntrada * $entradasComprar;
    }    
    /**********************/
    
    public function venta($entradasComprar) {
        if ( $this->entradasDisponibles - $entradasComprar < 0){
            echo "<br><b>No se disponen de tantas entradas a la venta </b><br>";
        }else{
            $this->entradasDisponibles = $this->entradasDisponibles - $entradasComprar;
        }
    }
    
    public function __toString() {
      return "<br><b>" . $this->nombre ."</b><br>
      Entradas disponibles: $this->entradasDisponibles<br>
      Precio por entrada: $this->precioEntrada<br><br>";
    }

}

/*

    function getPrecioPagar() {
        return $this->precioPagar;
    }
    
    function setPrecioPagar($precioPagar) {
        $this->precioPagar = $precioPagar;
    }
  
    public function precio($entradasComprar){
        $this->precioPagar = $this->precioEntrada * $entradasComprar;
   
    }*/