<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['numero1'];
        $y = $_GET['numero2'];
        echo "<strong>", "Operaciones" , "</strong>",  "<br>";
        echo "Suma:&nbsp" , ($x + $y) , "<br>";
        echo "Resta:&nbsp" , ($x - $y), "<br>";
        echo "Multiplicación:&nbsp" , ($x * $y), "<br>";
        echo "División:&nbsp" , ($x / $y), "<br>";
    ?>
</body>
</html>
