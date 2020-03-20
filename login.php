<?php
	include 'includes/cabecera.php';

	//	$encoded = password_hash($_POST['entrar_pass'], PASSWORD_BCRYPT);//	$filas>0 ? echo '<script>window.location="index.php"</script>' : echo '<a href="index.php">Volver a inicio</a>';

	$query = "SELECT * FROM usuarios WHERE nombre_usuario = '$_POST[entrar_nombre]' AND password_usuario = '$_POST[entrar_pass]'";
	$resultado = mysqli_query($enlace, $query);
	if ($result = mysqli_query($enlace, $query)) {
		while($filaBusqueda = mysqli_fetch_array($result)) {
			$_SESSION['usuario'] = $filaBusqueda['id_usuario'];
			$_SESSION['foto'] = $filaBusqueda['foto_perfil'];
			$_SESSION['nombre'] = $filaBusqueda['nombre_usuario'];
		}
		echo '<script>window.location = "index.php"</script>';
	}else {
		echo '<script>alert("Ha habido un error, no se ha encontrado el usuario")</script>';
	}

	include 'includes/pie.php';
?>