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
		
		.txtComputer {
			font-size: 10px;
		}
		
		</style>

  </head>
  <body>
	<div class="full">
	
	
	<?php
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosTodos=mysqli_query($conexion,"SELECT * FROM sucursales") or die("Problemas en el select:".mysqli_error($conexion));
	
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
		
		$ssql = "SELECT * FROM sucursales LIMIT " . $inicio . "," . $TAMANO_PAGINA;
		
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
				echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - Consultar sucursal";
				?>
			</h3>
			<br>
			<form id="back-form" >
				<?php			
					
				
					while($reg=mysqli_fetch_array($rs)){	
					
					$id_sucursal = $reg['id_sucursal'];
					$nombre_region = $reg['nombre_region'];
					$jefe_tienda = $reg['jefe_tienda'];
					
					$telefono1 = $reg['telefono1'];
					$telefono2 = $reg['telefono2'];
					$fax_gerencia = $reg['fax_gerencia'];
					$fax_servicio = $reg['fax_servicio'];
					
					$horario = $reg['horario'];
					$direccion = $reg['direccion'];
					$link_mapa = $reg['link_mapa'];
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"ID sucursal:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$id_sucursal\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre región:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre_region\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Jefe tienda:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$jefe_tienda\" size=\"50\" readonly> </span>";
						echo "<br>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Telefono 1:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$telefono1\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Telefono 2:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$telefono2\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Fax gerencia:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$fax_gerencia\" size=\"50\" readonly> </span>";
						echo "<br>";									
						echo "<span class=\"texto\"><input type=\"text\" value=\"Fax servicio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$fax_servicio\" size=\"50\" readonly> </span>";		
						echo "<br>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Horario:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$horario\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Dirección:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$direccion\" size=\"50\" readonly> </span>";		
						echo "<br>";									
						//echo "<span class=\"texto\"><input type=\"text\" value=\"Link mapa:\" class=\"rightJustified\" readonly> <input class=\"txtComputer\" type=\"text\" value=\"$link_mapa\" size=\"250\" readonly> </span>";		
						echo "<span class=\"texto\"><input type=\"text\" value=\"Link mapa:\" class=\"rightJustified\" readonly> <textarea style=\"width: 420px; height: 130px; font-size: 14px;\" name=\"link_map\">$link_mapa</textarea> </span>";
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
								echo "<span class=\"pag--cube \">" . $pagina . "</span>" . " "; 
							else 
								//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 				
								echo "<a href='consultar-sucursal.php?pagina=" . $i . "' class=\"textSize yque \">"  . $i .  "</a> " ; 
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