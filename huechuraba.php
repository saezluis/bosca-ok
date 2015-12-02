				<br>
				  <br>
				  <br>
                  <h3>Casa Matriz / Huechuraba</h3>
                  <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13328.784548046824!2d-70.6881358!3d-33.3659451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1e1d98caaae546e!2sIngenieria+de+Combustion+Bosca+Chile!5e0!3m2!1ses!2scl!4v1435303675223" width="275" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                  </div>
                  <div class="data-direcciones">
                    <p class="jefe--tienda">Jefe de Tienda</p>
                    <p class="nombre--jefe--tienda">Demetrio Larraín</p>
                    <div class="telefonos">
                      <ul>
                        <p>Teléfonos</p>
                        <li class="color-gris">(02) 2328 8538</li>
                      </ul>
                    </div>
                    <div class="telefonos">
                      <ul>
                        <p>Fax Gerencia</p>
                        <li class="color-gris">(02) 2624 1891</li>
                      </ul>
                    </div>
                    <div class="telefonos">
                      <ul>
                        <p>Fax Servicio Técnico</p>
                        <li class="color-gris">(02) 2624 1891</li>
                      </ul>
                    </div>
                    <p class="horarios"><span class="atencion">Horario de atención</span><br>Lunes a viernes de 9:30 a 19:00 hrs. Sábados de 10:00 a 14:00 hrs.</p>
                    <p class="horarios"><span class="atencion">Dirección</span><br>Av. Américo Vespucio 2077, Huechuraba</p>
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