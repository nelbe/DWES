<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $max = $_POST['max'];
       ?>

      Introduzca la altura de rombo:  
      <form action="piramideLlenaInvertida.php" method="post">
            <input type="number" name="max" autofocus >
            <br>
       <input type="submit" value="Continuar">
            </form>
       
       <?php
        $max;
        $i=0; 
        $j=0;
        $k=0;
 
        if($max%2==0)
        {
            $max++;
        }
        

        for($i=$max;$i>=1;$i=$i-2){
            for($k=$i;$k<=$max+2;$k=$k+2){      
                ?>
                     &nbsp;
                <?php
            }
          
            for($j=$i-2;$j>0;$j--)
            {
               echo "*";
            }
            echo "<br>";
        }
       

        ?>
    </body>
</html>