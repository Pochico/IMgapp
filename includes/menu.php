	<?php
				//	Si la sesión está iniciada, aparecerá un menú para el usuario. Si no, aparecerá el menú de registro y login. 


				
					echo '<div class="usuario__menu">';

					if(isset($_SESSION['usuario'])) {
						echo '<div class="botonera__usuario">
								<h2>'.$_SESSION['nombre'].'</h2>
								<button class="boton">Mi Perfil</button>
								<a href="mispublicaciones.php?perfil='.$_SESSION['usuario'].'"><button class="boton">Mis Publicaciones</button></a>
								<a href="logout.php"><button class="boton">Cerrar Sesión</button></a>
							</div>';
					}else {
						echo '<div class="usuario__formulario">
						<div class="usuario__titulo">
							<h3 id="entrar_usuario" class="titulo__formulario entrar" onclick="activarFormUsuario(this)">Iniciar sesión</h3>
							<h3 id="registro_usuario" class="titulo__formulario registrar active" onclick="activarFormUsuario(this)">Crear Cuenta</h3>
						</div>
						<form action="login.php" method="POST" class="usuario__entrar">
							<label for="enNom"><h3>Nombre</h3></label><input type="text" id="enNom" name="entrar_nombre">
							<label for="enPas"><h3>Contraseña</h3></label><input type="password" id="enPas" name="entrar_pass">
							<button class="boton" name="entrar_submit">Iniciar sesión</button>
							<div class="boton secundario" name="registrar_abrir">Crear Cuenta</div>
						</form>
						<form action="registro.php" method="POST" class="usuario__registrar" enctype="multipart/form-data">
							<label for="reNom"><h3>Nombre</h3></label><input type="text" id="reNom" name="registrar_nombre" required>
							<label for="ema"><h3>Email</h3></label><input type="text" id="ema" name="registrar_email" required>
							<label for="rePas"><h3>Contraseña</h3></label><input type="password" id="rePas" name="registrar_pass" required>
							<label class="boton" for="pic">Foto de perfil</label><input type="file" id="pic" name="foto" class="hide">
							<div><input id="term" class="input__terminos" name="terminos" type="checkbox" value="Terminos" required><label for="term">Acepto los términos y la <a href="">política de privacidad</a></label></div>
							<button class="boton" name="registrar_submit">Crear Cuenta</button>
							<div class="boton secundario" name="registrar_abrir">Iniciar Sesión</div>
						</form>
					';
					}

					echo '</div>';

				?>