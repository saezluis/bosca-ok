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
			
	}else{
		echo "imagen no cumple resolucion";
		echo "<br>";
	}
	
	$xdDos = basename($_FILES["fileToUploadDos"]["name"]);
	
	$image_infoDos = getimagesize($_FILES["fileToUploadDos"]["tmp_name"]);
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
			
	}else{
		echo "imagen no cumple resolucion";
		echo "<br>";
	}
	
	
	
	//foto catalogo $nombreFoto
	//foto zoom $nombreFotoDos
	//logo_up_left debo tomar el nombre del logo elegido
	
	$nombre = $_REQUEST['nombre'];
	$mini_logo = $_REQUEST['mini_logo'];
	$modelo = $_REQUEST['modelo'];
	$precio = $_REQUEST['precio'];
	
	$fabricacion = $_REQUEST['fabricacion'];
	$combustion = $_REQUEST['combustion'];
	$panel_programable = $_REQUEST['panel_programable'];
	
	$conexion_electrica = $_REQUEST['conexion_electrica'];
	$capacidad_carga = $_REQUEST['capacidad_carga'];
	$potencia = $_REQUEST['potencia'];
	
	$rango_calefaccion = $_REQUEST['rango_calefaccion'];
	$color = $_REQUEST['color'];
	$vidrio_autolimpiante = $_REQUEST['vidrio_autolimpiante'];
	
	$cenicero = $_REQUEST['cenicero'];
	$vermiculita_refractaria = $_REQUEST['vermiculita_refractaria'];
	$templador = $_REQUEST['templador'];
	
	$ventaja_comparativa = $_REQUEST['ventaja_comparativa'];
	$dimensiones = $_REQUEST['dimensiones'];
	$diametro_canon = $_REQUEST['diametro_canon'];
	
	$garantia = $_REQUEST['garantia'];
	$sku = $_REQUEST['sku'];
	
	
	
	mysqli_query($conexion,"insert into producto(nombre,logo_up_left,precio,foto_producto,foto_zoom,modelo,fabricacion,combustion,panel_programable,conexion_electrica,capacidad_carga,potencia,rango_calefaccion,color,vidrio_autolimpiante,cenicero,vermiculita_refractaria,templador,ventaja_comparativa,dimensiones,diametro_canon,garantia,sku) values 
									('$nombre',
									'$mini_logo',
									'$precio',
									'$nombreFoto',
									'$nombreFotoDos',
									'$modelo',
									'$fabricacion',
									'$combustion',
									'$panel_programable',
									'$conexion_electrica',
									'$capacidad_carga',
									'$potencia',
									'$rango_calefaccion',
									'$color',
									'$vidrio_autolimpiante',
									'$cenicero',
									'$vermiculita_refractaria',
									'$templador',
									'$ventaja_comparativa',
									'$dimensiones',
									'$diametro_canon',
									'$garantia',
									'$sku'								
									)")
	or die("Problemas con el insert de los servicios");
		
	
	echo "nombre foto: ".$nombreFoto;
	echo "<br>";
	echo "nombre foto 2: ".$nombreFotoDos;
	echo "<br>";
	echo "<br>";
	echo "Mini logo: ".$mini_logo;
	echo "<br>";
	echo "<br>";
	
	echo "<h4>Producto agregado de manera correcta al catalogo</h4>";
	
	echo "<br>";
	echo "<br>";
	echo "<a href=\"calefaccion-home.php\">Volver</a> ";
	
?>