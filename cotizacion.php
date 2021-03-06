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
	<!--
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
	<script src="owl-carousel/owl.carousel.min.js"></script>
	-->
	
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	
	
	
	<!--
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	
	<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
	
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	-->
	
	
	
    <script src="sass/tema/js/scripts.js"></script>   
    <script src="sass/tema/js/jquery.isotope.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
	
	<script type="text/javascript">
	
	function FillBilling(f) {
			
			//Variables que traen el elemento desde el select
			//var s1=document.getElementById('regiones');
			//var s2=document.getElementById('regionesFactura');
			
			//var s3=document.getElementById('provincia');
			//var s4=document.getElementById('provinciaFactura');
			
			
			
			if(f.billingtoo.checked == true) {
				f.nombre_factura.value = f.nombre.value;
				f.rut_factura.value = f.rut.value;
				f.telefono_factura.value = f.telefono.value;
				f.calleFactura.value = f.calleDespacho.value;
				f.nroDptoFactura.value = f.nroDptoDespacho.value;
				//s2.value = s1.value; //aqui hago igual el select de 
				//s4.value = s3.value;
				//f.billingcity.value = f.shippingcity.value;
			}else{
				f.nombre_factura.value = "";
				f.rut_factura.value = "";
				f.telefono_factura.value = "";
				f.calleFactura.value = "";
				f.nroDptoFactura.value = "";
				//s2.value = "item1";
				//s4.value = "";
			}
		
		}
	
	$(document).ready(function() {
		
		$("#regiones").change(function() {
			var val = $(this).val();			
			if (val == "item1") {
				$("#provincia").html("<option value='test'>-- --</option>");
			} else if (val == "Tarapaca") {
				$("#provincia").html("<option value='Iquique'>Iquique</option><option value='Tamarugal'>Tamarugal</option>");
			} else if (val == "Antofagasta") {
				$("#provincia").html("<option value='Antofagasta'>Antofagasta</option><option value='El Loa'>El Loa</option><option value='Tocopilla'>Tocopilla</option>");
			} else if (val == "Atacama") {
				$("#provincia").html("<option value='Copiapó'>Copiapó</option><option value='Chañaral'>Chañaral</option><option value='Huasco'>Huasco</option>");
			} else if (val == "Coquimbo") {
				$("#provincia").html("<option value='Elqui'>Elqui</option><option value='Choapa'>Choapa</option><option value='Limarí'>Limarí</option>");
			} else if (val == "Valparaiso") {
				$("#provincia").html("<option value='Valparaíso'>Valparaíso</option><option value='Isla de Pascua'>Isla de Pascua</option><option value='Los Andes'>Los Andes</option><option value='Petorca'>Petorca</option><option value='Quillota'>Quillota</option><option value='San Antonio'>San Antonio</option><option value='San Felipe de Aconcagua'>San Felipe de Aconcagua</option><option value='Marga Marga'>Marga Marga</option>");
			} else if (val == "OHiggins") {
				$("#provincia").html("<option value='Cachapoal'>Cachapoal</option><option value='Cardenal Caro'>Cardenal Caro</option><option value='Colchagua'>Colchagua</option>");
			} else if (val == "Maule") {
				$("#provincia").html("<option value='Talca'>Talca</option><option value='Cauquenes'>Cauquenes</option><option value='Curicó'>Curicó</option><option value='Linares'>Linares</option>");
			} else if (val == "Biobio") {
				$("#provincia").html("<option value='Concepción'>Concepción</option><option value='Arauco'>Arauco</option><option value='Biobío'>Biobío</option><option value='Ñuble'>Ñuble</option>");
			} else if (val == "Araucania") {
				$("#provincia").html("<option value='Cautín'>Cautín</option><option value='Malleco'>Malleco</option>");
			} else if (val == "LosLagos") {
				$("#provincia").html("<option value='Llanquihue'>Llanquihue</option><option value='Chiloé'>Chiloé</option><option value='Osorno'>Osorno</option><option value='Palena'>Palena</option>");
			} else if (val == "Aisen") {
				$("#provincia").html("<option value='Coihaique'>Coihaique</option><option value='Aisén'>Aisén</option><option value='Capitán Prat'>Capitán Prat</option><option value='General Carrera'>General Carrera</option>");
			} else if (val == "Antartica") {
				$("#provincia").html("<option value='Magallanes'>Magallanes</option><option value='Antártica Chilena'>Antártica Chilena</option><option value='Tierra del Fuego'>Tierra del Fuego</option><option value='Última Esperanza'>Última Esperanza</option>");
			} else if (val == "Metropolitana") {
				$("#provincia").html("<option value='Santiago'>Santiago</option><option value='Cordillera'>Cordillera</option><option value='Chacabuco'>Chacabuco</option><option value='Maipo'>Maipo</option><option value='Melipilla'>Melipilla</option><option value='Talagante'>Talagante</option>");
			} else if (val == "LosRios") {
				$("#provincia").html("<option value='Valdivia'>Valdivia</option><option value='Ranco'>Ranco</option>");
			} else if (val == "Arica") {
				$("#provincia").html("<option value='Arica'>Arica</option><option value='Parinacota'>Parinacota</option>");
			}
		});
		
		$("#regionesBoleta").change(function() {
			var val = $(this).val();			
			if (val == "item1") {
				$("#provinciaBoleta").html("<option value='test'>-- --</option>");
			} else if (val == "Tarapaca") {
				$("#provinciaBoleta").html("<option value='Iquique'>Iquique</option><option value='Tamarugal'>Tamarugal</option>");
			} else if (val == "Antofagasta") {
				$("#provinciaBoleta").html("<option value='Antofagasta'>Antofagasta</option><option value='El Loa'>El Loa</option><option value='Tocopilla'>Tocopilla</option>");
			} else if (val == "Atacama") {
				$("#provinciaBoleta").html("<option value='Copiapó'>Copiapó</option><option value='Chañaral'>Chañaral</option><option value='Huasco'>Huasco</option>");
			} else if (val == "Coquimbo") {
				$("#provinciaBoleta").html("<option value='Elqui'>Elqui</option><option value='Choapa'>Choapa</option><option value='Limarí'>Limarí</option>");
			} else if (val == "Valparaiso") {
				$("#provinciaBoleta").html("<option value='Valparaíso'>Valparaíso</option><option value='Isla de Pascua'>Isla de Pascua</option><option value='Los Andes'>Los Andes</option><option value='Petorca'>Petorca</option><option value='Quillota'>Quillota</option><option value='San Antonio'>San Antonio</option><option value='San Felipe de Aconcagua'>San Felipe de Aconcagua</option><option value='Marga Marga'>Marga Marga</option>");
			} else if (val == "OHiggins") {
				$("#provinciaBoleta").html("<option value='Cachapoal'>Cachapoal</option><option value='Cardenal Caro'>Cardenal Caro</option><option value='Colchagua'>Colchagua</option>");
			} else if (val == "Maule") {
				$("#provinciaBoleta").html("<option value='Talca'>Talca</option><option value='Cauquenes'>Cauquenes</option><option value='Curicó'>Curicó</option><option value='Linares'>Linares</option>");
			} else if (val == "Biobio") {
				$("#provinciaBoleta").html("<option value='Concepción'>Concepción</option><option value='Arauco'>Arauco</option><option value='Biobío'>Biobío</option><option value='Ñuble'>Ñuble</option>");
			} else if (val == "Araucania") {
				$("#provinciaBoleta").html("<option value='Cautín'>Cautín</option><option value='Malleco'>Malleco</option>");
			} else if (val == "LosLagos") {
				$("#provinciaBoleta").html("<option value='Llanquihue'>Llanquihue</option><option value='Chiloé'>Chiloé</option><option value='Osorno'>Osorno</option><option value='Palena'>Palena</option>");
			} else if (val == "Aisen") {
				$("#provinciaBoleta").html("<option value='Coihaique'>Coihaique</option><option value='Aisén'>Aisén</option><option value='Capitán Prat'>Capitán Prat</option><option value='General Carrera'>General Carrera</option>");
			} else if (val == "Antartica") {
				$("#provinciaBoleta").html("<option value='Magallanes'>Magallanes</option><option value='Antártica Chilena'>Antártica Chilena</option><option value='Tierra del Fuego'>Tierra del Fuego</option><option value='Última Esperanza'>Última Esperanza</option>");
			} else if (val == "Metropolitana") {
				$("#provinciaBoleta").html("<option value='Santiago'>Santiago</option><option value='Cordillera'>Cordillera</option><option value='Chacabuco'>Chacabuco</option><option value='Maipo'>Maipo</option><option value='Melipilla'>Melipilla</option><option value='Talagante'>Talagante</option>");
			} else if (val == "LosRios") {
				$("#provinciaBoleta").html("<option value='Valdivia'>Valdivia</option><option value='Ranco'>Ranco</option>");
			} else if (val == "Arica") {
				$("#provinciaBoleta").html("<option value='Arica'>Arica</option><option value='Parinacota'>Parinacota</option>");
			}
		});
		
		$("#regionesFactura").change(function() {
			var val = $(this).val();			
			if (val == "item1") {
				$("#provinciaFactura").html("<option value='test'>-- --</option>");
			} else if (val == "Tarapaca") {
				$("#provinciaFactura").html("<option value='Iquique'>Iquique</option><option value='Tamarugal'>Tamarugal</option>");
			} else if (val == "Antofagasta") {
				$("#provinciaFactura").html("<option value='Antofagasta'>Antofagasta</option><option value='El Loa'>El Loa</option><option value='Tocopilla'>Tocopilla</option>");
			} else if (val == "Atacama") {
				$("#provinciaFactura").html("<option value='Copiapó'>Copiapó</option><option value='Chañaral'>Chañaral</option><option value='Huasco'>Huasco</option>");
			} else if (val == "Coquimbo") {
				$("#provinciaFactura").html("<option value='Elqui'>Elqui</option><option value='Choapa'>Choapa</option><option value='Limarí'>Limarí</option>");
			} else if (val == "Valparaiso") {
				$("#provinciaFactura").html("<option value='Valparaíso'>Valparaíso</option><option value='Isla de Pascua'>Isla de Pascua</option><option value='Los Andes'>Los Andes</option><option value='Petorca'>Petorca</option><option value='Quillota'>Quillota</option><option value='San Antonio'>San Antonio</option><option value='San Felipe de Aconcagua'>San Felipe de Aconcagua</option><option value='Marga Marga'>Marga Marga</option>");
			} else if (val == "OHiggins") {
				$("#provinciaFactura").html("<option value='Cachapoal'>Cachapoal</option><option value='Cardenal Caro'>Cardenal Caro</option><option value='Colchagua'>Colchagua</option>");
			} else if (val == "Maule") {
				$("#provinciaFactura").html("<option value='Talca'>Talca</option><option value='Cauquenes'>Cauquenes</option><option value='Curicó'>Curicó</option><option value='Linares'>Linares</option>");
			} else if (val == "Biobio") {
				$("#provinciaFactura").html("<option value='Concepción'>Concepción</option><option value='Arauco'>Arauco</option><option value='Biobío'>Biobío</option><option value='Ñuble'>Ñuble</option>");
			} else if (val == "Araucania") {
				$("#provinciaFactura").html("<option value='Cautín'>Cautín</option><option value='Malleco'>Malleco</option>");
			} else if (val == "LosLagos") {
				$("#provinciaFactura").html("<option value='Llanquihue'>Llanquihue</option><option value='Chiloé'>Chiloé</option><option value='Osorno'>Osorno</option><option value='Palena'>Palena</option>");
			} else if (val == "Aisen") {
				$("#provinciaFactura").html("<option value='Coihaique'>Coihaique</option><option value='Aisén'>Aisén</option><option value='Capitán Prat'>Capitán Prat</option><option value='General Carrera'>General Carrera</option>");
			} else if (val == "Antartica") {
				$("#provinciaFactura").html("<option value='Magallanes'>Magallanes</option><option value='Antártica Chilena'>Antártica Chilena</option><option value='Tierra del Fuego'>Tierra del Fuego</option><option value='Última Esperanza'>Última Esperanza</option>");
			} else if (val == "Metropolitana") {
				$("#provinciaFactura").html("<option value='Santiago'>Santiago</option><option value='Cordillera'>Cordillera</option><option value='Chacabuco'>Chacabuco</option><option value='Maipo'>Maipo</option><option value='Melipilla'>Melipilla</option><option value='Talagante'>Talagante</option>");
			} else if (val == "LosRios") {
				$("#provinciaFactura").html("<option value='Valdivia'>Valdivia</option><option value='Ranco'>Ranco</option>");
			} else if (val == "Arica") {
				$("#provinciaFactura").html("<option value='Arica'>Arica</option><option value='Parinacota'>Parinacota</option>");
			}
		});
		
		$("#facturin").hide();

	});
	
	function mostrarFactura(){
		
		$("#facturin").toggle();
		
	}
	
	function ocultarFactura(){
		
		$("#facturin").hide();
		
	}
	
	
	function comentario(){
			alert('Su comentario fue recibido satisfactoriamente. Lo contactaremos a la brevedad.');
		}
	
	
	
	
	</script>
	
	
	
<meta name = "viewport" content = "user-scalable=no, width=device-width">
<meta name="apple-mobile-web-app-capable" content="yes" />	
	
<link href="css/style-flex.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

<script type="text/javascript">

$(window).load(function() {
    $("#flexiselDemo1").flexisel();
    $("#flexiselDemo2").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo3").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo4").flexisel({
        clone:false
    });
    
});
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
        //echo "$key - <strong>$value</strong> <br />"; 
		
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
	//session_unset(); 
	
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
            <li class="menu__item"><a href="index.php" class="menu__link activ">Productos</a></li>
            <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
            <li class="menu__item"><a href="encuentranos.php" class="menu__link">Encuéntranos</a></li>
            <li class="menu__item"><a href="registra-tu-bosca.php" class="menu__link">Garantiza tu Bosca</a></li>
            <li class="menu__item"><a href="servicio-tecnico.php" class="menu__link">Servicio técnico</a></li>
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
      <div class="caja">
        <div class="cotizacion">
          <div class="side--left">
            <h3 class="titulo--cotizacion">Cotización</h3>
            <p class="sub--item">Nº ítems <?php echo @$tamano_cotizar; ?></p>
            <div class="cotizacion--B">
			
			  <!-- Aqui se construyen las cotizaciones -->	
			  
			  <?php
				
				include_once 'config.php';
		
				$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				$total = 0;
				//Voy a realizar aqui cambios
				
				//Arreglo que va enviar los items a formato-cotizacion
				$_SESSION['calefa'] = array();
				$_SESSION['parri'] = array();
				$_SESSION['coci'] = array();
				$_SESSION['venti'] = array();
				$_SESSION['accParri'] = array();
				
				$_SESSION['accLena'] = array();
				
				
				for ($i = 0; $i < $tamano_nombres; $i++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$i];
					$cantidad_productos = $Arreglo_cantidades[$i];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registroProducto=mysqli_query($conexion,"select * from producto where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registroProducto)){
					
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
							echo "<div class=\"bar--cotizacion\"><img src=\"img2/".$foto."\" class=\"box--borders\"></div>";
								echo "<div class=\"data--cotizacion\">";
									echo "<p class=\"nombre--item\">".$nombre."</p>";
									echo "<p class=\"nombre--modelo\">".$modelo."</p>";
									echo "<p class=\"cantidad\">".$cantidad_productos." Item</p>";
									echo "<p class=\"cantidad\">Precio unitario: $".number_format($precio,0, '.', '.')."</p>";
								echo "</div>";
						echo "</div>";
						
						$total = $total + ($precio * $cantidad_productos);
						
						//Meto valores al array
						$_SESSION['calefa'][$i] = array('nombre' => $nombre,'modelo' => $modelo,'cantidad' => $cantidad_productos,'precio' => $precio,'sku' => $sku);
						
					}
				}
				
				//Aqui agrego los cambios para llegar a la informacion de Parrilla
				
				for ($k = 0; $k < $tamano_nombres; $k++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$k];
					$cantidad_productos = $Arreglo_cantidades[$k];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registroParri=mysqli_query($conexion,"select * from parrilla where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registroParri)){
					
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
						
						$_SESSION['parri'][$k] = array('nombre' => $nombre,'modelo' => $modelo,'cantidad' => $cantidad_productos,'precio' => $precio,'sku' => $sku);
						
					}
				}
				
				
				for ($h= 0; $h < $tamano_nombres; $h++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$h];
					$cantidad_productos = $Arreglo_cantidades[$h];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registroCoci=mysqli_query($conexion,"select * from cocinas where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registroCoci)){
					
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
							echo "<div class=\"bar--cotizacion\"><img height=\"134px\" width=\"120px\" src=\"img-cc/".$foto."\" class=\"box--borders\"></div>";
								echo "<div class=\"data--cotizacion\">";
									echo "<p class=\"nombre--item\">".$nombre."</p>";
									echo "<p class=\"nombre--modelo\">".$modelo."</p>";
									echo "<p class=\"cantidad\">".$cantidad_productos." Item</p>";
									echo "<p class=\"cantidad\">Precio unitario: $".number_format($precio,0, '.', '.')."</p>";
								echo "</div>";
						echo "</div>";
						
						$total = $total + ($precio * $cantidad_productos);
						
						$_SESSION['coci'][$h] = array('nombre' => $nombre,'modelo' => $modelo,'cantidad' => $cantidad_productos,'precio' => $precio,'sku' => $sku);
						
					}
				}
				
				
				for ($j= 0; $j < $tamano_nombres; $j++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$j];
					$cantidad_productos = $Arreglo_cantidades[$j];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registroVenti=mysqli_query($conexion,"select * from ventilacion where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registroVenti)){
					
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
							echo "<div class=\"bar--cotizacion\"><img height=\"134px\" width=\"120px\" src=\"img-ac/".$foto."\" class=\"box--borders\"></div>";
								echo "<div class=\"data--cotizacion\">";
									echo "<p class=\"nombre--item\">".$nombre."</p>";
									echo "<p class=\"nombre--modelo\">".$modelo."</p>";
									echo "<p class=\"cantidad\">".$cantidad_productos." Item</p>";
									echo "<p class=\"cantidad\">Precio unitario: $".number_format($precio,0, '.', '.')."</p>";
								echo "</div>";
						echo "</div>";
						
						$total = $total + ($precio * $cantidad_productos);
						
						$_SESSION['venti'][$j] = array('nombre' => $nombre,'modelo' => $modelo,'cantidad' => $cantidad_productos,'precio' => $precio,'sku' => $sku);
						
					}
				}
				
				for ($w= 0; $w < $tamano_nombres; $w++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$w];
					$cantidad_productos = $Arreglo_cantidades[$w];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registroAcc=mysqli_query($conexion,"select * from accparrilla where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registroAcc)){
					
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
						
						$_SESSION['accParri'][$w] = array('nombre' => $nombre,'modelo' => $modelo,'cantidad' => $cantidad_productos,'precio' => $precio,'sku' => $sku);
						
					}
				}
				
				
				for ($z= 0; $z < $tamano_nombres; $z++){
					
					//echo "Esto llevar el Array definitivo: ".$cotizar_esto[$i]['productoCotizar'];
					$detalle_producto = $Arreglo_productos[$z];
					$cantidad_productos = $Arreglo_cantidades[$z];
					
					//Con esta funcion elimino valores duplicados del array
					//(array_unique($a));
					
					$registroAccLena=mysqli_query($conexion,"select * from acclena where sku = '$detalle_producto'")or die("Problemas en el select:".mysqli_error($conexion));
	
					if($reg=mysqli_fetch_array($registroAccLena)){
					
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
							echo "<div class=\"bar--cotizacion\"><img height=\"134px\" width=\"120px\" src=\"img2/".$foto."\" class=\"box--borders\"></div>";
								echo "<div class=\"data--cotizacion\">";
									echo "<p class=\"nombre--item\">".$nombre."</p>";
									echo "<p class=\"nombre--modelo\">".$modelo."</p>";
									echo "<p class=\"cantidad\">".$cantidad_productos." Item</p>";
									echo "<p class=\"cantidad\">Precio unitario: $".number_format($precio,0, '.', '.')."</p>";
								echo "</div>";
						echo "</div>";
						
						$total = $total + ($precio * $cantidad_productos);
						
						$_SESSION['accLena'][$z] = array('nombre' => $nombre,'modelo' => $modelo,'cantidad' => $cantidad_productos,'precio' => $precio,'sku' => $sku);
						
					}
				}
		
				
			  
			  ?>			  			 
              
			  <div class="calculo--total">Total: $ <?php echo number_format($total,0, '.', '.'); ?></div>
            </div>
          </div>
          <div class="side--right">
            <div class="datos--comprador">
              <h3 class="titulo--comprador">Datos Comprador</h3>
              <form method="post" action="formato-cotizacion.php" class="cotiza--usuario">
			  
                <label>NOMBRE</label>
                <input name="nombre" type="text">
				
                <label>APELLIDO</label>
                <input name="apellido" type="text">
				
                <label>RUT</label>
                <input name="rut" type="text">
				
                <label>TELÉFONO DE CONTACTO</label>
                <select name="select">
                  <option value="value1">Celular</option>
                  <option value="value2" selected="">Fijo</option>
                </select>
                <input name="telefono" type="text" class="box--tel">
				
                <label>MAIL</label>
                <input name="email" type="text">
				
                <label>DIRECCIÓN DE DESPACHO</label>
                <select id="regiones" name="regionesDespacho" class="regiones">
                  <option value="item1" selected="selected">Región</option>
                  <option value="Tarapaca">Tarapaca</option>
                  <option value="Antofagasta">Antofagasta</option>
                  <option value="Atacama">Atacama</option>
				  <option value="Coquimbo">Coquimbo</option>
				  <option value="Valparaiso">Valparaíso</option>
				  <option value="OHiggins">O'Higgins</option>
				  <option value="Maule">Maule</option>
				  <option value="Biobio">Bio - Bio</option>
				  <option value="Araucania">Araucania</option>
				  <option value="LosLagos">Los Lagos</option>
				  <option value="Aisen">Aisén</option>
				  <option value="Antartica">Antartica y Magallanes</option>
				  <option value="Metropolitana">Metropolitana</option>
				  <option value="LosRios">Los Rios</option>
				  <option value="Arica">Arica y Parinacota</option>				  
                </select>
                <select id="provincia" name="provinciaDespacho" class="provincias">
                  <option value="">-- --</option>
                </select>
                <input type="text" name="calleDespacho" placeholder="Calle" class="calle">
                <input type="text" name="nroDptoDespacho" placeholder="Número/depto." class="numero--dire">
				
                <label>ELIJA </label>
                <div class="caja base-50 no-padding">
					<input type="radio" name="factura" value="boleta" onclick="ocultarFactura();">Boleta</div>                  
                <div class="caja base-50 no-padding">
					<input type="radio" name="factura" value="factura" onclick="mostrarFactura();">Factura</div>
				
				<!-- Datos factura, esto lo debo ocualtar y mostrar de acuerdo al radio Factura -->
				<div id="facturin" class="caja base-100 no-padding">
					
					<h3 class="titulo--comprador">Datos Factura:</h3>
					
					<input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)">					
					<em>Seleccione esta casilla si los "datos comprador" son iguales a los "datos factura"</em>
					
					<label>NOMBRE O RAZON SOCIAL</label>
					<input name="nombre_factura" type="text">
					
					<label>RUT</label>
					<input name="rut_factura" type="text">
					
					<label>DIRECCIÓN</label>
					<select id="regionesFactura" name="regionesFactura" >
						<option value="item1" selected="selected">Región</option>
						<option value="Tarapaca">Tarapaca</option>
						<option value="Antofagasta">Antofagasta</option>
						<option value="Atacama">Atacama</option>
						<option value="Coquimbo">Coquimbo</option>
						<option value="Valparaiso">Valparaíso</option>
						<option value="OHiggins">O'Higgins</option>
						<option value="Maule">Maule</option>
						<option value="Biobio">Bio - Bio</option>
						<option value="Araucania">Araucania</option>
						<option value="LosLagos">Los Lagos</option>
						<option value="Aisen">Aisén</option>
						<option value="Antartica">Antartica y Magallanes</option>
						<option value="Metropolitana">Metropolitana</option>
						<option value="LosRios">Los Rios</option>
						<option value="Arica">Arica y Parinacota</option>				  
					</select>
					<select id="provinciaFactura" name="provinciaFactura" >
						<option value="">-- --</option>
					</select>
					<input type="text" name="calleFactura" placeholder="Calle" class="calle">
					<input type="text" name="nroDptoFactura" placeholder="Número/depto." class="numero--dire">
					
					<label>TELÉFONO DE CONTACTO</label>
					<select name="select">
						<option value="value1">Celular</option>
						<option value="value2" selected="">Fijo</option>
					</select>
					<input name="telefono_factura" type="text" class="box--tel">
					
					<label>GIRO DEL NEGOCIO</label>
					<input name="giro_factura" type="text">
				
				</div>
				<!-- Datos factura, esto lo debo ocualtar y mostrar de acuerdo al radio Factura -->
				
				<div class="caja base-100 no-padding">
					<h4></h4>
				</div>
				
                <label>DIRECCIÓN DE ENVÍO DE BOLETA O FACTURA</label>
                <select id="regionesBoleta" name="regionesBoleta" class="regionesBoleta">
                  <option value="item1" selected="selected">Región</option>
                  <option value="Tarapaca">Tarapaca</option>
                  <option value="Antofagasta">Antofagasta</option>
                  <option value="Atacama">Atacama</option>
				  <option value="Coquimbo">Coquimbo</option>
				  <option value="Valparaiso">Valparaíso</option>
				  <option value="OHiggins">O'Higgins</option>
				  <option value="Maule">Maule</option>
				  <option value="Biobio">Bio - Bio</option>
				  <option value="Araucania">Araucania</option>
				  <option value="LosLagos">Los Lagos</option>
				  <option value="Aisen">Aisén</option>
				  <option value="Antartica">Antartica y Magallanes</option>
				  <option value="Metropolitana">Metropolitana</option>
				  <option value="LosRios">Los Rios</option>
				  <option value="Arica">Arica y Parinacota</option>
                </select>
                <select id="provinciaBoleta" name="provinciaBoleta" class="provinciaBoleta">
                  <option value="">-- --</option>
                </select>
                <input type="text" name="calleBoleta" placeholder="Calle" class="envio-calle">
                <input type="text" name="nroDptoBoleta" placeholder="Número/depto." class="envio-calle">
				
                <label>DESEA INSTALACIÓN</label>
                <div class="caja base-50 no-padding">
                  <input type="checkbox" name="instalacion"> Agregar instalación
                </div>
                <div class="caja base-50 no-padding">
                  <input type="checkbox" name="despacho"> Agregar despacho
                </div>
                
                <button type="submit" class="print--cotizacion">generar cotización</button>
              </form>
            </div>
          </div>
        </div>
        <div class="relacionados">
          <h5>Productos destacados</h5>
		  
					
			<ul id="flexiselDemo1"> 
				<li><img src="img/calefactor_1.jpg" /></li>
				<li><img src="img/calefactor_2.jpg" /></li>    
				<li><img src="img/calefactor_3.jpg" /></li>     
				<li><img src="img/calefactor_9.jpg" /></li> 
				<li><img src="img/calefactor_7.jpg" /></li>                                                          
			</ul>
			
			
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
          <div class="sociales"><a href="https://www.facebook.com/boscachile" class="fb" target="_blank"><img src="img/fb-mini.jpg"></a>
            
   
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
