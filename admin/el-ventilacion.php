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
		

  </head>
  <body>
	<?php
		
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");

		$registrosVentilacion = mysqli_query($conexion,"select * from ventilacion") or die("Problemas en el select:".mysqli_error($conexion));
		
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
					<h3 class="text-center bread-back">
					<?php
						echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"ventilacion-home.php\">Tipo de producto: Ventilación y A/C </a> - Eliminar producto";
					?>						
					</h3>
					<br>
					<form id="back-form" >						
						<?php
						while($reg=mysqli_fetch_array($registrosVentilacion)){
							$id_ventilacion = $reg['id_ventilacion'];
							$nombre = $reg['nombre'];
							$modelo = $reg['modelo'];
							$sku = $reg['sku'];
							//$contenido_seguridad = $reg['contenido_seguridad'];
							
							echo "<li class=\"briankeaton\">Nombre: $nombre  Modelo: $modelo  SKU: <a class=\"delete\" href=\"elim-ventilacion.php?id_send=",urlencode($id_ventilacion)," \">$sku</a> </li>";
							echo "<br>";

						}
						?>
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