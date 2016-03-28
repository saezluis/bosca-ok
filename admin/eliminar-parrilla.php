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
	<?php
	
	$id_parrilla = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexiÃ³n");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosParrilla = mysqli_query($conexion,"select * from parrilla WHERE id_parrilla = '$id_parrilla'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosParrilla)){
		
		$id_parrilla = $reg['id_parrilla'];
		
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
					<form id="back-form" method="post" action="delete-parrilla.php">					
						<?php	
						
						echo "<input type=\"text\" name=\"id-parrilla-send\" value=\"$id_parrilla\" hidden=hidden>";
						echo "<input type=\"text\" name=\"foto_producto\" value=\"$foto_producto\" hidden=hidden>";						
						echo "<input type=\"text\" name=\"foto_zoom\" value=\"$foto_zoom\" hidden=hidden>";
						echo "<input type=\"text\" name=\"ficha_tecnica\" value=\"$ficha_tecnica\" hidden=hidden>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Nombre:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"nombre\" size=\"50\" value=\"$nombre\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Modelo:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"modelo\" size=\"50\" value=\"$modelo\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"SKU:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"sku\" size=\"50\" value=\"$sku\" readonly> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Precio:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"precio\" size=\"50\" value=\"$precio\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Alto:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"alto\" size=\"50\" value=\"$alto\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Ancho:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"ancho\" size=\"50\" value=\"$ancho\" readonly> </span>";
						echo "<br>";
						
						echo "<span class=\"texto\"><input type=\"text\" value=\"Profundidad:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"profundidad\" size=\"50\" value=\"$profundidad\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Peso:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"peso\" size=\"50\" value=\"$peso\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Material:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"material\" size=\"50\" value=\"$material\" readonly> </span>";
						echo "<br>";
					
						echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 01:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_01\" size=\"50\" value=\"$atributo_01\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 02:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_02\" size=\"50\" value=\"$atributo_02\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 03:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_03\" size=\"50\" value=\"$atributo_03\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 04:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_04\" size=\"50\" value=\"$atributo_04\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 05:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_05\" size=\"50\" value=\"$atributo_05\" readonly> </span>";
						echo "<br>";
						echo "<span class=\"texto\"><input type=\"text\" value=\"Atributo 06:\" class=\"rightJustified\" readonly> <input type=\"text\" name=\"atributo_06\" size=\"50\" value=\"$atributo_06\" readonly> </span>";
						echo "<br>";
						/*
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
						*/
						/*
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
						*/
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
						echo "<input class=\"marg-side-logo\" type=\"radio\" name=\"mini_logo\" value=\"mini-bosca.png\" $stuff_1 ><img src=\"../img2/mini-bosca.png\">";
						echo "<input class=\"marg-side-logo\" type=\"radio\" name=\"mini_logo\" value=\"mini-hergom.png\" $stuff_2 ><img src=\"../img2/mini-hergom.png\">";
						echo "<input class=\"marg-side-logo\" type=\"radio\" name=\"mini_logo\" value=\"mini-xeoos.png\" $stuff_3 ><img src=\"../img2/mini-xeoos.png\">";
						echo "</span>";
						
						echo "<br>";
						echo "<br>";
						
						echo "<span class=\"texto\">Foto producto (Vista Catalogo): <a href=\"#\" data-featherlight=\"../img/$foto_producto\">Ver foto actual</a> </span>"; 
						echo "<br>";
						//echo "<span class=\"texto\">Seleccione foto para <b><i>cambiar</i></b>: </span>";
						//echo "<span class=\"texto\">Ãºnica resoluciÃ³n aceptada: <b>330 x 310</b></span>";
						//echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">";
						
						echo "<br>";
						echo "<br>";
						
						echo "<span class=\"texto\">Foto producto con Zoom: <a href=\"#\" data-featherlight=\"../img/$foto_zoom\">Ver foto con zoom</a></span>"; 
						echo "<br>";
						//echo "<span class=\"texto\">Seleccione foto para <b><i>cambiar</i></b>: </span>";
						//echo "<span class=\"texto\">Única resolución aceptada: <b>900 x 1075</b></span>";
						//echo "<input type=\"file\" name=\"fileToUploadDos\" id=\"fileToUploadDos\">";
						echo "<br>";
						echo "<br>";
						
						if($ficha_tecnica==''){
							$jared = 'x';
						}
						
						if($ficha_tecnica!=''){
							echo "<span class=\"texto\">Ficha tÃ©cnica actual: <a href=\"../fichas-tecnicas/$ficha_tecnica\">Ver ficha tÃ©cnica actual</a></span>"; 
							echo "<br>";
							//echo "<span class=\"texto\">Seleccione ficha técnica para<b><i>cambiar</i></b>: </span>";
							//echo "<input type=\"file\" name=\"fileToUploadTres\" id=\"fileToUploadTres\">";
						}
						
						?>
						
						<br>						
						<button class="button-change"  type="submit" onClick="alert('El contenido fue eliminado')">Eliminar</button>
						<a class="button-change"  href="parrilla-home.php">Cancelar</a>
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