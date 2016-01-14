<?php

class Pizza {
    private $tamano;
    private $tipo;
    private $estado;
    private static $numPedidas;
    private static $numServidas;
    


    public function __construct($tipo, $tamano, $estado) {
        $this->tipo = $tipo;
        $this->tamano = $tamano;
        $this->estado = $estado;
        self::$numPedidas++;
    }
    
    public function getNumPedidas() {
        return "Pedidas: " . self::$numPedidas;
    }

    public function sirve() {
        $this->estado = 'servida';
        self::$numServidas++;
    }
    
    static function getNumServidas() {
        return "<br>Servidas: " . self::$numServidas;
    }
   
    public function __toString() {
      return "<br><b> Pizza </b>  $this->tipo $this->tamano , $this->estado<br><br>";
    }
}
