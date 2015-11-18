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
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hint.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="sass/tema/js/scripts.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="sass/tema/js/jquery.isotope.js"></script>
    <script src="sass/tema/js/jquery.elevatezoom.js"></script>
	
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
	
	//$detalle_producto = $_REQUEST['detalle_prod'];
	//echo "Esto trae como SKU: " .$detalle_producto; 
	
	$keyword = $_REQUEST['palabra_clave'];
	
	include_once 'config.php';
		
	 $conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registros=mysqli_query($conexion,"select * from producto where nombre like '%$keyword%' OR modelo like '%$keyword%'")
	or die("Problemas en el select:".mysqli_error($conexion));
	
	$registrosParrilla=mysqli_query($conexion,"select * from parrilla where nombre like '%$keyword%' OR modelo like '%$keyword%'")
	or die("Problemas en el select:".mysqli_error($conexion));
	
	$registrosAccParrilla=mysqli_query($conexion,"select * from accparrilla where nombre like '%$keyword%'")
	or die("Problemas en el select:".mysqli_error($conexion));
	
	$registrosCocinas=mysqli_query($conexion,"select * from cocinas where nombre like '%$keyword%'")
	or die("Problemas en el select:".mysqli_error($conexion));
	
	$registrosVentilacion=mysqli_query($conexion,"select * from ventilacion where nombre like '%$keyword%'")
	or die("Problemas en el select:".mysqli_error($conexion));
	
	/*
	if($reg=mysqli_fetch_array($registros)){
		$foto = $reg['foto_producto'];	
		$ventaja_comparativa = $reg['ventaja_comparativa'];	
		$precio = $reg['precio'];	
		$potencia = $reg['potencia'];	
		$area = $reg['rango_calefaccion'];	
		$dimension = $reg['dimensiones'];	
		$diametro = $reg['diametro_canon'];	
		$garantia = $reg['garantia'];			
	}
	*/
	
	//echo "Esto trae palabra clave: ".$_REQUEST['palabra_clave'];
	
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
    </div><a href="#" class="btn-compromiso">Compromiso verde<img src="img/compromiso-verde.jpg" alt=""></a>
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
            <li class="menu__item"><a href="index.php" class="menu__link activ">Productos</a></li>
            <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="encuentranos.php" class="menu__link">Encuéntranos</a></li>
            <li class="menu__item"><a href="registra-tu-bosca.php" class="menu__link">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link">Servicio técnico</a></li>
            <li class="menu__item"><a href="preguntas-frecuentes.html" class="menu__link">Preguntas frecuentes</a></li>
            <li class="menu__item"><a href="medio-ambiente.php" class="menu__link solo-movil">Medio Ambiente</a></li>
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
		
    <div class="caja movil-100">
      <h4>Hemos encontrado:</h4>
        <div id="find">
          <ul>
		  
			
			<?php			
				while($reg=mysqli_fetch_array($registros)){					
					$var = $reg['sku'];					
					echo "<li>";
					echo "<a href=\"detalle-producto.php?deta=",urlencode($var)," \"> <img src=\"img2/".$reg['foto_producto']." \"></a> ";
					echo "<a href=\"detalle-producto.php?deta=",urlencode($var)," \">".$reg['nombre']." ".$reg['modelo']."</a>";					
					echo "</li>";
					
				}
				
				while($reg=mysqli_fetch_array($registrosParrilla)){				
					$var = $reg['sku'];				
					echo "<li>";
					echo "<a href=\"detalle-parrilla.php?deta=",urlencode($var)," \"> <img src=\"img-pt/".$reg['foto_producto']." \"></a>";
					echo "<a href=\"detalle-parrilla.php?deta=",urlencode($var)," \">".$reg['nombre']." ".$reg['modelo']."</a>";									
					echo "</li>";
				}
				
				while($reg=mysqli_fetch_array($registrosCocinas)){				
					$var = $reg['sku'];				
					echo "<li>";
					echo "<a href=\"detalle-cocina.php?deta=",urlencode($var)," \"> <img src=\"img-cc/".$reg['foto_producto']." \"></a>";
					echo "<a href=\"detalle-cocina.php?deta=",urlencode($var)," \">".$reg['nombre']." ".$reg['modelo']."</a>";									
					echo "</li>";
				}
				
				while($reg=mysqli_fetch_array($registrosVentilacion)){				
					$var = $reg['sku'];	
					echo "<li>";
					echo "<a href=\"detalle-ventilacion.php?deta=",urlencode($var)," \"> <img src=\"img-ac/".$reg['foto_producto']." \"></a>";
					echo "<a href=\"detalle-ventilacion.php?deta=",urlencode($var)," \">".$reg['nombre']." ".$reg['modelo']."</a>";									
					echo "</li>";
			}
				
			?>
			
            
   
          </ul>
        </div>
      </div>
	  
	  
      <div class="caja movil-60">				
      </div>

    </section>
	
    <div id="sep"></div>
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
        <div class="sociales"><a href="https://www.facebook.com/boscachile" class="fb" target="_blank"><img src="img/fb-mini.jpg"></a>
        </div>
      </div>
    </div>
    </footer>
  </body>
</html>
<script>$("#zoom_01").elevateZoom({zoomWindowPosition: "demo-container", zoomWindowHeight: 500, zoomWindowWidth:630, borderSize: 0, easing:true, cursor:"crosshair"});</script>
<script language="JavaScript">
  function muestra_oculta(id){
  if (document.getElementById){
  var el = document.getElementById(id);
  el.style.display = (el.style.display == 'none') ? 'block' : 'none';
  }
  }
  window.onload = function(){
  muestra_oculta('contenido_a_mostrar');
  }
  
  
  
  
  
  
  				
</script>