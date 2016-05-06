				<?php
				
				include_once 'config.php';
		
				$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				
				$registrosSucursales = mysqli_query($conexion,"SELECT * FROM sucursales WHERE id_sucursal = 1 ") or die("Problemas con el select de sucursales: ".mysqli_error($conexion));
				
				if($reg=mysqli_fetch_array($registrosSucursales)){
					$nombre_region = $reg['nombre_region'];
					$jefe_tienda = $reg['jefe_tienda'];
					$telefono1 = $reg['telefono1'];
					$telefono2 = $reg['telefono2'];
					$fax_gerencia = $reg['fax_gerencia'];
					$fax_servicio = $reg['fax_servicio'];
					$horario = $reg['horario'];
					$direccion = $reg['direccion'];
					$link_mapa = $reg['link_mapa'];
				}
				
				?>
				<br>
				  <br>
				  <br>
				  <?php
					echo "<h3>$nombre_region</h3>";
				  ?>
                  <div class="maps">
					<?php
						echo "<iframe src=\"$link_mapa\" width=\"275\" height=\"300\" frameborder=\"0\" style=\"border:0\" allowfullscreen=\"\"></iframe>";
					?>
                  </div>
                  <div class="data-direcciones">
                    <p class="jefe--tienda">Jefe de Tienda</p>
					<?php
					echo "<p class=\"nombre--jefe--tienda\">$jefe_tienda</p>";
                    
					//Ojo los dos telefonos deben ir juntos si hay dos
					
					if($telefono1!=''){
						echo "<div class=\"telefonos\">";
						  echo "<ul>";
							echo "<p>Teléfonos</p>";
								echo "<li class=\"color-gris\">$telefono1</li>";						
						  echo "</ul>";
						echo "</div>";
					}
					
					if($telefono2!=''){
						echo "<div class=\"telefonos\">";
						  echo "<ul>";
							echo "<p>Teléfonos</p>";
								echo "<li class=\"color-gris\">$telefono2</li>";						
						  echo "</ul>";
						echo "</div>";
					}
					
					if($fax_gerencia!=''){
						echo "<div class=\"telefonos\">";
						  echo "<ul>";
							echo "<p>Fax Gerencia</p>";
							echo "<li class=\"color-gris\">$fax_gerencia</li>";
						  echo "</ul>";
						echo "</div>";
					}
					
					if($fax_servicio!=''){
					
						echo "<div class=\"telefonos\">";
						  echo "<ul>";
							echo "<p>Fax Servicio Técnico</p>";
							echo "<li class=\"color-gris\">$fax_servicio</li>";
						  echo "</ul>";
						echo "</div>";
					
					}

                    echo "<p class=\"horarios\"><span class=\"atencion\">Horario de atención</span><br>$horario</p>";
                    echo "<p class=\"horarios\"><span class=\"atencion\">Dirección</span><br>$direccion</p>";
					
					?>
                  </div>
				  
                  <form method="post" name="RM" accept-charset="utf-8" class="form--encuentranos">
                    <h2>Contáctanos</h2>
                    <div class="lado--a">
                      <p class="label">Nombre y apellido</p>
                      <input type="text" name="nombre_apellido" value="" placeholder="" class="is--not">
                      <p class="label">Mail</p>
                      <input type="text" name="mail" value="" placeholder="" class="is--not">
                    </div>
                    <div class="lado--b">
                      <p class="label">Teléfono</p>
                      <input type="text" name="telefono" value="" placeholder="" class="is--not">
                      <p class="label">Motivo</p>
                      <input type="text" name="motivo" value="" placeholder="" class="is--not">
                    </div>
                    <textarea name="comentario" class="text-area"></textarea>
					
					<input type="text" name="region" value="RM" hidden=hidden>
					
                    <button type="submit" class="enviar--encuentranos" onclick="return(validarRM())" formaction="registro-encuentranos.php">Enviar</button>
                  </form>