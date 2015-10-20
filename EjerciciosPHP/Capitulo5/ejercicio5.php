<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Realiza un programa que pida la temperatura media que ha hecho en cada 
       mes de un determinado año y que muestre a continuación un diagrama de 
       barras horizontales con esos datos. Las barras del diagrama se pueden 
       dibujar a base de la concatenación de una imagen.</p>
   
    <style>
        #img{
            width: 20px;
            height: 20px;
        }
    </style>   
    
</head>
   <body>
 
       <?php
       $temperaturaenviada = $_GET['temperaturaenviada'];
       $meses = [
              "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];        
     
       
       if (!isset($temperaturaenviada)) {    
      echo "Mete la temperatura media de cada mes ";
      echo "<form action='ejercicio5.php' method='get'>";

          for ($i=0; $i<12; $i++){
              echo "$meses[$i]: <input type=\"number\" name=\"temperatura" ,$i ,"\"><br>";
          }
          

         echo "<input type='hidden' name='temperaturaenviada' value='yaloenviao'>";
          echo "<input type='submit' value='Enviar'>";
        echo"</form>";
    
        }else {
            
            //Recogidos los valores del input hidden con el name temperatura
            //y los paso al array $temperatura. El $_GET[temperatura], es para
            //recogerlos
            for ($i=0; $i<12; $i++){
                $temperatura[$i] =  $_GET[('temperatura' . $i)];
            }
           /* for ($i=0; $i<12; $i++){
            echo $meses[$i] . ": " . $temperatura[$i] . "<br>";
            }*/
           
            //Pinto la barra
   
              
                for ($i=0; $i<12; $i++){
                    echo $meses[$i] . " " . $temperatura[$i] . ":";
                
                    $cont=1;
                    while ($cont<=$temperatura[$i]){
                        echo "<img src=\"cuadro-rojo.jpg\">";
                        $cont++;
                    }
                    ?>
                    <br>
                    <?php
                }

        }
          

    ?>
   </body>
</html>
