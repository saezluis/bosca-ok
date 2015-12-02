<?php

$nombre = $_REQUEST['nombre'];
$email = $_REQUEST['email'];
$asunto = $_REQUEST['asunto'];
$comentario = $_REQUEST['comentario'];
	
include_once 'config.php';
		
$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
$acentos = $conexion->query("SET NAMES 'utf8'");

	mysqli_query($conexion,"insert into contactanos(nombre,email,asunto,comentario) 
						values ('$nombre',
								'$email',
								'$asunto',						
								'$comentario')") 	
	or die("Problemas con el insert del contacto");
	
header('Location: index.php');

?>