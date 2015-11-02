<?php
  if (!isset($_COOKIE["color"])) {
    setcookie("color", "white", time() + 3 * 24 * 3600); //Disponible 3 días
    $color = "white";
  } else {
    $color = $_COOKIE["color"];
  }
  
  if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie("color", $color, time() + 3 * 24 * 3600); //Disponible 3 días
  }
  ?>
  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
  <p>Escribe un programa que guarde en una cookie el color de fondo 
      (propiedad background-color ) de una página. Esta página debe tener 
      únicamente algo de texto y un formulario para cambiar el color.</p>
  </head>
  <body>
    <div id="pagina">
        <p>Elige el color de fondo para la página.</p>
        <form action="#" method="post">
          <input type="color" name="color" value="<?=$color?>"><br><br>
          <input type="submit" value="Aceptar">
        </form>
    </div>

  <script>document.getElementById("pagina").style.background="<?=$color?>";</script>
  </body>
</html>  