<?php
	include 'includes/cabecera.php';

	$query = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = '$_POST[registrar_nombre]'";
	$resultado = mysqli_query($enlace, $query);
	$filas = mysqli_num_rows($resultado);
	$nombre = $_POST['registrar_nombre'];
	$email = $_POST['registrar_email'];
	$password = $_POST['registrar_pass'];
	$ruta = 'images/perfiles/';
	//	$encoded = password_hash($password, PASSWORD_BCRYPT);
	$foto = !$_FILES['foto']['error'] ? $_FILES['foto']['name']:'account.png';

	if(isset($_FILES) && !$_FILES['foto']['error']) {
		move_uploaded_file($_FILES['foto']['tmp_name'], $ruta.$_FILES['foto']['name']);
	}
	
	include 'includes/menu.php';
				
	//	$filas>0 ? echo '<script>window.location="index.php"; alert("El usuario ya existe, por favor, ingrese otro nombre");</script>' : echo '<a href="index.php">Volver a inicio</a>';

	if($filas>0) {
		echo '<script>alert("El usuario ya existe, por favor, ingrese otro nombre"); window.location="index.php"</script>';
	}else {
		$query = "INSERT INTO usuarios (nombre_usuario, email_usuario, password_usuario, foto_perfil) VALUES ('$nombre', '$email', '$password', '$foto')";
		mysqli_query($enlace, $query);
		echo '<script>window.location="index.php"</script>';
	}

	include 'includes/pie.php';
?>