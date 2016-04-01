<?php

$nombre_apellido = $_REQUEST['nombre_apellido'];
$email = $_REQUEST['email'];
$telefono = $_REQUEST['telefono'];
$contacto = $_REQUEST['contacto'];
$comentario = $_REQUEST['comentario'];
	
include_once 'config.php';
		
$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
$acentos = $conexion->query("SET NAMES 'utf8'");


if($contacto=='servicio_tecnico'){
		//$email = "usuarioX@gmail.com";
		$to = "servicio_tecnico@bosca.cl";
		$subject = "Comentario de usuario en pagina web Bosca";
		$headers = "De: $email";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Nombre y Apellido: $nombre_apellido
		\n Correo electronico: $email
		\n Teléfono: $telefono		
		\n Comentario: $comentario
		";

		$user = $email;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: servicio_tecnico@bosca.cl";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contacto(nombre_apellido,email,telefono,area_contacto,comentario) 
							values ('$nombre_apellido',
									'$email',
									'$telefono',
									'$contacto',
									'$comentario')") 	
		or die("Problemas con el insert del contacto");
		
	}

if($contacto=='exportaciones_importaciones'){
		//$email = "usuarioX@gmail.com";
		$to = "exportaciones_importaciones@bosca.cl";
		$subject = "Comentario de usuario en pagina web Bosca";
		$headers = "De: $email";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Nombre y Apellido: $nombre_apellido
		\n Correo electronico: $email
		\n Teléfono: $telefono		
		\n Comentario: $comentario
		";

		$user = $email;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: exportaciones_importaciones@bosca.cl";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Exportaciones e Importaciones Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contacto(nombre_apellido,email,telefono,area_contacto,comentario) 
							values ('$nombre_apellido',
									'$email',
									'$telefono',
									'$contacto',
									'$comentario')") 	
		or die("Problemas con el insert del contacto");
		
	}	
	
if($contacto=='jefe_de_tienda'){
		//$email = "usuarioX@gmail.com";
		$to = "jefe_de_tienda@bosca.cl";
		$subject = "Comentario de usuario en pagina web Bosca";
		$headers = "De: $email";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Nombre y Apellido: $nombre_apellido
		\n Correo electronico: $email
		\n Teléfono: $telefono		
		\n Comentario: $comentario
		";

		$user = $email;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: jefe_de_tienda@bosca.cl";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contacto(nombre_apellido,email,telefono,area_contacto,comentario) 
							values ('$nombre_apellido',
									'$email',
									'$telefono',
									'$contacto',
									'$comentario')") 	
		or die("Problemas con el insert del contacto");
		
	}		
	
if($contacto=='repuestos'){
		//$email = "usuarioX@gmail.com";
		$to = "repuestos@bosca.cl";
		$subject = "Comentario de usuario en pagina web Bosca";
		$headers = "De: $email";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Nombre y Apellido: $nombre_apellido
		\n Correo electronico: $email
		\n Teléfono: $telefono		
		\n Comentario: $comentario
		";

		$user = $email;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: repuestos@bosca.cl";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Repuestos Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contacto(nombre_apellido,email,telefono,area_contacto,comentario) 
							values ('$nombre_apellido',
									'$email',
									'$telefono',
									'$contacto',
									'$comentario')") 	
		or die("Problemas con el insert del contacto");
		
	}	

if($contacto=='manager_solartech'){
		//$email = "usuarioX@gmail.com";
		$to = "manager_solartech@bosca.cl";
		$subject = "Comentario de usuario en pagina web Bosca";
		$headers = "De: $email";
		$message = "Un visitante del sitio web Bosca te ha enviado el siguiente email a la parte de administración SolarTech para que atiendas a su comentario.
		\n Nombre y Apellido: $nombre_apellido
		\n Correo electronico: $email
		\n Teléfono: $telefono		
		\n Comentario: $comentario
		";

		$user = $email;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: manager_solartech@bosca.cl";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Administración de SolarTech";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contacto(nombre_apellido,email,telefono,area_contacto,comentario) 
							values ('$nombre_apellido',
									'$email',
									'$telefono',
									'$contacto',
									'$comentario')") 	
		or die("Problemas con el insert del contacto");
		
	}	

if($contacto=='manager_hergom'){
		//$email = "usuarioX@gmail.com";
		$to = "manager_hergom@bosca.cl";
		$subject = "Comentario de usuario en pagina web Bosca";
		$headers = "De: $email";
		$message = "Un visitante del sitio web Bosca te ha enviado el siguiente email a la parte de administración Hergom para que atiendas a su comentario.
		\n Nombre y Apellido: $nombre_apellido
		\n Correo electronico: $email
		\n Teléfono: $telefono		
		\n Comentario: $comentario
		";

		$user = $email;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: manager_hergom@bosca.cl";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Administración de Hergom";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contacto(nombre_apellido,email,telefono,area_contacto,comentario) 
							values ('$nombre_apellido',
									'$email',
									'$telefono',
									'$contacto',
									'$comentario')") 	
		or die("Problemas con el insert del contacto");
		
	}		
	
header('Location: contacto.php');

?>