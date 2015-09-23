<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
   
    <?php
        $x = $_GET['kb'];
        echo "<strong>", "conversor de Kb a Mb" , "</strong>",  "<br>";
        echo "$x" , "Kb = " , $x * 0.000977 , "Mb";
    ?>
</body>
</html>