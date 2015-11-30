<?php
  session_start();
	
  	
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
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosTodos=mysqli_query($conexion,"select * from producto") or die("Problemas en el select:".mysqli_error($conexion));
	
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
		
		$ssql = "select * from producto LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		
		$rs = mysqli_query($conexion,$ssql); 
	

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
				echo "<a href=\"index.html\">Inicio</a> - <a href=\"calefaccion-home.php\">Tipo de producto: Calefacción</a> - Consultar calefacción";
				?>
			</h3>
			<br>
			<?php			
				
			
				while($reg=mysqli_fetch_array($rs)){	
				
				$nombre = $reg['nombre'];
				$modelo = $reg['modelo'];
				$precio = $reg['precio'];
				
				$logo_up_left = $reg['logo_up_left'];
				$foto_producto = $reg['foto_producto'];
				$foto_zoom = $reg['foto_zoom'];
				
					$logo_detalle = $reg['logo_detalle'];
					$mini_descripcion = $reg['mini_descripcion'];
					
				$fabricacion = $reg['fabricacion'];
				$combustion = $reg['combustion'];
				$panel_programable = $reg['panel_programable'];
					
				$conexion_electrica = $reg['conexion_electrica'];
				$capacidad_carga = $reg['capacidad_carga'];
				$potencia = $reg['potencia'];
				
				$rango_calefaccion = $reg['rango_calefaccion'];
				$color = $reg['color'];
				$vidrio_autolimpiante = $reg['vidrio_autolimpiante'];
					
				$cenicero = $reg['cenicero'];
				$vermiculita_refractaria = $reg['vermiculita_refractaria'];
				$templador = $reg['templador'];
					
				$ventaja_comparativa = $reg['ventaja_comparativa'];
				$dimensiones = $reg['dimensiones'];
				$diametro_canon = $reg['diametro_canon'];
					
				$garantia = $reg['garantia'];
				$sku = $reg['sku'];

					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$modelo\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$precio\" size=\"50\" readonly> </span>";
					echo "<br>";
					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Fabricacion:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$fabricacion\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Combustion:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$combustion\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Panel programable:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$panel_programable\" size=\"50\" readonly> </span>";
					echo "<br>";
					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Conexion electrica:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$conexion_electrica\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Capacidad de carga:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$capacidad_carga\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Potencia:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$potencia\" size=\"50\" readonly> </span>";		
					echo "<br>";
					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Rango Calefaccion:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$rango_calefaccion\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Color:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$color\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Vidrio Autolimpiante:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$vidrio_autolimpiante\" size=\"50\" readonly> </span>";		
					echo "<br>";
					
					echo "<span class=\"texto\"><input type=\"text\" value=\"Cenicero:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$cenicero\" size=\"50\" readonly> </span>";		
					echo "<br>";
					echo "<span class=\"texto\"><input type=\"text\" value=\"Vermiculita Refractaria:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$vermiculita_refractaria\" size=\"70\" readonly> </span>";		
					echo "<br>";
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
					

					
					echo "<br>";
					echo "<br>";
				}
				
				mysqli_free_result($rs); 
				
				if ($total_paginas > 1){ 
					for ($i=1;$i<=$total_paginas;$i++){ 
						if ($pagina == $i) 
							//si muestro el índice de la página actual, no coloco enlace 
							echo "<span class=\"pag--cube textSize\">" . $pagina . "</span>" . " "; 
						else 
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 				
							echo "<a href='consultar-calefaccion.php?pagina=" . $i . "' class=\"textSize\">"  . $i .  "</a> " ; 
					}   
				}
				
			?>
			
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