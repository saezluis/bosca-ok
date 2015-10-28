<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Cotización / Bosca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="sass/tema/js/scripts.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <style>
      @media print{
      	#print ul li{
      		font-size:10px;
      	}
      	#print h1{
      		font-size:20px;
      
      	}
      	#print-items-terms p{
      		padding-left:4em;
      		font-size:1em;
      	}
      	#print-items-terms form#imprimir{
      		display:none;
      	}	
      }
    </style>
  </head>
  <body>
	<?php
	
	$nro_calefas = count($_SESSION['calefa']);
	echo "Nro de calefas: ".$nro_calefas;
	echo "<br>";
	
	$nro_parri = count($_SESSION['parri']);
	echo "Nro de parri: ".$nro_parri;
	echo "<br>";
	
	$nro_coci = count($_SESSION['coci']);
	echo "Nro de coci: ".$nro_coci;
	echo "<br>";
	//Con eso los imprimo	
	
	/*
	$newArray = $_SESSION['calefa'];
	
	foreach ($newArray as $key => $value) {
        echo "$key - <strong>$value</strong> <br />"; 
	}
	*/
	
	//$conexion=mysqli_connect("localhost","pmdigita_admin","Prodigy12","pmdigita_bosca") or die("Problemas con la conexión");
	$conexion=mysqli_connect("localhost","root","123","bosca") or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	//capturar la fecha del dia y guardarla en BD
	
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$rut = $_REQUEST['rut'];
	$telefono = $_REQUEST['telefono'];
	$email = $_REQUEST['email'];
	$direccion_despacho = $_REQUEST['regionesDespacho'].",".$_REQUEST['provinciaDespacho'].",".$_REQUEST['calleDespacho'].",".$_REQUEST['nroDptoDespacho'];
	$tipo_cotizacion = @$_REQUEST['factura'];
	$direccion_factura = $_REQUEST['regionesBoleta'].",".$_REQUEST['provinciaBoleta'].",".$_REQUEST['calleBoleta'].",".$_REQUEST['nroDptoBoleta'];
	$instalacion = @$_REQUEST['instalacion'];
	$despacho = @$_REQUEST['despacho'];
	
	if($instalacion=='on'){
		$desea_instalacion = 'si';
	}else{
		$desea_instalacion = 'no';
	}
	
	if($despacho=='on'){
		$desea_despacho = 'si';
	}else{
		$desea_despacho = 'no';
	}
	//echo "Instalacion: ".$instalacion;
	//echo "<br>";
	//echo "Despacho: ".$despacho;
	
	mysqli_query($conexion,"insert into cotizacion(nombre,apellido,rut,telefono,email,direccion_despacho,tipo_cotizacion,direccion_factura,desea_instalacion,desea_despacho,productos_cotizados) 
							values ('$nombre',
									'$apellido',
									'$rut',
									'$telefono',									
									'$email',
									'$direccion_despacho',
									'$tipo_cotizacion',
									'$direccion_factura',
									'$desea_instalacion',
									'$desea_despacho',
									'')") 	
		or die("Problemas con el insert del contacto");
	
	
	?>
    <div class="grupo">
      <div id="logo-print"><img src="img/logo-print.png"></div>
    </div>
    <div id="print" class="grupo">
      <div class="caja base-50">
        <h1>Cotización			</h1>
      </div>
      <div class="caja base-25">
        <ul class="first">
          <li>Sr./a: <span><?php echo $nombre." ".$apellido; ?></span></li>
          <li>RUT: <span><?php echo $rut; ?></span></li>
        </ul>
      </div>
      <div class="caja base-25 no-padding">
        <ul class="second">
          <li>Tel/cel:<span><?php echo $telefono; ?></span></li>
          <li>Mail:<span><?php echo $email; ?></span></li>
        </ul>
      </div>
    </div>
    <div class="grupo no-padding">
      <div id="print-data">
        <div class="caja base-30">
		<!-- Hago el insert y luego saco el ultimo id_corizacion -->
          <h2>Número de cotización</h2>
          <p>000000000000 </p>
        </div>
        <div class="caja base-30">
		  <!-- agarro la fecha del sistema en php, esa misma fecha la deberia de guardar en BD-->
          <h2>Fecha</h2>
          <p>31/10/2015</p>
        </div>
        <div class="caja base-60"></div>
      </div>
    </div>
    <div class="grupo no-padding">
	
      <div id="print-items-cajas">
        <div class="caja base-40">
          <h3>ítem</h3>
        </div>
        <div class="caja base-20">
          <h3 class="centrarh3">Cantidad</h3>
        </div>
        <div class="caja base-20">
          <h3 class="centrarh3">SKU</h3>
        </div>
        <div class="caja base-20">
          <h3 class="centrarh3">Precio</h3>
        </div>
      </div>
	  
	  <?php
		
		//tratar de resolver construyendo un solo arreglo
		
		// -- Calefacciones -- Calefacciones -- Calefacciones -- Calefacciones -- Calefacciones -- Calefacciones
   	  
		$new_calefa = array();		
		
		for ($t = 0 ; $t <= $nro_calefas ; $t ++) {		
			if(empty($_SESSION['calefa'][$t])){
				$nada = 0;
			}else{			
				//echo "Este SKU lleva producto ".$_SESSION['items'][$i]['Detalle'];
				//echo "<br>";				
				//$cotizar_esto[] = array('productoCotizar' => $pro);
				$new_calefa[] = $_SESSION['calefa'][$t];
				//$k = $k + 1;
				$tamano_calefa = count($new_calefa);
			}			
		}
	  
		for($i = 0; $i < @$tamano_calefa; $i++){					
		  
		  $nombre_calefa = $new_calefa[$i]['nombre'];
		  $modelo_calefa = $new_calefa[$i]['modelo'];
		  $cantidad_calefa = $new_calefa[$i]['cantidad'];
		  $sku_calefa = $new_calefa[$i]['sku'];
		  $precio_TotUni_calefa = $new_calefa[$i]['precio'];
		  $precio_Tot_calefa = $cantidad_calefa * $precio_TotUni_calefa;
		  
		  echo "<div id=\"print-items-cajas-prod\">";
			echo "<div class=\"caja base-40\">";
			  echo "<p>".$nombre_calefa." ".$modelo_calefa."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">".$cantidad_calefa."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">".$sku_calefa."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">$<span>".$precio_Tot_calefa."</span></p>";
			echo "</div>";
		  echo "</div>";	
	  }
	  	 
		//-- Parrillas --  Parrillas -- Parrillas -- Parrillas -- Parrillas -- Parrillas -- Parrillas -- 
		
		$new_parri = array();		
		
		for ($j = 0 ; $j <= $nro_parri ; $j ++) {		
			if(empty($_SESSION['parri'][$j])){
				$nada = 0;
			}else{			
				//echo "Este SKU lleva producto ".$_SESSION['items'][$i]['Detalle'];
				//echo "<br>";				
				//$cotizar_esto[] = array('productoCotizar' => $pro);
				$new_parri[] = $_SESSION['parri'][$j];
				//$k = $k + 1;
				$tamano_parri = count($new_parri);
			}			
		}
		
		for($k = 0; $k < @$tamano_parri; $k++){					
		  
		  $nombre_parri = $new_parri[$k]['nombre'];
		  $modelo_parri = $new_parri[$k]['modelo'];
		  $cantidad_parri = $new_parri[$k]['cantidad'];
		  $sku_parri = $new_parri[$k]['sku'];
		  $precio_TotUni_parri = $new_parri[$k]['precio'];
		  $precio_Tot_parri = $cantidad_parri * $precio_TotUni_parri;
		  
		  echo "<div id=\"print-items-cajas-prod\">";
			echo "<div class=\"caja base-40\">";
			  echo "<p>".$nombre_parri." ".$modelo_parri."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">".$cantidad_parri."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">".$sku_parri."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">$<span>".$precio_Tot_parri."</span></p>";
			echo "</div>";
		  echo "</div>";
	  
		}
		
		//-- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas --
		
		$new_coci = array();
		
		for ($w = 0 ; $w < $nro_coci ; $w ++) {				
			if(empty($_SESSION['coci'][$w])){
				$nada = 0;
			}else{			
				//echo "Este SKU lleva producto ".$_SESSION['items'][$i]['Detalle'];
				//echo "<br>";				
				//$cotizar_esto[] = array('productoCotizar' => $pro);
				$new_coci[] = $_SESSION['coci'][$w];
				//$k = $k + 1;
				$tamano_coci = count($new_coci);
			}			
		}
		
		for($h = 0; $h < @$tamano_coci; $h++){		
		
		  $nombre_coci = $new_coci[$h]['nombre'];
		  $modelo_coci = $new_coci[$h]['modelo'];
		  $cantidad_coci = $new_coci[$h]['cantidad'];
		  $sku_coci = $new_coci[$h]['sku'];
		  $precio_TotUni_coci = $new_coci[$h]['precio'];
		  $precio_Tot_coci = $cantidad_coci * $precio_TotUni_coci;
		  
		  echo "<div id=\"print-items-cajas-prod\">";
			echo "<div class=\"caja base-40\">";
			  echo "<p>".$nombre_coci." ".$modelo_coci."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">".$cantidad_coci."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">".$sku_coci."</p>";
			echo "</div>";
			echo "<div class=\"caja base-20\">";
			  echo "<p class=\"centrarItems\">$<span>".$precio_Tot_coci."</span></p>";
			echo "</div>";
		  echo "</div>";
	  
		}
		
	  
	  ?>
	  	 
	  
      <div id="print-items-cajas-prod-total">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
          <p class="B">TOTAL</p>
        </div>
      </div>
      <div id="print-items-cajas-prod-total">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
          <p>$ <span> <strong>2.567.713</strong></span></p>
        </div>
      </div>
      <div id="print-items-cajas-prod-total">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
          <p class="B">IVA</p>
        </div>
      </div>
      <div id="print-items-cajas-prod-total">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
          <p>19%</p>
        </div>
      </div>
      <div id="print-items-cond">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
          <p>Valor total</p>
        </div>
      </div>
      <div id="print-items-terms">
        <div class="caja base-30"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-30 no-padding">
          <p>$<span> <b>2.567.713</b></span></p>
          <form id="imprimir">
            <button type="button">Imprimir</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>