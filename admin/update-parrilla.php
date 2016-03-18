<?php

	$id_parrilla = $_REQUEST['id-parrilla-send'];

	$nombre = $_REQUEST['nombre'];
	$modelo = $_REQUEST['modelo'];
	$sku = $_REQUEST['sku'];
	
	$precio = $_REQUEST['precio'];
	$alto = $_REQUEST['alto'];
	$ancho = $_REQUEST['ancho']; 
	
	$profundidad = $_REQUEST['profundidad'];
	$peso = $_REQUEST['peso'];
	$material = $_REQUEST['material'];
	
	$atributo_01 = $_REQUEST['atributo_01'];
	$atributo_02 = $_REQUEST['atributo_02'];
	$atributo_03 = $_REQUEST['atributo_03'];
	$atributo_04 = $_REQUEST['atributo_04'];
	$atributo_05 = $_REQUEST['atributo_05'];
	$atributo_06 = $_REQUEST['atributo_06'];
	
	$logo_up_left = $_REQUEST['mini_logo'];
	
	$ficha_get = $_REQUEST['ficha_tecnica'];	
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
			
			$target_dir = "../img/";
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
			
	}
	
	if($xd==''){
		echo "imagen no cumple resolucion de 330 x 310";
		echo "<br>";
		$nombreFoto = $foto_producto;
		
	}  
	
	echo "<br>";
	echo "nombre foto: ".$nombreFoto;
	echo "<br>";
	
	
	$xdDos = basename(@$_FILES["fileToUploadDos"]["name"]);
	
	$image_infoDos = @getimagesize(@$_FILES["fileToUploadDos"]["tmp_name"]);
	$image_widthDos = $image_infoDos[0];
	$image_heightDos = $image_infoDos[1];
	
	if($image_widthDos==900 && $image_heightDos==1075){
		echo "imagen cumple resolucion";
		echo "<br>";
		
		if($xdDos!=''){
			
			$target_dir = "../img/";
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
			
	}
	
	if($xd==''){
		echo "imagen zoom no cumple resolucion de 900 x 1075";
		echo "<br>";		
		$nombreFotoDos = $foto_zoom;
		
	}
	
	echo "<br>";
	echo "nombre foto dos: ".$nombreFotoDos;
	echo "<br>";
	
	//Colocar un if para validar si hago o no hago el upload del archivo
	$xdTres = basename(@$_FILES["fileToUploadTres"]["name"]);
	
	if($xdTres!=''){
	
		//--Agregar PDF--Agregar PDF--Agregar PDF--Agregar PDF--Agregar PDF--Agregar PDF--Agregar PDF--Agregar PDF
		
		//$nombrefile = $_REQUEST['fileToUploadTres'];
		//$nombrefile_final = $nombrefile."-or";
		
		// Configuration - Your Options
		$allowed_filetypes = array('.pdf','.PDF'); // These will be the types of file that will pass the validation.
		$max_filesize = 555524288; // Maximum filesize in BYTES (currently 0.5MB).
		$upload_path = '../fichas-tecnicas/'; // The place the files will be uploaded to (currently a 'files' directory).

		$filename = $_FILES["fileToUploadTres"]["name"]; // Get the name of the file (including file extension).
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.

		// Check if the filetype is allowed, if not DIE and inform the user.
		if(!in_array($ext,$allowed_filetypes)) die('El archivo que trata de subir no está en formato PDF.');

		// Now check the filesize, if it is too large then DIE and inform the user.
		if(filesize($_FILES["fileToUploadTres"]["tmp_name"]) > $max_filesize)
		  die('El archivo que trata de subir exede el tamaño permitido.');

		// Check if we can upload to the specified path, if not DIE and inform the user.
		if(!is_writable($upload_path))
		  die('No se puede cargar archivo al directorio especificado, por favor CHMOD con 777.');
				
		
		$hora = time(); // this will give the file current time so avoid files having the same name
		$filename_final = $hora.$filename;
		// Upload the file to your specified path.
		if(move_uploaded_file($_FILES["fileToUploadTres"]["tmp_name"],$upload_path . $filename_final))
			 //echo time(). ' Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
			 echo "Carga completada";
		  else
			 echo 'Hubo un error durante la carga.  Favor intentar de nuevo.'; // It failed :(.
		 
		$nombre_ficha = $filename_final;
		//Agregar PDF ---//Agregar PDF ---//Agregar PDF ---//Agregar PDF ---//Agregar PDF ---//Agregar PDF ---
	}else{
		$nombre_ficha = $ficha_get;
	}
		
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		echo "<br>";
		echo "nombre ficha: ".$nombre_ficha;
		echo "<br>";
		
		
		
		mysqli_query($conexion, "UPDATE parrilla SET nombre='$nombre',
										modelo='$modelo',
										sku='$sku',										
										precio='$precio',
										alto='$alto',
										ancho='$ancho',										
										profundidad='$profundidad',
										peso='$peso',
										material='$material',										
										atributo_01='$atributo_01',
										atributo_02='$atributo_02',
										atributo_03='$atributo_03',
										atributo_04='$atributo_04',
										atributo_05='$atributo_05',
										atributo_06='$atributo_06',
										foto_producto='$nombreFoto',
										foto_zoom='$nombreFotoDos',
										logo_up_left='$logo_up_left',
										ficha_tecnica='$nombre_ficha'
										
										WHERE id_parrilla='$id_parrilla'") or die("Problemas en el select de update parrilla".mysqli_error($conexion));
	
	echo "<br>";	
	echo "Los datos fueron modificados";
	echo "<br>";
	echo "<a href=\"parrilla-home.php\">Volver</a>";
	//header('Location: parrilla-home.php');
?>









