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
	
	//mysqli_close($conexion);
	
	?>
  
  
	<?php
	
	
	
	$registros_regioniii=mysqli_query($conexion,"select * from servicio where region = 'III region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regioniv=mysqli_query($conexion,"select * from servicio where region = 'IV region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionv=mysqli_query($conexion,"select * from servicio where region = 'V region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionvi=mysqli_query($conexion,"select * from servicio where region = 'VI region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionvii=mysqli_query($conexion,"select * from servicio where region = 'VII region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionviii=mysqli_query($conexion,"select * from servicio where region = 'VIII region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionix=mysqli_query($conexion,"select * from servicio where region = 'IX region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionx=mysqli_query($conexion,"select * from servicio where region = 'X region'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionmetro=mysqli_query($conexion,"select * from servicio where region = 'region metropolitana'") or die("Problemas en el select:".mysqli_error($conexion));	
	$registros_regionbosca=mysqli_query($conexion,"select * from servicio where region = 'bosca'") or die("Problemas en el select:".mysqli_error($conexion));
	$registros_regionxiv=mysqli_query($conexion,"select * from servicio where region = 'XIV region'") or die("Problemas en el select de xiv region".mysqli_error($conexion));
	
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
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link activ">Servicio técnico</a></li>
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
    <section class="grupo margen-top">
      <div id="todo">
        <div class="caja movil-30">
          <div class="side--we">
            <h2>Servicio Técnico</h2>
			<br>
            <p>Contamos con un equipo técnico especializado, distribuido a lo largo de todo Chile, con el que garantizamos un servicio de calidad y solución a todos los problemas que se presenten en tu Bosca.</p>
          </div>
        </div>
        <div class="caja movil-70">
          <div class="side-ellos">
			
			<div class="accordion">
              <div class="accordion-section"><a href="#accordion-1" class="accordion-section-title">Servicio Técnico Bosca</a></div>
              <div id="accordion-1" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regbosca=mysqli_fetch_array($registros_regionbosca))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regbosca['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regbosca['nombre'].".</span></li>";
							//echo "<li>Mail:<span>".$regmetro['mail']."</span></li>";
							echo "<li>Rut:<span>".$regbosca['rut']."</span></li>";
							//echo "<li>Teléfono:<span>".$regmetro['telefono']."</span></li>";
							echo "<li>Cargo:<span>".$regbosca['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
                
				
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-2" class="accordion-section-title">Servicio Técnico III Región</a></div>
              <div id="accordion-2" class="accordion-section-content">	
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regiii=mysqli_fetch_array($registros_regioniii))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regiii['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regiii['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regiii['mail']."</span></li>";
							echo "<li>Rut:<span>".$regiii['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regiii['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regiii['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
					}
				?>
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-3" class="accordion-section-title">Servicio Técnico IV Región</a></div>
              <div id="accordion-3" class="accordion-section-content">
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regiv=mysqli_fetch_array($registros_regioniv))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regiv['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regiv['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regiv['mail']."</span></li>";
							echo "<li>Rut:<span>".$regiv['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regiv['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regiv['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
					}
				?>                               
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-4" class="accordion-section-title">Servicio Técnico V Región</a></div>
              <div id="accordion-4" class="accordion-section-content">
                <!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regv=mysqli_fetch_array($registros_regionv))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regv['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regv['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regv['mail']."</span></li>";
							echo "<li>Rut:<span>".$regv['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regv['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regv['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>							
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-5" class="accordion-section-title">Servicio Técnico VI Región</a></div>
              <div id="accordion-5" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regvi=mysqli_fetch_array($registros_regionvi))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regvi['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regvi['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regvi['mail']."</span></li>";
							echo "<li>Rut:<span>".$regvi['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regvi['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regvi['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-6" class="accordion-section-title">Servicio Técnico VII Región</a></div>
              <div id="accordion-6" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regvii=mysqli_fetch_array($registros_regionvii))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regvii['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regvii['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regvii['mail']."</span></li>";
							echo "<li>Rut:<span>".$regvii['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regvii['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regvii['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-7" class="accordion-section-title">Servicio Técnico VIII Región</a></div>
              <div id="accordion-7" class="accordion-section-content">
			  
                <!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regviii=mysqli_fetch_array($registros_regionviii))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regviii['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regviii['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regviii['mail']."</span></li>";
							echo "<li>Rut:<span>".$regviii['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regviii['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regviii['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
			<div class="accordion">
              <div class="accordion-section"><a href="#accordion-8" class="accordion-section-title">Servicio Técnico IX Región</a></div>
              <div id="accordion-8" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regix=mysqli_fetch_array($registros_regionix))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regix['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regix['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regix['mail']."</span></li>";
							echo "<li>Rut:<span>".$regix['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regix['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regix['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
			
			<div class="accordion">
              <div class="accordion-section"><a href="#accordion-9" class="accordion-section-title">Servicio Técnico XIV Región</a></div>
              <div id="accordion-9" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regxiv=mysqli_fetch_array($registros_regionxiv))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regxiv['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regxiv['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regxiv['mail']."</span></li>";
							echo "<li>Rut:<span>".$regxiv['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regxiv['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regxiv['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-10" class="accordion-section-title">Servicio Técnico X Región</a></div>
              <div id="accordion-10" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regx=mysqli_fetch_array($registros_regionx))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regx['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regx['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regx['mail']."</span></li>";
							echo "<li>Rut:<span>".$regx['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regx['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regx['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
            <div class="accordion">
              <div class="accordion-section"><a href="#accordion-11" class="accordion-section-title">Servicio Técnico Región Metropolitana </a></div>
              <div id="accordion-11" class="accordion-section-content">
                
				<!-- Esto deberia ir dentro del while para generar tantos tecnicos como consiga -->	
				<?php
					while ($regmetro=mysqli_fetch_array($registros_regionmetro))
					{
						echo "<div class=\"all--tec\">";
						  echo "<div class=\"foto--tecnico\"><img src=\"img-tecnicos/".$regmetro['foto']."\"></div>";
						  echo "<ul>";
							echo "<li>Nombre:<span>".$regmetro['nombre'].".</span></li>";
							echo "<li>Mail:<span>".$regmetro['mail']."</span></li>";
							echo "<li>Rut:<span>".$regmetro['rut']."</span></li>";
							echo "<li>Teléfono:<span>".$regmetro['telefono']."</span></li>";
							echo "<li>Dirección:<span>".$regmetro['direccion'].".</span></li>";
						  echo "</ul>";
						echo "</div>";
						echo "<hr>";
					}
				?>
				
              </div>
            </div>
			
            
			
          </div>
        </div>
      </div>
    </section>
    <footer id="footer">
      <div class="grupo">
        <div class="caja movil-50">
          <form name="mailing" method="post"  class="contact_form">
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