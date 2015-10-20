<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Realiza un programa que pida 10 números por teclado y que los almacene 
       en un array. A continuación se mostrará el contenido de ese array junto 
       al índice (0 – 9). Seguidamente el programa pedirá dos posiciones a las 
       que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
       menor que final y que ambos números están entre 0 y 9. El programa deberá 
       colocar el número de la posición inicial en la posición final, rotando 
       el resto de números para que no se pierda ninguno.
       Al final se debe mostrar el array resultante.</p>  

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
        
        /*************Este es el array introducido por ******************/
        //Índice del array 
        for ($i=0; $i<10; $i++){
            echo $i . " ";
        }
        echo "<br>";
        echo "<hr>";
        
        //Array normal de los números introducidos por teclado
        foreach ($numeros as $n){
            echo $n . " ";
        }
        
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
        //Índice del array 
        for ($i=0; $i<10; $i++){
            echo $i . " ";
        }
        echo "<br>";
        echo "<hr>";
        //Rotación del array
        //Rota el array manualmente    
        $ultimo = $numeros[9];
        for ($x=9; $x >= 0; $x--) {
            $numeros[$x] = $numeros[$x-1];
       }
       
       
       //Muestra el array rotado
       $numeros[0] = $ultimo;
       foreach ($numeros as $elemento) {     
          echo $elemento;     
        }
        
        /*//Rota el array con función y lo muestra
        array_push($numeros,array_shift($numeros));
        foreach ($numeros as $numero) {     //Los muestra recorriendo cada uno 
          echo $numero . " ";     // de ellos
        }*/
        echo "<br>". "<br>";
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