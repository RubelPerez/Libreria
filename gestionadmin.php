<?php
include 'database.php';
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php?module=start");
    exit;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <style>

        </style>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/menuadmin.css">

        <title>Panel de Administracion</title>
    </head>
  <body style='background-color: whitesmoke;'>

    
            <div class="row">
                <div class="col-3">
                    <div class="sidenav">
                        <a href="AgregarProducto.php"><img src="imagenes/admin.png"/> Agregar Producto</a>
                        <a href="gestionadmin.php"><img src="imagenes/edit.png"/>Editar Productos</a>
                        <a href="reportes.php"><img src="imagenes/report.png"/>Reportes</a>
                        <a href="index.php"><img src="imagenes/Salir.png"/>salir</a>
                    </div>

                </div>
                <div class="col col-9">
                    

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Detalle</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Genero</th>
                                    <th>Formato</th>
                                    <th>Editorial</th>
                                    <th>Año de publicacion </th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query_noticias = mysqli_query($mysqli, "select * from productos");
                                if (mysqli_num_rows($query_noticias) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_noticias)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td><b>" . $row['titulo'] . "</b></td>";
                                        echo "<td align='justify'>" . $row['detalle'] . "</td>";
                                        echo "<td>" . $row['precio'] . "</td>";
                                        echo "<td>" . $row['stock'] . "</td>";
                                        echo "<td>" . $row['genero'] . "</td>";
                                        echo "<td>" . $row['formato'] . "</td>";
                                        echo "<td>" . $row['editorial'] . "</td>";
                                        echo "<td>" . $row['publicaciondate'] . "</td>";
                                        echo '<td><a  href="?producto=' . $row['id'] . '"><p style="color:red;">Editar</p></a> <a  href="?productos=' . $row['id'] . '"><p style="color:red;">Destacar</p></a>';
                                       
                                        
                                        echo "</tr>";
                                    }
                                }
                                if ($_REQUEST['productos']!=null){
                                    $destacar= htmlspecialchars($_REQUEST['productos']);
                                $query_NuevaNoticia = $mysqli->query("update productos set destacado=0");                               
                                $query_NuevaNoticia = $mysqli->query("update productos set destacado=1 where id=$destacar");
                                
                                
                                }
                                      
                                
                                $producto = $_REQUEST['producto'];

                                if ($producto != NULL) {
                                    $query_noticias = mysqli_query($mysqli, "select * from productos where id='" . $producto . "'");
                                    if (mysqli_num_rows($query_noticias) > 0) {
                                        while ($columna = mysqli_fetch_assoc($query_noticias)) {
                                            echo '       
                   <dialog open>
                   <form method="post" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background: rgb(169,210,243);background: -moz-linear-gradient(45deg, rgba(169,210,243,1) 10%, rgba(107,168,229,1) 30%, rgba(184,225,252,1) 33%, rgba(184,225,252,1) 33%, rgba(144,188,234,1) 37%, rgba(144,191,240,1) 50%, rgba(162,218,245,1) 65%, rgba(162,218,245,1) 65%, rgba(144,186,228,1) 68%, rgba(144,186,228,1) 68%); /* FF3.6-15 */
background: -webkit-linear-gradient(45deg, rgba(169,210,243,1) 10%,rgba(107,168,229,1) 30%,rgba(184,225,252,1) 33%,rgba(184,225,252,1) 33%,rgba(144,188,234,1) 37%,rgba(144,191,240,1) 50%,rgba(162,218,245,1) 65%,rgba(162,218,245,1) 65%,rgba(144,186,228,1) 68%,rgba(144,186,228,1) 68%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(45deg, rgba(169,210,243,1) 10%,rgba(107,168,229,1) 30%,rgba(184,225,252,1) 33%,rgba(184,225,252,1) 33%,rgba(144,188,234,1) 37%,rgba(144,191,240,1) 50%,rgba(162,218,245,1) 65%,rgba(162,218,245,1) 65%,rgba(144,186,228,1) 68%,rgba(144,186,228,1) 68%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#a9d2f3", endColorstr="#90bae4",GradientType=1 ); /* IE6-9 fallback on horizontal gradient */">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalVerticalLabel">' . $columna['titulo'] . '</h5>
        
         
      </div>
      <div class="modal-body">
      <div style="width:50%; float:left;">
<legend> Nombre</legend>
      <input type="text" name="titulo" value="' . $columna['titulo'] . '">      
          <legend> Precio</legend>      
<input type="text" name="precio" rows="8" value="' . $columna['precio'] . '"> 
    <legend> Stock</legend>      
<input type="text" name="stock" rows="8" value="' . $columna['stock'] . '">
    <legend> Genero</legend>      
<input type="text" name="genero" rows="8" value="' . $columna['genero'] . '">
</div>
<div style="width:50%; float:left;">
  <legend> Formato</legend>      
<input type="text" name="formato" rows="8" value="' . $columna['formato'] . '">
    <legend> Editorial</legend>      
<input type="text" name="editorial" rows="8" value="' . $columna['editorial'] . '">
    <legend> Año de publicacion</legend>      
<input type="text" name="publicaciondate" value="' . $columna['publicaciondate'] . '">
 <legend> Detalle</legend>      
<textarea type="text" name="detalle" rows="2">' . $columna['detalle'] . '</textarea>
</div>
       
  
      </div>
     
      <div class="modal-footer">
       
        <a class="btn btn-secondary" href="gestionadmin.php">ATRAS</a>
         <input type="submit" class="btn btn-secondary" value="Enviar" >
      </div>
    </div>
  </div>
</div>
</form>
</dialog>                ';
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php
                                    $titulo2 = htmlspecialchars($_POST['titulo']);
                                    $detalle2 = htmlspecialchars($_POST['detalle']);
                                    $precio2 = htmlspecialchars($_POST['precio']);
                                    $stock2 = htmlspecialchars($_POST['stock']);
                                    $genero2 = htmlspecialchars($_POST['genero']);
                                    $formato2 = htmlspecialchars($_POST['formato']);
                                    $editorial2 = htmlspecialchars($_POST['editorial']);
                                    $publicacion2 = htmlspecialchars($_POST['publicaciondate']);


                                    if ($detalle2 != NULL) {

                                        $query_NuevaNoticia = $mysqli->query("update productos set titulo='" . $titulo2 . "',detalle='" . $detalle2 . "',precio='" . $precio2 . "',stock='" . $stock2 . "',image='" . $ruta . "',genero='" . $genero2 . "',formato='" . $formato2 . "',editorial='" . $editorial2 . "',publicaciondate='" . $publicacion2 . "' where id='" . $columna['id'] . "'");
                                        echo "<script> location.href=\"gestionadmin.php\"; </script>";
                                    }
                                }
                            }
                        }
                        ?>

                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="js/jquery-3.2.1.slim.min.js"></script>
                        <script src="js/popper.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                    </div>
                </div>
            
       

    </body>
</html>