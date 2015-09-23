<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['base'];
        $y = $_GET['altura'];
        echo "<strong>", "Área del rectángulo" , "</strong>",  "<br>";
        echo "Área=&nbsp" , ($x * $y);

    ?>
</body>
</html>
