<?php
session_start();
include './database.php';
$car = isset($_SESSION['carrito']) ? unserialize($_SESSION['carrito']) : array();
$suma=0;
if (array_key_exists('id', $_GET)) {
    $query_noticias = mysqli_query($mysqli, "SELECT * FROM productos WHERE id ={$_GET['id']}");
    if (mysqli_num_rows($query_noticias) > 0) {
        $car[] = mysqli_fetch_assoc($query_noticias);
        $_SESSION['carrito'] = serialize($car);
    }
}
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <title>PRODUCTOS AGREGADOS AL CARRITO</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <style type="text/css">
            <!--
            .tit {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 20px;
                color: #FFFFFF;
            }
            .prod {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 15px;
                color: #333333;
            }
            h1 {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 20px;
                color: #990000;
            }
            -->
        </style>
    </head>
    <body>
        <h1 align="center">Carrito</h1>

        
        <table width="720" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr bgcolor="#333333" class="tit"> 
                <td width="105">Cantidad</td>
                <td width="207">Titulo</td>
                <td >Precio EUR</td>
                <td colspan="2" align="center">Genero</td>

            </tr>
            <?php foreach ($car as $value) {  $suma=$value['precio']+$suma;?>
            
                <tr class='prod'> 

                    <td>1</td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo number_format($value['precio'], 2); ?></td>
                    <td><?php echo $value['genero']; ?></td>

                </tr>



                <?php
            }
            ?>
              </table>
        <div align="center"><span class="prod"><a href="cliente.php">Continuar la selección de productos</a></span> </div>
        <div align="center"><span class="prod"><a href="factura.php?fac=<?php echo $_GET['id'] ?>">Finalizar Compra</a></span> </div>
      
        <h3 align="left">SUBTOTAL => <?php echo number_format($suma,2) ?></h3>
        <h3 align="left"> IMPUESTOS: 21% =><?php echo number_format($suma *0.21,2) ?></h3>
       <hr/>
       <h2 align="left"> TOTAL=> <?php echo number_format((($suma*0.21) +$suma),2)  ?></h2>
        
       
    </body>
</html>