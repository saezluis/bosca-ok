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
    </div><a href="medio-ambiente.php" class="btn-compromiso">Compromiso verde<img src="img/compromiso-verde.jpg" alt=""></a>
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
            <li class="menu__item"><a href="registra-tu-bosca.php" class="menu__link">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link">Servicio técnico</a></li>
            <li class="menu__item"><a href="preguntas-frecuentes.php" class="menu__link">Preguntas frecuentes</a></li>
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
    <section class="grupo margen-top">
      <div id="todo">
        <div class="caja movil-30">
          <div class="side--we">
            <h2>Medio Ambiente</h2>
			<br>
            <p> Nuestra preocupación por la naturaleza no se detiene. Te invitamos a leer nuestro compromiso verde con nuestro planeta y su futuro.</p>
          </div>
        </div>
        <div class="caja movil-70">
          <div class="side-ellos">
            <ul class="tabs">
              <li class="font-t">
                <input id="tab1" type="radio" checked="" name="tabs">
                <label for="tab1">Certificaciones ambientales</label>
                <div id="tab-content1" class="tab-content">
                  <p class="certificacion-amb">
                    Con 30 años de experiencias Bosca Chile se destaca por ser un referente en
                    el mercado por sus productos de alta calidad, innovación y tecnología.
                    Desde un comienzo preocupada por el impacto ambiental destaca por ser la
                    primera empresa Latinoamericana en certificar sus productos ante la EPA
                    (USA) y en obtener la homologación CE(Comunidad Europea) . <br/><br/>Nuestros
                    productos de calefacción a leña cuentan con certificaciones que cumplen
                    con altos estándares de exigencia que miden emisión de partículas y
                    gaseosas, seguridad y rendimiento, tanto en Chile como en el resto del
                    mundo.
                  </p>
                  <div class="logos--certificacion">
                    <div class="logo--item"><img src="img/standard-new-zealand.jpg" alt=""></div>
                    <div class="logo--item"><img src="img/sec.jpg" alt=""></div>
                    <div class="logo--item"><img src="img/enviroment-agency.jpg" alt=""></div>
                    <div class="logo--item"><img src="img/ce.jpg" alt=""></div>
                  </div>
                  <!-- Your content goes here-->
                </div>
              </li>
              <li class="font-t">
                <input id="tab2" type="radio" name="tabs">
                <label for="tab2">Nuevas Campañas</label>
                <div id="tab-content2" class="tab-content">
                  <h3 class="font-lena">Falta contenido</h3>
                  <!-- Your content goes here-->
                </div>
              </li>
              <li class="font-t">
                <input id="tab3" type="radio" name="tabs">
                <label for="tab3">Combatiendo la contaminación   </label>
                <div id="tab-content3" class="tab-content">
                  <p class="certificacion-amb">Al hablar de  leña como combustible hay que tener en consideración tres aspectos fundamentales: la humedad de la madera,  la tecnología de la cámara de combustión y costumbre de los usuarios.</p>
                  <h3 class="font-lena">Leña seca </h3>
                  <p class="certificacion-amb"> El uso de leña seca incide positivamente en la reducción de la contaminación, específicamente, en la generación de material particulado. Estudios han demostrado que el proceso de combustión se ve optimizado (aumentando el calor y dismuyendo los contaminantes) cuando la madera contiene un 25% o menos de humedad. Por lo tanto, existe mayor eficiencia y menor contaminación al disminuir el nivel de agua existente en la leña.</p>
                  <p class="certificacion-amb">Es necesario, tomar en consideración que la leña como energía renovable tiene un efecto neutro sobre el balance de CO2 en la atmósfera , sin contribuir al efecto invernadero,  si es obtenida a partir de bosques que son manejados de manera sustentable.</p>
                  <table class="tg">
                    <tr>
                      <th class="tg-s6z2">Humedad </th>
                      <th class="tg-031e">kcal/kg</th>
                    </tr>
                    <tr>
                      <td class="tg-031e">Madera verde</td>
                      <td class="tg-031e">1800-2500</td>
                    </tr>
                    <tr>
                      <td class="tg-031e">Secada naturalmente</td>
                      <td class="tg-031e">3400-3800</td>
                    </tr>
                    <tr>
                      <td class="tg-031e">Secada artificialmente</td>
                      <td class="tg-031e">4100-4500</td>
                    </tr>
                  </table><a href="pdf/manual-lenito.pdf" target="_blank" class="lenito">Descarga el uso adecuado de la leña</a>
                  <h3 class="Tcamara">Tecnología en cámara </h3>
                  <p>Falta contenido</p>
                  <!-- Your content goes here-->
                </div>
              </li>
            </ul>
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
          <div class="sociales"><a href="#" class="fb"><img src="img/fb-mini.jpg"></a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>