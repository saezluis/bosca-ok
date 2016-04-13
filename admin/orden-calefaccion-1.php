<?php
	/*
	header('Content-Type: text/html; charset=UTF-8');
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosCalefaccion = mysqli_query($conexion, "SELECT * FROM producto ORDER BY orden ASC") or die("Problemas con la conexión".mysqli_error($conexion));
	
	while($reg=mysqli_fetch_array($registrosCalefaccion)){
		$modelo = $reg['modelo'];
		$orden = $reg['orden'];
		
		echo "Modelo: <input type=\"text\" value=\"$modelo\" readonly>  Posición actual:  ".$orden."  Posición nueva: <input type=\"text\" size=\"4\" >";		
		echo "<br>";
		
	}
*/
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

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Administrador Bosca</title>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
  <style>
	  body{width:610px;}
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
</body>
</html>