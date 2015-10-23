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
    <!--
	<meta charset="utf-8">
-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
  </div><a href="#" class="btn-compromiso">Compromiso verde<img src="img/compromiso-verde.jpg" alt=""></a>
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
          <li class="menu__item"><a href="contacto.html" class="menu__link">Contacto</a></li>
        </ul>
      </div>
    </div>
  </header>
  <section class="grupo">
    <div class="caja no-padding">
      <div class="banner">
        <div id="owl-demo" class="owlcarousel owl-theme">
          <div class="item"><img src="img/bg_banner.jpg"></div>
          <div class="item"><img src="img/bg_banner.jpg"></div>
          <div class="item"><img src="img/bg_banner.jpg"></div>
          <div class="item"><img src="img/bg_banner.jpg"></div>
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
    <div class="caja">
      <div class="imagenes">
        <div class="imagen--item">
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
        <div class="imagen--item">
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
        <div class="imagen--item">
          <div class="container-a4">
            <ul class="caption-style-4">
              <li><img src="img/cocina.png">
                <p class="cinta">Cocina y calderas
                </p>
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text"><a href="cocina-calderas.php" class="see">Ver</a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="imagen--item">
          <div class="container-a4">
            <ul class="caption-style-4">
              <li><img src="img/ventilacion.png">
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
        <div class="sociales"><a href="#" class="fb"><img src="img/fb-mini.jpg"></a>
        </div>
      </div>
    </div>
  </footer>  
</body>
</html>