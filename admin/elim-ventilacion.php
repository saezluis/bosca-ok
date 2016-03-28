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
	<div>
	
	
	<?php
	
	$id_ventilacion = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosVentilacion=mysqli_query($conexion,"select * from ventilacion WHERE id_ventilacion = '$id_ventilacion'") or die("Problemas en el select de cocina: ".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosVentilacion)){
	
		$nombre = $reg['nombre'];				
		$modelo = $reg['modelo'];
		$sku = $reg['sku'];
		$anexo_nombre = $reg['anexo_nombre'];
		$precio = $reg['precio'];

		$climatiza = $reg['climatiza'];
		$voltaje = $reg['voltaje'];
		$alto = $reg['alto'];
		$ancho = $reg['ancho'];
		$profundidad = $reg['profundidad'];

		$peso = $reg['peso'];				
		$atributo_funcional01 = $reg['atributo_funcional01'];
		$atributo_funcional02 = $reg['atributo_funcional02'];
		$atributo_funcional03 = $reg['atributo_funcional03'];
		
		$foto_producto = $reg['foto_producto'];
		$foto_zoom = $reg['foto_zoom'];
		
		//$logo_up_left = $reg['mini_logo'];
	
	}
	
	?>
	
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
					<h3 class="text-center  bread-back">
				<?php
				echo "<a href=\"index.php\">Inicio</a> - <a href=\"ventilacion-home.php\">Tipo de producto: Ventilación y A/C </a> - Eliminar";
				?>
			</h3>
			<br>
			
			<form id="back-form" method="post" action="delete-ventilacion.php">
			
				<?php			
				
				echo "<input type=\"text\" name=\"id-producto-send\" value=\"$id_ventilacion\" hidden=hidden>";
				echo "<input type=\"text\" name=\"foto_producto\" value=\"$foto_producto\" hidden=hidden>";						
				echo "<input type=\"text\" name=\"foto_zoom\" value=\"$foto_zoom\" hidden=hidden>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" name=\"nombre\" size=\"50\" required> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$modelo\" name=\"modelo\" size=\"50\" required> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" name=\"sku\" size=\"50\" required> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Anexo nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$anexo_nombre\" name=\"anexo_nombre\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$precio\" name=\"precio\" size=\"50\" required> </span>";
				echo "<br>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Climatiza:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$climatiza\" name=\"climatiza\" size=\"50\"> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Voltaje:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$voltaje\" name=\"voltaje\" size=\"50\"> </span>";		
				echo "<br>";				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Alto:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$alto\" name=\"alto\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Ancho:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ancho\" name=\"ancho\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Profundidad:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$profundidad\" name=\"profundidad\" size=\"50\"> </span>";		
				echo "<br>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Peso:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$peso\" name=\"peso\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 01:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_funcional01\" name=\"atributo_funcional01\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 02:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_funcional02\" name=\"atributo_funcional02\" size=\"50\"> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 03:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_funcional03\" name=\"atributo_funcional03\" size=\"50\"> </span>";		
				echo "<br>";
				
				echo "<span class=\"texto\">Mini logo superior izquierdo: ";
					echo "<img src=\"../img2/mini-bosca.png\">";					
				echo "</span>";
				echo "<br>";
				echo "<br>";
					
				//echo "<span class=\"texto\"><input type=\"text\" value=\"Ficha Tecnica:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ficha_tecnica\" size=\"50\" > </span>";		
				//echo "<br>";
				//echo "<span class=\"texto\">Mini logo superior izquierdo: <img src=\"../img/$logo_up_left\"></span>";	
				//echo "<br>";
				/*
				echo "<span class=\"texto\">Mini logo superior izquierdo: ";				
						
				$stuff_1 = "";
				$stuff_2 = "";
				$stuff_3 = "";
												
				if($logo_up_left=='mini-bosca.png'){
					$stuff_1 = 'checked=\"checked\"';							
				}
				if($logo_up_left=='mini-hergom.png'){
					$stuff_2 = 'checked=\"checked\"';
				}
					
				echo "<input type=\"radio\" name=\"mini_logo\" value=\"mini-bosca.png\" $stuff_1 ><img src=\"../img2/mini-bosca.png\">";
				echo "<input type=\"radio\" name=\"mini_logo\" value=\"mini-hergom.png\" $stuff_2 ><img src=\"../img2/mini-hergom.png\">";				
				echo "</span>";
						
				echo "<br>";
				echo "<br>";
					
				echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img-cc/$foto_producto\">Ver foto actual</a> </span>"; 
				echo "<br>";
				echo "<span class=\"texto\">Seleccione foto para <b><i>cambiar</i></b>: </span>";
				echo "<span class=\"texto\">Única resolución aceptada: <b>330 x 310</b></span>";
				echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">";
						
				echo "<br>";
				echo "<br>";
						
				echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img-cc/$foto_zoom\">Ver foto con zoom</a></span>"; 
				echo "<br>";
				echo "<span class=\"texto\">Seleccione foto para <b><i>cambiar</i></b>: </span>";
				echo "<span class=\"texto\">Única resolución aceptada: <b>900 x 1075</b></span>";
				echo "<input type=\"file\" name=\"fileToUploadDos\" id=\"fileToUploadDos\">";
				/*
				echo "<span class=\"texto\"><input type=\"text\" value=\"Dimensiones:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$dimensiones\" size=\"70\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Diametro cañon:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$diametro_canon\" size=\"50\" readonly> </span>";		
				echo "<br>";
					
				echo "<span class=\"texto\"><input type=\"text\" value=\"Garantia:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$garantia\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";		
				echo "<br>";
				*/	
					
				//echo "<span class=\"texto\">Mini logo superior izquierdo: <img src=\"../img2/$logo_up_left\"></span>";	
				//echo "<span class=\"texto\"> -- </span>";					
				//echo "<br>";
				//echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img-cc/$foto_producto\">Ver foto</a> </span>"; //<img src=\"../img2/$foto_producto\">
				//echo "<span class=\"texto\"> -- </span>";
				//echo "<br>";
				
				//echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img-cc/$foto_zoom\">Ver foto con zoom</a></span>"; //<img src=\"../img2/$foto_zoom\">
				//echo "<br>";
					
				echo "<br>";
				echo "<br>";
			
			?>
			
			<button class="button-change" type="submit" onClick="alert('El contenido fue eliminado')">Eliminar</button>
			<a class="button-change"  href="ventilacion-home.php">Cancelar</a>
			
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