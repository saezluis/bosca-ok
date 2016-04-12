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
	</style>

  </head>
  <body>
	<div class="full">
	
	
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
							echo "<a class=\"bread\" href=\"index.php\">Inicio</a> - <a class=\"bread\" href=\"calefaccion-home.php\">Tipo de producto: Calefacción</a> - Consultar calefacción";
							?>
						</h3>
						<br>
						<form id="back-form" >
					      <table class="table-tecnico">
					        <thead>
					          <tr class="cabecc-tecnico">
					            <th>ID</th>
					            <th>Nombre</th>
					            <th>Mail</th>
					            <th>Rut</th>
					            <th>Teléfono</th>
					            <th>Foto</th>
					            <th>Región</th>
					          </tr>
					        </thead>
					        <tbody>
					          <tr>
					            <td class="minis">1234567890</td>
					            <td class="minis">Luis Saez</td>
					            <td class="minis">lsaez@pm.cl</td>
					            <td class="minis">1234567890</td>
					            <td class="minis">956879410</td>
					            <td class="minis"><img src="img/hugo_arevalo.jpg" alt=""></td>
					            <td class="minis">V</td>
					          </tr>
					        </tbody>
					      </table>
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