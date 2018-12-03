<?php
session_start();
include './database.php';
$car = isset($_SESSION['carrito']) ? unserialize($_SESSION['carrito']) : array();
$suma = 0;

$nombreCliente = $mysqli->real_escape_string(htmlspecialchars($_POST['nombreCliente']));
$direccion = $mysqli->real_escape_string(htmlspecialchars($_POST['direccion']));
$tarjeta = $mysqli->real_escape_string(htmlspecialchars($_POST['tarjeta']));
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
        <title>Factura</title>
    </head>
    <body>
        <h1>Ingrese los siguientes datos para continuar </h1>
        <form action="factura.php" method="post" enctype="multipart/form-data" style="border: dotted">



            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center" action="AgregarProducto.php" method="post" enctype="multipart/form-data"><i class="fa fa-user bigicon"></i></span>
                <div class="col-md-8">
                    <label for="title">Nombre</label>
                    <input type="text" name="nombreCliente" class="form-control" id="nombre"  required>
                </div>
            </div>
            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center" action="AgregarProducto.php" method="post" enctype="multipart/form-data"><i class="fa fa-user bigicon"></i></span>
                <div class="col-md-8">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" id="direccion" required>
                </div>
            </div>
            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center" action="AgregarProducto.php" method="post" enctype="multipart/form-data"><i class="fa fa-user bigicon"></i></span>
                <div class="col-md-8">
                    <label for="tarjeta">tarjeta</label>
                    <input type="text" name="tarjeta" class="form-control" id="tarjeta" onkeypress="return isNumberKey(event)" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Generar Factura</button>
        </form>
        <?php foreach ($car as $value) { ?>



            <h1><?php
                $pulsar = htmlspecialchars($_POST['añadir']);
                if (isset($pulsar)) {
                    if ($nombreCliente != NULL) {
                        $deshabilitar = 2;
                        $query_noticias = mysqli_query($mysqli, "update productos set cantidadcompra = 1 + cantidadcompra where id ={$value['id']} and stock>0 ");
                        $query_noticias3 = mysqli_query($mysqli, "insert into compra(nombre,direccion,titulo,precio,cantidad,tarjeta) values('" . $nombreCliente . "','" . $direccion . "','" . $value['titulo'] . "','" . $value['precio'] . "','1','" . $tarjeta . "')");
                        $query_noticias2 = mysqli_query($mysqli, "update productos set stock = stock- 1  where id ={$value['id']} and stock>0");
                        echo '<script>alert("la factura se genero correctamente"); window.location.href = "compra.php"</script>';
                    }
                }
                ?></h1>




            <?php
        }
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>