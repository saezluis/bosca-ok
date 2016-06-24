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
    <link rel="stylesheet" href="js/tab-res/jQueryTab.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/tab-res/animation.css" type="text/css" media="screen" />
	
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
<!--             <ul class="tabs">
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
                 
                </div>
              </li>
              <li class="font-t">
                <input id="tab2" type="radio" name="tabs">
                <label for="tab2">Nuevas Campañas</label>
                <div id="tab-content2" class="tab-content">
                  <h3 class="font-lena">Falta contenido</h3>
                  
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
                 
                </div>
              </li>
            </ul> -->
            <div class="tabs-7">
              <ul class="tabsMedio">
                    <li><a href="#tab25">Certificaciones ambientales</a></li>
                    <li><a href="#tab26">Nuevas Campañas</a></li>
                    <li><a href="#tab27">Combatiendo la contaminación</a></li>
                </ul>
              <section class="tab_content_wrapper">
                    <article class="tab_content" id="tab25">
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
                    </article>
                    <article class="tab_content" id="tab26">
					<!--
                      <h3 class="font-lena">Muy pronto tendremos novedades.</h3>
					  -->
					 <div align="center"> <img src="img/logo_copy.png" height="300" width="300"></div>
					  <p>En Bosca Chile estamos enfocados en ofrecer un servicio de calidad, generando el mínimo efecto secundario al medio ambiente. 
					  En pro de llevar más allá nuestro compromiso ambiental, creamos la campaña digital “Ponle un Sello Verde a este invierno”, que 
					  busca incentivar a la comunidad BOSCA a contribuir día a día con la disminución de daños ambientales que son causados por actividades 
					  cotidianas, por la simple razón de desconocer sus efectos dañinos.
					  </p>
						
					  <p>
						Entregando tips de ahorro de energía, reciclaje y otras buenas prácticas que se pueden aplicar tanto en el hogar como en el 
						entorno laboral, buscamos mantener a nuestra comunidad consciente de que con pequeños detalles se puede lograr un gran cambio. 

						Con esta campaña, BOSCA sigue afirmando su Sello Verde sobre el planeta.</p>
                    </article>
                    <article class="tab_content" id="tab27">
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
                    </article>
                    <article class="tab_content" id="tab28">
                        <p>Contact erat pugnabant diffundi pondere temperiemque. Sole liquidas emicuit mundo pro secant. <a href="#tab1">Contact</a> aer nuper habentem tum in. Secant origine inposuit diverso zonae nubes nulli mundum sectamque.</p>
                        <p>Contact animalibus circumfluus ignea fert. Undas instabilis coercuit porrexerat. Uno legebantur plagae coeptis. Tanta opifex margine locis omnia obsistitur dispositam sublime erant. Fixo ubi mutatas tuba.</p>
                    </article>
                </section>
            </div>
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
    <script src="js/tab-res/jQueryTab.js"></script>
    <script type="text/javascript">
    
      $('.tabs-7').jQueryTab({
          initialTab:1,
          tabInTransition: 'fadeIn',
          tabOutTransition: 'fadeOut',
          cookieName: 'active-tab-7'  
      });
     
    </script>
  </body>
</html>