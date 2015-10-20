<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Define tres arrays de 20 números enteros cada una, con nombres “numero”, 
    “cuadrado” y “cubo”. Carga el array “numero” con valores aleatorios 
    entre 0 y 100. En el array “cuadrado” se deben almacenar los cuadrados de 
    los valores que hay en el array “numero”. En el array “cubo” se debe almacenar 
    los cubos de los valores que hay en “numero”. A continuación, muestra 
    el contenido de los tres arrays dispuesto en tres columnas.</p>
    
</head>
   <body>
   <?php 
   $numero = new SplFixedArray (20);
   $cuadrado = new SplFixedArray(20);
   $cubo = new SplFixedArray(20);

    for ($i = 0; $i < 20; $i++) {
        // números aleatorios entre 0 y 100 (ambos incluidos)
        $generado = rand(0, 100);
        $numero[$i] = $generado;
        $cuadrado[$i] = $generado * $generado;
        $cubo[$i] = $generado * $generado * $generado;
    }
    
    for ($i = 0; $i < 20; $i++) {
  
        echo "<table>";
        echo "<tr>";
        echo "<td>" . "<strong>" . "Número" . "</strong>" . "</td>";
        echo "<td>" . "<strong>" . "Cuadrado" . "</strong>" . "</td>";
        echo "<td>" . "<strong>" . "Cubo" . "</strong>" . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" .  $numero[$i] . "</td>";
        echo "<td>" . $cuadrado[$i] . "</td>";
        echo "<td>" . $cubo[$i] . "</td>";
        echo "</tr>";
    }
    
    ?>    
      
  </body>
</html>