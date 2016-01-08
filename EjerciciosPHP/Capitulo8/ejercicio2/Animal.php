<?php

class Animal {
    
    private $sexo;
    private $edad;
    private $patas;
    
    public function __construct($sx, $ed, $pa) {
      $this->sexo = $sx;
      $this->edad = $ed;
      $this->patas = $pa;
    }
    
    function getPatas() {
        return $this->patas;
    }
    
    function getSexo() {
        return $this->sexo;
    }

    function getEdad() {
        return $this->edad;
    }

    public function imagen(){
        return "<img src=img/animals.jpg width='50px'>";
    }
    
    public function __toString() {
      return "<hr><b>Animal</b><br>" .$this->imagen() ."<br>
          Sexo: $this->sexo<br>
          Edad: $this->edad<br>
          Patas: $this->patas<br>";
    }
    
}
