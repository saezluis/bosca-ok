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
	
	$registrosTodos=mysqli_query($conexion,"select * from cocinas") or die("Problemas en el select:".mysqli_error($conexion));
	
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
		
		$ssql = "select * from cocinas LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		
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
				echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"cocina-home.php\">Tipo de producto: Cocina y Calderas</a> - Consultar";
				?>
			</h3>
			<br>
			<form id="back-form" >
			<?php			
				
			
			while($reg=mysqli_fetch_array($rs)){	
				
				$nombre = $reg['nombre'];
				$anexo_nombre = $reg['anexo_nombre'];
				$modelo = $reg['modelo'];
				$sku = $reg['sku'];
				$precio = $reg['precio'];
				
				$potencia = $reg['potencia'];
				$material = $reg['material'];
				$nro_quemadores = $reg['nro_quemadores'];				
				$alto = $reg['alto'];
				$ancho = $reg['ancho'];
				
				$fondo_tolva = $reg['fondo_tolva'];
				$diametro_chimenea = $reg['diametro_chimenea'];
				$consumo_pellet = $reg['consumo_pellet'];
				
				$capacidad_tolva = $reg['capacidad_tolva'];
				$volumen_agua = $reg['volumen_agua'];
				$longitud_lena = $reg['longitud_lena'];
				
				$ficha_tecnica = $reg['ficha_tecnica'];
				$logo_up_left = $reg['logo_up_left'];
				$foto_producto = $reg['foto_producto'];
				
				$foto_zoom = $reg['foto_zoom'];
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Anexo nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$anexo_nombre\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$modelo\" size=\"50\" readonly> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$precio\" size=\"50\" readonly> </span>";		
				echo "<br>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Potencia:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$potencia\" size=\"50\" readonly> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Material:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$material\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Número de quemadores:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nro_quemadores\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Alto:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$alto\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Ancho:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ancho\" size=\"50\" readonly> </span>";		
				echo "<br>";
				
				echo "<span class=\"texto\"><input type=\"text\" value=\"Fondo tolva:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$fondo_tolva\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Diametro Chimenea:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$diametro_chimenea\" size=\"50\" readonly> </span>";		
				echo "<br>";
				//echo "<span class=\"texto\"><input type=\"text\" value=\"Consumo Pellet:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$consumo_pellet\" size=\"50\" readonly> </span>";		
				//echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Consumo Pellet:\" class=\"rightJustified\" readonly> <textarea rows=\"4\" cols=\"52\">$consumo_pellet</textarea> </span>";
				echo "<br>";
				//echo "<span class=\"texto\"><input type=\"text\" value=\"Capacidad Tolva:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$capacidad_tolva\" size=\"50\" readonly> </span>";
				//echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Capacidad Tolva:\" class=\"rightJustified\" readonly> <textarea rows=\"4\" cols=\"52\">$capacidad_tolva</textarea> </span>";
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Volumen agua:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$volumen_agua\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\"><input type=\"text\" value=\"Longitud leña:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$longitud_lena\" size=\"50\" readonly> </span>";		
				echo "<br>";
					
				echo "<span class=\"texto\"><input type=\"text\" value=\"Ficha Tecnica:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ficha_tecnica\" size=\"50\" readonly> </span>";		
				echo "<br>";
				echo "<span class=\"texto\">Mini logo superior izquierdo: <img src=\"../img/$logo_up_left\"></span>";	
				echo "<br>";
				
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
				echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img-cc/$foto_producto\">Ver foto</a> </span>"; //<img src=\"../img2/$foto_producto\">
				//echo "<span class=\"texto\"> -- </span>";
				echo "<br>";
				
				if($foto_zoom!=''){
					echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img-cc/$foto_zoom\">Ver foto con zoom</a></span>"; //<img src=\"../img2/$foto_zoom\">
				}else{
					$nada='';
				}
				echo "<br>";
					
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
								echo "<a href='consultar-cocina.php?pagina=" . $i . "' class=\"textSize yque\">"  . $i .  "</a> " ; 
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