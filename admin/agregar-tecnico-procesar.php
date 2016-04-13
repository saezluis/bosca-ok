<?php
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	
	$xd = basename($_FILES["fileToUpload"]["name"]);
		
	$image_info = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$image_width = $image_info[0];
	$image_height = $image_info[1];
		
	echo "ancho img: ".$image_width;
	echo "<br>";
	echo "alto img: ".$image_height;
	echo "<br>";
	
	if($image_width==120 && $image_height==95){
		echo "imagen cumple resolucion";
		echo "<br>";
		
		if($xd!=''){
			
			$target_dir = "../img-tecnicos/";
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
		echo "imagen no cumple resolucion";
		echo "<br>";
	}
	
	$nombre = $_REQUEST['nombre'];
	$email = $_REQUEST['email'];
	$rut = $_REQUEST['rut'];
	$telefono = $_REQUEST['telefono'];
	$direccion = $_REQUEST['direccion'];
	$region = $_REQUEST['region'];
	//foto -> $nombreFoto
	mysqli_query($conexion,"INSERT INTO servicio(nombre,mail,rut,telefono,direccion,foto,region) VALUES ('$nombre','$email','$rut','$telefono','$direccion','$nombreFoto','$region') ") or die("Problemas con la conexión: ".mysqli_error($conexion)); 
	
	
	echo "<br>";
	echo "<br>";
	echo "<a href=\"agregar-tecnico.php\">Volver</a>";
?>