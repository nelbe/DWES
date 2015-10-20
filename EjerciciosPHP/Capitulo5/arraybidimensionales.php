<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
    //Una array tradicional $persona = array
    $persona = array (
        //Dentro tenemos una array (4) asociativa con con tres elementos
        array( "nombre" => "Rosa", "estatura" => 168, "sexo" => "F"),
        array( "nombre" => "Ignacio", "estatura" => 175, "sexo" => "M"),
        array( "nombre" => "Daniel", "estatura" => 172, "sexo" => "M"),
        array( "nombre" => "Rubén", "estatura" => 182, "sexo" => "M")
    );
    
    echo "<b>DATOS SOBRE EL PERSONAL<b><br><hr>";
    
    $numPersonas = count($persona); //El coun($persona) cuenta el número
                                    //de elementos que tiene el array.
                                    //En este caso (el nº de personas).
        
    for ($i = 0; $i < $numPersonas; $i++) {
        echo "Nombre: <b>", $persona[$i]['nombre'], "</b><br>";
        echo "Estatura: <b>", $persona[$i]['estatura'], " cm</b><br>";
        echo "Sexo: <b>", $persona[$i]['sexo'], "</b><br><hr>";
    }
?>
</body>
</html>