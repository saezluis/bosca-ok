<?php

	include_once 'config.php';
	
	header('Content-Type: text/html; charset=UTF-8'); 
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_parrilla = $_REQUEST['id-parrilla-send'];
		
	mysqli_query($conexion, "DELETE FROM parrilla WHERE id_parrilla = '$id_parrilla'") or die("Problemas en el select de parrilla".mysqli_error($conexion));

	$foto_producto = $_REQUEST['foto_producto'];
	$foto_zoom = $_REQUEST['foto_zoom'];
	$ficha_tecnica = $_REQUEST['ficha_tecnica'];
	
	
	if($foto_producto!=''){
		$file_producto = "../img/$foto_producto";
		
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
	
	if($foto_zoom!=''){
		$file_zoom = "../img/$foto_zoom";
		
		if (!unlink($file_zoom)){
			echo ("Error borrando imagen zoom: $file_zoom");
			echo "<br>";
			echo "<br>";
		}
		else{
			echo ("Borrada la imagen zoom: $file_zoom");
			echo "<br>";
			echo "<br>";
		}
	}
	
	if($ficha_tecnica!=''){
		$file_ficha_tecnica = "../fichas-tecnicas/$ficha_tecnica";
		
		if (!unlink($file_ficha_tecnica)){
			echo ("Error borrando ficha técnica: $file_ficha_tecnica");
			echo "<br>";
			echo "<br>";
		}
		else{
			echo ("Borrada la ficha técnica: $file_ficha_tecnica");
			echo "<br>";
			echo "<br>";
		}
	}
	
	echo "Datos Borrados con éxito";			
	echo "<br>";
	echo "<br>";
	echo "<a href=\"parrilla-home.php\">Volver</a>";
	//header('Location: parrilla-home.php');
	
?>