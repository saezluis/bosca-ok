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
    <meta name="author" content="">

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
							echo "Estas en: <a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"calefaccion-home.php\">Tipo de producto: Calefacción</a> - Agregar calefacción";
							?>
						</h3>
						<br>
					
							<form id="back-form" name="formProducto" method="post" action="procesar-agregar-calefaccion.php" enctype="multipart/form-data">
							
										<span class="texto"><input type="text" value="Nombre:" class="rightJustified" readonly> <input type="text" name="nombre" size="50" required> </span>
										<br>
										<span class="texto"><input type="text" value="Modelo:" class="rightJustified" readonly> <input type="text" name="modelo" size="50" required> </span>
										<br>
										<span class="texto"><input type="text" value="Precio:" class="rightJustified" readonly> <input type="text" name="precio" size="50" required> </span>
										<br>
												
										<span class="texto"><input type="text" value="Fabricacion:" class="rightJustified" readonly> <input type="text" name="fabricacion" size="50" required> </span>
										<br>
										<span class="texto"><input type="text" value="Combustion:" class="rightJustified" readonly> <input type="text" name="combustion" size="50"> </span>
										<br>
										<span class="texto"><input type="text" value="Panel programable:" class="rightJustified" readonly> <input type="text" name="panel_programable" size="50"> </span>
										<br>
												
										<span class="texto"><input type="text" value="Conexion electrica:" class="rightJustified" readonly> <input type="text" name="conexion_electrica" size="50"> </span>
										<br>
										<span class="texto"><input type="text" value="Capacidad de carga:" class="rightJustified" readonly> <input type="text" name="capacidad_carga" size="50"> </span>
										<br>
										<span class="texto"><input type="text" value="Potencia:" class="rightJustified" readonly> <input type="text" name="potencia" size="50"> </span>
										<br>
												
										<span class="texto"><input type="text" value="Rango Calefaccion:" class="rightJustified" readonly> <input type="text" name="rango_calefaccion" size="50" required> </span>	
										<br>
										<span class="texto"><input type="text" value="Color:" class="rightJustified" readonly> <input type="text" name="color" size="50"> </span>	
										<br>
										<span class="texto"><input type="text" value="Vidrio Autolimpiante:" class="rightJustified" readonly> <input type="radio" name="vidrio_autolimpiante" value="si"> Si <input type="radio" name="vidrio_autolimpiante" value="no"> No  </span>	<!-- Radio Button-->
										<br>
												
										<span class="texto"><input type="text" value="Cenicero:" class="rightJustified" readonly> <input type="radio" name="cenicero" value="si"> Si <input type="radio" name="cenicero" value="no"> No </span>   <!-- Radio Button-->
										<br>
										<span class="texto"><input type="text" value="Vermiculita Refractaria:" class="rightJustified" readonly> <input type="text" name="vermiculita_refractaria" size="50" > </span>
										<br>
										<span class="texto"><input type="text" value="Templador:" class="rightJustified" readonly> <input type="text" name="templador" size="50" > </span>
										<br>
												
										<span class="texto"><input type="text" value="Ventaja Comparativa:" class="rightJustified" readonly> <input type="text" name="ventaja_comparativa" size="50" required> </span>
										<br>
										<span class="texto"><input type="text" value="Dimensiones:" class="rightJustified" readonly> <input type="text" name="dimensiones" size="50" required> </span>
										<br>
										<span class="texto"><input type="text" value="Diametro cañon:" class="rightJustified" readonly> <input type="text" name="diametro_canon" size="50" > </span>
										<br>
												
										<span class="texto"><input type="text" value="Garantia:" class="rightJustified" readonly> <input type="text" name="garantia" size="50" required> </span>
										<br>
										<span class="texto"><input type="text" value="SKU:" class="rightJustified" readonly> <input type="text" name="sku" size="50" required> </span>
										<br>
										<br>		
										
										<!-- Aqui deberia poder seleccionar el logo con las posibles opciones que son tres hasta ahora -->	
										<span class="texto">Mini logo superior izquierdo: 
											<input type="radio" name="mini_logo" value="mini-bosca.png"><img src="../img2/mini-bosca.png" class="marg-side-logo"> 
											<input type="radio" name="mini_logo" value="mini-hergom.png"><img src="../img2/mini-hergom.png" class="marg-side-logo"> 
											<input type="radio" name="mini_logo" value="mini-xeoos.png"><img src="../img2/mini-xeoos.png" class="marg-side-logo"> 
										</span>
										
										<br>
										<br>
										<div class="cajaborder">
											<span class="texto">Foto producto (Vista Catalogo) - - Seleccione foto para cargar: </span>
											<span class="texto">Única resolución aceptada: <b>330 x 310</b></span>
											<input class="inp-file" type="file" name="fileToUpload" id="fileToUpload" required>
										</div>
										
										
										<br>
										<div class="cajaborder">
											<span class="texto">Foto producto con Zoom - - Seleccione foto para cargar: </span>
											<span class="texto">Única resolución aceptada: <b>900 x 1075</b></span>
											<input class="inp-file" type="file" name="fileToUploadDos" id="fileToUploadDos" required>

										</div>
										
										<input  class="button-change" type="submit" value="Enviar" ></input>
							
							</form>
					</div><!--fin.col-md-12-->
				</div><!--fin.row-->
		</div><!--fin.container-fluid-->
	</div>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
	<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	
  </body>
</html>