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
	
	<script type="text/javascript">
  
	$( window ).load(function() {
		//console.log( "ready!" );
		//alert("stuff");
		$("#imgsi").hide();
		$("#imgno").show();
	});
  
	  function cambioPic()
      {	
		$("#imgsi").show();
		$("#imgno").hide();
	  
	  }
	  
		
      function validargarantia()
      {
		
         if( document.formgarantia.nombre.value == "" )
         {
            alert( "Por favor ingrese su Nombre" );
            document.formgarantia.nombre.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.apellido.value == "" )
         {
            alert( "Por favor ingrese su Apellido" );
            document.formgarantia.apellido.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.modelo.value == "" )
         {
            alert( "Por favor ingrese el modelo de su producto" );
            document.formgarantia.modelo.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.nro_serie.value == "" )
         {
            alert( "Por favor ingrese el número de serie de su producto" );
            document.formgarantia.nro_serie.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.nro_factura.value == "" )
         {
            alert( "Por favor ingrese el número de factura de su producto" );
            document.formgarantia.nro_factura.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.lugar_compra.value == "" )
         {
            alert( "Por favor ingrese el luegar de compra de su producto" );
            document.formgarantia.lugar_compra.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.nombre_instalador.value == "-1" )
         {
            alert( "Por favor ingrese el Nombre del Instalador de su producto" );
            document.formgarantia.nombre_instalador.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.ciudad.value == "" )
         {
            alert( "Por favor ingrese la Ciudad donde compró su producto" );
            document.formgarantia.ciudad.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.region.value == "-1" )
         {
            alert( "Por favor ingrese la Región donde compró su producto" );
            document.formgarantia.region.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.direccion.value == "" )
         {
            alert( "Por favor ingrese su Dirección de instalación" );
            document.formgarantia.direccion.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.telefono.value == "" )
         {
            alert( "Por favor ingrese su número de teléfono de contacto" );
            document.formgarantia.telefono.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.fecha.value == "" )
         {
            alert( "Por favor ingrese la fecha de compra del producto" );
            document.formgarantia.fecha.focus() ;
            return false;
         }
		 
		 if( document.formgarantia.userfile.value == "" )
         {
            alert( "Por favor ingrese la foto de su producto" );            
			return false;            
         }
		 
		 
		 return( true );
      }

	</script>	 
	
	<script type="text/javascript">

		function validarmail(){

		  if( document.mailing.nombres.value == "" ){
			alert( "Por favor ingrese su Nombre y Apellido" );
			document.mailing.nombres.focus() ;
			return false;
		  }

		  if( document.mailing.email.value == "" ){
			alert( "Por favor ingrese su email" );
			document.mailing.email.focus() ;
			return false;
		  }

		  return( true );

		}

	</script>
	
  </head>
  <body>
	
	<?php
	
	//$conexion=mysqli_connect("localhost","pmdigita_admin","Prodigy12","pmdigita_bosca") or die("Problemas con la conexión");
	$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	if(isset($_REQUEST['nombres']) and isset($_REQUEST['email'])){
		//echo "Puedo insertar datos";
		echo "<script>alert('Gracias por suscribirse a la lista de correos Bosca');</script>";
		mysqli_query($conexion,"insert into mailing(nombre,email) values ('$_REQUEST[nombres]','$_REQUEST[email]')") 
		or die("Problemas con el insert de los servicios");
	}	
	
	
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
	<a href="medio-ambiente.php" class="btn-compromiso">Compromiso verde<img src="img/compromiso-verde.jpg" alt=""></a>
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
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link">Servicio técnico</a></li>
            <li class="menu__item"><a href="preguntas-frecuentes.php" class="menu__link">Preguntas frecuentes</a></li>
            <li class="menu__item"><a href="medio-ambiente.php" class="menu__link solo-movil">Medio Ambiente</a></li>
            <li class="menu__item"><a href="contacto.php" class="menu__link">Contacto</a></li>
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
          <p>Al registrar tu Bosca, completando el formulario, estarás extendiendo la garantia de tu producto.</p>
          <p>*Para que tu experiencia Bosca sea aun mejor, registra tus productos y obtener 1 año<br/>  de garantía, de lo contrario, sólo se extenderá por 90 días</p>
        </div>
      </div>
    </section>
    <section class="grupo margen-top">
      <div id="todo">
        <div class="caja movil-30">
          <div class="side--we">
            <h2>Garantiza tu bosca</h2>
          </div>
        </div>
        <div class="caja movil-70">
          <div class="side-ellos">
		  
			<!---------- Inicio del formulario ---------->
            <form name="formgarantia" method="post" action="registro-completo.php" enctype="multipart/form-data" class="registra">
              <label>Nombre </label>
              <input name="nombre" type="text">
              <label>Apellido</label>
              <input name="apellido" type="text">
              <label>Modelo del producto</label>
              <input name="modelo" type="text">
              <label>Número de serie del producto</label>
              <input name="nro_serie" type="text">
              <label>Número de boleta o factura</label>
              <input name="nro_factura" type="text">
              <label>Lugar de compra</label>
              <input name="lugar_compra" type="text">
              <label>Nombre del instalador</label>
              <select name="nombre_instalador" class="region">
                <option value="-1">seleccionar</option>
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
                <option value="-1">seleccionar</option>
                <option value="">I Región</option>
                <option value="">II Región</option>
                <option value="">III Región</option>
                <option value="">IV Región</option>
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
				<input name="telefono" type="number" class="input--cel">				
				<input name="fecha" type="text" class="fechas--registro" id="datepicker"> 
								
				<!-- Trabajar en el adjuntar archivo y guardar el nombre de la imagen BD o colocar nombre 
				
				action="getfile.php" method="POST" enctype="multipart/form-data"
				
				<button type="submit" name="upload" value="upload" formmethod="post" formenctype="multipart/form-data" formaction="getfile.php">Subir</button>
				-->	
                <div class="adjuntar">
                  
				  <div class="upload">                    
					<p>Adjuntar foto de producto</p>	 			
					<input type="file" name="userfile" onchange="cambioPic()">						
          </div>
				  <div class="confirmacion">
				 	    <img id="imgsi" src="img2/si.gif">
					     <img id="imgno" src="img2/no.gif">
          </div>					
				  
                </div>
				<button class="registrar" onclick="return(validargarantia())" type="submit">Registar producto</button> 
				<!-- <a href="#" class="registrar">Registar producto</a> -->
				
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer id="footer">
      <div class="grupo">
        <div class="caja movil-50">
          <form name="mailing" method="post" class="contact_form">
            <ul>
              <li>
                <label class="label">Recibe nuestras ofertas y promociones </label>
                <input type="text" name="nombres" value="" placeholder="Ingresa nombre y apellido" class="format_input">
              </li>
              <li>
                <input type="text" name="email" value="" placeholder="Ingresa mail" class="format_input">
              </li>
              <li>
                <button type="submit" onclick="return(validarmail())" class="enviarMail">Suscríbete</button>
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