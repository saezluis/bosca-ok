<?php

$nombre_apellido = $_REQUEST['nombre_apellido'];
$email = $_REQUEST['email'];
$telefono = $_REQUEST['telefono'];
$contacto = $_REQUEST['contacto'];
$comentario = $_REQUEST['comentario'];
	

$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
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
	
echo "Formulario procesado";

?>