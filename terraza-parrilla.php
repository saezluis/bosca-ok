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
  <title>Productos / Terraza y Parrillas</title>
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

	function mensajeCotizar(){
	  
		alert( "El producto fue agregado con exito a la cotización" );
		
	}

  </script>
  
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
     
	 //-------------------------------------------------------------------------------------------
	 
	 @$_SESSION["var"] = @$_SESSION["var"] + 1;
	 $itemID = $_SESSION["var"];
		
	//echo "Esto lleva cotizar producto: ".@$_REQUEST['cotizar_prod'];
	//echo "<br>";
	/*
	if(@$_REQUEST['cotizar_prod']!=''){
		$can_coti = $can_coti + 1;
		echo "Entro al contador";
		echo "<br>";
	}
	*/
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
	
	//Aqui comieza el resto del programa	
	
	
	if(isset($_REQUEST['detalle_prod'])){
		$detalle_producto = $_REQUEST['detalle_prod'];
	}
	
	if(isset($_GET['deta'])){
		$detalle_producto = $_GET['deta'];
	}
	 
	 
	 //-------------------------------------------------------------------------------------------
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
		$registros=mysqli_query($conexion,"select * from parrilla") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor0'){
		$registros=mysqli_query($conexion,"select * from parrilla") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor1'){
		$registros=mysqli_query($conexion,"select * from parrilla where nombre = 'parrilla' OR id_parrilla = 3 OR id_parrilla = 8") 
		or die("Problemas en el select:".mysqli_error($conexion));	
	}
	
	if($variable=='valor2'){
		$registros=mysqli_query($conexion,"select * from parrilla where nombre = 'Muebles de Terraza'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
	
	if($variable=='valor3'){
		$registros=mysqli_query($conexion,"select * from accparrilla") 
		or die("Problemas en el select:".mysqli_error($conexion));		
	}
		
	if($valor_busqueda!=''){
		$registros=mysqli_query($conexion,"select * from parrilla where nombre like '%$valor_busqueda%' OR modelo like '%$valor_busqueda%'") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor busqueda ahora lleva algo";
	}
				
	if($campo_select=='value1'){
		$registros=mysqli_query($conexion,"select * from parrilla ORDER BY precio ASC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
	}
	
	if($campo_select=='value2'){
		$registros=mysqli_query($conexion,"select * from parrilla ORDER BY precio DESC") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
	}
		
	if($desde!='' and $hasta!=''){
		$registros=mysqli_query($conexion,"select * from parrilla WHERE precio BETWEEN $desde AND $hasta") 
		or die("Problemas en el select:".mysqli_error($conexion));		
		//echo "Valor del select ahora lleva algo";
		//SELECT * FROM contacts WHERE contact_id BETWEEN 100 AND 200;
	}
	
	if ($variable=='valor3'){
		
		if($campo_select=='value1'){
			$registros=mysqli_query($conexion,"select * from accparrilla ORDER BY precio ASC") 
			or die("Problemas en el select:".mysqli_error($conexion));		
			//echo "Valor del select ahora lleva algo";
		}
		
		if($campo_select=='value2'){
			$registros=mysqli_query($conexion,"select * from accparrilla ORDER BY precio DESC") 
			or die("Problemas en el select:".mysqli_error($conexion));		
			//echo "Valor del select ahora lleva algo";
		}
		
	}
	
	if ($variable=='valor3'){
	
			if($desde!='' and $hasta!=''){
			$registros=mysqli_query($conexion,"select * from accparrilla WHERE precio BETWEEN $desde AND $hasta") 
			or die("Problemas en el select:".mysqli_error($conexion));		
			//echo "Valor del select ahora lleva algo";
			//SELECT * FROM contacts WHERE contact_id BETWEEN 100 AND 200;
		}	
	}
	
	?>
  
	<?php
	
	//echo "esto lleva variable: ".$variable;
	
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
        <li><button name="opcion" value="valor0" type="submit" >Todo</button></li>
        <li><button name="opcion" value="valor1" type="submit" >Parrillas</button></li>
        <li><button name="opcion" value="valor2" type="submit" >Muebles de terraza</button></li>
        <li><button name="opcion" value="valor3" type="submit" >Accesorios parrilla</button></li>        
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
      <button type="submit" class="buscar_button" onclick="return(validate())" ></button>
	   <!-- Aqui debo enviar el contenido de variable para poder hacer el filtro de busqueda de manera correcta -->
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
	   <!-- Aqui debo enviar el contenido de variable para poder hacer el filtro de busqueda de manera correcta -->
	   <?php
			echo "<input type=\"text\" name=\"opcion\" value=\"$variable\" hidden=hidden >";
	   ?>
	   
	   
     </select>
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
       echo "<div class=\"foto--producto\"><img src=\"img-pt/".$reg['foto_producto']."\"></div>";
       echo "<div class=\"tipo--producto\">".$reg['nombre']."</div>";
	   if($variable=='valor3'){
			echo "<div class=\"modelo--producto\"><font size=\"1\">SKU: ".$reg['sku']."</font></div>";
		}
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
						//echo "<li><a name=\"$detalle\" href=\"detalle-producto.php\" class=\"precio--detail-ver\">ver detalle</a></li>";
		
		//Aqui oculto el boton detalle en caso de que sea un accesorio de parrilla
		if($variable!='valor3'){
			echo "<li><button type=\"submit\" formaction=\"detalle-parrilla.php\">ver detalle</button></li>";
		}
		if($variable=='valor3'){
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
		
		
		
		<?php
		
		if ($variable=='' OR $variable=='valor0'){					
			echo "<div class=\"imagen--productos electrico\">";
				echo "<div class=\"logo--marca--float\"><img src=\"img/mini-bosca.png\"></div>";
				echo "<div class=\"foto--producto\"><img src=\"img-pt/acc-parrilla-b.jpg\"></div>";
				echo "<div class=\"tipo--producto\">Accesorios Parrilla</div>";
				echo "<div class=\"modelo--producto\"></div>";
				echo "<div class=\"caja--precio--detalle\">";
				  echo "<ul>";
					echo "<li>";
					  echo "<p class=\"precio--detail\"></p>";
					echo "</li>";
					echo "<form method=\"post\">";
						echo "<li><button name=\"opcion\" value=\"valor3\" type=\"submit\" >Ver Accesorios</button></li>";
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
        <div class="sociales"><a href="#" class="fb"><img src="img/fb-mini.jpg"></a>
                 
        </div>
      </div>
    </div>
  </footer>
</body>
</html>