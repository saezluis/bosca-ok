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
	
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	
<!-- 	<style>
	.texto {
		font-family: Arial;	
	}
	
	.textSize {
		font-size: 24px;
	}
	</style>
	
	<style>
   .rightJustified {
        text-align: right;
		border: none
    }
	</style> -->
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

  </head>
  <body>
	<div class="full">
	
	
			<?php
			
			include_once 'config.php';
			
			$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
			$acentos = $conexion->query("SET NAMES 'utf8'");
			
			?>
	
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 no-padding">
							<h3 class="text-center  no-padding">
								<div class="logotipo">
									<img src="img/logo--2.png" alt="">
								</div>
								<a class="color-link" href="index.php">Administrador Bosca</a>
							</h3>
						</div>			
					</div>
					<div class="row">
						<div class="col-md-12">
						<h3 class="text-center bread-back">
							<?php
							echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - Eliminar banners";
							?>
						</h3>
						<br>
						<form id="back-form" >
							<?php
							
								$registrosBanners = mysqli_query($conexion,"select * from banners") or die("Problemas en el select:".mysqli_error($conexion));
								
								echo "<h3>Click sobre el banner que desea eliminar</h3>";
								
								while($reg=mysqli_fetch_array($registrosBanners)){
									$nombre_banner = $reg['nombre'];
									$id_banner = $reg['id_banner'];									
									
									//<a class=\"delete\" href=\"elim-calefaccion.php?id_send=",urlencode($id_producto)," \">$sku</a>
									echo "<div class=\"cons-banner\"> <a href=\"eliminar-banner-procesar.php?id_send=",urlencode($id_banner)," \"> <img src=\"../img/$nombre_banner\"> </a> </div>";
									echo "<br>";
									echo "<br>";
								}
								
							?>
						</form> 
						</div>
					</div>
				</div>
				
	</div>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
	<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	
  </body>
</html>