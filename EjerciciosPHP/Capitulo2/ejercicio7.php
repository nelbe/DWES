<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['base'];
        $y = $_GET['iva'];
        echo "<strong>", "Cáclulo del total de una factura" , "</strong>",  "<br>";
        echo "Total = Base imponible * (1 + ( I / 100 ) ) = " ,
       "<strong>" , $x * (1 + ( $y / 100 ) ) , "€" , "</strong>";
    ?>
</body>
</html>
