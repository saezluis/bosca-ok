<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<meta charset="utf-8">
    <title>Productos / Bosca</title>
    
  </head>
  <body>
	<?php
	
		$nombre = $_REQUEST['nombre'];
		$apellido = $_REQUEST['apellido'];
		$email = $_REQUEST['email'];
		$rut = $_REQUEST['rut'];
		$telefono = $_REQUEST['telefono'];
				
		$regionDespacho = $_REQUEST['regionesDespacho'];
		$provinciaDespacho = $_REQUEST['provinciaDespacho'];
		
		$regionBoleta = $_REQUEST['regionesBoleta'];
		$provinciaBoleta = $_REQUEST['provinciaBoleta'];
	
		echo "Nombre: ".$nombre."<br>";
		echo "Apellido: ".$apellido."<br>";
		echo "Email: ".$email."<br>";
		echo "Rut: ".$rut."<br>";
		echo "Telefono: ".$telefono."<br>";
		echo "<br>";
		
		echo "Region despacho: ".$regionDespacho."<br>";
		echo "Provincia despacho: ".$provinciaDespacho."<br>";
		echo "<br>";
		
		echo "Region boleta: ".$regionBoleta."<br>";
		echo "Provincia boleta: ".$provinciaBoleta."<br>";
		
	
	?>  
  </body>
</html>