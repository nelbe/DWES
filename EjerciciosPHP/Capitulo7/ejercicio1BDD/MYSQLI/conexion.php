<?php
  $conexion = new mysqli("localhost", "root", "root");

  if ($conexion->connect_errno > 0) { //La flecha se usa para ver los atributos de un elemento o para aplicar métodos a los objetos
      //errno El número de error
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die ("Error: " . $conexion->connect_error); //Error en si.  
  }
?>

