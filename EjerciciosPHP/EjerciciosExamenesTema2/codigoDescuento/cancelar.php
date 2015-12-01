<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <style> 
      
      div{
          width: 700px;
          height: 200px;
          margin-left: 20%;
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
      #si{
         margin-left: 45%;
         float: flot;
      }
      #return{
          margin-left: 46%;
         float: flot;
      }
      p{
          padding-top: 5%;
          padding-left: 5%;
          padding-right: 5%;
          text-align: center;
      }
  </style>
  </head>
  <body>
      <div>
          <p>¿Segugo que desea cancelar su pedido? Si pincha en "Cancelar", 
                    sus artículos se cancelarán.</p>
            <form action="cancelar.php" method="post">
              <input type="hidden" name="accion" value="si">
              <input id="si" type="submit" value="Cancelar">
            </form>
            <form action="cancelar.php" method="post">
              <input type="hidden" name="accion" value="volver">
              <input id="return" type="submit" value="Volver">
            </form>
            
          <?php  echo $_POST['accion'];
          if($_POST['accion']== "si"){
              unset($_SESSION['carrito']);
              header("Location:listado.php"); 
          }
          if($_POST['accion']== "volver"){
          header("Location:carritoCodigoDescuento.php");   
          }
   
 ?>
      </div>     
 </body> 

</html>