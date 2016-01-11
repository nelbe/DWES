<?php

class DadoPoker {
   
    //Atributos de dado
    //Para cada uno de los dados, repito esta información, si uso static sería única para una clase
    private $carasDado = ["As","K","Q","J","7","8"];
    private $figura;
    //Atributos de clase y usa static porque es una información única
    private static $tiradasTotales=0;

    public function __construct() {
    }
    
    function getCaras() {
        return $this->carasDado;
    }

    function getFigura() {
        return $this->figura;
    }
    static function setTiradasTotales($tiradasTotales) {
        self::$tiradasTotales = $tiradasTotales;
    }

        public function tira() {
        self::$tiradasTotales++;
        $this->figura = $this->carasDado[rand(0, 5)];
    }
 
    public static function getTiradasTotales() {
        return self::$tiradasTotales;
    }
    
    public static function nombreFigura() {
        return $this->figura;
    }
    
     public function __toString() {
      return "<hr><b>Figura</b><br>" . $this->figura ."<br>";
    }
}
