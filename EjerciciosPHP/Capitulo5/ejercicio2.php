<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Escribe un programa que pida 10 números por teclado y que luego muestre 
       los números introducidos junto con las palabras “máximo” y “mínimo” al 
       lado del máximo y del mínimo respectivamente.</p>
</head>
   <body>
       <?php
      $numero = $_GET['numero'];
      $contadorNumeros = $_GET['contadorNumeros'];
      $numeroTexto = $_GET['numeroTexto'];
    
      if (!isset($numero)) {
        $contadorNumeros = 0;
        $numeroTexto = "";
      }

      // Muestra los números introducidos
      if ($contadorNumeros == 10) {
        $numeroTexto = $numeroTexto . " " . $numero; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
                                                // espacios de la cadena       
        $numeros = explode(" ", $numeroTexto); //Añade a la array los números
        echo "Los números introducidos son: " . "<br>";
        
        
        foreach ($numeros as $numero) {     //Los muestra recorriendo cada uno 
          echo $numero . "  " . "<br>";     // de ellos
        }
        
        echo "El máximo es: " . max($numeros) . "<br>";
        echo "El mínimo es: " . min($numeros);
      }
      
      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 10) || (!isset($numero))) {
        ?>
        <form action="#" method="get">
          Introduzca un número:
          <input type="number" name ="numero" autofocus>
          <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
          <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $numero ?>">
          <input type="submit" value="Enviar">
        </form>
        <?php
      }
    ?>
      
   </body>
</html>