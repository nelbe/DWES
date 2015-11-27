<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        $conexion = mysql_connect("localhost", "root", "root");
        if ($conexion) {
            echo "Se ha establecido una conexión con el servidor de bases de datos.";
        } else {
            echo "No se ha podido establecer conexión con el servidor de bases de datos";
        }
        
        mysql_select_db("banco", $conexion); //Conectamos base de datos
        mysql_set_charset('utf8');
      
      $consulta = mysql_query('SELECT * FROM empleado WHERE dni="13579"', $conexion);
      
      echo "Nombre: " . mysql_result($consulta, 0, "nombre") . "<br>"; //0 es el número de filas
      echo "Cargo: " . mysql_result($consulta, 0, "cargo") . "<br>";
      echo "Sueldo: " . mysql_result($consulta, 0, "sueldo") . "€<br>";
        ?>
    </body>
</html>