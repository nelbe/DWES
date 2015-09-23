<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
   
    <?php
        $x = $_GET['mb'];
        echo "<strong>", "conversor de Mb a Kb" , "</strong>",  "<br>";
        echo "$x" , "Mb = " , $x * 1024 , "Kb";
    ?>
</body>
</html>