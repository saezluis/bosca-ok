<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Productos / Bosca</title>
    
  </head>
  <body>
	<?php
	
		$nombre = $_REQUEST['nombre'];
		$apellido = $_REQUEST['apellido'];
		$email = $_REQUEST['email'];
		$rut = $_REQUEST['rut'];
		$telefono = $_REQUEST['telefono'];
				
		$region = $_REQUEST['regiones'];
		$provincia = $_REQUEST['provincia'];
	
		echo "Nombre: ".$nombre."<br>";
		echo "Apellido: ".$apellido."<br>";
		echo "Email: ".$email."<br>";
		echo "Rut: ".$rut."<br>";
		echo "Telefono: ".$telefono."<br>";
		echo "<br>";
		
		echo "Region: ".$region."<br>";
		echo "Provincia: ".$provincia."<br>";
		
	
	?>  
  </body>
</html>