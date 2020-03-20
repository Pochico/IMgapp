<?php

	include 'includes/cabecera.php';
	
?>
	<h2>Subir una publicación</h2>


	<form action="publicado.php" class="publicar" method="POST" enctype="multipart/form-data">
		<label for="titu">Título</label><input type="text" id="titu" name="titulo">

		<label class="boton" for="arch">Selecciona un archivo</label><input type="file" id="arch" name="foto" class="hide">

		<label for="desc">Descripción</label><textarea id="desc" name="descripcion"></textarea>

		<div class="radios"><label for="medio2d">2D</label><input type="radio" id="medio2d" name="medio" value="2d"></div>
		<div class="radios"><label for="medio3d">3D</label><input type="radio" id="medio3d" name="medio" value="3d"></div>

		<label for="cat">Categoría</label><select name="categoria" id="cat">
			<option value="personajes">Personajes</option>
			<option value="paisajes">Paisajes</option>
			<option value="vehiculos">Vehículos</option>
			<option value="robots">Robots</option>
			<option value="estudio">Estudio</option>
			<option value="cienciaficcion">Ciencia Ficción</option>
			<option value="fantasia">Fantasía</option>
		</select>
		<button class="boton">Publicar</button>
	</form>

<?php 
	
	include 'includes/menu.php';
	include 'includes/pie.php';

?>