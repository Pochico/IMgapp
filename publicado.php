<?php
	include 'includes/cabecera.php';
	
	$titulo = addslashes($_POST['titulo']);
	$foto = !$_FILES['foto']['error'] ? $_FILES['foto']['name']:'account.svg';
	$descripcion = addslashes($_POST['descripcion']);
	$categoria = $_POST['categoria'];
	$medio = $_POST['medio'];

	if(isset($_FILES) && !$_FILES['foto']['error']) {
		move_uploaded_file($_FILES['foto']['tmp_name'], $ruta.$_FILES['foto']['name']);
	}

	$query = "INSERT INTO publicaciones (titulo_publicacion, imagen_publicacion, id_usuario, medio, categoria, texto_publicacion) VALUES ('$titulo', '$foto', '$_SESSION[usuario]', '$medio', '$categoria', '$descripcion')";

	if(mysqli_query($enlace, $query)) {
		echo'<script>window.location = "index.php";</script>';
	}else {
		echo '
		<script>
			alert("Lo sentimos, ha habido un error. Por favor, inténtalo de nuevo");
			window.location = "publicar.php"	;	
		</script>';
	}

	include 'includes/pie.php';
?>