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
  <title>Productos / Calefacción</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="owl-carousel/owl.theme.css">
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="sass/tema/js/scripts.js"></script>
  <script src="owl-carousel/owl.carousel.min.js"></script>
  <script src="sass/tema/js/jquery.isotope.js"></script>
  
  <script type="text/javascript">
  <!--
      // Form validation code will come here.
      function validate(){
        
        if( document.rango.desde.value == "" )
        {
          alert( "Por favor ingrese un valor mínimo" );
          document.rango.desde.focus() ;
          return false;
        }
        
        if( document.rango.hasta.value == "" )
        {
          alert( "Por favor ingrese un valor máximo" );
          document.rango.hasta.focus() ;
          return false;
        }
        
        if( document.rango.desde.value > document.rango.hasta.value )
        {
          alert( "El valor mínimo no puede ser mayor al máximo" );
          document.rango.desde.focus() ;
          return false;
        }
        
        return( true );
      }
      
      </script>
	  
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
     
     $variable = @$_REQUEST['opcion'];
     $valor_busqueda = @$_REQUEST['valor_busqueda'];
     $campo_select = @$_REQUEST['select'];
     $desde = @$_REQUEST['desde'];
     $hasta = @$_REQUEST['hasta'];
     
	/*
	echo "Esto llega del boton: " .$variable;
	echo "<br>";
	echo "Esto llega de valor busqueda: " .$valor_busqueda;
	echo "<br>";
	echo "Esto llega de valor select: " .$campo_select;
	echo "<br>";
	echo "Esto llega de desde: " .$desde . " y hasta: " .$hasta ;
	*/
	
	
	
	if($variable==''){
		$registros=mysqli_query($conexion,"select * from ventilacion") or die("Problemas en el select:".mysqli_error($conexion));		
	}	
	
	if($variable=='valor1'){
		$registros=mysqli_query($conexion,"select * from ventilacion WHERE nombre = 'AIRE ACONDICIONADO'") 
		or die("Problemas en el select:".mysqli_error($conexion));	
	}
		
	if($variable=='valor2'){
		$registros=mysqli_query($conexion,"select * from ventilacion WHERE anexo_nombre = 'Ventilador'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor3'){
		$registros=mysqli_query($conexion,"select * from ventilacion WHERE nombre = 'ENFRIADOR DE AIRE'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor4'){
		$registros=mysqli_query($conexion,"select * from ventilacion WHERE nombre = 'KIT VENTANA'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($valor_busqueda!=''){
		$registros=mysqli_query($conexion,"select * from ventilacion where nombre like '%$valor_busqueda%' ") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor busqueda ahora lleva algo";
	}
	
	if($campo_select=='value1'){
		$registros=mysqli_query($conexion,"select * from ventilacion ORDER BY precio ASC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
	}
	
	if($campo_select=='value2'){
		$registros=mysqli_query($conexion,"select * from ventilacion ORDER BY precio DESC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
	}
	
	if($desde!='' and $hasta!=''){
		$registros=mysqli_query($conexion,"select * from ventilacion WHERE precio BETWEEN $desde AND $hasta") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
		//SELECT * FROM contacts WHERE contact_id BETWEEN 100 AND 200;
	}
	/*
	
	
	if($variable=='valor2'){
		$calderas=mysqli_query($conexion,"select * from calderas") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	
	
	if($variable=='valor3'){
		$registros=mysqli_query($conexion,"select * from producto where nombre = 'Estufa a leña'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor4'){
		$registros=mysqli_query($conexion,"select * from producto where nombre = 'Calderas'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	
	
	
	
	
	
	
	
	*/
	?>
  
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
  <section class="grupo">
    <div class="caja movil-50 tablet-70 web-80">
    </div>
    <div class="caja movil-50 tablet-30 web-20">
      <div id="cotizar">
        <p class="cotizaciones"><a href="cotizacion.php"> Cotizaciones </a> <span class="numero--items"> <?php echo $_SESSION['counter']; ?> </span>ítems</p>
      </div>
    </div>
  </section>
  <section class="grupo margen-top">
   <!-- Modificaciones agregadas para la busqueda por tipo de producto -->
   <div class="caja movil-70">
    <div class="filtro">
      <ul>
       <form method="post" action="">
        <li><a >buscar por:</a></li>								
        <li><button name="opcion" value="" type="submit" >Todo</button></li>
        <li><button name="opcion" value="valor1" type="submit" >Aire Acondicionado</button></li>
        <li><button name="opcion" value="valor2" type="submit" >Ventilador</button></li>               
		<li><button name="opcion" value="valor3" type="submit" >Enfriador de Aire</button></li>
		<li><button name="opcion" value="valor4" type="submit" >Kit Ventana</button></li>
      </form>
    </ul>
    <!-- Volver esto un form y hacer la busqueda -->
    <div class="buscar--interior">
     <form method="post" action="">
      <input name="valor_busqueda" value="<?php echo isset($_POST['valor_busqueda']) ? $_POST['valor_busqueda'] : '' ?>" type="search" placeholder="buscar">
      <button type="submit" class="search--buscar--interior"></button>
    </form>			
  </div>
</div>
</div>

<div class="caja movil-30">
  <div class="buscar_precio">
    
    <form method="post" name="rango" class="por_precio">
      <p class="FP">precio</p>
      <input name="desde" value="<?php echo isset($_POST['desde']) ? $_POST['desde'] : '' ?>" type="text" placeholder="desde">
      <input name="hasta" value="<?php echo isset($_POST['hasta']) ? $_POST['hasta'] : '' ?>" type="text" placeholder="hasta">
      <button type="submit" class="buscar_button" onclick="return(validate())"></button>
    </form>
    
    <p class="FP">Ordenar</p>
    
    <div class="caja no-padding">
     <form method="post">
      <select onchange="this.form.submit()" name="select" class="orden">
       <option value="">Seleccione un rango</option> 
       <option value="value1">de menor a mayor</option>
       <option value="value2">de mayor a menor</option>
     </select>
   </form>
 </div>
 
</div>
</div>
</section>
<section class="grupo margen-top">
  <div class="caja">
    <div class="box--productos">
      
      <!-- Aqui se carga informacion de las cocinas -->	
      
      <?php
      
			//Aqui debo buscar de enviar el SKU de cada producto para poder ver el detalle de cada uno
			//setlocale(LC_MONETARY, 'it_IT');
      
      while (@$reg=mysqli_fetch_array(@$registros))
      {
       
       $detalle = $reg['sku'];
       
       echo "<div class=\"imagen--productos electrico\">";
       echo "<div class=\"logo--marca--float\"><img src=\"img2/".$reg['logo_up_left']."\"></div>";
       echo "<div class=\"foto--producto\"><img src=\"img-ac/".$reg['foto_producto']."\"></div>";
       echo "<div class=\"tipo--producto\">".$reg['nombre']."</div>";
       echo "<div class=\"modelo--producto\">".$reg['modelo']."</div>";
       echo "<div class=\"caja--precio--detalle\">";
       echo "<ul>";
       echo "<li>";
							//money_format('%.2n', $number)
       echo "<p class=\"precio--detail\">$ ".number_format($reg['precio'],0, '.', '.')."</p>";
       echo "</li>";
						//Esto deberia ir en un Form
       echo "<form method=\"post\" >";
       echo "<input type=\"text\" name=\"detalle_prod\" value=\"$detalle\" hidden=hidden>";
	   //echo "<input type=\"text\" name=\"envia_cocina\" value=\"cocina\" hidden=hidden>";
						//echo "<li><a name=\"$detalle\" href=\"detalle-producto.php\" class=\"precio--detail-ver\">ver detalle</a></li>";
       echo "<li><button type=\"submit\" formaction=\"detalle-ventilacion.php\">ver detalle</button></li>";
       echo "</form>";
       echo "</ul>";
       echo "</div>";
       echo "</div>";
       
     }
     ?>
	 
	 <!-- Enviar en un boton hidden en cada uno de los form que manda, si es cocina o caldera -->
	 
	 <?php
      /*
			//Aqui debo buscar de enviar el SKU de cada producto para poder ver el detalle de cada uno
			//setlocale(LC_MONETARY, 'it_IT');
      
      while (@$reg=mysqli_fetch_array(@$calderas))
      {
       
       $detalle = $reg['sku'];
       
       echo "<div class=\"imagen--productos electrico\">";
       echo "<div class=\"logo--marca--float\"><img src=\"img2/".$reg['logo_up_left']."\"></div>";
       echo "<div class=\"foto--producto\"><img src=\"img-cc/".$reg['foto_producto']."\"></div>";
       echo "<div class=\"tipo--producto\">".$reg['nombre']."</div>";
       echo "<div class=\"modelo--producto\">".$reg['modelo']."</div>";
       echo "<div class=\"caja--precio--detalle\">";
       echo "<ul>";
       echo "<li>";
							//money_format('%.2n', $number)
       echo "<p class=\"precio--detail\">$ ".number_format($reg['precio'],0, '.', '.')."</p>";
       echo "</li>";
						//Esto deberia ir en un Form
       echo "<form method=\"post\" >";
       echo "<input type=\"text\" name=\"detalle_prod\" value=\"$detalle\" hidden=hidden>";
	   echo "<input type=\"text\" name=\"envia_caldera\" value=\"caldera\" hidden=hidden>";
						//echo "<li><a name=\"$detalle\" href=\"detalle-producto.php\" class=\"precio--detail-ver\">ver detalle</a></li>";
       echo "<li><button type=\"submit\" formaction=\"detalle-cocina.php\">ver detalle</button></li>";
       echo "</form>";
       echo "</ul>";
       echo "</div>";
       echo "</div>";
       
     }
	 */
     ?>
                      
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