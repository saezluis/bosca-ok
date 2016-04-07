<?php
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	//$position_banner = $_REQUEST['position'];
	$id_intercambiar = $_REQUEST['id_intercambiar'];
	
	//echo "id_banner: ".$id_banner;
	
	if($id_intercambiar==1){
	
		$registrosBanners1 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 1 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg=mysqli_fetch_array($registrosBanners1)){		
			//$position_one = $reg['position'];		
			$nombre1 = $reg['nombre'];
			$mostrar1 = $reg['mostrar'];
			$tipo1 = $reg['tipo'];
			$link_nombre1 = $reg['link'];
		}
		
		$registrosBanners2 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 2 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg2=mysqli_fetch_array($registrosBanners2)){		
			//$position_two = $reg2['position'];
			$nombre2 = $reg2['nombre'];
			$mostrar2 = $reg2['mostrar'];
			$tipo2 = $reg2['tipo'];
			$link_nombre2 = $reg2['link'];
		}
		
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre2', mostrar = '$mostrar2', tipo = '$tipo2', link = '$link_nombre2' WHERE id_banner = '1' ") or die("Problemas en el select de update banner 1".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre1', mostrar = '$mostrar1', tipo = '$tipo1', link = '$link_nombre1' WHERE id_banner = '2' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
	
	}
	
	if($id_intercambiar==2){
	
		$registrosBanners2 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 2 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg2=mysqli_fetch_array($registrosBanners2)){		
			//$position_two = $reg['position'];		
			$nombre2 = $reg2['nombre'];
			$mostrar2 = $reg2['mostrar'];
			$tipo2 = $reg2['tipo'];
			$link_nombre2 = $reg2['link'];
		}
		
		$registrosBanners3 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 3 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg3=mysqli_fetch_array($registrosBanners3)){		
			//$position_tres = $reg3['position'];
			$nombre3 = $reg3['nombre'];
			$mostrar3 = $reg3['mostrar'];
			$tipo3 = $reg3['tipo'];
			$link_nombre3 = $reg3['link'];
		}
		
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_tres' WHERE id_banner = '2' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_two' WHERE id_banner = '3' ") or die("Problemas en el select de update banner 3".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre2', mostrar = '$mostrar2', tipo = '$tipo2', link = '$link_nombre2' WHERE id_banner = '3' ") or die("Problemas en el select de update banner 1".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre3', mostrar = '$mostrar3', tipo = '$tipo3', link = '$link_nombre3' WHERE id_banner = '2' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		
	}
	
	if($id_intercambiar==3){
	
		$registrosBanners3 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 3 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg3=mysqli_fetch_array($registrosBanners3)){		
			//$position_two = $reg['position'];		
			$nombre3 = $reg3['nombre'];
			$mostrar3 = $reg3['mostrar'];
			$tipo3 = $reg3['tipo'];
			$link_nombre3 = $reg3['link'];
		}
		
		$registrosBanners4 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 4 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg4=mysqli_fetch_array($registrosBanners4)){		
			//$position_tres = $reg3['position'];
			$nombre4 = $reg4['nombre'];
			$mostrar4 = $reg4['mostrar'];
			$tipo4 = $reg4['tipo'];
			$link_nombre4 = $reg4['link'];
		}
		
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_tres' WHERE id_banner = '2' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_two' WHERE id_banner = '3' ") or die("Problemas en el select de update banner 3".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre4', mostrar = '$mostrar4', tipo = '$tipo4', link = '$link_nombre4' WHERE id_banner = '3' ") or die("Problemas en el select de update banner 1".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre3', mostrar = '$mostrar3', tipo = '$tipo3', link = '$link_nombre3' WHERE id_banner = '4' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		
	}
	
	if($id_intercambiar==4){
	
		$registrosBanners4 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 4 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg4=mysqli_fetch_array($registrosBanners4)){		
			//$position_two = $reg['position'];		
			$nombre4 = $reg4['nombre'];
			$mostrar4 = $reg4['mostrar'];
			$tipo4 = $reg4['tipo'];
			$link_nombre4 = $reg4['link'];
		}
		
		$registrosBanners5 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 5 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg5=mysqli_fetch_array($registrosBanners5)){		
			//$position_tres = $reg3['position'];
			$nombre5 = $reg5['nombre'];
			$mostrar5 = $reg5['mostrar'];
			$tipo5 = $reg5['tipo'];
			$link_nombre5 = $reg5['link'];
		}
		
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_tres' WHERE id_banner = '2' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_two' WHERE id_banner = '3' ") or die("Problemas en el select de update banner 3".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre4', mostrar = '$mostrar4', tipo = '$tipo4', link = '$link_nombre4' WHERE id_banner = '5' ") or die("Problemas en el select de update banner 1".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre5', mostrar = '$mostrar5', tipo = '$tipo5', link = '$link_nombre5' WHERE id_banner = '4' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		
	}
	
	if($id_intercambiar==5){
	
		$registrosBanners5 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 5 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg5=mysqli_fetch_array($registrosBanners5)){		
			//$position_two = $reg['position'];		
			$nombre5 = $reg5['nombre'];
			$mostrar5 = $reg5['mostrar'];
			$tipo5 = $reg5['tipo'];
			$link_nombre5 = $reg5['link'];
		}
		
		$registrosBanners6 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 6 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg6=mysqli_fetch_array($registrosBanners6)){		
			//$position_tres = $reg3['position'];
			$nombre6 = $reg6['nombre'];
			$mostrar6 = $reg6['mostrar'];
			$tipo6 = $reg6['tipo'];
			$link_nombre6 = $reg6['link'];
		}
		
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_tres' WHERE id_banner = '2' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		//mysqli_query($conexion, "UPDATE banners SET position = '$position_two' WHERE id_banner = '3' ") or die("Problemas en el select de update banner 3".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre6', mostrar = '$mostrar6', tipo = '$tipo6', link = '$link_nombre6' WHERE id_banner = '5' ") or die("Problemas en el select de update banner 1".mysqli_error($conexion));
		mysqli_query($conexion, "UPDATE banners SET nombre = '$nombre5', mostrar = '$mostrar5', tipo = '$tipo5', link = '$link_nombre5' WHERE id_banner = '6' ") or die("Problemas en el select de update banner 2".mysqli_error($conexion));
		
	}
	/*
	$registrosBanners3 = mysqli_query($conexion,"SELECT * FROM banners WHERE id_banner = 3 ") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg3=mysqli_fetch_array($registrosBanners3)){		
			$position_tres = $reg3['position'];
		}
	*/
	
		
	header('Location: modificar-banner.php');
	
?>