
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $auxi = array();
            $a = 0;
            //Rellenamos un array normal de 64 números al azar
            // 64 = 8 filas * 8 columnas
            do{
                $numero = rand(100,999);
                if (!in_array($numero, $auxi)){
                    $auxi [] = $numero; 
                    $a++;
                }
            }while($a<64);
            
            //Pasamos lo que tenemos en nuestro array normal al bidimensional
            $i = 0;
            for ($x = 0; $x<8; $x++){
                for ($y = 0; $y<8; $y++){
                    $arrayNumero [$x] [$y] = $auxi[$i];
                    $i++;
                }
            }
            //Mostramos el array bidimensional 
           for ($x = 0; $x<8; $x++){
                for ($y = 0; $y<8; $y++){
                    echo $arrayNumero [$x] [$y] . " ";
                }
                echo "<br>";
            } 
            
            echo "<br>";
            //Elegimos una fila y una columan 
            $filaElegida = 1;
            $columnaElegida =3;
            $x = 0;
            $y = 0;
            
            //Buscamos la fila elegida y metemos en un array los números 
            //que hay en el
            //Para obtener los números tenemos que incrementar el contador 
            //de las columnas 
            while ($x<8){
                if ($x==$filaElegida){
                    while ($y<8){
                        $auxi2 [$y] = $arrayNumero[$x][$y];
                        $y++;
                    }
                }
                $x++;
                $y = 0;
            }
            
            //La misma operación que antes pero para las columnas
            //buscamos la columna elegida y metemos en un array los 
            //numeros que encuentra
            while ($y<8){
                if ($y==$columnaElegida){
                    while ($x<8){
                        $auxi3 [$x] = $arrayNumero[$x][$y];
                        $x++;
                    }
                }
                $y++;
                $x = 0;
            }
            //muestro el array de filas y de columna
            //para guiarme
            echo "Fila elegida <br>";
            foreach ($auxi2 as $n2) {
                echo $n2 . " ";
            }
            echo "<br>";
            echo "Columna elegida <br>";
            foreach ($auxi3 as $n3) {
                echo $n3 . " ";
            }
            
            //Una vez más busco la fila elegida y introduzco los valores 
            //que almacene de las columnas
            while ($x<8){
                if ($x==$filaElegida){
                    while ($y<8){
                        $arrayNumero[$x][$y] = $auxi3 [$y];
                        $y++;
                    }
                }
                $x++;
                $y = 0;
            }
            //Busco la columna y meto en el los números de la fila 
            while ($y<8){
                if ($y==$columnaElegida){
                    while ($x<8){
                        $arrayNumero[$x][$y] = $auxi2 [$x];
                        $x++;
                    }
                }
                $y++;
                $x = 0;
            }
            
            echo "<br>";
            echo "<br>";
            //Muestro el array resultante
           for ($x = 0; $x<8; $x++){
                for ($y = 0; $y<8; $y++){
                    echo $arrayNumero [$x] [$y] . " ";
                }
                echo "<br>";
            } 
        ?>
    </body>
</html>