<?php

	include_once 'config.php';
	
	header('Content-Type: text/html; charset=UTF-8'); 
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_accparrilla = $_REQUEST['id-accparrilla-send'];
		
	mysqli_query($conexion, "DELETE FROM accparrilla WHERE id_accparrilla = '$id_accparrilla'") or die("Problemas en el select de accparrilla".mysqli_error($conexion));

	$foto_producto = $_REQUEST['foto_producto'];
	
	if($foto_producto!=''){
		$file_producto = "../img-pt/$foto_producto";
		
		if (!unlink($file_producto)){
			echo ("Error borrando imagen: $file_producto");
			echo "<br>";
			echo "<br>";
		}
		else{
			echo ("Borrada la imagen: $file_producto");
			echo "<br>";
			echo "<br>";
		}
	}
	
	echo "Datos Borrados con éxito";			
	echo "<br>";
	echo "<br>";
	echo "<a href=\"accparrilla-home.php\">Volver</a>";
	//header('Location: parrilla-home.php');
	
?>