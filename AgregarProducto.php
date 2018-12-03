<?php
include("database.php");
error_reporting(E_ERROR);
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: gestionadmin.php?module=start");
    exit;
}

$pulsar = htmlspecialchars($_POST['añadir']);
if (isset($pulsar)) {
    $titulo = $mysqli->real_escape_string(htmlspecialchars($_POST['titulo']));
    $texto = $mysqli->real_escape_string(htmlspecialchars($_POST['precio']));
    $stock = $mysqli->real_escape_string(htmlspecialchars($_POST['stock']));
    $genero = $mysqli->real_escape_string(htmlspecialchars($_POST['genre']));
    $formato = $mysqli->real_escape_string(htmlspecialchars($_POST['formato']));
    $editorial = $mysqli->real_escape_string(htmlspecialchars($_POST['editorial']));
    $publicacion = $mysqli->real_escape_string(htmlspecialchars($_POST['publicaciondate']));
    $autor = $mysqli->real_escape_string(htmlspecialchars($_POST['autor']));
    $cantidadcompra = 0;
    $carpeta = "imgarticulos/";
    opendir($carpeta);
    $destino = $carpeta . $_FILES['image']['name'];
    copy($_FILES['image']['tmp_name'], $destino);
    $nombre = $_FILES['image']['name'];
    $ruta = "<img src=\"imgarticulos/$nombre\">";

    $detalle = $mysqli->real_escape_string(htmlspecialchars($_POST['detalle']));


    if (NULL != $titulo && NULL != $texto && NULL != $stock && NULL != $genero && NULL != $formato) {

        $query_NuevaNoticia = $mysqli->query("INSERT INTO productos(titulo,detalle,precio,stock,image,cantidadcompra,genero,formato,editorial,publicaciondate,autor) values ('" . $titulo . "','" . $detalle . "','" . $texto . "','" . $stock . "','" . $ruta . "','" . $cantidadcompra . "','" . $genero . "','" . $formato . "','" . $editorial . "','" . $publicacion . "','".$autor."')");

        if ($query_NuevaNoticia) {
            echo '<script>alert("El producto se añadió correctamente a la base de datos."); window.location.href = "AgregarProducto.php"</script>';
        } else {
            echo '<legend class="text-center header">El Producto no pudo ser insertada en la base de datos</legend>';
        }
    } else {
        echo '<legend class="text-center header">Los campos no pueden estar vacios</legend>';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/menuadmin.css">
        <script type="text/javascript">

            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31
                        && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }


            function isNumericKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31
                        && (charCode < 48 || charCode > 57))
                    return true;
                return false;
            }
        </script>
        <title>Agregar Producto</title>
    </head>
    <body style='background-color: whitesmoke;'>

        <!--menu-->

        <!--fin menu-->
        <div class="container" >
            <div class="row">
                <div class="col-3">
                    <div class="sidenav">
                        <a href="AgregarProducto.php"><img src="imagenes/admin.png"> Agregar Producto</a>
                        <a href="gestionadmin.php"><img src="imagenes/edit.png">Editar Productos</a>
                        <a href="reportes.php"><img src="imagenes/report.png">Reportes</a>
                        <a href="index.php"><img src="imagenes/Salir.png"/>salir</a>
                    </div>

                </div>
                <div class="col-8" style="background-color: silver;">
                    <div class="well well-sm">
                        <form action="AgregarProducto.php" method="post" enctype="multipart/form-data" style="border: dotted">
                            <fieldset>
                                <legend class="text-center header">Agregar Producto</legend>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center" action="AgregarProducto.php" method="post" enctype="multipart/form-data"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="title">Titulo</label>
                                        <input type="text" name="titulo" class="form-control" id="title" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center" action="AgregarProducto.php" method="post" enctype="multipart/form-data"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="autor">Autor</label>
                                        <input type="text" name="autor" class="form-control" id="autor" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="edito">Editorial</label>
                                        <input type="text" name="editorial" class="form-control" id="edito" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="publish">Año de publicacion</label>
                                        <input type="text" name="publicaciondate" class="form-control" id="publish" onkeypress="return isNumberKey(event)" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="price">Precio</label>
                                        <input type="text" name="precio" class="form-control" id="price" onkeypress="return isNumberKey(event)" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="image">Imagen</label>
                                        <input type="file" class="form-control-file" required="true" data-toggle="validator" name="image" id="image" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="stock">Stock</label>
                                        <input type="text" class="form-control" name="stock" id="stock" onkeypress="return isNumberKey(event)" required>    
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="genre">Genero</label>
                                        <select class="custom-select" name="genre">
                                            <option selected value="0">Seleccionar Genero</option>
                                            <option value="Novela">Novela</option>
                                            <option value="Ensayo">Ensayo</option>
                                            <option value="Libro de texto">Libro de texto</option>
                                            <option value="Comic">Comic</option>
                                            <option value="Infantil">Infantil</option>

                                        </select>   

                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="format">Formato</label>
                                        <select class="custom-select" name="formato">
                                            <option selected value="0">Seleccionar Formato</option>
                                            <option value="Tapa dura">Tapa dura</option>
                                            <option value="Tapa blanda">Tapa blanda</option>
                                        </select>    
                                    </div>
                                </div>



                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="detail">Detalle</label>
                                        <textarea class="form-control" id="detail" name="detalle"  rows="7" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>







        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>