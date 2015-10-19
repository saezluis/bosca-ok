<?php
// Start the session
session_start();
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
  </head>
  <body>
	<?php			
	
	//Contador de variables cada vez que la pagina refresca para construir el arreglo
	@$_SESSION["var"] = @$_SESSION["var"] + 1;
	$itemID = $_SESSION["var"];
	
	//echo "esto lleva itemID: ".$itemID; - PARA CONTROL -
	
	//Creo el arreglo de variables de sesion
	if (!isset($_SESSION['items'])) {
		$_SESSION['items'] = array();
	}
	
	//Agrego items cada vez que la pagina refresca y solo recibe SKU cuando el usuario presiona cotizar
	$_SESSION['items'][$itemID] = array('Detalle' => @$_REQUEST['cotizar_prod']);
	
	//Esto me trae la cantidad de valores en el arreglo
	$cantidad = count($_SESSION['items']);
	
	//Envio el total de valores del arreglo por variables de sesion
	$_SESSION['tope'] = $cantidad;
	
	//echo "esto lleva el array: ".$cantidad; - PARA CONTROL -
	
	//Aqui comienza la otra parte ------------------------------------------------------------------
	
	if(isset($_REQUEST['detalle_prod'])){
		$detalle_producto = $_REQUEST['detalle_prod'];
	}
	
	if(isset($_GET['deta'])){
		$detalle_producto = $_GET['deta'];
	}
	//echo "Esto trae como SKU: " .$detalle_producto; 
	//$compname = 
	
	
	$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registros=mysqli_query($conexion,"select * from producto where sku = '$detalle_producto'")
	or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registros)){
		$foto = $reg['foto_producto'];	
		$ventaja_comparativa = $reg['ventaja_comparativa'];	
		$precio = $reg['precio'];	
		$potencia = $reg['potencia'];	
		$area = $reg['rango_calefaccion'];	
		$dimension = $reg['dimensiones'];	
		$diametro = $reg['diametro_canon'];	
		$garantia = $reg['garantia'];	
		$sku = $reg['sku'];	
		
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
            <li class="menu__item"><a href="index.php" class="menu__link activ">Productos</a></li>
            <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="encuentranos.php" class="menu__link">Encuéntranos</a></li>
            <li class="menu__item"><a href="registra-tu-bosca.php" class="menu__link">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link">Servicio técnico</a></li>
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
          <p class="cotizaciones"> <a href="cotizacion.php"> Cotizaciones </a><span class="numero--items">15 </span>ítems</p>
        </div>
      </div>
    </section>
    <section class="grupo margen-top">
      <div class="caja movil-40">
        <div class="full--ficha">
          <div class="foto--producto-big"><img src="img2/<?php echo $foto; ?>" id="zoom_01" data-zoom-image="img/large/big.png">
            <div class="mini--sec"><img src="img/small-sellolimit360.gif" alt=""></div>
          </div>
          <div id="demo-container"></div>
        </div>
        <div class="icon-pretaciones">
          <input id="spoiler1" type="checkbox">
          <label for="spoiler1">Ver sello SEC</label>
          <div class="spoiler"> <img src="img/sello-limit360.gif" alt=""></div>
        </div>
      </div>
      <div class="caja movil-60">
        <div class="full--ficha-datos">
          <div class="logo-marca"><img src="img/mini-bosca.png"></div>
          <div class="caracteristicas--producto"><img src="img/ecoflame360.png">
            <p class="sku">SKU: <?php echo $sku; ?></p>
            <p class="resena"><?php echo $ventaja_comparativa; ?></p>
            <div class="box-in">
              <p class="total--precio">Precio</p>
              <p class="total--cash">$ <?php echo number_format($precio,0, '.', '.'); ?></p>			 
			 <!-- Las cotizaciones deberian enviar el SKU a un arreglo de variables de sesion 
				  cotizar_prod: lleva el SKU solo cuando el usuario presiona el boton cotizar
				  detalle_prod: lleva el SKU para que la pagina no pierda el valor cada vez que hay un refresh
			 -->			 
			 <form method="post">
			 <?php 
				echo "<button type=\"submit\" name=\"cotizar_prod\" value=\"$sku\">cotizar</button>";
				echo "<input type=\"text\" hidden=hidden  name=\"detalle_prod\" value=\"$sku\">";
			  ?>			  
			 </form> 
            </div>
          </div>
          <div class="caracteristicas--producto bor">
            <p class="caracteristicas--titulo">características		</p>
            <div class="caract--datos">
              <ul>
                <li>
                  <p class="carga">Carga:  <span class="datos--d">Tipo Superior</span></p>
                </li>
                <li>
                  <p class="potencia">Potencia:  <span class="datos--d"><?php echo $potencia; ?></span></p>
                </li>
                <li>
                  <p class="calefa">Á. Calefacción: <span class="datos--d"><?php echo $area; ?></span></p>
                </li>
                <li>
                  <p class="dimension">Dimensión: <span class="datos--d"><?php echo $dimension; ?>											</span></p>
                </li>
                <li>
                  <p class="diametro">Diámetro de cañon: <span class="datos--d"><?php echo $diametro; ?></span></p>
                </li>
                <li>
                  <p class="garantia">Garantía:  <span class="datos--d"><?php echo $garantia; ?></span><a href="#" class="pdf--condiciones">(ver condiciones)</a></p>
                </li>
              </ul>
            </div><a href="#" class="descarga--fichas">Descargar ficha técnica en pdf																																			</a><a href="#" class="descarga--fichas">Descargar manual de uso en pdf	</a>
          </div>
        </div>
        <div class="relacionados">
          <h5>productos relacionados</h5>
          <div id="owl-demo2" class="owlcarousel">
            <div class="item"><img data-src="img/p-relacionado1.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado2.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado1.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado2.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado1.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado2.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado1.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado2.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado1.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado2.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado1.jpg" class="lazyOwl"></div>
            <div class="item"><img data-src="img/p-relacionado2.jpg" class="lazyOwl"></div>
          </div>
        </div>
      </div>
    </section>
    <div id="sep"></div>
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
          <div class="sociales"><a href="#" class="fb"><img src="img/fb-mini.jpg"></a>
            
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