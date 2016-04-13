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
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	
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
							<?php
							echo "Estas en: Modificar técnico";
							
							$id_servicio = $_GET['id_send'];
							
							include_once 'config.php';
	
							$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
							$acentos = $conexion->query("SET NAMES 'utf8'");
							
							$registrosTecnicos = mysqli_query($conexion,"SELECT * FROM servicio WHERE id_servicio = '$id_servicio' ") or die("Problemas en el select:".mysqli_error($conexion));
							
							if($reg=mysqli_fetch_array($registrosTecnicos)){		 						
								$nombre = $reg['nombre'];
								$mail = $reg['mail'];
								$rut = $reg['rut'];
								$telefono = $reg['telefono'];								
								$direccion = $reg['direccion'];
								$region = $reg['region'];			
							}
							
							?>
						</h3>
						<br>
							<?php
							echo "<form id=\"back-form\" name=\"formProducto\" method=\"post\" action=\"modificar-tecnico-procesar.php\" enctype=\"multipart/form-data\">";
							
								echo "<input type=\"text\" value=\"$id_servicio\" name=\"id_send_servicio\" hidden=hidden>";
								
								echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" name=\"nombre\" size=\"50\" required> </span>";
								echo "<br>";
								echo "<span class=\"texto\"><input type=\"text\" value=\"Email:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$mail\" name=\"email\" size=\"50\" required> </span>";
								echo "<br>";
								echo "<span class=\"texto\"><input type=\"text\" value=\"RUT:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$rut\" name=\"rut\" size=\"50\" required> </span>";
								echo "<br>";
										
								echo "<span class=\"texto\"><input type=\"text\" value=\"Telefono:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$telefono\" name=\"telefono\" size=\"50\" required> </span>";
								echo "<br>";
								echo "<span class=\"texto\"><input type=\"text\" value=\"Dirección:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$direccion\" name=\"direccion\" size=\"50\" required> </span>";
								echo "<br>";
								
								//<!-- colocar un select -->
								echo "<span class=\"texto\"><input type=\"text\" value=\"Región:\" class=\"rightJustified\" readonly>";
									//<!--	<input type=\"text\" name=\"panel_programable\" size=\"50\">	-->
									echo "<select name=\"region\">";
										echo "<option value=\"$region\">Región actual: $region</option>";
										echo "<option value=\"III region\">III Región</option>";
										echo "<option value=\"IV region\">IV Región</option>";
										echo "<option value=\"V region\">V Región</option>";
										echo "<option value=\"VI region\">VI Región</option>";
										echo "<option value=\"VII region\">VII Región</option>";
										echo "<option value=\"VIII region\">VIII Región</option>";
										echo "<option value=\"IX region\">IX Región</option>";
										echo "<option value=\"XIV region\">XIV Región</option>";
										echo "<option value=\"X region\">X Región</option>";
										echo "<option value=\"region metropolitana\">Región Metropolitana</option>";
									echo "</select>";
								echo "</span>";
								echo "<br>";
								//<!-- aqui va la foto -->
								
								echo "<br>";
								//<div class=\"cajaborder\">
									//<span class=\"texto\">Foto del técnico - Seleccione foto para cargar: </span>
									//<span class=\"texto\">Única resolución aceptada: <b>120 x 95</b></span>
									//<input class=\"inp-file\" type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" required>
								//</div>
								
								echo "<input  class=\"button-change\" type=\"submit\" value=\"Modificar\" ></input>";
							
							echo "</form>";
							?>
					</div><!--fin.col-md-12-->
				</div><!--fin.row-->
		</div><!--fin.container-fluid-->
	</div>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
	<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	
  </body>
</html>