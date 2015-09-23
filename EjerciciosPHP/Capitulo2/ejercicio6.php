<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['base'];
        $y = $_GET['altura'];
        echo "<strong>", "Área del triángulo" , "</strong>",  "<br>";
        echo "Área=&nbsp" , ($x * $y) / 2;

    ?>
</body>
</html>
