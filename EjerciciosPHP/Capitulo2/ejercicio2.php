<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['euros'];
        $y = "166.386";
        echo "La conversión de Euros - Pesetas <br>";
        echo "Pesetas:&nbsp" , ($x * $y); 
    ?>
</body>
</html>