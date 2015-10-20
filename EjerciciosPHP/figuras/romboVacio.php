<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
     <?php
       $altura = $_POST['altura']; 
       ?> 
        
      introduzca la altura de rombo vacio:  
      <form action="romboLleno.php" method="post">
            <input type="number" name="altura" autofocus >
          
            <br>
       <input type="submit" value="Continuar">
            </form>
       
       <?php
       
       
       $alt=$altura/2;
       $cont=0;
       $cont2=0;
  
       for ($cont=1;$alt>=$cont;$cont++){
           for($cont2=$cont;$alt>=$cont2;$cont2++){
                ?>
            &nbsp;
            <?php
           }
           for ($cont2=1; ($cont*2-1)>=$cont2;$cont2++){
               if ($cont2==1 || ($cont*2-1)==$cont2){
                   echo "*";
               }
               else{
                    ?>
                    &nbsp;
                    <?php
                   }
           }
           echo "<br>";
          
       }
       for ($cont=$alt;$cont>=1;$cont--){
           for ($cont2=$cont;$alt>=$cont2;$cont2++){
                ?>
                &nbsp;
                <?php
           }
           for($cont2=1;($cont*2-1)>=$cont2;$cont2++){
               if($cont2==1||($cont*2-1)==$cont2){
                   echo "*";
               }
               else
                   ?>
                    &nbsp;
                    <?php
           }
           echo "<br>";
       } 
                    
           $espacios = $alt/2;
		$alturaI = 1;
		$espaciosInteriores = 0;
			
		// Parte de arriba
		while ($alturaI <= $alt/2) {
			
			// inserta espacios
			for ($i = 1; $i <= $espacios; $i++)
				 ?>
                                &nbsp;
                                <?php
			
			// parte central
			//echo "*";
			for ($i = 1; $i < $espaciosInteriores; $i++)
				 ?>
                                &nbsp;
                                <?php
			if ($alturaI > 1)
                            echo "*";
			echo "<br>";
			
			$alturaI++;
			$espacios--;
			$espaciosInteriores+=2;
		}
		
		// Parte de abajo
		while ($alturaI <= $alt) {
			
			// inserta espacios
			for ($i = 1; $i <= $espacios; $i++)
				 ?>
                                    &nbsp;
                                 <?php
		
		}
  
        ?>
    </body>
</html>