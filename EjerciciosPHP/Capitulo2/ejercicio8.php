<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $x = $_GET['horas'];
        echo "<strong>", "Salario semanal" , "</strong>",  "<br>";
        echo "Total = Horas semanales * 12€ = " , 
             "<strong>" ,  $x * 12 , "€" , "</strong>";
    ?>
</body>
</html>