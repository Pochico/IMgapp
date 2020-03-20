<?php
	include 'includes/cabecera.php';
			
	$id = $_GET['id'];
	$query = "DELETE FROM publicaciones WHERE id_publicacion = '$id'";

	if ($result = mysqli_query($enlace, $query)) {		
		echo '<script>
		alert("Se ha eliminado la publicación con éxito.");
		window.location = "index.php";
		</script>';
	}else {
		echo '<script>
		alert("Ha habido un error eliminando la publicación.");
		</script>';
	}

	include 'includes/pie.php';
?>