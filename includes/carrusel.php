<section class="carrusel__seccion">

		<div class="carrusel__botones" onclick="carruselIzq()"><img class="botones__carrusel" src="images/previous.svg" alt="Botón para ir a la imagen anterior"></div>

			<img class="logo__intro" src="images/logo.png" alt="logo">

		<?php
			$query = "SELECT * FROM publicaciones ORDER BY rand() LIMIT 1";
			$resultado = mysqli_query($enlace, $query);
				while($fila = mysqli_fetch_array($resultado)) {
					echo '<div class="carrusel__contenedor">
					<img class="carrusel__imagen carrusel0" src="uploads/'.$fila['imagen_publicacion'].'" alt="">';
				}
			$resultado = mysqli_query($enlace, $query);
				while($fila = mysqli_fetch_array($resultado)) {
					echo '<img class="carrusel__imagen carrusel1" src="uploads/'.$fila['imagen_publicacion'].'" alt="">';
				}
			$resultado = mysqli_query($enlace, $query);
				while($fila = mysqli_fetch_array($resultado)) {
					echo '<img class="carrusel__imagen carrusel2" src="uploads/'.$fila['imagen_publicacion'].'" alt="">
				</div>
				<div class="carrusel__botones" onclick="carruselDer()"><img class="botones__carrusel" src="images/next.svg" alt="Botón para ir a la imagen siguiente"></div>';
				}
		?>
	</section>