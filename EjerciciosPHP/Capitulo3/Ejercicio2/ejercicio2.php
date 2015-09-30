<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>    
    
    
    <?php
        $a = $_POST["hora"];

        if (($a >= 06) and ($a<=12)){
            echo "Buenos días";
        }
        
        if (($a >= 13) and ($a<=20)){
            echo "Buenas tardes";
        }
        
        if (($a>=21) and ($a<=24)){
            echo "Buenas noches";
        }
        
        if (($a>=1) and ($a<=5)){
            echo "Buenas noches";
        }
               
    ?>
    
</body>
</html>