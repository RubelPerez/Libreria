<?php
include("database.php");
error_reporting(E_ERROR);
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: gestionadmin.php?module=start");
    exit;
}?>

<html lang="en">
    <head>
        <style>
	.centrar
	{
		/*nos posicionamos en el centro del navegador*/
		
		
		/*determinamos una anchura*/
		
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		
	}
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

        <div class="container">
            <div class="row-12">
                <div class="col-12">
                    <div class="sidenav">
                        <a href="AgregarProducto.php"><img src="imagenes/admin.png"/> Agregar Producto</a>
                        <a href="gestionadmin.php"><img src="imagenes/edit.png"/>Editar Productos</a>
                        <a href="reportes.php"><img src="imagenes/report.png"/>Reportes</a>
                        <a href="index.php"><img src="imagenes/Salir.png"/>salir</a>

                    </div>

                </div>
                <div class="col-12">

                </div>
                <center>
                    <h1>Reportes de administrador</h1></center>

                <div style="position :relative !important;left: 5% !important;
}">
                        <center>
                            <a href="inventario.php">   <button type="button" class="btn btn-primary btn-lg btn-block btn-dark">Listado de Todos los libros a la fecha</button></a><br/>
                            <a href="recomendado.php">   <button type="button" class="btn btn-primary btn-lg btn-block btn-dark">Listado de libros recomendados  y mas vendido</button></a><br/>
                            <a href="recaudacion.php">   <button type="button" class="btn btn-primary btn-lg btn-block btn-dark">Todo el dinero recaudado</button></a>
                        </center>

                    </div>
                </div>
            </div>
        