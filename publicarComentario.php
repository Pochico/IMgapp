<?php
	include 'includes/cabecera.php';
	
	$usuario = $_SESSION['usuario'];
	$comentario = $_POST['comentario'];
	$publicacion = $_GET['id'];

	$query = "INSERT INTO comentarios (id_usuario, id_publicacion, contenido_comentario) VALUES ('$usuario', '$publicacion', '$comentario')";

	if(mysqli_query($enlace, $query)) {
		echo'<script>window.location = "publicacion.php?id='.$publicacion.'";</script>';
	}else {
		echo '
		<script>
			alert("Lo sentimos, ha habido un error. Por favor, inténtalo de nuevo");
		</script>';
	}

	include 'includes/pie.php';
?>