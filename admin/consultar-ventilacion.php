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
				echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"ventilacion-home.php\">Tipo de producto: Ventilación y A/C </a> - Consultar";
				?>
			</h3>
			<br>
			<form id="back-form" >
				<?php			
					
				
				while($reg=mysqli_fetch_array($rs)){
					
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
					
					$logo_up_left = $reg['logo_up_left'];
					$foto_producto = $reg['foto_producto'];
					$foto_zoom = $reg['foto_zoom'];
					$ficha_tecnica = $reg['ficha_tecnica'];

					echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$modelo\" size=\"50\" readonly> </span>";
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Anexo nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$anexo_nombre\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$precio\" size=\"50\" readonly> </span>";		
					echo "<br>";
					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Climatiza:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$climatiza\" size=\"50\" readonly> </span>";
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Voltaje:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$voltaje\" size=\"50\" readonly> </span>";		
					echo "<br>";				
					echo "<span class=\"texto\"><input type=\"text\" value=\"Alto:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$alto\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Ancho:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ancho\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Profundidad:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$profundidad\" size=\"50\" readonly> </span>";		
					echo "<br>";
					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Peso:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$peso\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 01:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_funcional01\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 02:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_funcional02\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo Funcional 03:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$atributo_funcional03\" size=\"50\" readonly> </span>";		
					echo "<br>";
					
					echo "<span class=\"texto\">Mini logo superior izquierdo: <img src=\"../img/$logo_up_left\"></span>";	
					echo "<br>";
					
					echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img-ac/$foto_producto\">Ver foto</a> </span>"; //<img src=\"../img2/$foto_producto\">				
					echo "<br>";
					
					if($foto_zoom!=''){
						echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img-ac/$foto_zoom\">Ver foto con zoom</a></span>"; //<img src=\"../img2/$foto_zoom\">
					}else{
						$nada='';
					}				
					echo "<br>";
					
					if($ficha_tecnica==''){
						$jared = 'x';
					}
					if($ficha_tecnica!=''){
						echo "<span class=\"texto\"><input type=\"text\" value=\"Ficha Tecnica:\" class=\"rightJustified\" readonly> <a href=\"../fichas-tecnicas/$ficha_tecnica\">Ficha Técnica</a> </span>";							
					}
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
									echo "<a href='consultar-ventilacion.php?pagina=" . $i . "' class=\"textSize yque\">"  . $i .  "</a> " ; 
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