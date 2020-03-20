<?php
	include 'includes/cabecera.php';
?>
			<!-- AQUÍ IRÁN LAS IMÁGENES DE LA BASE DE DATOS TODAS JUNTAS, CADA UNA CON LA FOTO DE PERFIL (SI TIENE) DEL AUTOR DEBAJO -->
			
				<?php
					//	Hasta el primer while coge la publicación de su tabla, con todos sus datos. Después coge los datos del usuario de su tabla, utilizando la FK de la tabla de publicaciones. 

					$usuario = $_GET['usuario'];


					$query_user = "SELECT * FROM usuarios WHERE id_usuario = '$usuario'";
					$resultado_user = mysqli_query($enlace, $query_user);
					while($fila_user = mysqli_fetch_array($resultado_user)) {
						echo '<section class="cabecera__usuario">
							<img src="images/perfiles/'.$fila_user['foto_perfil'].'" alt="">
							<h2 class="user__name">'.$fila_user['nombre_usuario'].'</h2>
						</section>
						<section class="galeria__usuario">';
					}

					$query_pub = "SELECT * FROM publicaciones WHERE id_usuario = '$usuario'";
					$resultado_pub = mysqli_query($enlace, $query_pub);
					while($fila_pub = mysqli_fetch_array($resultado_pub)) {
						echo '<div class="galeria__usuario__obra">
								<div class="galeria__imagen"><a href="publicacion.php?id='.$fila_pub['id_publicacion'].'">
									<div class="imagen__filtro">'.$fila_pub['titulo_publicacion'].'</div>
									<img src="uploads/'.$fila_pub['imagen_publicacion'].'" alt="imagen"></a>
								</div>
								<div class="desc__mini">'.substr($fila_pub['texto_publicacion'], 0, 30).'</div></div>';
				}
				?>
				
				<!--
				<div class="galeria__obra">
					<div class="galeria__imagen">
						<div class="imagen__filtro">Título Obra</div>
						<img src="https://picsum.photos/400/400?random=2" alt="imagen">
					</div>
					<div class="galeria__autor"><div class="autor__efecto"><img src="https://picsum.photos/400/400?random=6" alt=""></div></div>
				</div>
				<div class="galeria__obra">
					<div class="galeria__imagen">
						<div class="imagen__filtro">Título Obra</div>
						<img src="https://picsum.photos/400/400?random=4" alt="imagen">
					</div>
					<div class="galeria__autor"><div class="autor__efecto"><img src="images/account.svg" alt=""></div></div>
				</div>-->

				<?php 
					include 'includes/menu.php';
				?>
				
			</section>

<?php
	include 'includes/pie.php';
?>