<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <p>10. Escribe un programa que nos diga el horóscopo a partir del día
        y el mes de nacimiento.</p> 
    </head>
    <body>
 
        <form action="index10.php" method="post">
            Fecha de nacimiento: 
            <fieldset>
                <input type="date" name="dia" min="1" max="31" value="1">
            	<select name="mes">
                    <option value="1">Enero</option>
                    <option value="2">Febero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Octubre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>         
                  </select>
            <input type="submit" value="Enviar">
            </fieldset>
            
            <?php
            if (($mes!= -5) && ($dia!=-5)){
               $mes= $_POST['mes'];
               $dia= $_POST['dia'];
               
                if (($dia >=21 && $mes==3) || ($dia<=20 && $mes==4)) {
                    echo "Aries: Personas fuertes, con energía, institivos y 
                    dinámicos... con coraje. a veces egocentristas, tienden a 
                    acaparar el liderazgo, signo vital asociado a grandes deportistas 
                    de competición. ";
                }
               
                if (($dia >=21 && $mes==5) || ($dia<=20 && $mes==6)) {
                    echo "Géminis: Contradictorios y versátiles, cambian con facilidad.
                    Pasan de ser serenos, y fascinantes, a pesimistas y amorfos. 
                    Fantasiosos, aman la libertad e independencia.";   
                }
                
                if (($dia >=21 && $mes==6) || ($dia<=20 && $mes==7)) {
                    echo "Cancer: Familares, tímidos, posesivos, imaginativos y 
                    románticos. Dulces que viajan entre la melancolía y la alegría.";
                }
                
                if (($dia >=21 && $mes==7) || ($dia<=20 && $mes==8)) {
                    echo "Leo: Extrovertidos, autoritarios,libres, fuertes, pasionales y generosos. 
                    Optimistas y a veces un poco imprudentes.";
                }
                
                if (($dia >=22 && $mes==8) || ($dia<=22 && $mes==9)) {
                    echo "Virgo: Meticulosos en los detalles, eficientes, severos
                    y racionales en su vida y trabajo. Buenos ahorradores. ";
                }
                
                if (($dia >=23 && $mes==9) || ($dia<=22 && $mes==10)) {
                    echo "Libra: Diplomatico, encantador y sociable.
                    Los libra son idealistas, pacíficos, optimistas y románticos. ";
                }
                
                if (($dia >=23 && $mes==10) || ($dia<=22 && $mes==11)) {
                    echo "Escorpio: Los más intuitivos, tienden a ser profundos 
                    y serios, autoritario, celoso, posesivo pero mutables y pasionales. ";
                }
                
                if (($dia >=23 && $mes==11) || ($dia<=20 && $mes==12)) {
                    echo "Sagitario: Confiados, alegres, sinceros, fieles 
                    amigos, amantes de la naturaleza y el aire libre.  ";
    
                }
                
                if (($dia >=21 && $mes==12) || ($dia<=19 && $mes==1)) {
                   echo  "Capricornio: Son introvertidos impulsivos... Rasgos en ellos son
                   la timidez y la inseguridad; perfil ambicioso, frío, 
                   melancólico, pero son afectuosos. ";
                }
                
                if (($dia >=20 && $mes==1) || ($dia<=18 && $mes==2)) {
                    echo"Acuario: Sinceros, altruistas, simpáticos y activos, pero pasan
                    por momentos de gran nerviosismo y tensión, vanidosos, 
                    muy creativos, agradables. ";
                }
                
                 if (($dia >=19 && $mes==2) || ($dia<=20 && $mes==3)) {
                     echo "Picis: Sutiles, dulces, tolerantes, imprevisibles, románticos 
                     pero quisquillosos e incluso infieles. Creen en la 
                     amistad y el amor.";
                 }
               
               
            }
            
            $mes = -5;
            $dia = -5;
            ?>
            
        </form>
    </body>
</html>


