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
						<a href="index.php">Inicio</a> - Tipo de producto: Calefacción
					</h3>
					<div class="btn-group">												
						<ul>
							<li>
								<?php
								echo "<a href=\"consultar-calefaccion.php\">Consultar productos</a>";
								?>
								
							</li>
							<li>
								<?php
								echo "<a href=\"agregar-calefaccion.php\">Agregar calefacción</a>";
								?>
							</li>							
							<li>
								<?php
								echo "<a href=\"modificar-calefaccion.php\">Modificar producto</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"el-calefaccion.php\">Eliminar producto</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"orden-calefaccion.php\">Orden de producto</a>";
								?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--fin.full-->
	
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>