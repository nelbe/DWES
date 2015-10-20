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
      <form action="piramideLlena.php" method="post">
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
        
        //Esta es la pirámide normal
        for($i=1;$i<=$max;$i=$i+2)
        {
            for($k=$max+1;$k>=$i;$k=$k-2)
            {
           ?>
            &nbsp;
           <?php           
            }
            for($j=0;$j<$i;$j++)
            {
               echo "*";
            }
           echo "<br>";
        }
  ?>
