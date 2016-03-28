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
	<div class="full">
	
	
	<?php
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosTodos=mysqli_query($conexion,"select * from parrilla") or die("Problemas en el select:".mysqli_error($conexion));
	
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
		
		$num_total_registros = mysqli_num_rows($registrosTodos); 
		//calculo el total de páginas 
		$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
		
		$ssql = "select * from parrilla LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		
		$rs = mysqli_query($conexion,$ssql); 
	

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
				echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"parrilla-home.php\">Tipo de producto: Parrilla / Terraza</a> - Consultar";
				?>
			</h3>
			<br>
			<form id="back-form" >
					<?php			
						
						//parrilla y Accparrilla son las tablas que deberia cargar para consulta
						
						while($reg=mysqli_fetch_array($rs)){
						
							$nombre = $reg['nombre'];
							$modelo = $reg['modelo'];
							$sku = $reg['sku'];
							
							$precio = $reg['precio'];
							$alto = $reg['alto'];
							$ancho = $reg['ancho'];
							
							$profundidad = $reg['profundidad'];
							$peso = $reg['peso'];
							$material = $reg['material'];
							
							$atributo_01 = $reg['atributo_01'];
							$atributo_02 = $reg['atributo_02'];
							$atributo_03 = $reg['atributo_03'];
							$atributo_04 = $reg['atributo_04'];
							$atributo_05 = $reg['atributo_05'];
							$atributo_06 = $reg['atributo_06'];
							
							$foto_producto = $reg['foto_producto'];
							$foto_zoom = $reg['foto_zoom'];
							
							$logo_up_left = $reg['logo_up_left'];
							$ficha_tecnica = $reg['ficha_tecnica'];

							
							echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$modelo\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";
							echo "<br>";
							
							echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$precio\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Alto:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$alto\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Ancho:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ancho\" size=\"50\" readonly> </span>";
							echo "<br>";
							
							echo "<span class=\"texto\"><input type=\"text\" value=\"Profunidad:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$profundidad\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Peso:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$peso\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Material:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$material\" size=\"50\" readonly> </span>";		
							echo "<br>";
							
							echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 01:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_01\" size=\"70\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 02:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_02\" size=\"70\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 03:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_03\" size=\"70\" readonly> </span>";		
							echo "<br>";					
							echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 04:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_04\" size=\"70\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 05:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_05\" size=\"70\" readonly> </span>";
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 06:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_06\" size=\"70\" readonly> </span>";
							echo "<br>";
							
							//validar ficha tecnica si, tiene la muestra, sino tiene no..
							if($ficha_tecnica==''){
								$jared = 'x';
							}
							if($ficha_tecnica!=''){
								echo "<span class=\"texto\"><input type=\"text\" value=\"Ficha Tecnica:\" class=\"rightJustified\" readonly> <a href=\"../fichas-tecnicas/$ficha_tecnica\">Ficha Técnica</a> </span>";							
							}
							echo "<br>";
							echo "<span class=\"texto\">Mini logo superior izquierdo: <img src=\"../img/$logo_up_left\"></span>";	
							echo "<br>";
							echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img/$foto_producto\">Ver foto</a> </span>"; //<img src=\"../img2/$foto_producto\">
							//echo "<span class=\"texto\"> -- </span>";
							if($foto_zoom==''){
								$jaredL = 'x';
							}
							if($foto_zoom!=''){
								echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img/$foto_zoom\">Ver foto con zoom</a></span>"; //<img src=\"../img2/$foto_zoom\">
							}
							echo "<br>";					
							echo "<br>";
							/*
							echo "<span class=\"texto\"><input type=\"text\" value=\"Templador:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$templador\" size=\"50\" readonly> </span>";		
							echo "<br>";
							
							echo "<span class=\"texto\"><input type=\"text\" value=\"Ventaja Comparativa:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ventaja_comparativa\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Dimensiones:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$dimensiones\" size=\"70\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"Diametro cañon:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$diametro_canon\" size=\"50\" readonly> </span>";		
							echo "<br>";
							
							echo "<span class=\"texto\"><input type=\"text\" value=\"Garantia:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$garantia\" size=\"50\" readonly> </span>";		
							echo "<br>";
							echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";		
							echo "<br>";
							
							
							echo "<span class=\"texto\">Mini logo superior izquierdo: <img src=\"../img2/$logo_up_left\"></span>";	
							//echo "<span class=\"texto\"> -- </span>";					
							echo "<br>";
							echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img/$foto_producto\">Ver foto</a> </span>"; //<img src=\"../img2/$foto_producto\">
							//echo "<span class=\"texto\"> -- </span>";
							echo "<br>";
							echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img/$foto_zoom\">Ver foto con zoom</a></span>"; //<img src=\"../img2/$foto_zoom\">
							echo "<br>";
							*/

							
							echo "<br>";
							echo "<br>";
						}
						
						mysqli_free_result($rs); 
						echo "<div class=\"paginadors\">";
							if ($total_paginas > 1){ 
								for ($i=1;$i<=$total_paginas;$i++){ 
									if ($pagina == $i) 
										//si muestro el índice de la página actual, no coloco enlace 
										echo "<span class=\"pag--cube textSize\">" . $pagina . "</span>" . " "; 
									else 
										//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 				
										echo "<a href='consultar-parrilla.php?pagina=" . $i . "' class=\"textSize yque \">"  . $i .  "</a> " ; 
								}   
							}
						echo "</div>";
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