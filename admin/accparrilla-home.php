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
	.texto {
		font-family: 'Open Sans', sans-serif;
		display: block;
		text-align: center;
	}
	
	.textSize {
		font-size: 24px;
	}
	</style>
	
	<style>
   .rightJustified, .leftJustified {
        text-align: left;
		border: none;
		background: transparent;
    }
	</style>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>

  </head>
  <body>
	<div class="full">
	
		<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 no-padding">
					<div class="logotipo">
						<img src="img/logo--2.png" alt="">
					</div>
						<h3 class="text-center">
							<a class="color-link" href="index.php">Administrador Bosca</a>
						</h3>
					</div>			
				</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center bread-back">
						<a href="index.php">Inicio</a> - Tipos de productos: Accesorios Parrilla
					</h3>
					<div class="btn-group">
						<br>												
						<ul>
							<li>
								<?php
								echo "<a href=\"consultar-accparrilla.php\">Consultar productos</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"agregar-accparrilla.php\">Agregar productos</a>";
								?>
							</li>							
							<li>
								<?php
								echo "<a href=\"modificar-accparrilla.php\">Modificar productos</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"el-accparrilla.php\">Eliminar productos</a>";
								?>
							</li>							
						</ul>
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