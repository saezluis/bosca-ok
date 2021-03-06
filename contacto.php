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
	
	<script type="text/javascript">
	
	function validarContacto()
      {
		
         if( document.formContacto.nombre_apellido.value == "" )
         {
            alert( "Por favor ingrese su Nombre y Apellido" );
            document.formContacto.nombre_apellido.focus() ;
            return false;
         }
		 
		 if( document.formContacto.email.value == "" )
         {
            alert( "Por favor ingrese su Email" );
            document.formContacto.email.focus() ;
            return false;
         }
		 
		 if( document.formContacto.telefono.value == "" )
         {
            alert( "Por favor ingrese su Telefono" );
            document.formContacto.telefono.focus() ;
            return false;
         }
		 
		 if( document.formContacto.contacto.value == "-1" )
         {
            alert( "Por favor seleccione area de contacto" );
            document.formContacto.contacto.focus() ;
            return false;
         }
		 
		  if( document.formContacto.comentario.value == "" )
         {
            alert( "Por favor ingrese su Comentario" );
            document.formContacto.comentario.focus() ;
            return false;
         }
		 
		 alert( "Gracias por sus comentarios, la información fue enviada correctamente" );
		 
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
		
		function comentario(){
			alert('Su comentario fue recibido satisfactoriamente. Lo contactaremos a la brevedad.');
		}

	</script>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-70935704-1', 'auto');
		ga('send', 'pageview');
	</script>
	
  </head>
  <body>
  
	<?php
	
	include_once 'config.php';
		
	 $conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
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
      <form class="desple" method="post" action="procesar-contactanos.php">
		<div id="servicio--cliente">
			<p>Servicio al cliente 800 200 567</p>
		</div>
		<h1 class="dudas">¿Tienes dudas sobre algunos de nuestros productos?</h1>
		<input type="text" name="nombre" placeholder="Ingresa nombre" >
		<input type="mail" name="email" placeholder="ingresa tu mail" >
		<input type="text" name="asunto" placeholder="Asunto" >
		<textarea type="text-area" name="comentario" ></textarea>
		<a href="#" class="send" onclick="comentario(); $(this).closest('form').submit();">Enviar</a>
	  </form>
    </div><a href="medio-ambiente.php" class="btn-compromiso">Compromiso verde<img src="img/compromiso-verde.jpg" alt=""></a>
    <header id="header">
      <div class="grupo">
        <div class="caja web-30 no-padding">
          <h1><a href="index.php" class="logo_m">ir al inicio</a></h1>
        </div>
        <div class="caja web-70">
          <div id="flags" style="margin-bottom:15px;"><!--quitar esto para mostrar banderas de idioma-->
          <ul  style="display:none;">
            <li><a href="#" class="spanish"><img src="img/chile.gif"></a></li>
            <li><a href="#" class="english"><img src="img/uk.gif"></a></li>
          </ul>
        </div>
          <div id="mostrar-menu">Menú</div>
          <ul class="menu">
            <li class="menu__item"><a href="index.php" class="menu__link">Productos</a></li>
            <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="encuentranos.php" class="menu__link">Encuéntranos</a></li>
            <li class="menu__item"><a href="registra-tu-bosca.php" class="menu__link">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link">Servicio técnico</a></li>
            <li class="menu__item"><a href="preguntas-frecuentes.php" class="menu__link">Preguntas frecuentes</a></li>
            <li class="menu__item"><a href="medio-ambiente.php" class="menu__link solo-movil">Medio Ambiente</a></li>
            <li class="menu__item"><a href="contacto.php" class="menu__link activ">Contacto</a></li>
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
          <p>Usted nos puede contactar a través de contacto@bosca.cl o por teléfono que está indicados en la parte inferior de esta página. También puede  utilizar el siguiente formulario para ponerse en contacto con nosotros para cualquier pregunta , comentario o presupuesto sin compromiso . Le contestaremos lo antes posible .</p>
        </div>
      </div>
    </section>
    <section class="grupo margen-top">
      <div id="todo">
        <div class="caja movil-30">
          <div class="side--we">
            <h2>¿TIENE ALGUNA PREGUNTA? CONTACTENOS AHORA!</h2>
          </div>
        </div>
        <div class="caja movil-70">
          <div class="side-ellos">
            <form method="post" name="formContacto" action="procesar-contacto.php" class="registra">
              <label>Nombre y apellido </label>
              <input name="nombre_apellido" type="text">
              <label>Email</label>
              <input name="email" type="email">
              <label>Teléfono</label>
              <input name="telefono" type="text">
              <label>Seleccione contacto directo</label>
              <select name="contacto" class="region">
                <option value="-1">Seleccionar área</option>
                <option value="servicio_tecnico">Contacto servicio técnico </option>
                <option value="exportaciones_importaciones">Exportaciones / Importaciones</option>
                <option value="jefe_de_tienda">Contacto jefe de Tiendas</option>
                <option value="repuestos">Contacto Repuestos</option>
                <option value="manager_solartech">Contacto Brand Manager Solartech</option>
                <option value="manager_hergom">Contacto Brand Manager Hergom</option>
                <label>Agregue comentario sobre la calificación</label>
                <textarea name="comentario" class="arriba-20"></textarea>
				<button class="registrar" onclick="return(validarContacto())" type="submit">Enviar</button>				
              </select>
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
          <div class="sociales"><a href="https://www.facebook.com/boscachile" class="fb" target="_blank"><img src="img/fb-mini.jpg"></a>
            
            
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>