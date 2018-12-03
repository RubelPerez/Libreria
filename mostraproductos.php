<?php

include("./database.php");
if (isset($_GET['productos'])) {
    if (!empty($_GET['productos'])) {
        $id_detalle = (int) $mysqli->real_escape_string($_GET['productos']);
        $query_noticias = mysqli_query($mysqli, "SELECT * FROM productos WHERE stock>0 and id = '" . $id_detalle . "' LIMIT 1 ");
        if (mysqli_num_rows($query_noticias) > 0) {
            while ($columna = mysqli_fetch_assoc($query_noticias)) {
                echo ' 
<table id="tbmostrar" width="800px" style="background-image: url(imagenes/fondotexto.jpg);">
                    <tr>
                      <td id="titulo">' . $columna['titulo'] . '</td>
                      <td rowspan="2" id="detalletb"><h1>Sinopsis</h1>' . $columna['detalle'] . '</td>	
                                                        
                                </tr>
                                
                     <tr>
                       <td id="imagetb">' . $columna['image'] . '</td>
                    </tr>
                    <tr> 
                    <td id="precio">Editorial: ' . $columna['editorial'] . ' </td>
                        <td id = "precio">Formato: ' . $columna['formato'] . '</td>
                           
                        
                    </tr>
                    <tr><td id = "precio">Autor: ' . $columna['autor'] . '</td></tr>
                      <tr>					  
                        <td id="titulo">Precio: €' . $columna['precio'] . '</td>
                        <td id = "precio">Genero: ' . $columna['genero'] . '</td> 
                        
                    </tr>
                    <tr><td id = "titulo">Existencia: ' . $columna['stock'] . '</td>   </tr>
                       <tr>
                       
                         <td><a id= "linksAzul" href="cliente.php">Atrás</a></td>
                         <td><a id= "linksAzul" href="carrito.php?id='.$columna['id'].'">Agregar al carro</a></td>
                    </tr>
                </table>
</form>
                ';
            }
        } else {
            echo 'La noticia que solicitas, no existe.';
        }
    } else {
        echo 'Debes seleccionar una noticia.';
    }
} else {
    $query_noticias = mysqli_query($mysqli, "SELECT * FROM productos where stock>0 Order by destacado DESC,cantidadcompra desc ");
$destacado=0;
$vendido=0;
    while ($columna = mysqli_fetch_assoc($query_noticias)) {
        $destacado++;
        if ($destacado == 1) {
            echo '	
<table id="tbmostrar">

            <tr>
               <td id="titulo">' . $columna['titulo'] . '<br> <b style="color:blue;">Destacado<b> </td>
            </tr>
          <tr>
	     <td id="image"><center>' . $columna['image'] . '</center></td>
		  </tr>
            <tr>
              <td id="precio">€' . number_format($columna['precio'] / 1.10, 2) . '</td>
            </tr>
            <tr>
          <td colspan="2"><a  href="?productos=' . $columna['id'] . '"><p id="detalink">Detalles</p></a></td> 	
            </tr>
			
        </table>


        ';
        } elseif ($vendido<3) {
            $vendido++;
            echo '
	
	
	
<table id="tbmostrar">

            <tr>
               <td id="titulo">' . $columna['titulo'] . '<br> <b style="color:green;">Mas Vendido<b> </td>
            </tr>
          <tr>
	     <td id="image"><center>' . $columna['image'] . '</center></td>
		  </tr>
            <tr>
              <td id="precio">€' . $columna['precio'] . '</td>
            </tr>
            <tr>
          <td colspan="2"><a  href="?productos=' . $columna['id'] . '"><p id="detalink">Detalles</p></a></td> 	
            </tr>
			
        </table>


        ';
        }else{
                    echo '
	
	
	
<table id="tbmostrar">

            <tr>
               <td id="titulo">' . $columna['titulo'] . '</td>
            </tr>
          <tr>
	     <td id="image"><center>' . $columna['image'] . '</center></td>
		  </tr>
            <tr>
              <td id="precio">€' . $columna['precio'] . '</td>
            </tr>
            <tr>
          <td colspan="2"><a  href="?productos=' . $columna['id'] . '"><p id="detalink">Detalles</p></a></td> 	
            </tr>
			
        </table>


        ';
            
        }
    }
}
?>