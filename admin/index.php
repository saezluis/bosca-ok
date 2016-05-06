<?php
session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

	}
	else{
	
		header('Content-Type: text/html; charset=UTF-8'); 	
		echo "<br/>" . "Esta pagina es solo para usuarios registrados." . "<br/>";
		echo "<br/>" . "<a href='login-admin.php'>Hacer Login</a>";
		exit;
	}
	
	$now = time(); // checking the time now when home page starts

	if($now > $_SESSION['expire']){
		session_destroy();
		echo "<br/><br />" . "Su sesion a terminado, <a href='login-admin.php'> Necesita Hacer Login</a>";
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrador Bosca - 1.0</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>	
    	.panel-title{
			text-align: center;
			width: 100%;
			display: block;
    	}
		.panel-body{
			text-align: center;
		}
		.panel-body a{
			color:#E65524; 
			text-align: center;
		}
    </style>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>

  </head>
  <body>
	    <div class="container-fluid no-padding">
			<div class="row">
				<div class="col-md-12">
					<div class="logotipo">
						<img src="img/logo--2.png" alt="">
					</div>
					<h3 class="text-center" style="margin-bottom: 2em;">
						Administrador General
					</h3>
				</div>
			</div>
		</div>
		<div class="container">		
				<div class="row">
					<div class="col-md-6">
						<div class="panel-group" id="panel-752950">
							<div class="panel panel-default">
								<div class="panel-heading">
									 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-752950" href="#panel-element-240959">Banners</a>
								</div>
								<div id="panel-element-240959" class="panel-collapse collapse">
									<div class="panel-body">
										<a href="consultar-banner.php">Consultar</a>
									</div>
									<div class="panel-body">
										<a href="agregar-banner.php">Agregar</a>
									</div>
									<div class="panel-body">
										<a href="modificar-banner.php">Modificar</a>
									</div>
									<div class="panel-body">
										<a href="eliminar-banner.php">Eliminar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel-group" id="panel-916892">
							<div class="panel panel-default">
								<div class="panel-heading">
									 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-916892" href="#panel-element-618663">Productos</a>
								</div>
								<div id="panel-element-618663" class="panel-collapse collapse">
									<div class="panel-body">
										<a class="color-link-prod" href="calefaccion-home.php" >Calefacción</a>
									</div>
									<div class="panel-body">
										<a class="color-link-prod" href="parrilla-home.php" >Terraza y Parrilla</a>
									</div>
									<div class="panel-body">
										<a class="color-link-prod" href="accparrilla-home.php" >Accesorios Parrilla</a>
									</div>
									<div class="panel-body">
										<a class="color-link-prod" href="cocina-home.php" >Cocina y Calderas</a>
									</div>
									<div class="panel-body">
										<a class="color-link-prod" href="ventilacion-home.php" >Ventilación y aire acondicionado</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel-group" id="panel-219875">
							<div class="panel panel-default">
								<div class="panel-heading">
									 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-219875" href="#panel-element-89965">Sucursales</a>
								</div>
								<div id="panel-element-89965" class="panel-collapse collapse">
									<div class="panel-body">
										<a href="consultar-sucursal.php">Consultar</a>
									</div>
									<div class="panel-body">
										<a href="#">Agregar</a>
									</div>
									<div class="panel-body">
										<a href="#">Modificar</a>
									</div>
									<div class="panel-body">
										<a href="#">Eliminar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel-group" id="panel-936307">
							<div class="panel panel-default">
								<div class="panel-heading">
									 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-936307" href="#panel-element-49821">Técnicos</a>
								</div>
								<div id="panel-element-49821" class="panel-collapse collapse">
									<div class="panel-body">
										<a href="consultar-tecnico.php">Consultar</a>
									</div>
									<div class="panel-body">
										<a href="agregar-tecnico.php">Agregar</a>
									</div>
									<div class="panel-body">
										<a href="modificar-tecnico.php">Modificar</a>
									</div>
									<div class="panel-body">
										<a href="eliminar-tecnico.php">Eliminar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>