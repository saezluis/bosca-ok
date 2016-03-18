<?php

	$id_accparrilla = $_REQUEST['id-accparrilla-send'];

	$nombre = $_REQUEST['nombre'];
	$modelo = $_REQUEST['modelo'];
	$sku = $_REQUEST['sku'];
	
	$precio = $_REQUEST['precio'];
	$logo_up_left = $_REQUEST['mini_logo'];
	$foto_producto = $_REQUEST['foto_producto'];
	
	$xd = basename(@$_FILES["fileToUpload"]["name"]);
	
	if($xd!=''){
	
		$image_info = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		
		if($image_width==490 && $image_height==530){
			echo "imagen cumple resolucion";
			echo "<br>";
			
			
				$target_dir = "../img-pt/";
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
			
			$nombreFoto = basename($_FILES["fileToUpload"]["name"]);
		}
	}
	
	
	if($xd==''){
		//echo "imagen no cumple resolucion de 330 x 310";
		//echo "<br>";
		$nombreFoto = $foto_producto;
		
	}  
	
	echo "<br>";
	echo "nombre foto: ".$nombreFoto;
	echo "<br>";
	
	
	
		
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		mysqli_query($conexion, "UPDATE accparrilla SET 
										nombre='$nombre',
										modelo='$modelo',
										sku='$sku',										
										precio='$precio',
										foto_producto='$nombreFoto',
										logo_up_left='$logo_up_left'
										
										WHERE id_accparrilla='$id_accparrilla'") or die("Problemas en el select de update parrilla".mysqli_error($conexion));
	
	echo "<br>";	
	echo "Los datos fueron modificados";
	echo "<br>";
	echo "<a href=\"accparrilla-home.php\">Volver</a>";
	//header('Location: parrilla-home.php');
?>









