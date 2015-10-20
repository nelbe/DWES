<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Realiza un programa que pida 10 números por teclado y que los almacene 
       en un array. A continuación se mostrará el contenido de ese array junto 
       al índice (0 – 9) utilizando para ello una tabla. Seguidamente el 
       programa pasará los primos a las primeras posiciones, desplazando el 
       resto de números (los que no son primos) de tal forma que no se pierda 
       ninguno. Al final se debe mostrar el array resultante.</p>
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
        
        //Compruebo que sean o no primos con
        // Una funcion que recorre todos los numero desde el 2 hasta el valor recibido
        function primo($numeros)
        {
        $contadorNumeros=0;
        for($i=2;$i<=$numeros;$i++){
            if($numeros%$i==0){
            # Si se puede dividir por algun numero mas de una vez, no es primo
                if(++$contadorNumero>1){
                    return false;
                } 
            }
        }
        return true;
        }
        $contadorPrimos=0;
        $contadorNoPrimos=0;
        
        /*for ($i=0; $i<10; $i++){
            if(primo($numeros[$i])){
                echo $numeros[$i] . "primos" . "<br>";
            }else{
                echo $numeros[$i] ."no primos". "<br>";
            }
        }*/
        for ($i=0; $i<10; $i++){
            if(primo($numeros[$i])){
                $primos[$contadorPrimos++]=$numeros[$i];
            }else{
                $noPrimos[$contadorNoPrimos++] = $numeros[$i];
            }
                
        }
        //Ordeno el array
        for ($i=0; $i<$contadorPrimos; $i++){
            $numeros[$i] = $primos[$i];
        }
        for ($i=$contadorPrimos; $i<$contadorPrimos + $contadorNoPrimos; $i ++){
            $numeros[$i] = $noPrimos[$i - $contadorPrimos];
        }
        
        //Lo muestro
        //Muestro el array nuevo
            for ($i = 0; $i < 10; $i++) {
                echo  $numeros[$i] . " ";
            }
      }
      
      //NO ME COGE EL ULTIMO NUMERO!!!
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