 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Escribe un programa que lea 15 números por teclado y que los almacene en 
       un array. Rota los elementos de ese array, es decir, el elemento de la 
       posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. 
       El número que se encuentra en la última posición debe pasar a la 
       posición 0. Finalmente,muestra el contenido del array.</p>
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
      if ($contadorNumeros == 15) {
        $numeroTexto = $numeroTexto . " " . $numero; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
                                                // espacios de la cadena       
        $numeros = explode(" ", $numeroTexto); //Añade a la array números los números
        echo "Los números introducidos son: " . "<br>";
        
        /*---------------------------------------------------*/          
     //Este es el array normal
     foreach ($numeros as $elemento) {     //Los muestra recorriendo cada uno 
          echo $elemento;     // de ellos
        }
     
        echo "<br>". "<br>";
            
        //Rota el array manualmente    
        $ultimo = $numeros[14];
        for ($x=14; $x > 0; $x--) {
            $numeros[$x] = $numeros[$x - 1];
       }
       
       
       //Muestra el array rotado
       $numeros[0] = $ultimo;
       foreach ($numeros as $elemento) {     
          echo $elemento;     
        }
     
    /*
     for ($i=0; $i<5; $i++) {     //Los muestra recorriendo cada uno 
          echo $i;                   // de ellos
        }
        for ($i=0; $i<5; $i++) {     //Los muestra recorriendo cada uno 
          echo $numeros[$i];         // de ellos
        }
    */      
      }
     
      
      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 4) || (!isset($numero))) {
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