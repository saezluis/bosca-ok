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
	<?php
	
	$id_producto = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosCalefaccion=mysqli_query($conexion,"select * from producto WHERE id_producto='$id_producto'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosCalefaccion)){
		
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
						echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"calefaccion-home.php\">Tipo de producto: Calefacción</a> - Eliminar producto";
					?>						
					</h3>
					<br>
					<form id="back-form" method="post" action="delete-calefaccion.php">					
						<?php	
						
						echo "<input type=\"text\" name=\"id-producto-send\" value=\"$id_producto\" hidden=hidden>";
						echo "<input type=\"text\" name=\"foto_producto\" value=\"$foto_producto\" hidden=hidden>";						
						echo "<input type=\"text\" name=\"foto_zoom\" value=\"$foto_zoom\" hidden=hidden>";
						
						
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
						echo "<span class=\"texto\"><input type=\"text\" value=\"Vermiculita Refractaria:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$vermiculita_refractaria\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Templador:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$templador\" size=\"50\" readonly> </span>";		
						echo "<br>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Ventaja Comparativa:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$ventaja_comparativa\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Dimensiones:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$dimensiones\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Diametro cañon:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$diametro_canon\" size=\"50\" readonly> </span>";		
						echo "<br>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Garantia:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$garantia\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";		
						echo "<br>";
						
						?>
						
						<br>						
						<button class="button-change" type="submit" onClick="alert('El contenido fue eliminado')">Eliminar</button>
						<a class="button-change" href="calefaccion-home.php">Cancelar</a>
					</form>					
				</div>
			</div>
		</div>
	</div>
	
		
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
  </body>
</html>