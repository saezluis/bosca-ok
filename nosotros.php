<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Productos / Bosca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="sass/tema/js/scripts.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="sass/tema/js/jquery.timelinr-0.9.54.js"></script>
	
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
            <li class="menu__item"><a href="nosotros.php" class="menu__link activ">Nosotros</a></li>
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
      <div class="caja">
		<?php
			include "logosMarcas.php";
		?>
      </div>
    </section>
    <section class="grupo margen-top">
      <div id="todo">
        <div class="caja movil-30">
          <div class="side--we border-rigth">
            <h2>Nosotros</h2>
            <p>
              Empresa fundada en 1985, revolucionando
              el sistema de calefacción a leña en Chile, 
              posicionandose desde sus inicios como un 
              referente para el mercado.
            </p>
            <p>¿Que significa Bosca?</p>
            <div class="wtis"><img src="img/logo--bosca.jpg"></div>
          </div>
        </div>
        <div class="caja movil-70">
          <div class="side-ellos">
            <h2>Línea de tiempo</h2>
            <div id="timeline">
              <ul id="dates">
                <li><a href="#1985">1985</a></li>
                <li><a href="#1986">1986</a></li>
                <li><a href="#1988">1988</a></li>
                <li><a href="#1994">1994</a></li>
                <li><a href="#1998">1998	</a></li>
                <li><a href="#1999">1999</a></li>
                <li><a href="#2006">2006</a></li>
                <li><a href="#2014">2014</a></li>
                <li><a href="#2015">2015	</a></li>
              </ul>
              <ul id="issues">
                <li id="1985"><div><img src="img/timeline/bosca-mini.jpg"></div>
                  <p>Se funda Bosca con la sociedad de Chilenos y neozelandeses. Los calefactores fueron importados en su totalidad desde Nueva Zelanda.</p>
                </li>

                <li id="1986"><div><img src="img/timeline/solartech-mini.jpg"></div>
                  <p>Marca de Toldos que se posiciona bajo el alero de Bosca. Con productos de fabricación nacional que abastecen necesidades de primavera / verano a sus clientes.</p>
                </li>
                <li id="1988"><div><img src="img/timeline/traspaso-mini.jpg"></div>
                  <p>Traspaso de la totalidad de la marca a la familia Ossandon. Los calefactores pasan a ser fabricados en Chile.Traduciendo como beneficio al consumidor,los precios más competitivos de la industria	</p>
                </li>
                <li id="1994"><div><img src="img/timeline/multitiendas-mini.jpg"></div>
                  <p>Expansión de la marca a mercados mayoristas.</p>
                </li>
                <li id="1998"><div><img src="img/timeline/hergome-mini.jpg"></div>
                  <p>Alianza con Hergom (España), siendo Bosca la única marca representante en Chile.</p>
                </li>
                <li id="1999"><div><img src="img/timeline/mundo-mini.jpg"></div>
                  <p>Los productos comienzan a ser exportados a más de 10 países en el mundo.</p>
                </li>
                <li id="2006"><div><img src="img/timeline/bosca_industrial-mini.jpg"></div>
                  <p>Bosca introduce a Chile el concepto de calefacción a pellet, siendo los primeros en fabricar un calefactor a pellet en el país.</p>
                </li>
                <li id="2014"><div><img src="img/timeline/bosca_climastar-mini.jpg"></div>
                  <p>Se expande nuestra planta de producción, incorporando nuevas tecnologías al proceso de fabricación. Paralelo se consolida una nueva área de servicios Industriales de Bosca.</p>
                </li>
                <li id="2015"><div><img src="img/timeline/bosca_climastar-mini.jpg"></div>
                  <p>Bosca lanza Eco Flame 360, calefactor con tecnología de llama invertida. Al mismo tiempo se lanza la Eco Pellet 360. A mediados del presente año, Bosca obtiene la representación exclusiva de Climastar en Chile.</p>
                </li>
              </ul>
              <div id="grad_left"></div>
              <div id="grad_right"></div><a id="next" href="#">+											</a><a id="prev" href="#">-</a>
            </div>
            <div id="quehay">
              <h2>En la actualidad</h2>
              <div class="filas"><img src="img/timeline/bosca--logo.png">
                <ul>
                  <li>Calefacción</li>
                  <li>Parrillas</li>
                  <li>A/C</li>
                  <li>Ventiladores</li>
                  <li>Spa´s</li>
                  <li>Accesorios</li>
                </ul>
              </div>
              <div class="filas"><img src="img/timeline/hergom.png">
                <ul>
                  <li>Calderas</li>
                  <li>Cocinas</li>
                  <li>Calefactores</li>
                </ul>
              </div>
              <div class="filas"><img src="img/timeline/solar.png">
                <ul>
                  <li>Toldos</li>
                  <li>Protección solar para el hogar</li>
                  <li>A/C</li>
                  <li>Ventiladores</li>
                  <li>Spa´s</li>
                  <li>Accesorios</li>
                </ul>
              </div>
              <div class="filas"><a href="http://www.boscaindustrial.cl" target="_blank"><img src="img/timeline/industrial.png"></a>
                <ul>
                  <li>Servicios en acero</li>
                  <li>Corte Láser</li>
                  <li>Punzadora CNC</li>
                  <li>Corte Plasma</li>
                  <li>Plegadoras CNC</li>
                </ul>
              </div>
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
		  <div class="sociales-boleta">
          	<a href="http://boleta.bosca.cl/" class="boleta" target="_blank">Ir Boleta Electrónica</a>
         </div>
        </div>
      </div>
    </footer>
  </body>
</html>