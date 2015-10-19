<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Productos / Bosca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="sass/tema/js/scripts.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="sass/tema/js/jquery.timelinr-0.9.54.js">		</script>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">	
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>	   
	<script src="js/calendario.js"></script>	
		
  </head>
  <body>
	<?php
	
	//Inicio del upload de la foto
	
	$allowed_filetypes = array('.jpg','.gif','.bmp','.png'); 
    $max_filesize = 555524288; 
    $upload_path = './fotos-productos/'; 

	$filename = $_FILES["userfile"]["name"]; 
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); 
	
	if(filesize($_FILES["userfile"]["tmp_name"]) > $max_filesize)
      die('The file you attempted to upload is too large.');

	if(!is_writable($upload_path))
      die('You cannot upload to the specified directory, please CHMOD it to 777.');
				    
	if(move_uploaded_file($_FILES["userfile"]["tmp_name"],$upload_path . $filename))         		 
		$whatever = 1;
      else        
		$whatever2 = 2;
			
	//fin del upload de la foto
	
	
	$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion,"insert into garantia(nombre,apellido,modelo,nro_serie,nro_factura,lugar_compra,nombre_instalador,ciudad,region,direccion,telefono,fecha,foto) 
												values ('$_REQUEST[nombre]',
												'$_REQUEST[apellido]',
												'$_REQUEST[modelo]',
												'$_REQUEST[nro_serie]',
												'$_REQUEST[nro_factura]',
												'$_REQUEST[lugar_compra]',												
												'$_REQUEST[nombre_instalador]',
												'$_REQUEST[ciudad]',
												'$_REQUEST[region]',
												'$_REQUEST[direccion]',
												'$_REQUEST[telefono]',
												'$_REQUEST[fecha]',
												'$filename'
												)") 
	
	or die("Problemas con el insert de la garantia");
		
	
	
	?>
    <div class="collapsible">
      <button> </button>
      <form class="desple">
        <div id="servicio--cliente">
          <p>Servicio al cliente 800 200 567</p>
        </div>
        <h1 class="dudas">¿Tienes dudas sobre algunos de nuestros productos?</h1>
        <input type="text" name="" value="" placeholder="Ingresa nombre">
        <input type="mail" name="" value="" placeholder="ingresa tu mail">
        <input type="text" name="" value="" placeholder="Asunto">
        <textarea type="text-area" name="" value=""></textarea><a href="#" class="send">Enviar</a>
      </form>
    </div>
    <header id="header">
      <div class="grupo">
        <div class="caja web-30 no-padding">
          <h1><a href="index.php" class="logo_m">ir al inicio</a></h1>
        </div>
        <div class="caja web-70">
          <div id="flags">
            <ul>
              <li><a href="#" class="spanish"><img src="img/chile.gif"></a></li>
              <li><a href="#" class="english"><img src="img/uk.gif"></a></li>
            </ul>
          </div>
          <div id="mostrar-menu">Menú</div>
          <ul class="menu">
            <li class="menu__item"><a href="index.php" class="menu__link">Productos</a></li>
            <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="encuentranos.php" class="menu__link">Encuéntranos</a></li>
            <li class="menu__item"><a href="registra-tu-bosca.php" class="menu__link activ">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.html" class="menu__link">Servicio técnico</a></li>
            <li class="menu__item"><a href="preguntas-frecuentes.html" class="menu__link">Preguntas frecuentes</a></li>
            <li class="menu__item"><a href="contacto.html" class="menu__link">Contacto</a></li>
          </ul>
        </div>
      </div>
    </header>
    <section class="grupo">
      <div class="caja">
        <div id="logos_juntos"><img src="img/logos-juntos.png"></div>
      </div>
    </section>
    <section class="grupo">
      <div class="caja movil-100">
        <div class="alert">
          <p>Gracias por registrar tu producto.</p>
		  <br>
          <p><a href="index.php">Volver al inicio</a></p>
        </div>
      </div>
    </section>
    <section class="grupo margen-top">
		
		<!--
		<div id="todo">
			<div class="caja movil-30">
			  <div class="side--we">
				<h2>Garantiza tu bosca</h2>
			  </div>
			</div>
			<div class="caja movil-70">
			  <div class="side-ellos">
				<form class="registra">
				  <label>Nombre </label>
				  <input name="nombre" type="text">
				  <label>Apellido</label>
				  <input name="apellido" type="text">
				  <label>Modelo del producto</label>
				  <input name="modelo" type="text">
				  <label>Número de serie del producto</label>
				  <input name="nro_serie" type="text">
				  <label>Número de boleta o factura</label>
				  <input name="nro_boleta" type="text">
				  <label>Lugar de compra</label>
				  <input name="lugar_compra" type="text">
				  <label>Nombre del instalador</label>
				  <select name="nombre_instalador" class="region">
					<option value="">seleccionar</option>
					<option value="">Nombre 1</option>
					<option value="">Nombre 2</option>
					<option value="">Nombre 3</option>
					<option value="">Nombre 4</option>
					<option value="">Nombre 5</option>
					<option value="">Nombre 6</option>
					<option value="">Nombre 7</option>
					<option value="">Nombre 8</option>
					<option value="">Nombre 9</option>
					<option value="">Nombre 10</option>
					<option value="">Nombre 11</option>
					<option value="">Nombre 12</option>
					<option value="">Nombre 13</option>
				  </select>
				  <label>Ciudad</label>
				  <input name="ciudad" type="text" class="ciudad">
				  <label>Región</label>
				  <select name="region" class="region">
					<option value="">seleccionar</option>
					<option value="">I Región</option>
					<option value="">II Región</option>
					<option value="">III Región</option>
					<option value="">VI Región</option>
					<option value="">V Región</option>
					<option value="">VI Región</option>
					<option value="">VII Región</option>
					<option value="">VIII Región</option>
					<option value="">IX Región</option>
					<option value="">X Región</option>
					<option value="">XI Región</option>
					<option value="">XII Región</option>
					<option value="">XIII Región</option>
				  </select>
				  <label>Dirección de la instalación</label>
				  <input name="direccion" type="text">
				  <div class="caja--tel">
					<label class="telefono--tel">Teléfono de contacto </label>                				
					<label class="f--instalacion">Fecha de instalación</label>                											
					<input name="telefono" type="text" class="input--cel">				
					<input name="fecha" type="text" class="fechas--registro" id="datepicker"> 
					
					<!--
					<label>Fecha documento</label>
					<div class="fechas--registro">
					  <select class="dia">
						<option value="">1</option>
						<option value="">2</option>
						<option value="">3</option>
						<option value="">4</option>
						<option value="">5</option>
						<option value="">6</option>
						<option value="">7</option>
						<option value="">8</option>
						<option value="">9</option>
						<option value="">10</option>
						<option value="">11</option>
						<option value="">12</option>
						<option value="">13</option>
						<option value="">14</option>
						<option value="">15</option>
						<option value="">16</option>
						<option value="">17</option>
						<option value="">18</option>
						<option value="">19</option>
						<option value="">20</option>
						<option value="">31</option>
					  </select>
					  <select class="mes">
						<option value="">Enero</option>
						<option value="">Febrero</option>
						<option value="">Marzo</option>
						<option value="">Abril</option>
						<option value="">Mayo</option>
						<option value="">Junio</option>
						<option value="">julio</option>
						<option value="">Agosto</option>
						<option value="">Septiembre</option>
						<option value="">Octubre</option>
						<option value="">Noviembre</option>
						<option value="">Diciembre</option>
					  </select>
					  <select class="ano">
						<option value="">2000</option>
						<option value="">2001</option>
						<option value="">2002</option>
						<option value="">2003</option>
						<option value="">2004</option>
						<option value="">2005</option>
						<option value="">2006</option>
						<option value="">2007</option>
						<option value="">2008</option>
						<option value="">2009</option>
						<option value="">2010</option>
						<option value="">2011</option>
						<option value="">2012</option>
						<option value="">2013</option>
						<option value="">2014</option>
						<option value="">2015</option>
						<option value="">2016</option>
						<option value="">2017</option>
						<option value="">2018</option>
						<option value="">2019</option>
						<option value="">2020</option>
						<option value="">2021</option>
						<option value="">2022</option>
						<option value="">2023</option>
						<option value="">2024</option>
						<option value="">2025</option>
						<option value="">2026</option>
						<option value="">2027</option>
						<option value="">2028</option>
						<option value="">2029</option>
						<option value="">2030</option>
					  </select>
					</div>
					
					
					<div class="adjuntar">
					  <div class="upload">
						<p>Subir foto de producto</p>
						<input type="file">
					  </div>
					</div><a href="#" class="registrar">Registar producto</a>
				  </div>
				</form>
			  </div>
			</div>
		</div>
		-->
	  
    </section>
    <footer id="footer">
      <div class="grupo">
        <div class="caja movil-50">
          <form action="#" class="contact_form">
            <ul>
              <li>
                <label class="label">Recibe nuestras ofertas y promociones </label>
                <input type="text" name="" value="" placeholder="Ingresa nombre y apellido" class="format_input">
              </li>
              <li>
                <input type="text" name="" value="" placeholder="Ingresa mail" class="format_input">
              </li>
              <li>
                <button type="submit" class="enviarMail">Suscríbete</button>
              </li>
            </ul>
          </form>
        </div>
        <div class="caja movil-50 auxT">
          <p class="servicioCliente">Servicio al cliente <a href="tel:+56 800200657" class="telF">800 200 657</a></p>
          <p class="direccion">Av. Américo Vespucio 2077, Huechuraba, Santiago.</p>
          <div class="sociales"><a href="#" class="intra">Intranet</a><a href="#" class="fb"><img src="img/fb-mini.jpg"></a>
            
            
            
            
            
            
            
            
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>