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
					echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"accparrilla-home.php\">Tipo de producto: Accesorios Parrilla</a> - Agregar";
				?>
			</h3>
			<br>
			
			<form id="back-form" name="formProducto" method="post" action="procesar-agregar-accparrilla.php" enctype="multipart/form-data">
			
				<span class="texto"><input type="text" value="Nombre:" class="rightJustified" readonly> <input type="text" name="nombre" size="50" required> </span>
				<br>
				<span class="texto"><input type="text" value="Modelo:" class="rightJustified" readonly> <input type="text" name="modelo" size="50" required> </span>
				<br>
				<span class="texto"><input type="text" value="SKU:" class="rightJustified" readonly> <input type="text" name="sku" size="50" required> </span>
				<br>
				<span class="texto"><input type="text" value="Precio:" class="rightJustified" readonly> <input type="text" name="precio" size="50" required> </span>
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
					<span class="texto">Única resolución aceptada: <b>490 x 530</b></span>
					<input class="inp-file" type="file" name="fileToUpload" id="fileToUpload" required>
				</div>
				<br>
				
				<input class="button-change" type="submit" ></input>
			
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