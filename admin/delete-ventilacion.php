<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_producto = $_REQUEST['id-producto-send'];
		
	mysqli_query($conexion, "DELETE FROM ventilacion WHERE id_ventilacion = '$id_producto'") or die("Problemas en el select:".mysqli_error($conexion));

	$foto_producto = $_REQUEST['foto_producto'];
	$foto_zoom = $_REQUEST['foto_zoom'];
	
	$file_producto = "../img-ac/$foto_producto";
	
	if (!unlink($file_producto)){
		echo ("Error borrando imagen: $file_producto");
	}
	else{
		echo ("Borrada la imagen: $file_producto");
	}
	
	$file_zoom = "../img-ac/$foto_zoom";
	
	if (!unlink($file_zoom)){
		echo ("Error borrando imagen zoom: $file_zoom");
	}
	else{
		echo ("Borrada la imagen zoom: $file_zoom");
	}	
	
	echo "Datos Borrados";			

	header('Location: ventilacion-home.php');
	
?>