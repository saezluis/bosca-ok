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
						Administrador de Productos
					</h3>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="panel-group" id="panel-142934">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-142934" href="#panel-element-230870">Elige una categoría</a>
							</div>
							<div id="panel-element-230870" class="panel-collapse collapse">
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
		</div><!--fin.container-fluid-->
	</div><!--fin.full-->

	

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>