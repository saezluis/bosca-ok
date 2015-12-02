				<br>
				  <br>
				  <br>
				<h3>Concepción</h3>
                  <div class="maps">                    															
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5373.292605753366!2d-73.06004093870031!3d-36.83231265248197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDQ5JzU0LjQiUyA3M8KwMDMnMjQuMyJX!5e0!3m2!1sen!2sus!4v1448975507073" width="275" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                  <div class="data-direcciones">
                    <p class="jefe--tienda">Jefe de Tienda</p>
                    <p class="nombre--jefe--tienda">Clara Gajardo</p>
                    <div class="telefonos">
                      <ul>
                        <p>Teléfonos</p>
                        <li class="color-gris">(41) 2235006</li>
						<li class="color-gris">(41) 2245687</li>
						<li class="color-gris">(41) 2219892 <b>Fax</b></li>
                      </ul>
                    </div>
                    <p class="horarios"><span class="atencion">Horario de atención</span><br>Lunes a viernes de 10:00 a 19:00 hrs. Sábados de 10:00 a 14:00 hrs.</p>
                    <p class="horarios"><span class="atencion">Dirección</span><br>Arturo Prat 202.</p>
                  </div>
				  
                  <form method="post" name="Xregion" accept-charset="utf-8" class="form--encuentranos">
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
					
                    <input type="text" name="region" value="Vitacura" hidden=hidden>
					
                    <button type="submit" class="enviar--encuentranos" onclick="return(validarXregion())" formaction="registro-encuentranos.php">Enviar</button>
                  </form>