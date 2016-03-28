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
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>

  </head>
  <body>
	 	
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-left">
				Administrador Bosca
			</h3>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2">
			<div class="panel-group" id="panel-142934">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-142934" href="#panel-element-230870">Productos</a>
					</div>
					<div id="panel-element-230870" class="panel-collapse collapse">
						<div class="panel-body">
							<a href="calefaccion-home.php" >Calefacción</a>
						</div>						
						<div class="panel-body">
							<a href="parrilla-home.php" >Terraza y Parrilla</a>
						</div>
						<div class="panel-body">
							<a href="accparrilla-home.php" >Accesorios Parrilla</a>
						</div>
						<div class="panel-body">
							<a href="cocina-home.php" >Cocina y Calderas</a>
						</div>
						<div class="panel-body">
							<a href="ventilacion-home.php" >Ventilación y aire acondicionado</a>
						</div>
					</div>
				</div>
				<!--
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-142934" href="#panel-element-543909">Pilares Súbete</a>
					</div>
					<div id="panel-element-543909" class="panel-collapse collapse">
						<div class="panel-body">
							<a href="seguridad-home.php" >Seguridad</a>
						</div>
						<div class="panel-body">
							<a href="productividad-home.php" >Productividad</a>
						</div>
						<div class="panel-body">
							<a href="responsabilidad-home.php" >Responsabilidad</a>
						</div>
						<div class="panel-body">
							<a href="superacion-home.php" >Superación</a>
						</div>
						<div class="panel-body">
							<a href="optimismo-home.php" >Optimismo</a>
						</div>
						<div class="panel-body">
							<a href="profesionalismo-home.php" >Profesionalismo</a>
						</div>						
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-142934" href="#panel-element-230871">Noticias</a>
					</div>
					<div id="panel-element-230871" class="panel-collapse collapse">
						<div class="panel-body">
							<a href="consultar-noticias.php" >Consultar noticias</a>
						</div>						
						<div class="panel-body">
							<a href="agregar-noticias.php" >Agregar noticias</a>
						</div>
						<div class="panel-body">
							<a href="noticia-activa.php" >Establecer noticia activa</a>
						</div>
						<div class="panel-body">
							<a href="editar-noticia.php" >Editar noticias</a>
						</div>
						<div class="panel-body">
							<a href="el-noticias.php" >Eliminar noticias</a>
						</div>
					</div>
				</div>
				-->
			</div>
		</div>
	</div>
</div>

	

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>