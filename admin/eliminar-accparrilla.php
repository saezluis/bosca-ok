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
	
  </head>
  <body>
	<?php
	
	$id_accparrilla = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosAccParrilla = mysqli_query($conexion,"select * from accparrilla WHERE id_accparrilla = '$id_accparrilla'") or die("Problemas en el select de accparrilla: ".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosAccParrilla)){
		
		$id_accparrilla = $reg['id_accparrilla'];
		
		$nombre = $reg['nombre'];		
		$modelo = $reg['modelo'];
		$sku = $reg['sku'];
		
		$precio = $reg['precio'];
		
		$logo_up_left = $reg['logo_up_left'];
		$foto_producto = $reg['foto_producto'];
		
	}
	
	?>
  
	<div>	
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">
					<a href="index.html">Administrador Bosca</a>
				</h3>
			</div>			
		</div>
		
			<div class="row">
				<div class="col-md-10">
					<h3 class="text-left">
					<?php
						echo "<a href=\"index.html\">Inicio</a> - <a href=\"calefaccion-home.php\">Tipo de producto: Calefacción</a> - Eliminar producto";
					?>						
					</h3>
					<br>
					<form method="post" action="delete-accparrilla.php">					
						<?php	
						
						echo "<input type=\"text\" name=\"id-accparrilla-send\" value=\"$id_accparrilla\" hidden=hidden>";
						echo "<input type=\"text\" name=\"foto_producto\" value=\"$foto_producto\" hidden=hidden>";						
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$nombre\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$modelo\" size=\"50\" readonly> </span>";		
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$sku\" size=\"50\" readonly> </span>";
						echo "<br>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" value=\"$precio\" size=\"50\" readonly> </span>";		
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
						
						echo "<span class=\"texto\">Foto producto (Vista Catalogo): <a href=\"#\" data-featherlight=\"../img-pt/$foto_producto\">Ver foto actual</a> </span>"; 
						echo "<br>";
						
						?>
						
						<br>						
						<button type="submit" onClick="alert('El contenido fue eliminado')">Eliminar</button>  &nbsp; &nbsp;  <button type="button"><a href="accparrilla-home.php">Cancelar</a></button>
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