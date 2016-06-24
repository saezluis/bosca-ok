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
     
     $variable = @$_REQUEST['opcion'];
     $valor_busqueda = @$_REQUEST['valor_busqueda'];
     $campo_select = @$_REQUEST['select'];
     $desde = @$_REQUEST['desde'];
     $hasta = @$_REQUEST['hasta'];
     
	 
	@$_SESSION["var"] = @$_SESSION["var"] + 1;
	$itemID = $_SESSION["var"]; 
	 
	if (!isset($_SESSION['items'])) {
		$_SESSION['items'] = array();
	}
	
	//Agrego items cada vez que la pagina refresca y solo recibe SKU cuando el usuario presiona cotizar
	$_SESSION['items'][$itemID] = array('Detalle' => @$_REQUEST['cotizar_prod']);
	
	//Esto me trae la cantidad de valores en el arreglo
	$cantidad = count($_SESSION['items']);
	
	//Envio el total de valores del arreglo por variables de sesion
	$_SESSION['tope'] = $cantidad;
	
	
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
		$registros=mysqli_query($conexion,"select * from producto ORDER BY orden ASC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor0'){
		$registros=mysqli_query($conexion,"select * from producto ORDER BY orden ASC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor1'){
		$registros=mysqli_query($conexion,"select * from producto where nombre = 'Calefactor electrico' ORDER BY orden ASC ") 
		or die("Problemas en el select:".mysqli_error($conexion));	
	}
	
	if($variable=='valor2'){
		$registros=mysqli_query($conexion,"select * from producto where nombre = 'Calefactor a pellet' OR nombre = 'Estufa a pellet' ") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor3'){
		$registros=mysqli_query($conexion,"select * from producto where nombre = 'Estufa a leña' ORDER BY orden ASC ") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor4'){
		$registros=mysqli_query($conexion,"select * from producto where nombre = 'Calderas' ORDER BY orden ASC ") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valorC'){
		$registros=mysqli_query($conexion,"select * from producto where logo_detalle = 'climastar' ORDER BY orden ASC ") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	
	if($valor_busqueda!=''){
		$registros=mysqli_query($conexion,"select * from producto where nombre like '%$valor_busqueda%' ") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor busqueda ahora lleva algo";
	}
	
	if($campo_select=='value1'){
		$registros=mysqli_query($conexion,"select * from producto ORDER BY precio ASC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
	}
	
	if($campo_select=='value2'){
		$registros=mysqli_query($conexion,"select * from producto ORDER BY precio DESC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
	}
	
	if($desde!='' and $hasta!=''){
		$registros=mysqli_query($conexion,"select * from producto WHERE precio BETWEEN $desde AND $hasta") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
		//SELECT * FROM contacts WHERE contact_id BETWEEN 100 AND 200;
	}
	
	if($variable=='valorAcc'){
		$registros=mysqli_query($conexion,"select * from acclena") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if ($variable=='valorAcc'){
		
		if($campo_select=='value1'){
			$registros=mysqli_query($conexion,"select * from acclena ORDER BY precio ASC") 
			or die("Problemas en el select:".mysqli_error($conexion));		
			//echo "Valor del select ahora lleva algo";
		}
		
		if($campo_select=='value2'){
			$registros=mysqli_query($conexion,"select * from acclena ORDER BY precio DESC") 
			or die("Problemas en el select:".mysqli_error($conexion));		
			//echo "Valor del select ahora lleva algo";
		}
		
	}
	
	if ($variable=='valorAcc'){
	
			if($desde!='' and $hasta!=''){
			$registros=mysqli_query($conexion,"select * from acclena WHERE precio BETWEEN $desde AND $hasta") 
			or die("Problemas en el select:".mysqli_error($conexion));		
			//echo "Valor del select ahora lleva algo";
			//SELECT * FROM contacts WHERE contact_id BETWEEN 100 AND 200;
		}	
	}
	
	
	?>
  
	<?php		
	
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
      <div id="logos_juntos">
        <div class="breadcrumbs">
          <ul>
            <li class="nop">Estás en:</li>
            <li><a href="index.php">Productos<span> / </span></a></li>
            <li><a href="#">Calefacción<span> / </span></a></li>            
          </ul>
        </div>
        <?php
			include "logosMarcasBread.php";
		?>
      </div>
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
        <li>buscar por:</li>								
        <li><button name="opcion" value="valor0" type="submit" formaction="calefaccion.php">Todo</button></li>
        <li><button name="opcion" value="valor1" type="submit" formaction="calefaccion.php">Calefactor Eléctrico</button></li>
        <li><button name="opcion" value="valor2" type="submit" formaction="calefaccion.php">Estufas Pellet</button></li>
        <li><button name="opcion" value="valor3" type="submit" formaction="calefaccion.php">Estufas leña</button></li>
		<li><button name="opcion" value="valorC" type="submit" formaction="calefaccion.php">Climastar</button></li>
		<li><button name="opcion" value="valorAcc" type="submit" formaction="calefaccion.php">Accesorios</button></li>
        <!-- <li><button name="opcion" value="valor4" type="submit" formaction="productos.php">Calderas</button></li> -->				
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
      <button type="submit" class="buscar_button" onclick="return(validate())" formaction="productos.php"></button>
	  
	  <?php
			echo "<input type=\"text\" name=\"opcion\" value=\"$variable\" hidden=hidden >";
	   ?>
	  
    </form>
    
    <p class="FP">Ordenar</p>
    
    <div class="caja no-padding">
     <form method="post">
      <select onchange="this.form.submit()" name="select" class="orden">
       <option value="">Seleccione un rango</option> 
       <option value="value1">de menor a mayor</option>
       <option value="value2">de mayor a menor</option>
     </select>
	 <?php
			echo "<input type=\"text\" name=\"opcion\" value=\"$variable\" hidden=hidden >";
	   ?>
   </form>
 </div>
 
</div>
</div>
</section>
<section class="grupo margen-top">
  <div class="caja">
    <div class="box--productos">
      
      <!-- OJO Aqui se crea el primer item -->	
      
      <?php
      
			//Aqui debo buscar de enviar el SKU de cada producto para poder ver el detalle de cada uno
			//setlocale(LC_MONETARY, 'it_IT');
      
      while ($reg=mysqli_fetch_array($registros))
      {
       
       $detalle = $reg['sku'];
       
       echo "<div class=\"imagen--productos electrico\">";
       echo "<div class=\"logo--marca--float\"><img src=\"img2/".$reg['logo_up_left']."\"></div>";
	   
	   if($variable!='valorAcc'){
			$inicio_a = " <a href=\"detalle-producto.php?deta=".urlencode($detalle)." \"> ";
			$cerrar_a = " </a> ";
	   }else{
		   $inicio_a = "";
		   $cerrar_a = "";
	   }
	   echo "<div class=\"foto--producto\"> $inicio_a <img src=\"img2/".$reg['foto_producto']."\"> $cerrar_a </div>";
	   
       //echo "<div class=\"foto--producto\"> <a href=\"detalle-producto.php?deta=",urlencode($detalle)," \"> <img src=\"img2/".$reg['foto_producto']."\"> </a> </div>";
       
	   echo "<div class=\"tipo--producto\">".$reg['nombre']."</div>";
	   
	   if($variable=='valorAcc'){
			echo "<div class=\"modelo--producto\"><font size=\"1\">SKU: ".$reg['sku']."</font></div>";
		}
       echo "<div class=\"modelo--producto\">".$reg['modelo']."</div>";	   
       //echo "<div class=\"modelo--producto\">".$reg['modelo']."</div>";
	   
       echo "<div class=\"caja--precio--detalle\">";
       echo "<ul>";
       echo "<li>";
							//money_format('%.2n', $number)
       echo "<p class=\"precio--detail\">$ ".number_format($reg['precio'],0, '.', '.')."</p>";
       echo "</li>";
						//Esto deberia ir en un Form
       echo "<form method=\"post\" >";
       echo "<input type=\"text\" name=\"detalle_prod\" value=\"$detalle\" hidden=hidden>";
						//echo "<li><a name=\"$detalle\" href=\"detalle-producto.php\" class=\"precio--detail-ver\">ver detalle</a></li>";
		
		if($variable!='valorAcc'){
			echo "<li><button type=\"submit\" formaction=\"detalle-producto.php\">ver detalle</button></li>";
		}
		if($variable=='valorAcc'){
			echo "<li><button type=\"submit\" onclick=\"return(mensajeCotizar())\" name=\"cotizar_prod\" value=\"$detalle\">Cotizar</button></li>";
			echo "<input type=\"text\" hidden=hidden  name=\"detalle_prod\" value=\"$detalle\">";
			echo "<input type=\"text\" hidden=hidden name=\"opcion\" value=\"$variable\"  >";
		}
		
		
       echo "</form>";
       echo "</ul>";
       echo "</div>";
       echo "</div>";
    
     }
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
        <div class="sociales"><a href="https://www.facebook.com/boscachile" class="fb" target="_blank"><img src="img/fb-mini.jpg"></a>            
          
        </div>
      </div>
    </div>
  </footer>
</body>
</html>