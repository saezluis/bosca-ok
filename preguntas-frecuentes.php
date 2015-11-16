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
	
	$registrosCalefactores=mysqli_query($conexion,"select * from manuales where tipo_producto = 'Calefactor electrico'")or die("Problemas en el select:".mysqli_error($conexion));
	$registrosPellet=mysqli_query($conexion,"select * from manuales where tipo_producto = 'Estufas Pellet'")or die("Problemas en el select:".mysqli_error($conexion));
	$registrosLena=mysqli_query($conexion,"select * from manuales where tipo_producto = 'Estufas leña'")or die("Problemas en el select:".mysqli_error($conexion));
	$registrosCalderas=mysqli_query($conexion,"select * from manuales where tipo_producto = 'Calderas'")or die("Problemas en el select:".mysqli_error($conexion));
	
	$registrosUsarBosca=mysqli_query($conexion,"select * from usarbosca")or die("Problemas en el select:".mysqli_error($conexion));
	$registrosFaq=mysqli_query($conexion,"select * from faq")or die("Problemas en el select:".mysqli_error($conexion));
	
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
            <li class="menu__item"><a href="preguntas-frecuentes.php" class="menu__link activ">Preguntas frecuentes</a></li>
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
      <div id="todo">
        <div class="caja movil-30">
          <div class="side--we">
            <h2>Cómo usar tu Bosca</h2>
          </div>
        </div>
        <div class="caja movil-70">
          <div class="side-ellos">
            <div class="accordion">
				
              <div class="accordion-section"><a href="#accordion-1" class="accordion-section-title">Revisa los manuales de uso de nuestros modelos</a></div>
			  
              <div id="accordion-1" class="accordion-section-content">
                <div class="use--bosca">
                  <div class="caja base-25 tablet-50 web-25 no-padding">
                    <div class="col--use--bosca">
                      <h1>Calefactores eléctricos</h1>
                      <div class="lista--links">
                        <ul>
						  <?php
						  while($reg=mysqli_fetch_array($registrosCalefactores)){
							$nombre_manual = $reg['nombre_manual'];  
							echo "<li><a href=\"manuales\\$nombre_manual\">".$reg['nombre_producto']."</a></li>";
						  }	
						  ?>
						  <!--
                          <li><a href="#">ECO NEGRO</a></li>
                          <li><a href="#">ECO MADERA</a></li>
                          <li><a href="#">360°</a></li>
                          <li><a href="#">Montable</a></li>
                          <li><a href="#">Mesa calefactora</a></li>
                          <li><a href="#">Free Standing</a></li>
						  -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="caja base-25 tablet-50 web-25 no-padding">
                    <div class="col--use--bosca borde-r-t">
                      <h1>Estufas pellet</h1>
                      <div class="lista--links">
                        <ul>
						  <?php
						  while($reg=mysqli_fetch_array($registrosPellet)){
							$nombre_manual = $reg['nombre_manual'];  
							echo "<li><a href=\"manuales\\$nombre_manual\">".$reg['nombre_producto']."</a></li>";
						  }	
						  ?>
						  <!--
                          <li><a href="#">ECO Pellet 360°</a></li>
                          <li><a href="#">Calef. de Pasillo</a></li>
                          <li><a href="#">Chimenea Pellet</a></li>
                          <li><a href="#">Montable</a></li>
                          <li><a href="#">ADDA 10</a></li>
                          <li><a href="#">Hidro 18</a></li>
                          <li><a href="#">Hidro 22 </a></li>
						  -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="caja base-25 tablet-50 web-25 no-padding">
                    <div class="col--use--bosca">
                      <h1>Estufas leña</h1>
                      <div class="lista--links">
                        <ul>
						  <?php
						  while($reg=mysqli_fetch_array($registrosLena)){
							$nombre_manual = $reg['nombre_manual'];  
							echo "<li><a href=\"manuales\\$nombre_manual\">".$reg['nombre_producto']."</a></li>";
						  }	
						  ?>
						  <!--
                          <li><a href="#">ECO FLAME 360°</a></li>
                          <li><a href="#">Línea Limit</a></li>
                          <li><a href="#">Línea ECO</a></li>
                          <li><a href="#">Línea multibosca</a></li>
                          <li><a href="#">Estufas Xeoos</a></li>
						  -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="caja base-25 tablet-50 web-25 no-padding">
                    <div class="col--use--bosca yes-border-r">
                      <h1>Calderas</h1>
                      <div class="lista--links">
                        <ul>
						  <?php
						  while($reg=mysqli_fetch_array($registrosCalderas)){
							$nombre_manual = $reg['nombre_manual'];  
							echo "<li><a href=\"manuales\\$nombre_manual\">".$reg['nombre_producto']."</a></li>";
						  }	
						  ?>	
						  <!--
                          <li><a href="#">DTH</a></li>
                          <li><a href="#">LAR</a></li>
                          <li><a href="#">GREDOS</a></li>
						  -->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>								
              </div>
            </div>
		
		
			
			<?php		
                $i=2;			
				while($reg=mysqli_fetch_array($registrosUsarBosca)){
					
				echo "<div class=\"accordion\">";
				echo "<div class=\"accordion-section\"><a href=\"#accordion-$i\" class=\"accordion-section-title\">".$reg['pregunta']."</a></div>";
				echo "<div id=\"accordion-$i\" class=\"accordion-section-content\">";
					echo "<div class=\"use--bosca\">";
					  echo "<ul>";
						echo "<p>Respuesta</p>";
						echo "<li>";
							echo "<p>";
								echo $reg['respuesta'];
							echo "</p>";
						echo "</li>";
					  echo "</ul>";
					echo "</div>";
				  echo "</div>";
				echo "</div>";
				$i++;
				}				
			?>            			
			
          
		  </div>
		</div>
		
		<div class="caja movil-30">
			  <div class="side--we">
				<h2>Preguntas Frecuentes</h2>
			  </div>
			</div>
			
		<div class="caja movil-70">
			 <div class="side-ellos">
        					 
            <?php		
                $k=6;			
				while($reg=mysqli_fetch_array($registrosFaq)){
					
				echo "<div class=\"accordion\">";
				echo "<div class=\"accordion-section\"><a href=\"#accordion-$k\" class=\"accordion-section-title\">".$reg['pregunta']."</a></div>";
				echo "<div id=\"accordion-$k\" class=\"accordion-section-content\">";
					echo "<div class=\"use--bosca\">";
					  echo "<ul>";
						echo "<p>Respuesta</p>";
						echo "<li>";
							echo "<p>";
								echo $reg['respuesta'];
							echo "</p>";
						echo "</li>";
					  echo "</ul>";
					echo "</div>";
				  echo "</div>";
				echo "</div>";
				$k++;
				}				
			?>
			       
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
                <input type="text" name="nombres"  placeholder="Ingresa nombre y apellido" class="format_input">
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