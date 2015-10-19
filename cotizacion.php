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
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="sass/tema/js/scripts.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="sass/tema/js/jquery.isotope.js"></script>
  </head>
  <body>
  
  <?php
    
	$tope = @$_SESSION['tope'];
	
	$cotizar_esto = array();	
	$k = 0;	
    for ($i = 0 ; $i <= $tope ; $i ++) {		
		if(empty($_SESSION['items'][$i]['Detalle'])){
			$nada = 0;
		}else{			
			//echo "Este SKU lleva producto ".$_SESSION['items'][$i]['Detalle'];
			//echo "<br>";
			$pro = $_SESSION['items'][$i]['Detalle'];
			//$cotizar_esto[] = array('productoCotizar' => $pro);
			$cotizar_esto[] = $pro;
			//$k = $k + 1;
			$tamano_cotizar = count($cotizar_esto);
		}			
	}
	
	/*	
	foreach ($cotizar_esto as $value) {
    echo gettype($value), "\n";
	}		
	*/
	
	$newArray = array_count_values($cotizar_esto);
	
	$Arreglo_productos = array();
	$Arreglo_cantidades = array();

	foreach ($newArray as $key => $value) {
        echo "$key - <strong>$value</strong> <br />"; 
		
		$Arreglo_productos[] =  $key;
		$Arreglo_cantidades[] = $value;
		
		//echo "Cargo en teoria";
	}
	
	$tamano_nombres = count($Arreglo_productos);

	/*
	echo "<br>";
	echo "Tamano del array sin repetidos: ".$tamano_nombres;
	echo "<br>";
	echo "<br>";
	
	
	for ($i = 0 ; $i < $tamano_nombres ; $i ++) {		
		echo "Nombre: ".$Arreglo_productos[$i]." Ocurrencias: ".$Arreglo_cantidades[$i];
		echo "<br>";
	}
		
	
	echo "<br>";
	echo "tamaño del cotizar: ".$tamano_cotizar;
	echo "<br>";
	
	for ($i= 0; $i < $tamano_cotizar; $i++){
		echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i];
	}
	*/
	
	
	
	
	//Aqui se destruyen todas la variables de sesion	
	session_unset(); 
	
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
          <h1><a href="index.html" class="logo_m">ir al inicio</a></h1>
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
            <li class="menu__item"><a href="index.html" class="menu__link activ">Productos</a></li>
            <li class="menu__item"><a href="nosotros.html" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="encuentranos.html" class="menu__link">Encuéntranos</a></li>
            <li class="menu__item"><a href="registra-tu-bosca.html" class="menu__link">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.html" class="menu__link">Servicio técnico</a></li>
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
    <section class="grupo margen-top">
      <div class="caja">
        <div class="cotizacion">
          <div class="side--left">
            <h3 class="titulo--cotizacion">Cotización</h3>
            <p class="sub--item">Nº ítems <?php echo @$tamano_cotizar; ?></p>
            <div class="cotizacion--B">
			
			  <!-- Aqui se construyen las cotizaciones -->	
			  
			  <?php
				
				$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				$total = 0;
				//Voy a realizar aqui cambios
				
				for ($i= 0; $i < $tamano_nombres; $i++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$i];
					$cantidad_productos = $Arreglo_cantidades[$i];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registro=mysqli_query($conexion,"select * from producto where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registro)){
					
						$foto = $reg['foto_producto'];	
						$ventaja_comparativa = $reg['ventaja_comparativa'];	
						
						$precio = $reg['precio'];	
						//echo "Precio: ".$precio;
						
						$nombre = $reg['nombre'];	
						$modelo = $reg['modelo'];	
						
						$potencia = $reg['potencia'];	
						$area = $reg['rango_calefaccion'];	
						$dimension = $reg['dimensiones'];	
						$diametro = $reg['diametro_canon'];	
						$garantia = $reg['garantia'];	
						$sku = $reg['sku'];	
						
						echo "<div class=\"items--cotizacion\">";
							echo "<div class=\"bar--cotizacion\"><img height=\"134px\" width=\"120px\" src=\"img2/".$foto."\" class=\"box--borders\"></div>";
								echo "<div class=\"data--cotizacion\">";
									echo "<p class=\"nombre--item\">".$nombre."</p>";
									echo "<p class=\"nombre--modelo\">".$modelo."</p>";
									echo "<p class=\"cantidad\">".$cantidad_productos." Item</p>";
									echo "<p class=\"cantidad\">Precio unitario: $".number_format($precio,0, '.', '.')."</p>";
								echo "</div>";
						echo "</div>";
						
						$total = $total + ($precio * $cantidad_productos);
						
					}
				}
				
				//Aqui agrego los cambios para llegar a la informacion de Parrilla
				
				for ($i= 0; $i < $tamano_nombres; $i++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$i];
					$cantidad_productos = $Arreglo_cantidades[$i];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registro=mysqli_query($conexion,"select * from parrilla where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registro)){
					
						$foto = $reg['foto_producto'];	
						//$ventaja_comparativa = $reg['ventaja_comparativa'];	
						
						$precio = $reg['precio'];	
						//echo "Precio: ".$precio;
						
						$nombre = $reg['nombre'];	
						$modelo = $reg['modelo'];	
						
						//$potencia = $reg['potencia'];	
						//$area = $reg['rango_calefaccion'];	
						//$dimension = $reg['dimensiones'];	
						//$diametro = $reg['diametro_canon'];	
						//$garantia = $reg['garantia'];	
						$sku = $reg['sku'];	
						
						echo "<div class=\"items--cotizacion\">";
							echo "<div class=\"bar--cotizacion\"><img height=\"134px\" width=\"120px\" src=\"img-pt/".$foto."\" class=\"box--borders\"></div>";
								echo "<div class=\"data--cotizacion\">";
									echo "<p class=\"nombre--item\">".$nombre."</p>";
									echo "<p class=\"nombre--modelo\">".$modelo."</p>";
									echo "<p class=\"cantidad\">".$cantidad_productos." Item</p>";
									echo "<p class=\"cantidad\">Precio unitario: $".number_format($precio,0, '.', '.')."</p>";
								echo "</div>";
						echo "</div>";
						
						$total = $total + ($precio * $cantidad_productos);
						
					}
				}
				
				
		
				
			  
			  ?>
			  
			 <!--
			  
              <div class="items--cotizacion">
                <div class="bar--cotizacion"><img src="img/item--1.jpg" class="box--borders"></div>
                <div class="data--cotizacion">
                  <p class="nombre--item">Estufa a leña</p>
                  <p class="nombre--modelo">Ecoflame 360</p>
                  <p class="cantidad">1 ítem</p>
                </div>
              </div>
			  
              <div class="items--cotizacion">
                <div class="bar--cotizacion"><img src="img/item--1.jpg" class="box--borders"></div>
                <div class="data--cotizacion">
                  <p class="nombre--item">Estufa a leña</p>
                  <p class="nombre--modelo">Ecoflame 360</p>
                  <p class="cantidad">1 ítem</p>
                </div>
              </div>
			  
              <div class="items--cotizacion">
                <div class="bar--cotizacion"><img src="img/item--1.jpg" class="box--borders"></div>
                <div class="data--cotizacion">
                  <p class="nombre--item">Estufa a leña</p>
                  <p class="nombre--modelo">Ecoflame 360</p>
                  <p class="cantidad">1 ítem</p>
                </div>
              </div>
			  
			  -->
              
			  <div class="calculo--total">Total: $ <?php echo number_format($total,0, '.', '.'); ?></div>
            </div>
          </div>
          <div class="side--right">
            <div class="datos--comprador">
              <h3 class="titulo--comprador">Datos Comprador</h3>
              <form class="cotiza--usuario">
                <label>NOMBRE</label>
                <input type="text">
                <label>APELLIDO</label>
                <input type="text">
                <label>RUT</label>
                <input type="text">
                <label>TELÉFONO DE CONTACTO</label>
                <select name="select">
                  <option value="value1">Celular</option>
                  <option value="value2" selected="">Fijo</option>
                </select>
                <input type="text" class="box--tel">
                <label>MAIL</label>
                <input type="text">
                <label>DIRECCIÓN DE DESPACHO</label>
                <select name="select">
                  <option value="0" selected="selected">Región</option>
                  <option value="1">Tarapaca</option>
                  <option value="2">Antofagasta</option>
                  <option value="3">Atacama</option>
                  <option value="4">Coquimbo</option>
                  <option value="5">Valparaiso</option>
                  <option value="6">O'Higgins</option>
                  <option value="7">Maule</option>
                  <option value="8">Bio - Bio</option>
                  <option value="9">Araucania</option>
                  <option value="10">Los Lagos</option>
                  <option value="11">Aisen</option>
                  <option value="12">Magallanes Y Antartica</option>
                  <option value="13">Metropolitana</option>
                  <option value="14">Los Rios</option>
                  <option value="15">Arica y Parinacota</option>
                </select>
                <select name="select">
                  <option value="0" selected="selected">Ciudad</option>
                </select>
                <input type="text" placeholder="Calle" class="calle">
                <input type="text" placeholder="Número/depto." class="numero--dire">
                <label>ELIJA </label>
                <div class="caja base-20 no-padding">
                  <input type="radio" name="factura">Factura
                </div>
                <div class="caja base-80 no-padding">
                  <input type="radio" name="boleta">Boleta
                </div>
                <label>DIRECCIÓN DE ENVÍO DE BOLETA O FACTURA</label>
                <select name="select">
                  <option value="0" selected="selected">Región</option>
                  <option value="1">Tarapaca</option>
                  <option value="2">Antofagasta</option>
                  <option value="3">Atacama</option>
                  <option value="4">Coquimbo</option>
                  <option value="5">Valparaiso</option>
                  <option value="6">O'Higgins</option>
                  <option value="7">Maule</option>
                  <option value="8">Bio - Bio</option>
                  <option value="9">Araucania</option>
                  <option value="10">Los Lagos</option>
                  <option value="11">Aisen</option>
                  <option value="12">Magallanes Y Antartica</option>
                  <option value="13">Metropolitana</option>
                  <option value="14">Los Rios</option>
                  <option value="15">Arica y Parinacota</option>
                </select>
                <select name="select">
                  <option value="0" selected="selected">Ciudad</option>
                </select>
                <input type="text" placeholder="Calle" class="calle">
                <input type="text" placeholder="Número/depto." class="numero--dire">
                <label>DESEA INSTALACIÓN</label>
                <div class="caja base-50 no-padding">
                  <input type="radio" name="factura">Agregar instalación
                </div>
                <div class="caja base-50 no-padding">
                  <input type="radio" name="factura">Agregar despacho
                </div>
                
                <button class="print--cotizacion">imprimir cotización</button>
              </form>
            </div>
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