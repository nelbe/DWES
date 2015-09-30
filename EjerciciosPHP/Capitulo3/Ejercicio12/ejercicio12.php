<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <p>12. Realiza un minicuestionario con 10 preguntas tipo test sobre las
        asignaturas que se imparten en el curso. Cada pregunta acertada sumará 
        un punto. El programa mostrará al final la calificación obtenida. 
        Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para 
        ver qué tal andan de conocimientos en las diferentes asignaturas del curso.
</p> 
    </head>
    <body>
        <?php $mostrar=0;
        ?>
        <form action="ejercicio12.php" method="post">
            <h3>Responde el cuestionario</h3> 
            <fieldset>
                <p>Esta es la primera pregunta</p>
                <input type="radio" name="1" value="1" checked> Esta es la correcta.
                <input type="radio" name="1" value="0" checked> Esta es la falsa.
                <input type="radio" name="1" value="0" checked> Esta es la falsa.
                
                <p>Esta es la segunda pregunta</p>
                <input type="radio" name="2" value="0" checked> Esta es la falsa.
                <input type="radio" name="2" value="1" checked> Esta es la correcta.
                <input type="radio" name="2" value="0" checked> Esta es la falsa.
                
                <p>Esta es la tercera pregunta</p>
                <input type="radio" name="3" value="0" checked> Esta es la falsa.
                <input type="radio" name="3" value="0" checked> Esta es la falsa.
                <input type="radio" name="3" value="1" checked> Esta es la correcta.     
                <br>
                <input type="submit" value="Enviar"> 
                <input type="hidden" name="belen" value="1">
            </fieldset>
           
            <?php
            $mostrar = $_POST["belen"];
            if ($mostrar == 1) {
            $resultado = $_POST["1"] + $_POST["2"] + $_POST["3"];
                echo "El resultado es= "; 
                echo "$resultado" ;
            
            
            if ($resultado == 3)
                    echo "Has aprobado";
            elseif ($resultado == 2)
                    echo "Te ha faltado poco";
            else {
                echo " <br><h2>Necesitas mejorar</h2>";
            }
            }
            ?>
            
        </form>
    </body>
</html>