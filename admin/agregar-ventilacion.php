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
	
	<style>
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
	</style>

  </head>
  <body>
	<div>
	
	
	<?php
	
	/*
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosVentilacion = mysqli_query($conexion,"select * from ventilacion") or die("Problemas en el select de ventilacion".mysqli_error($conexion));
	
	$TAMANO_PAGINA = 2; 
		
		//examino la página a mostrar y el inicio del registro a mostrar 
		@$pagina = $_GET["pagina"]; 
		if (!$pagina) { 
			$inicio = 0; 
			$pagina=1; 
		} 
		else { 
			$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
		}
		
		$num_total_registros = mysqli_num_rows($registrosVentilacion); 
		//calculo el total de páginas 
		$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
		
		$ssql = "select * from ventilacion LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		
		$rs = mysqli_query($conexion,$ssql); 
	*/

	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-left">
					<a href="index.html">Administrador Bosca</a>
				</h3>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-9">
			<h3 class="text-left">
				<?php
				echo "<a href=\"index.php\">Inicio</a> - <a href=\"ventilacion-home.php\">Tipo de producto: Ventilación y A/C </a> - Consultar";
				?>
			</h3>
			<br>
			<form name="formProducto" method="post" action="procesar-agregar-ventilacion.php" enctype="multipart/form-data">
			
				<?php			
			
				echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"nombre\" size=\"50\" required> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"modelo\" size=\"50\" required> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"sku\" size=\"50\" required> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Anexo nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"anexo_nombre\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"precio\" size=\"50\" required> </span>";
				echo "<br>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Climatiza:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"climatiza\" size=\"50\"> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Voltaje:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"voltaje\" size=\"50\"> </span>";		
				echo "<br>";				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Alto:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"alto\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Ancho:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"ancho\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Profundidad:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"profundidad\" size=\"50\"> </span>";		
				echo "<br>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Peso:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"peso\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 01:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_funcional01\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 02:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_funcional02\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 03:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_funcional03\" size=\"50\"> </span>";		
				echo "<br>";
				
				echo "<span class=\"texto\">Mini logo superior izquierdo: ";
					echo "<input type=\"radio\" name=\"mini_logo\" value=\"mini-bosca.png\"><img src=\"../img2/mini-bosca.png\">";					
				echo "</span>";
				echo "<br>";
				echo "<br>";
				
				echo "<span class=\"texto\">Foto producto (Vista Catalogo) - - Seleccione foto para cargar: </span>";
				echo "<span class=\"texto\">Única resolución aceptada: <b>330 x 310</b></span>";
				echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" required>";
				echo "<br>";
				
			
				echo "<br>";
				echo "<span class=\"texto\">Foto producto con Zoom - - Seleccione foto para cargar: </span>";
				echo "<span class=\"texto\">Única resolución aceptada: <b>900 x 1075</b></span>";
				echo "<input type=\"file\" name=\"fileToUploadDos\" id=\"fileToUploadDos\" required>";
				echo "<br>";
				echo "<br>";
					
				
				?>
			
			<input type="submit" ></input>
			
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