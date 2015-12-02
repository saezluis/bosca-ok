				<br>
				  <br>
				  <br>
				<h3>Rancagua</h3>
                  <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3300.9904005130415!2d-70.7355058!3d-34.172163100000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966343417059ba1b%3A0x536cc6b37a2e5595!2sRam%C3%B3n+Freire+%26+O'carrol%2C+Rancagua%2C+VI+Regi%C3%B3n!5e0!3m2!1ses!2scl!4v1435304001620" width="275" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                  </div>
                  <div class="data-direcciones">
                    <p class="jefe--tienda">Jefe de Tienda</p>
                    <p class="nombre--jefe--tienda">José Antonio Elortegui</p>
                    <div class="telefonos">
                      <ul>
                        <p>Teléfonos</p>
                        <li class="color-gris">(9) 68326735</li>
                        <li class="color-gris">(072)-2426768</li>
                      </ul>
                    </div>
                    <p class="horarios"><span class="atencion">Horario de atención</span><br>Lunes a viernes de 9:30 a 19:00 hrs. Sábados de 10:00 a 14:00 hrs.</p>
                    <p class="horarios"><span class="atencion">Dirección</span><br>O’Carrol 11 Esq. Freire . Local 5, Rancagua.</p>
                  </div>
				  
                  <form  method="post" name="VIregion" accept-charset="utf-8" class="form--encuentranos">
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
					
                    <input type="text" name="region" value="VI Region" hidden=hidden>
					
                    <button type="submit" class="enviar--encuentranos" onclick="return(validarVIregion())" formaction="registro-encuentranos.php">Enviar</button>
                  </form>