<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['pesetas'];
        $y = "0.006";
        echo "La conversión de Pesetas - Euros <br>";
        echo "Pesetas:&nbsp" , number_format(($x * $y),2); 
    ?>
</body>
</html>