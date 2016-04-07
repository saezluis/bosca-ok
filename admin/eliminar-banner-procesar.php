<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");

	//$registrosBanners = mysqli_query($conexion," SELECT * FROM banners") or die("Problemas en el select:".mysqli_error($conexion));	
	
	//$numero_banners = mysqli_num_rows($registrosBanners);
	
	$id_banner_get = $_GET['id_send'];
	//tengo que contar los rows para ponerle tope
	//$registrosBannerElim = mysqli_query($conexion," SELECT * FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
	/*
	if($reg=mysqli_fetch_array($registrosBannerElim)){
		$id_banner = $reg['id_banner'];
	}
	*/
	if($id_banner_get==1){
		mysqli_query($conexion," DELETE FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
		
		mysqli_query($conexion, "UPDATE banners SET position = 1, id_banner = 1 WHERE id_banner = 2 ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 2, id_banner = 2 WHERE id_banner = 3 ") or die("Problemas en el select de update banner 3".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 3, id_banner = 3 WHERE id_banner = 4 ") or die("Problemas en el select de update banner 4".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 4, id_banner = 4 WHERE id_banner = 5 ") or die("Problemas en el select de update banner 5".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 5, id_banner = 5 WHERE id_banner = 6 ") or die("Problemas en el select de update banner 6".mysqli_error($conexion));
		
	}
	
	if($id_banner_get==2){
		mysqli_query($conexion," DELETE FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
	
		mysqli_query($conexion, "UPDATE banners SET position = 2, id_banner = 2 WHERE id_banner = 3 ") or die("Problemas en el select de update banner 3".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 3, id_banner = 3 WHERE id_banner = 4 ") or die("Problemas en el select de update banner 4".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 4, id_banner = 4 WHERE id_banner = 5 ") or die("Problemas en el select de update banner 5".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 5, id_banner = 5 WHERE id_banner = 6 ") or die("Problemas en el select de update banner 6".mysqli_error($conexion));
		
	}
	
	if($id_banner_get==3){
		mysqli_query($conexion," DELETE FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
	
		mysqli_query($conexion, "UPDATE banners SET position = 3, id_banner = 3 WHERE id_banner = 4 ") or die("Problemas en el select de update banner 4".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 4, id_banner = 4 WHERE id_banner = 5 ") or die("Problemas en el select de update banner 5".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 5, id_banner = 5 WHERE id_banner = 6 ") or die("Problemas en el select de update banner 6".mysqli_error($conexion));
		
	}
	
	if($id_banner_get==4){
		mysqli_query($conexion," DELETE FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
			
		mysqli_query($conexion, "UPDATE banners SET position = 4, id_banner = 4 WHERE id_banner = 5 ") or die("Problemas en el select de update banner 5".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET position = 5, id_banner = 5 WHERE id_banner = 6 ") or die("Problemas en el select de update banner 6".mysqli_error($conexion));
		
	}
	
	if($id_banner_get==5){
		mysqli_query($conexion," DELETE FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
	
		mysqli_query($conexion, "UPDATE banners SET position = 5, id_banner = 5 WHERE id_banner = 6 ") or die("Problemas en el select de update banner 6".mysqli_error($conexion));
		
	}
	
	if($id_banner_get==6){
		mysqli_query($conexion," DELETE FROM banners WHERE id_banner = $id_banner_get ") or die("Problemas en el select:".mysqli_error($conexion));
		
	}

	//Tomo la posición que retorne
	/*
	Si es la posición 1 entonces
	UPDATE banners SET nombre… WHERE id_banner = id_banner + 1	

	DELETE FROM banners WHERE id_ba = id_banner
	*/
	header('Location: eliminar-banner.php');
?>