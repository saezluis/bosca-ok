<?php
// Start the session
session_start();

// if counter is not set, set to zero
if(!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// if button is pressed, increment counter
if(isset($_POST['cotizar_prod'])) {
    ++$_SESSION['counter'];
}    
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Productos / Bosca</title>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!--
<script src="main2.js"></script>
-->
<script src="sass/tema/js/scripts.js"></script>
<script src="owl-carousel/owl.carousel.min.js"></script>
<!--
<link rel="stylesheet" href="main2.css">
-->
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
        <div id="flags"><!--quitar esto para mostrar banderas de idioma-->
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
          <li class="menu__item"><a href="#" class="menu__link">Preguntas frecuentes</a></li>
          <li class="menu__item"><a href="medio-ambiente.php" class="menu__link solo-movil">Medio Ambiente</a></li>
          <li class="menu__item"><a href="contacto.php" class="menu__link">Contacto</a></li>
        </ul>
      </div>
    </div>
  </header>
  <section class="grupo">
    <div class="caja no-padding">
      <div class="banner">
        <div id="owl-demo" class="owlcarousel owl-theme">
		<?php
			
			//<a class=\"delete\" href=\"eliminar-parrilla.php?id_send=",urlencode($id_parrilla)," \">$sku</a>
			//http://bosca.cl/detalle-producto.php?deta=101020008
			$id_pro = 101020008;
			echo "<div class=\"item\"> <a href=\"detalle-producto.php?deta=",urlencode($id_pro)," \"> <img src=\"img/banner-ecopellet.jpg\"> </a> </div>";
			/*
			$registrosBanners =	mysqli_query($conexion,"SELECT * FROM banners ORDER BY position ASC") or die("Problemas con la conexión");
			
			while($regBann=mysqli_fetch_array($registrosBanners)){
				$nombre_banner = $regBann['nombre'];
				$tipo_banner = $regBann['tipo'];
				$link_banner = $regBann['link'];
				
				if($tipo_banner=='vacio'){
					echo "<div class=\"item\"><img src=\"img/$nombre_banner\"></div>";
				}
				
				if($tipo_banner=='link'){
					echo "<form method=\"post\" action=\"$link_banner\">";
					echo "<input type=\"text\" name=\"opcion\" value=\"valor1\" hidden=hidden >";		  
					echo "<div class=\"item\"> <a href=\"#\" onclick=\"$(this).closest('form').submit()\"> <img src=\"img/$nombre_banner\"> </a> </div>";
					echo "</form>";
				}
				
			}
			*/
          //echo "<div class=\"item\"><img src=\"img/banner-asombra3.jpg\"></div>";
          //$var = 'valor3';
		
		  //echo "<div class=\"item\"> <a href=\"#\" onclick=\"$(this).closest('form').submit()\"> <img data-src=\"img-pt/$foto\" title=\"$modelo\" class=\"lazyOwl\"> </a></div>";	
		
		  //echo "<div class=\"item\"><img src=\"img/banner-terraza.jpg\"></div>";
		?>
        </div>
      </div>
    </div>
  </section>
  <section class="grupo">
    <div class="caja">
      <div id="logos_juntos_home"><img src="img/logos-juntos.png"></div>
    </div>
  </section>
  <section class="grupo">
    <div class="caja movil-50 tablet-70 web-80">
      <div class="buscar">
		<form method="post" action="buscador.php">
			<input name="palabra_clave" type="search" placeholder="buscar">
			<button type="submit" class="search--buscar">buscar</button>
		</form>
      </div>
    </div>
    <div class="caja movil-50 tablet-30 web-20">
      <div id="cotizar">
        <p class="cotizaciones"><a href="cotizacion.php"> Cotizaciones </a> <span class="numero--items"> <?php echo $_SESSION['counter']; ?> </span>ítems</p>
      </div>
    </div>
  </section>
  <section class="grupo margen-top">
    <div class="caja base-100 movil-50 tablet-50 web-50">
      <div class="imagenes">
        <div class="imagen---item">
          <div class="container-a4">
            <ul class="caption-style-4">
              <li><img src="img/calefaccion.png">
                <p class="cinta">Calefacción</p>
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text"><a href="calefaccion.php" class="see">Ver</a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="caja base-100 movil-50 tablet-50 web-50">
      <div class="imagenes">
        <div class="imagen---item">
          <div class="container-a4">
            <ul class="caption-style-4">
              <li><img src="img/terrazas.png">
                <p class="cinta">Terraza y parrilla</p>
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text"><a href="terraza-parrilla.php" class="see">Ver</a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="caja base-100 movil-50 tablet-50 web-50">
      <div class="imagenes">
        <div class="imagen---item">
          <div class="container-a4">
            <ul class="caption-style-4">
              <li><img src="img/cocina.png">
                <p class="cinta">Cocina y calderas</p>
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text"><a href="cocina-calderas.php" class="see">Ver</a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="caja base-100 movil-50 tablet-50 web-50">
      <div class="imagenes">
        <div class="imagen---item">
          <div class="container-a4">
            <ul class="caption-style-4">
              <li><img src="img/ventilacion.jpg">
                <p class="cinta">Ventilación y aire acondicionado</p>
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text"><a href="ventilacion.php" class="see">Ver</a></div>
                </div>
              </li>
            </ul>
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
              <input type="email" name="email" value="" placeholder="Ingresa mail" class="format_input">
            </li>
            <li>
              <button type="submit" onclick="return(validarmail())" class="enviarMail">Suscríbete ahora</button>
            </li>
          </ul>
        </form>
      </div>
      <div class="caja movil-50 auxT">
        <p class="servicioCliente">Servicio al cliente <a href="tel:+56 800200657" class="telF">800 200 657</a></p>
        <p class="direccion">Av. Américo Vespucio 2077, Huechuraba, Santiago.</p>
        <div class="sociales">
        	<a href="https://www.facebook.com/boscachile" class="fb" target="_blank"><img src="img/fb-mini.jpg"></a>
        </div>
        <div class="sociales-boleta">
          <a href="http://boleta.bosca.cl/" class="boleta" target="_blank">Ir Boleta Electrónica</a>
        </div>
      </div>
    </div>
  </footer>  
	
	<!--
	<div id="boxes">
	  <div style="display: none; position:relative;" id="dialog" class="window centrado-porcentual"> 
			<!--
			<h1>Súbete al programa donde todos crecemos, siguiendo estas indicaciones.</h1>
				<div id="lorem">
					<ul class="lista-pop">
						<li>Ingresa tu rut sin puntos ni dígito verificador.</li>
						<li>*ingresa tu clave (tres últimos dígitos de tu rut)</li>
					</ul>
				</div>
				
				<div class="grupo">
				  <div class="imgCupon">
					<div class="caja base-100 tablet-100">
					  <div class="pro-l"><img src="img/logo--3.png" alt=""></div>
					</div>
					<div class="caja base-100 tablet-100">
					  <p class="comunicado">
                Lamentamos mucho informarles que, debido a un problema entre la empresa a la que arrendamos, la sucursal de Av. Vitacura 9085 y la Ilustre Municipalidad de Vitacura, el local ha sido momentáneamente clausurado. 
                Al no ser por un problema de BOSCA, tenemos que esperar que los responsables hagan las gestiones necesarias para que podamos volver a atender a nuestros clientes en nuestro tradicional local de ventas.<br>
                De todas maneras, los invitamos a acercarse a nuestros locales de Avenida Americo Vespucio 2077 (Huechuraba), nuestro local en Casa Nororiente (Acceso lateral, Chicureo) o bien a contactarnos en <a class="mailto" href="mailto:ventas@bosca.cl" target="_top">ventas@bosca.cl</a> En caso de necesitar cualquier producto o servicio, estaremos encantados de atenderlos.
                Muchos saludos a todos y todas.
            </p>
<!-- 					  <div class="texti-L"><img src="img/texto-light.png" alt=""><a href="img/cupon.jpg" target="_blank" class="getCupon">¡Lo quiero!</a></div> 
					</div>
				  </div>
				</div>
				
				
				
				<a href="#" class="close close-imagenes">X</a>
				
		</div>
				<div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
	</div>
	-->
  
</body>
</html>