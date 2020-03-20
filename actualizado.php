<?php
	include 'includes/cabecera.php';
	
	$id = $_POST['id'];
	$titulo = addslashes($_POST['titulo']);
	$foto = !$_FILES['foto']['error'] ? $_FILES['foto']['name']:'account.svg';
	$descripcion = addslashes($_POST['descripcion']);
	$categoria = $_POST['categoria'];
	$medio = $_POST['medio'];

	if(isset($_FILES) && !$_FILES['foto']['error']) {
		move_uploaded_file($_FILES['foto']['tmp_name'], $ruta.$_FILES['foto']['name']);
		$query = "UPDATE publicaciones 
		SET titulo_publicacion = '$titulo',
		imagen_publicacion = '$foto',
		id_usuario = '$_SESSION[usuario]',
		medio = '$medio',
		categoria = '$categoria',
		texto_publicacion = '$descripcion' WHERE id_publicacion = '$id'";
	}else {
		$query = "UPDATE publicaciones 
		SET titulo_publicacion = '$titulo',
		id_usuario = '$_SESSION[usuario]',
		medio = '$medio',
		categoria = '$categoria',
		texto_publicacion = '$descripcion' WHERE id_publicacion = '$id'";
	}

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