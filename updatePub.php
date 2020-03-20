<?php
	include 'includes/cabecera.php';

	$id = $_GET['id'];

	$query = "SELECT * FROM publicaciones WHERE id_publicacion = '$id'";
	$resultado = mysqli_query($enlace, $query);
	if($fila = mysqli_fetch_array($resultado)) {
		echo '
		<h2>Editar publicación</h2>

		<form action="actualizado.php" class="actualizar" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="'.$fila['id_publicacion'].'">
			<label for="titu">Título</label><input type="text" id="titu" name="titulo" value="'.$fila['titulo_publicacion'].'">
			
			<img class="imagen__preview" src="uploads/'.$fila['imagen_publicacion'].'" alt="">
			<label class="boton" for="arch">Selecciona un archivo</label><input type="file" id="arch" name="foto" class="hide">

			<label for="desc">Descripción</label><textarea id="desc" name="descripcion">'.$fila['texto_publicacion'].'</textarea>
			';
			if($fila['medio'] == '2d') {
				echo '<div class="radios"><label for="medio2d">2D</label><input type="radio" id="medio2d" name="medio" value="2d" checked></div>
				<div class="radios"><label for="medio3d">3D</label><input type="radio" id="medio3d" name="medio" value="3d"></div>';
			}else {
				echo '<div class="radios"><label for="medio2d">2D</label><input type="radio" id="medio2d" name="medio" value="2d"></div>
				<div class="radios"><label for="medio3d">3D</label><input type="radio" id="medio3d" name="medio" value="3d" checked></div>';
			}

			echo '
			<label for="cat">Categoría</label><select name="categoria" id="cat">
				<option value="'.$fila['categoria'].'">'.$fila['categoria'].'</option>
				<option value="personajes">Personajes</option>
				<option value="paisajes">Paisajes</option>
				<option value="vehiculos">Vehículos</option>
				<option value="robots">Robots</option>
				<option value="estudio">Estudio</option>
				<option value="cienciaficcion">Ciencia Ficción</option>
				<option value="fantasia">Fantasía</option>
			</select>
			<button class="boton">Actualizar Publicación</button>
		</form>';
	}

	include 'includes/menu.php';
	include 'includes/pie.php';

?>