<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>    
    <?php
            $a = $_POST['1'];
            $b = $_POST['2'];
            $c = $_POST['3'];
           
            if ($a>$b){
                $aux=$a;
                $a=$b;
                $b=$aux; 
            }

            if ($b>$c){
                $aux=$b;
                $b=$c;
                $c=$aux;
            }
            
             if ($a>$b){
                $aux=$a;
                $a=$b;
                $b=$aux; 
            }
            
            echo "$a" . "$b" . "$c";
    ?>
    
</body>
</html>