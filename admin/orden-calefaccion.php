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
<?php
$mysqli = new mysqli('localhost','root','123','bosca');

	if(isset($_POST["submit"])) {
		$id_ary = explode(",",$_POST["row_order"]);
		for($i=0;$i<count($id_ary);$i++) {
			$mysqli->query("UPDATE producto SET orden='" . $i . "' WHERE id_producto=". $id_ary[$i]);
		}
	}
	
	$result = $mysqli->query("SELECT * FROM producto ORDER BY orden");
	//	$acentos = $mysqli->query("SET NAMES 'utf8'");

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
	

	  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	  
	  <style>
		  body{width:700px;}
		  #sortable-row { list-style: none; }
		  #sortable-row li { margin-bottom:4px; padding:10px; background-color:#E65524;cursor:move; color: #fff;}
		  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
		  #sortable-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
	  </style>
	  
	  <script>
	  $(function() {
		$( "#sortable-row" ).sortable({
		placeholder: "ui-state-highlight"
		});
	  });
	  
	  function saveOrder() {
		var selectedLanguage = new Array();
		$('ul#sortable-row li').each(function() {
		selectedLanguage.push($(this).attr("id"));
		});
		document.getElementById("row_order").value = selectedLanguage;
	  }
	  </script>

  </head>
  <body>
	<div class="full">
	
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
						
						<h4>Arrastra los elementos para ordenar como serán exhibidos en el sitio.</h4>
						<form name="frmQA" method="POST" />
							<input type = "hidden" name="row_order" id="row_order" /> 
							<ul id="sortable-row">
								<?php
								while($row = $result->fetch_assoc()) {
								?>
								<li id=<?php echo $row["id_producto"]; ?>><?php echo $row["modelo"]; ?></li>
								<?php 
								}
								$result->free();
								$mysqli->close();  
								?>  
							</ul>
							<input type="submit" class="btnSave" name="submit" value="Guardar Orden" onClick="saveOrder();" />
							<br>
							<a href="calefaccion-home.php">volver</a>
						</form>
						
						</div>
					</div>
				</div>
	
	</div>
	
	
  </body>
</html>