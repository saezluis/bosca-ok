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
	<?php
	
	$id_producto = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosCalefaccion=mysqli_query($conexion,"select * from producto WHERE id_producto='$id_producto'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosCalefaccion)){
		
		
		
		//foto catalogo $nombreFoto
		$foto_producto = $reg['foto_producto'];
		//foto zoom $nombreFotoDos
		$foto_zoom = $reg['foto_zoom'];
		//logo_up_left debo tomar el nombre del logo elegido
		$logo_up_left = $reg['logo_up_left'];
		
		$nombre = $reg['nombre'];		
		$modelo = $reg['modelo'];
		$precio = $reg['precio'];
		
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
		
	}
	
	?>
  
	<div>	
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-left">
					<a href="index.html">Administrador Bosca</a>
				</h3>
			</div>			
		</div>
		
			<div class="row">
				<div class="col-md-10">
					<h3 class="text-left">
					<?php						
						echo "<a href=\"index.html\">Inicio</a> - <a href=\"calefaccion-home.php\">Tipo de producto: Calefacción</a> - Modificar calefacción";
					?>						
					</h3>
					<br>
					<form method="post" action="update-calefaccion.php">					
						<?php	
						
						//Aqui se envian los campos "Ocultos xD"
						echo "<input type=\"text\" name=\"id-producto-send\" value=\"$id_producto\" hidden=hidden>";
						echo "<input type=\"text\" name=\"foto_producto\" value=\"$foto_producto\" hidden=hidden>";						
						echo "<input type=\"text\" name=\"foto_zoom\" value=\"$foto_zoom\" hidden=hidden>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"nombre\" size=\"50\" value=\"$nombre\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"modelo\" size=\"50\" value=\"$modelo\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"precio\" size=\"50\" value=\"$precio\"> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Fabricacion:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"fabricacion\" size=\"50\" value=\"$fabricacion\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Combustion:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"combustion\" size=\"50\" value=\"$combustion\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Panel programable:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"panel_programable\" size=\"50\" value=\"$panel_programable\"> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Conexion electrica:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"conexion_electrica\" size=\"50\" value=\"$conexion_electrica\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Capacidad de carga:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"capacidad_carga\" size=\"50\" value=\"$capacidad_carga\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Potencia:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"potencia\" size=\"50\" value=\"$potencia\"> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Rango Calefaccion:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"rango_calefaccion\" size=\"50\" value=\"$rango_calefaccion\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Color:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"color\" size=\"50\" value=\"$color\"> </span>";
						echo "<br>";
						
						if($vidrio_autolimpiante=='Si'){
							echo "<span class=\"texto\"><input type=\"text\" value=\"Vidrio Autolimpiante:\" class=\"rightJustified\" readonly> <input type=\"radio\" name=\"vidrio_autolimpiante\" value=\"Si\" checked=\"checked\"> Si <input type=\"radio\" name=\"vidrio_autolimpiante\" value=\"No\"> No  </span>";
						}else{
							echo "<span class=\"texto\"><input type=\"text\" value=\"Vidrio Autolimpiante:\" class=\"rightJustified\" readonly> <input type=\"radio\" name=\"vidrio_autolimpiante\" value=\"Si\"> Si <input type=\"radio\" name=\"vidrio_autolimpiante\" value=\"No\" checked=\"checked\"> No  </span>";
						}						
						echo "<br>";
						
						if($cenicero=='Si'){
							echo "<span class=\"texto\"><input type=\"text\" value=\"Cenicero:\" class=\"rightJustified\" readonly> <input type=\"radio\" name=\"cenicero\" value=\"Si\" checked=\"checked\"> Si <input type=\"radio\" name=\"cenicero\" value=\"No\"> No </span>";
						}else{
							echo "<span class=\"texto\"><input type=\"text\" value=\"Cenicero:\" class=\"rightJustified\" readonly> <input type=\"radio\" name=\"cenicero\" value=\"Si\"> Si <input type=\"radio\" name=\"cenicero\" value=\"No\" checked=\"checked\"> No </span>";
						}
						
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Vermiculita Refractaria:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"vermiculita_refractaria\" size=\"70\" value=\"$vermiculita_refractaria\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Templador:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"templador\" size=\"50\" value=\"$templador\"> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Ventaja Comparativa:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"ventaja_comparativa\" size=\"50\" value=\"$ventaja_comparativa\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Dimensiones:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"dimensiones\" size=\"70\" value=\"$dimensiones\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Diametro cañon:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"diametro_canon\" size=\"50\" value=\"$diametro_canon\"> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Garantia:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"garantia\" size=\"50\" value=\"$garantia\"> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"sku\" size=\"50\" value=\"$sku\"> </span>";
						echo "<br>";
						echo "<br>";
						
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
						if($logo_up_left=='mini-xeoos.png'){
							$stuff_3 = 'checked=\"checked\"';
						}							
						echo "<input type=\"radio\" name=\"mini_logo\" value=\"mini-bosca.png\" $stuff_1 ><img src=\"../img2/mini-bosca.png\">";
						echo "<input type=\"radio\" name=\"mini_logo\" value=\"mini-hergom.png\" $stuff_2 ><img src=\"../img2/mini-hergom.png\">";
						echo "<input type=\"radio\" name=\"mini_logo\" value=\"mini-xeoos.png\" $stuff_3 ><img src=\"../img2/mini-xeoos.png\">";
						echo "</span>";
						
						echo "<br>";
						echo "<br>";
						
						echo "<span class=\"texto\">Foto producto (Vista Catalogo) <a href=\"#\" data-featherlight=\"../img/$foto_producto\">Ver foto actual</a> </span>"; 
						echo "<br>";
						echo "<span class=\"texto\">Seleccione foto para <b><i>cambiar</i></b>: </span>";
						echo "<span class=\"texto\">Única resolución aceptada: <b>330 x 310</b></span>";
						echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">";
						
						echo "<br>";
						echo "<br>";
						
						echo "<span class=\"texto\">Foto producto con Zoom <a href=\"#\" data-featherlight=\"../img/$foto_zoom\">Ver foto con zoom</a></span>"; 
						echo "<br>";
						echo "<span class=\"texto\">Seleccione foto para <b><i>cambiar</i></b>: </span>";
						echo "<span class=\"texto\">Única resolución aceptada: <b>900 x 1075</b></span>";
						echo "<input type=\"file\" name=\"fileToUploadDos\" id=\"fileToUploadDos\">";
						
						
						?>
						<br>						
						<br>						
						<button type="submit" onClick="alert('El contenido fue actualizado')">Modificar</button>  &nbsp; &nbsp;  <button type="button"><a href="calefaccion-home.php">Cancelar</a></button>
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