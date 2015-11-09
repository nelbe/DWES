<?php
session_start(); // Inicio de sesión (Simpre al principio de todo)
 ?>
        <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <style> 
      #primeratabla{
          float: left;
          //pull-left para flotar con bootstrap
      }
      
      #segundatabla{
          border: 1px; 
          margin-left: 560px;
          //border: solid 2px;
          //width: 200px;
          //height: 400px; 
      }
      
      div{
          width: 900px;
          height: 1300px;
          margin-left: 15%;
          background-color: #CECEF6;
      }
      h1{
          text-align: center;
          color: #5882FA;
      
      }
      .letras{
          text-align: center;
          color: #0000FF;
      }
      img{
         border: solid #5882FA 1px;
      }
      
  </style>
 </head>
  <body>    
<h1>TIENDA OL-LINE</h1>
<div>
<table id="primeratabla" style="border: 1px; margin-left: 50px"><tr><td>

<tr>
    <td><strong><h3 class="letras">Productos</h3><hr></strong></td>
</tr>
 
<tr>
    <td>
    <?php      
    $codigo = $_POST['codigo'];
    $productos = $_SESSION['producto'];
    $elemento = $productos[$codigo];
    ?>
    
    <img src="images/<?=$elemento[imagen]?>" width="150" height="200"><br>
    <b><?=$elemento[nombre]?></b><br>Precio: <?=$elemento[precio]?>€<br><br><b>Detalles: </b><?=$elemento[detalles]?>
    
    <form action="ejercicio6-detalles.php" method="post">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="accion" value="comprar">
      <input type="submit" value="Comprar">
    </form>
    <form action="ejercicio6-detalles.php" method="post">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="submit" value="Volver">
    </form><br><br>

 </td>
</tr> 
</table>
</div>    
 </body>
</html>