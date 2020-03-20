<?php
	include 'includes/cabecera.php';
	include 'includes/carrusel.php';
?>

			<!-- Estos son los filtros aplicables. Sólo funcionan de uno en uno al estar en un select, en lugar de en un formulario, ya que al seleccionar uno te envía directamente a la búsqueda. -->

			<nav class="filtros">
					<select class="med" name="medio" onchange="filtrarMedio()">
						<option value="">Medio</option>
						<option value="2D">2D</option>
						<option value="3D">3D</option>
					</select>
					<select class="cat" name="categorias" onchange="filtrarCategoria()">
						<option value="">Categorías</option>
						<option value="personajes">Personajes</option>
						<option value="paisajes">Paisajes</option>
						<option value="vehiculos">Vehículos</option>
						<option value="robots">Robots</option>
						<option value="estudio">Estudio</option>
						<option value="cienciaficcion">Ciencia Ficción</option>
						<option value="fantasia">Fantasía</option>
					</select>
					<a href="index.php"><button class="boton">Reiniciar Filtro</button></a>
			</nav>


			<section class="galeria__inicial">
			<a name="galeria__ancla"></a>
			
				<?php
				//	Si hay un search establecido, mostrará por AJAX lo que hay en la función SEARCH del JavaScript. Si no, realizará una query de 21 registros por defecto. En caso de que haya recibido un medio o una categoría a través de GET, utilizará esa query en su lugar, mostrando 21 registros (máximo según el filtro seleccionado).

				if(isset($_POST['search'])) {

				}else {

				//	Cuenta el número de registros para crear la paginación.

					$contador = mysqli_query($enlace, "SELECT * FROM publicaciones");
					$contador = mysqli_num_rows($contador);
					$num_paginas = ceil($contador / 21);
					
					$query = "SELECT * FROM publicaciones ORDER BY id_publicacion DESC LIMIT 21";

					if(isset($_GET['medio'])) {
						$medio = $_GET['medio'];
						$query = "SELECT * FROM publicaciones WHERE medio = '$medio' ORDER BY id_publicacion DESC LIMIT 21";
					}else {
						$medio = '';
					}

					if(isset($_GET['categoria'])) {
						$categoria = $_GET['categoria'];
						$query = "SELECT * FROM publicaciones WHERE categoria = '$categoria' ORDER BY id_publicacion DESC LIMIT 21";
					}else {
						$categoria = '';
					}

				//	Este if comprueba si hay una página enviada por GET y si la hay, y es igual a 1, te manda al index. Si es distinta a 1 te manda al número de la página y te muestra las publicaciones que hay empezando por el número de página.

					if(isset($_GET['pag'])) {
						$pagina = $_GET['pag'];
						$query_start = ($pagina-1)*21;
						if($pagina == 1) {
							header ('location: index.php');
						}else {
							$query = "SELECT * FROM publicaciones ORDER BY id_publicacion DESC LIMIT ".$query_start.",21";
						}
					}else {
						$pagina = 1;
					}

					if ($result = mysqli_query($enlace,$query)) {		
						while($fila = mysqli_fetch_array($result)) {
						$query_user = "SELECT * FROM usuarios WHERE id_usuario = '$fila[id_usuario]'";
						$resultado_user = mysqli_query($enlace, $query_user);
						while($fila_user = mysqli_fetch_array($resultado_user)) {						
			  			 	echo '<div class="galeria__obra">
								<div class="galeria__imagen"><a href="publicacion.php?id='.$fila['id_publicacion'].'">
									<div class="imagen__filtro">'.$fila['titulo_publicacion'].'</div>
									<img src="uploads/'.$fila['imagen_publicacion'].'" alt="imagen"></a>
								</div>
								<div class="galeria__autor"><a href="usuario.php?usuario='.$fila_user['id_usuario'].'"><div class="autor__efecto"><img src="images/perfiles/'.$fila_user['foto_perfil'].'" alt=""></div></a></div>
							</div>';
							}
						}
					}
					echo '<div class="paginacion">';
					for($x=1; $x<=$num_paginas; $x++) {
						if($pagina!=$x) {
							echo '<a href="index.php?pag='.$x.'#galeria__ancla"><button class="paginacion__pagina autor__efecto '.$x.'">'.$x.'</button></a>';
						}else {
							echo '<button class="paginacion__pagina autor__efecto marcado '.$x.'">'.$x.'</button>';
						}
					}
					echo '</div>';
				}
				
			include 'includes/menu.php';
			
			?>

		</section>

<?php
	include 'includes/pie.php';
?>