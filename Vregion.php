				<br>
				  <br>
				  <br>
				<h3>Viña del Mar</h3>
                  <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3345.6004785678447!2d-71.54987429999998!3d-33.01430709999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689dde7e8651a8b%3A0x354ff995ba997777!2sLibertad%2C+Vi%C3%B1a+del+Mar%2C+Regi%C3%B3n+de+Valpara%C3%ADso!5e0!3m2!1ses!2scl!4v1435301453016" width="275" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                  </div>
                  <div class="data-direcciones">
                    <p class="jefe--tienda">Jefe de Tienda</p>
                    <p class="nombre--jefe--tienda">Jazmín Valencia</p>
                    <div class="telefonos">
                      <ul>
                        <p>Teléfonos</p>
                        <li class="color-gris">(032) 2686026</li>
                        <li class="color-gris">(032) 2686118</li>
                        <li class="color-gris">(032) 2686031</li>
                      </ul>
                    </div>
                    <p class="horarios"><span class="atencion">Horario de atención</span><br>Lunes a viernes de 9:30 a 19:00 hrs Sábados de 10:00 a 14:00 hrs.</p>
                    <p class="horarios"><span class="atencion">Dirección</span><br>Av. Libertad 1040, Esquina 11 1/2 Norte.</p>
                  </div>
				  
                  <form method="post" name="Vregion" accept-charset="utf-8" class="form--encuentranos">
                    <h2>Contáctanos</h2>
                    <div class="lado--a">
                      <p class="label">Nombre y apellido</p>
						<input type="text" name="nombre_apellido" placeholder="" class="is--not">
                      <p class="label">Mail</p>
						<input name="mail" type="email" placeholder="" class="is--not">
                    </div>
                    <div class="lado--b">
                      <p class="label">Teléfono</p>
						<input type="text" name="telefono"  placeholder="" class="is--not">
                      <p class="label">Motivo</p>
						<input type="text" name="motivo"  placeholder="" class="is--not">
                    </div>
                    <textarea name="comentario" class="text-area"></textarea>
					
					<input type="text" name="region" value="V Region" hidden=hidden>
					
                    <button type="submit" class="enviar--encuentranos" onclick="return(validarVRegion())" formaction="registro-encuentranos.php">Enviar</button>
					
                  </form>