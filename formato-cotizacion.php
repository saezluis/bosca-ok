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
	
	/*
	$nro_calefas = count($_SESSION['calefa']);
	echo "Nro de calefas: ".$nro_calefas;
	echo "<br>";
	
	$nro_parri = count($_SESSION['parri']);
	echo "Nro de parri: ".$nro_parri;
	echo "<br>";
	
	$nro_coci = count($_SESSION['coci']);
	echo "Nro de coci: ".$nro_coci;
	echo "<br>";
	
	$nro_venti = count($_SESSION['venti']);
	echo "Nro de venti: ".$nro_venti;
	echo "<br>";
	*/
	
	//Con eso los imprimo	
	
	/*
	$newArray = $_SESSION['calefa'];
	
	foreach ($newArray as $key => $value) {
        echo "$key - <strong>$value</strong> <br />"; 
	}
	*/
	
	include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
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
	
	$regionesDespacho = $_REQUEST['regionesDespacho'];
	$provinciaDespacho = $_REQUEST['provinciaDespacho'];
	$calleDespacho = $_REQUEST['calleDespacho'];
	$nroDptoDespacho = $_REQUEST['nroDptoDespacho'];
	
	$regionesFactura = $_REQUEST['regionesFactura'];
	$provinciaFactura = $_REQUEST['provinciaFactura'];
	$calleFactura = $_REQUEST['calleFactura'];
	$nroDptoFactura = $_REQUEST['nroDptoFactura'];
	
	$nombre_factura = $_REQUEST['nombre_factura'];      //Razon social
	$rut_factura = $_REQUEST['rut_factura'];
	$telefono_factura = $_REQUEST['telefono_factura'];
	$giro_factura = $_REQUEST['giro_factura'];			//Giro del negocio
	
	
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
		
		$last_id = mysqli_insert_id($conexion);
	
	//tipo_cotizacion me trae si es boleta o factura y alli contruyo la que corresponde
	//si viene factura deberia hacer un insert diferente
	
	?>
    <div class="grupo">
      <div id="logo-print"><a href="index.php"><img src="img/logo-print.png"></a></div>
    </div>
    <div id="print" class="grupo">
      <div class="caja base-100	">
        <h1>Cotización</h1>
      </div>
	  <?php
		  if($tipo_cotizacion=='boleta'){						
			echo "<div class=\"caja base-100 web-25\">";
			echo "<ul class=\"first\">";
			  echo "<li>Sr./a: <span> $nombre $apellido </span></li>";
			  echo "<li>RUT: <span> $rut </span></li>";
			  echo "<li>Region: <span> $regionesDespacho </span></li>";
			  echo "<li>Calle: <span> $calleDespacho </span></li>";
			echo "</ul>";
		  echo "</div>";
		  echo "<div class=\"caja base-100 web-75 no-padding\">";
			echo "<ul class=\"second\">";
			  echo "<li>Tel/cel:<span> $telefono </span></li>";
			  echo "<li>Mail:<span> $email </span></li>";
			  echo "<li>Provincia: <span> $provinciaDespacho </span></li>";
			  echo "<li>Nro/Dpto: <span> $nroDptoDespacho </span></li>";
			echo "</ul>";
		  echo "</div>";  
		  }
		  
		  if($tipo_cotizacion=='factura'){			
			echo "<div class=\"caja base-25\">";
			echo "<ul class=\"first\">";
			  echo "<li>Sr./a: <span> $nombre $apellido </span></li>";
			  echo "<li>Razon Social: <span> $nombre_factura </span></li>";
			  echo "<li>RUT: <span> $rut_factura </span></li>";
			  echo "<li>Giro del negocio:<span> $giro_factura </span></li>";			  
			echo "</ul>";
		  echo "</div>";
		  echo "<div class=\"caja base-25 no-padding\">";
			echo "<ul class=\"second\">";
			  echo "<li>Tel/cel:<span> $telefono_factura </span></li>";			  
			  echo "<li>Provincia: <span> $provinciaFactura </span></li>";	
			  echo "<li>Calle: <span> $calleFactura </span> Nro/Dpto: <span> $nroDptoFactura </span></li>";
			  echo "<li>Region: <span> $regionesFactura </span></li>";
			echo "</ul>";
		  echo "</div>";    
		  }
		  
	  ?>
    </div>
    <div class="grupo no-padding">
      <div id="print-data">
        <div class="caja base-50">
		<!-- Hago el insert y luego saco el ultimo id_corizacion -->
          <h2>Número de cotización</h2>
		  <?php
          echo "<p>$last_id</p>";
		  ?>
        </div>
        <div class="caja base-50">
		  <!-- agarro la fecha del sistema en php, esa misma fecha la deberia de guardar en BD-->
          <h2>Fecha</h2>
		  <?php
			$date = date('d-m-Y');
			echo "<p>$date</p>";
		  ?>
          
        </div>
        <div class="caja base-60"></div>
      </div>
    </div>
    <div class="grupo no-padding">
	
      <div id="print-items-cajas">
        <div class="caja base-20">
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
		$calefa_add = "";
		$sumarCalefa = "";
		
		$parrilla_add = "";
		$sumaParrilla = "";
		
		$cocina_add = "";
		$sumCocina = "";
		
		$ventilacion_add = "";
		$sumVenti = "";
		
		$AccParrilla_add = "";
		$sumAccParri = "";
		
		$AccLena_add = "";
		$sumAccLena = "";
		//tratar de resolver construyendo un solo arreglo
		
		// -- Calefacciones -- Calefacciones -- Calefacciones -- Calefacciones -- Calefacciones -- Calefacciones
   	  
		$new_calefa = array();		
		$new_calefa = $_SESSION['calefa'];
		
		foreach ($new_calefa as $calefa) {	
				echo "<div id=\"print-items-cajas-prod\">";
					echo "<div class=\"caja base-20\">";
						echo "<p>".$calefa['nombre']." ".$calefa['modelo']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$calefa['cantidad']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$calefa['sku']."</p>";
					echo "</div>";
						echo "<div class=\"caja base-20\">";	
						$subTotalCalefa = $calefa['cantidad'] * $calefa['precio'];
						echo "<p class=\"centrarItems\">$<span>".number_format($subTotalCalefa,0,",",".")."</span></p>";
					echo "</div>";
					echo "</div>";
					$calefa_add = " ".$calefa['nombre']." ".$calefa['modelo']." / ".$calefa_add;
					$sumarCalefa = $sumarCalefa + $subTotalCalefa;
		}
		
		//echo "Calefaccion: ".$calefa_add;
		//-- Parrillas --  Parrillas -- Parrillas -- Parrillas -- Parrillas -- Parrillas -- Parrillas -- 
		
		$new_parri = array();				
		$new_parri = $_SESSION['parri'];
		
		//echo "<br>";
		
		foreach ($new_parri as $parri) {
				echo "<div id=\"print-items-cajas-prod\">";
					echo "<div class=\"caja base-20\">";
						echo "<p>".$parri['nombre']." ".$parri['modelo']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$parri['cantidad']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$parri['sku']."</p>";
					echo "</div>";
						echo "<div class=\"caja base-20\">";	
						$subTotalParri = $parri['cantidad'] * $parri['precio'];
						echo "<p class=\"centrarItems\">$<span>".number_format($subTotalParri,0,",",".")."</span></p>";	
					echo "</div>";
					echo "</div>";
					$parrilla_add = " ".$parri['nombre']." ".$parri['modelo']." / ".$parrilla_add;
					$sumaParrilla = $subTotalParri + $sumaParrilla;
		}
		
		//echo "parrilla: ".$parrilla_add;
		//-- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas -- Cocinas --
		
		$new_coci = array();		
		$new_coci = $_SESSION['coci'];
		
		//echo "<br>";
		
		foreach ($new_coci as $coci) {
				echo "<div id=\"print-items-cajas-prod\">";
					echo "<div class=\"caja base-20\">";
						echo "<p>".$coci['nombre']." ".$coci['modelo']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$coci['cantidad']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$coci['sku']."</p>";
					echo "</div>";
						echo "<div class=\"caja base-20\">";	
						$subTotalCoci = $coci['cantidad'] * $coci['precio'];
						echo "<p class=\"centrarItems\">$<span>".number_format($subTotalCoci,0,",",".")."</span></p>";	
					echo "</div>";
					echo "</div>";
					$cocina_add = " ".$coci['nombre']." ".$coci['modelo']." / ".$cocina_add;
					$sumCocina = $subTotalCoci + $sumCocina;
		}
		
		//echo "cocina: ".$cocina_add;
		
		$new_venti = array();
		$new_venti = $_SESSION['venti'];
		
		//echo "<br>";
		
		foreach ($new_venti as $venti) {
				echo "<div id=\"print-items-cajas-prod\">";
					echo "<div class=\"caja base-20\">";
						echo "<p>".$venti['nombre']." ".$venti['modelo']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$venti['cantidad']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$venti['sku']."</p>";
					echo "</div>";
						echo "<div class=\"caja base-20\">";	
						$subTotalVenti = $venti['cantidad'] * $venti['precio'];
						echo "<p class=\"centrarItems\">$<span>".number_format($subTotalVenti,0,",",".")."</span></p>";	
					echo "</div>";
					echo "</div>";	
					$ventilacion_add = " ".$venti['nombre']." ".$venti['modelo']." / ".$ventilacion_add;
					$sumVenti = $subTotalVenti + $sumVenti;
		}
		
		//echo "ventilacion: ".$ventilacion_add;
		
		$new_accParri = array();
		$new_accParri = $_SESSION['accParri'];
		
		//echo "<br>";
		
		foreach ($new_accParri as $accParri) {
				echo "<div id=\"print-items-cajas-prod\">";
					echo "<div class=\"caja base-20\">";
						echo "<p>".$accParri['nombre']." ".$accParri['modelo']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$accParri['cantidad']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$accParri['sku']."</p>";
					echo "</div>";
						echo "<div class=\"caja base-20\">";	
						$subTotalaccParri = $accParri['cantidad'] * $accParri['precio'];
						echo "<p class=\"centrarItems\">$<span>".number_format($subTotalaccParri,0,",",".")."</span></p>";	
					echo "</div>";
					echo "</div>";
					$AccParrilla_add = " ".$accParri['nombre']." ".$accParri['modelo']." / ".$AccParrilla_add;
					$sumAccParri = $sumAccParri + $subTotalaccParri;
		}
		
		//echo "acc parrilla: ". $AccParrilla_add;
		
		$new_accLena = array();
		$new_accLena = $_SESSION['accLena'];
		
		//echo "<br>";
		
		foreach ($new_accLena as $accLena) {
				echo "<div id=\"print-items-cajas-prod\">";
					echo "<div class=\"caja base-20\">";
						echo "<p>".$accLena['nombre']." ".$accLena['modelo']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$accLena['cantidad']."</p>";
					echo "</div>";
					echo "<div class=\"caja base-20\">";
						echo "<p class=\"centrarItems\">".$accLena['sku']."</p>";
					echo "</div>";
						echo "<div class=\"caja base-20\">";	
						$subTotalaccLena = $accLena['cantidad'] * $accLena['precio'];
						echo "<p class=\"centrarItems\">$<span>".number_format($subTotalaccLena,0,",",".")."</span></p>";	
					echo "</div>";
					echo "</div>";
					$AccLena_add = " ".$accLena['nombre']." ".$accLena['modelo']." / ".$AccLena_add;
					$sumAccLena = $sumAccLena + $subTotalaccLena;
		}
		
		//echo "acc lena: ".$AccLena_add;
		
	  $totalCotizacion = @$sumarCalefa + @$sumaParrilla + @$sumCocina + @$sumVenti + @$sumAccParri + @$sumAccLena;
	  $totalFinalMasIva = (($totalCotizacion * 1.19) / 100) + $totalCotizacion;
	  
	  $productos_agregar = $calefa_add." ".$parrilla_add." ".$cocina_add." ".$ventilacion_add." ".$AccParrilla_add." ".$AccLena_add;
	  
	  //echo "productos agregar: ".$productos_agregar;
	  ?>
	  	<?php
		
		//$productos_cotizar = 
		date_default_timezone_set("America/Santiago");
		$date =  date("Y-m-d h:i:sa");
		$timestamp = date('Y-m-d H:i:s', strtotime($date));
		
		//aqui hago un update con los productos
		mysqli_query($conexion, "UPDATE cotizacion SET productos_cotizados = '$productos_agregar', timestamp = '$timestamp'  WHERE id_cotizacion = '$last_id' ") or
									die("Problemas en el update:".mysqli_error($conexion));
		
		
		
		$user = $email;
		$subject = "Cotización generada en página web Bosca";
		$headers = "From: Página web Bosca <noreply@bosca.cl>";
		$message = "Datos del usuario que hace la solicitud de cotización: 
		
	Nombre: $nombre
	Apellido: $apellido
	Rut: $rut
	Telefono: $telefono
	Email: $email
	Dirección despacho: $direccion_despacho
	Tipo cotización: $tipo_cotizacion
	Dirección factura: $direccion_factura
	Desea instalación: $instalacion
	Desea despacho: $despacho
	
	Productos que cotiza: $productos_agregar
	
	Datos del despacho (solo si fueron agregados por el cliente):
	Región: $regionesDespacho
	Provincia: $provinciaDespacho
	Calle: $calleDespacho
	Nro: $nroDptoDespacho
	
	Datos de la entrega de la factura (solo si fueron agregados por el cliente):
	Región: $regionesFactura		
	Provincia: $provinciaFactura
	Calle: $calleFactura
	Nro: $nroDptoFactura
	
	Datos de la factura (solo si fueron agregados por el cliente):
	Nombre o razón social: $nombre_factura
	Rut: $rut_factura
	Telefono: $telefono_factura
	Giro: $giro_factura
	
		
		";
		
		//mail($user,$usersubject,$usermessage,$userheaders);	
		mail($user, '=?utf-8?B?'.base64_encode($subject).'?=' ,$message, $headers );
		
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
          <p>$ <span> <strong><?php echo number_format($totalCotizacion,0,",","."); ?></strong></span></p>
        </div>
      </div>
      <div id="print-items-cajas-prod-total">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
		<?php
			if($tipo_cotizacion=='factura'){
				echo "<p class=\"B\">IVA</p>";
			}else{
				echo "<p></p>";
			}			
		?>  
        </div>
      </div>
      <div id="print-items-cajas-prod-total">
        <div class="caja base-40"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20"></div>
        <div class="caja base-20 no-padding">
          <?php
			if($tipo_cotizacion=='factura'){
				echo "<p>19%</p>";
			}else{
				echo "<p></p>";
			}	
			
		  ?>
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
          <p>$<span> <b><?php 
			if($tipo_cotizacion=='factura'){
				echo number_format($totalFinalMasIva,0,",","."); 
			}else{
				echo number_format($totalCotizacion,0,",","."); 
			}
		  ?></b></span></p>
          <form id="imprimir">
            <button type="button" onclick="window.print();">Imprimir</button>
          </form>
        </div>
      </div>
    </div>
	<?php
	
	session_unset(); 
	
	?>
  </body>
</html>