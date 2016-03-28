<?php
	
	$id_producto = $_REQUEST['id-producto-send'];
	
	$foto_producto = $_REQUEST['foto_producto'];
	$foto_zoom = $_REQUEST['foto_zoom'];
	
	$xd = basename(@$_FILES["fileToUpload"]["name"]);
	
	$image_info = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
	
	if($image_width==330 && $image_height==310){
		echo "imagen cumple resolucion";
		echo "<br>";
		
		if($xd!=''){
			
			$target_dir = "../img-cc/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "El archivo es una imagen - " . $check["mime"] . ".";
					echo "<br>";
					$uploadOk = 1;
				} else {
					echo "El archivo no es una imagen.";
					echo "<br>";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Lo sentimos, el archivo ya existe.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 50000000) {
				echo "Lo sentimos, el archivo es muy grande.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Lo sentimos, solo archivos JPG, JPEG, PNG & GIF son permitidos.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Lo sentimos, su archivo no fue cargado.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " a sido cargado.";
					echo "<br>";
				} else {
					echo "Lo sentimos, hubo un error al subir el archivo.";
					echo "<br>";
				}
			}
		
		}	

		$nombreFoto = basename($_FILES["fileToUpload"]["name"]);
			
	}else{
		//echo "imagen no cumple resolucion";
		echo "<br>";
		$nombreFoto = $foto_producto;
		
	}  
	
	
	$xdDos = basename(@$_FILES["fileToUploadDos"]["name"]);
	
	$image_infoDos = @getimagesize(@$_FILES["fileToUploadDos"]["tmp_name"]);
	$image_widthDos = $image_infoDos[0];
	$image_heightDos = $image_infoDos[1];
	
	if($image_widthDos==900 && $image_heightDos==1075){
		echo "imagen cumple resolucion";
		echo "<br>";
		
		if($xdDos!=''){
			
			$target_dir = "../img-cc/";
			$target_file = $target_dir . basename($_FILES["fileToUploadDos"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUploadDos"]["tmp_name"]);
				if($check !== false) {
					echo "El archivo es una imagen - " . $check["mime"] . ".";
					echo "<br>";
					$uploadOk = 1;
				} else {
					echo "El archivo no es una imagen.";
					echo "<br>";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Lo sentimos, el archivo ya existe.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUploadDos"]["size"] > 50000000) {
				echo "Lo sentimos, el archivo es muy grande.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Lo sentimos, solo archivos JPG, JPEG, PNG & GIF son permitidos.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Lo sentimos, su archivo no fue cargado.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUploadDos"]["tmp_name"], $target_file)) {
					echo "El archivo ". basename( $_FILES["fileToUploadDos"]["name"]). " a sido cargado.";
					echo "<br>";
				} else {
					echo "Lo sentimos, hubo un error al subir el archivo.";
					echo "<br>";
				}
			}
		
		}	

		$nombreFotoDos = basename($_FILES["fileToUploadDos"]["name"]);
			
	}else{
		//echo "imagen no cumple resolucion";
		echo "<br>";		
		$nombreFotoDos = $foto_zoom;
		
	}
	
	$nombre = $_REQUEST['nombre'];
	$modelo = $_REQUEST['modelo'];
	$sku = $_REQUEST['sku'];
	$anexo_nombre = $_REQUEST['anexo_nombre'];
	$precio = $_REQUEST['precio'];

	$climatiza = $_REQUEST['climatiza'];
	$voltaje = $_REQUEST['voltaje'];
	$alto = $_REQUEST['alto'];
	$ancho = $_REQUEST['ancho'];
	$profundidad = $_REQUEST['profundidad'];

	$peso = $_REQUEST['peso'];
	$atributo_funcional01 = $_REQUEST['atributo_funcional01'];
	$atributo_funcional02 = $_REQUEST['atributo_funcional02'];
	$atributo_funcional03 = $_REQUEST['atributo_funcional03'];

	$logo_up_left = $_REQUEST['mini_logo'];
	
	
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
	mysqli_query($conexion, "update ventilacion	
									set nombre='$nombre',
									modelo='$modelo',
									sku='$sku',
									anexo_nombre='$anexo_nombre',
									precio='$precio',
									climatiza='climatiza',
									voltaje='$voltaje',
									alto='$alto',
									ancho='$ancho',
									profundidad='$profundidad',
									peso='$peso',
									atributo_funcional01='$atributo_funcional01',
									atributo_funcional02='$atributo_funcional02',
									atributo_funcional03='$atributo_funcional03',									
									logo_up_left='$logo_up_left',
									foto_producto='$$nombreFoto',
									foto_zoom='$nombreFotoDos'
									
									
									
									WHERE id_ventilacion='$id_producto'") or
									die("Problemas en el select de update".mysqli_error($conexion));

	
	header('Location: cocina-home.php');
	
?>