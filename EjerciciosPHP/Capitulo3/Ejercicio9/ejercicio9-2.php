<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>    
    
    
    <?php
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
  
        
        $d = $b*$b -4*$a*$c;
	$e = 2*$a;
	
        if ($a==0){
            echo "La ecuación es de primer grado, introduzca otra ecuación";
        }
        
        if ($d==0) {
	echo -$b/$e;
	}
	else {
		if ($d>0) {
		echo (-"$b" + sqrt("$d"))/"$e"."<br>";
		echo (-"$b" - sqrt("$d"))/"$e";
		}
		else {
		echo "No tiene solución real";
		}
	}
	   
    ?>
    
</body>
</html>


