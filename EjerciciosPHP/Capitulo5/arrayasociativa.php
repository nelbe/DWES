<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <?php
        $estatura = array("Rosa" => 168, "Ignacio" => 175, "Daniel" => 172, 
        "Rubén" => 182);
        
        //Se puede poner de la forma anterior o de esta
        //$estatura['Rosa'] = 168;
        //$estatura['Ignacio'] = 175;
        //$estatura['Daniel'] = 172;
        //$estatura['Rubén'] = 182;
        
        echo "La estatura de Daniel es ", $estatura['Daniel'] , " cm";
        ?>
    </body>
</html>