<?php

class Campero {
    private $tamano;
    private $tipo;
    private $estado;
    private static $numPedidos;
    private static $numServidos;
    


    public function __construct($tamano, $tipo, $estado) {
        $this->tamano = $tamano;
        $this->tipo = $tipo;
        $this->estado = $estado;
        self::$numPedidos++;
    }
    
    public function getNumPedidos() {
        return "Pedidos: " . self::$numPedidos;
    }

    public function sirve() {
        $this->estado = 'servido';
        self::$numServidos++;
    }
    
    static function getNumServidos() {
        return "<br>Servidas: " . self::$numServidos;
    }
   
    public function __toString() {
      return "<br><b> Pizza </b>  $this->tipo $this->tamano , $this->estado<br><br>";
    }
}
