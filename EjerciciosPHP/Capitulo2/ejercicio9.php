<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
   
    <?php
        $x = $_GET['altura'];
        echo "<strong>", "Volumen de un cono" , "</strong>",  "<br>";
        echo "Volumen = 1/3 * (πr)2 * h. = " , 
             "<strong>" ,  1/3 * ((3.1415*0.82)*2) * $x, "</strong>";
    ?>
</body>
</html>