<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_servicio = $_REQUEST['id_send_servicio'];
	
	$nombre = $_REQUEST['nombre'];
	$email = $_REQUEST['email'];
	$rut = $_REQUEST['rut'];
	$telefono = $_REQUEST['telefono'];
	$direccion = $_REQUEST['direccion'];
	$region = $_REQUEST['region'];

	mysqli_query($conexion, "UPDATE servicio SET nombre='$nombre',mail='$email',rut='$rut',telefono='$telefono',direccion='$direccion',region='$region' WHERE id_servicio = '$id_servicio' ")	or die("Problemas en el select:".mysqli_error($conexion));
	
	echo "Los datos fueron modificados con exito";
	echo "<br>";
	echo "<a href=\"modificar-tecnico.php\">Volver</a>";

?>