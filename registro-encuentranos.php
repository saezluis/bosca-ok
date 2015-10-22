<?php

	$nombre_apellido = @$_REQUEST['nombre_apellido'];
	$mail = @$_REQUEST['mail'];
	$telefono = @$_REQUEST['telefono'];
	$motivo = @$_REQUEST['motivo'];
	$comentario = @$_REQUEST['comentario'];
	$region = @$_REQUEST['region'];
	
	$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	if($region=='V Region'){
		//$email = "usuarioX@gmail.com";
		$to = "V_region@bosca.cl";
		$subject = "Comentario de usuario pagina web Bosca";
		$headers = "De: $mail\n";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Correo electronico: $mail
		\n Teléfono: $telefono
		\n Motivo: $motivo
		\n Comentario: $comentario
		";

		$user = $mail;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: V_region@bosca.cl\n";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contactoregion(nombre_apellido,telefono,email,motivo,comentario,region) 
							values ('$nombre_apellido',
									'$mail',
									'$telefono',
									'$motivo',
									'$comentario',
									'$region')") 	
		or die("Problemas con el insert de la garantia");
		
	}
	
	if($region=='RM'){
		//$email = "usuarioX@gmail.com";
		$to = "Region_Metropolitana@bosca.cl";
		$subject = "Comentario de usuario pagina web Bosca";
		$headers = "De: $mail\n";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Correo electronico: $mail
		\n Teléfono: $telefono
		\n Motivo: $motivo
		\n Comentario: $comentario
		";

		$user = $mail;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: Region_Metropolitana@bosca.cl\n";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contactoregion(nombre_apellido,telefono,email,motivo,comentario,region) 
							values ('$nombre_apellido',
									'$mail',
									'$telefono',
									'$motivo',
									'$comentario',
									'$region')") 	
		or die("Problemas con el insert de la garantia");
		
	}
	
	
	if($region=='VI Region'){
		//$email = "usuarioX@gmail.com";
		$to = "VI_Region@bosca.cl";
		$subject = "Comentario de usuario pagina web Bosca";
		$headers = "De: $mail\n";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Correo electronico: $mail
		\n Teléfono: $telefono
		\n Motivo: $motivo
		\n Comentario: $comentario
		";

		$user = $mail;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: VI_Region@bosca.cl\n";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contactoregion(nombre_apellido,telefono,email,motivo,comentario,region) 
							values ('$nombre_apellido',
									'$mail',
									'$telefono',
									'$motivo',
									'$comentario',
									'$region')") 	
		or die("Problemas con el insert de la garantia");
		
	}
	
	if($region=='VIII Region'){
		//$email = "usuarioX@gmail.com";
		$to = "VIII_Region@bosca.cl";
		$subject = "Comentario de usuario pagina web Bosca";
		$headers = "De: $mail\n";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Correo electronico: $mail
		\n Teléfono: $telefono
		\n Motivo: $motivo
		\n Comentario: $comentario
		";

		$user = $mail;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: VIII_Region@bosca.cl\n";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contactoregion(nombre_apellido,telefono,email,motivo,comentario,region) 
							values ('$nombre_apellido',
									'$mail',
									'$telefono',
									'$motivo',
									'$comentario',
									'$region')") 	
		or die("Problemas con el insert de la garantia");
		
	}
	
	
	if($region=='IX Region'){
		//$email = "usuarioX@gmail.com";
		$to = "IX_Region@bosca.cl";
		$subject = "Comentario de usuario pagina web Bosca";
		$headers = "De: $mail\n";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Correo electronico: $mail
		\n Teléfono: $telefono
		\n Motivo: $motivo
		\n Comentario: $comentario
		";

		$user = $mail;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: IX_Region@bosca.cl\n";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contactoregion(nombre_apellido,telefono,email,motivo,comentario,region) 
							values ('$nombre_apellido',
									'$mail',
									'$telefono',
									'$motivo',
									'$comentario',
									'$region')") 	
		or die("Problemas con el insert de la garantia");
		
	}
	
	if($region=='X Region'){
		//$email = "usuarioX@gmail.com";
		$to = "X_Region@bosca.cl";
		$subject = "Comentario de usuario pagina web Bosca";
		$headers = "De: $mail\n";
		$message = "Un visitante de tu sitio te ha enviado el siguiente email para que atiendas a su comentario.
		\n Correo electronico: $mail
		\n Teléfono: $telefono
		\n Motivo: $motivo
		\n Comentario: $comentario
		";

		$user = $mail;
		$usersubject = "Gracias por sus comentarios";
		$userheaders = "De: X_Region@bosca.cl\n";
		$usermessage = "Gracias por sus comentarios, su solicitud sera debidamente procesada por nuestro personal de Bosca";
	
		mail($to,$subject,$message,$headers);
		mail($user,$usersubject,$usermessage,$userheaders);		

		mysqli_query($conexion,"insert into contactoregion(nombre_apellido,telefono,email,motivo,comentario,region) 
							values ('$nombre_apellido',
									'$mail',
									'$telefono',
									'$motivo',
									'$comentario',
									'$region')") 	
		or die("Problemas con el insert de la garantia");
		
	}

	header('Location: encuentranos.php');
?>